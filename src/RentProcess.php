<?php

namespace Misha\Gachimuchi;
use DateTime;
use Misha\Gachimuchi\repository\Repository;

/**
 * Class RentProcess описание расчета цены аренды, проверок на возможность аренды.
 */
class RentProcess {

    /**
     * @var Repository
     */
    private $masterRepository;
    /**
     * @var Repository
     */
    private $slaveRepository;
    /**
     * @var Repository
     */
    private $rentContractRepository;
    /**
     * @var Response
     */
    private $response;

    /**
     * RentProcess constructor.
     * @param Repository $masterRepository
     * @param Repository $slaveRepository
     * @param Repository $rentContractRepository
     */
    public function __construct(Repository $masterRepository, Repository $slaveRepository, Repository $rentContractRepository)
    {
        $this->masterRepository = $masterRepository;
        $this->slaveRepository = $slaveRepository;
        $this->rentContractRepository = $rentContractRepository;
    }

    /**
     * @param Request $request
     */
    private function rentCheck(Request $request)
    {
        $rentContracts = $this->rentContractRepository->getListById($request->getSlave()->getId());
        $requestStart = $request->getBeginDate();
        $requestEnd = $request->getEndDate();
        foreach ($rentContracts as $rentContract)
        {
            $contractStart = $rentContract->getBegDate();
            $contractEnd = $rentContract->getEndDate();
            //Тут проверяем, пересекаются ли периоды
            if ($this->checkPeriod($requestStart->format('Y-m-d H'),  $requestEnd->format('Y-m-d H'),
                $contractStart->format('Y-m-d H'), $contractEnd->format('Y-m-d H')))
            {
                //Определяем, можно ли випу из запроса получить в аренду раба
                if (!$request->getMaster()->isVip() || $rentContract->getMaster()->isVip())
                {
                    //Определим основную причину.
                    $addMsg = $request->getMaster()->isVip() && $rentContract->getMaster()->isVip() ? '. Текущий хозяин VIP': '';
                    //Формируем сообщение ошибки
                    $msg = 'Невозможно выполнить запрос. Раб №'.$rentContract->getSlave()->getId(). ' '.$rentContract->getSlave()->getName().' занят.'.
                    ' Пересечение периодов аренды с контрактом №'.
                    $rentContract->getId().
                    ', Дата начала контракта: '.
                    $contractStart->format('d.m.Y H:i').
                    ', Дата окончания контракта: '. $contractEnd->format('d.m.Y H:i').$addMsg;
                    //Добавляем ошибку в ответ
                    $this->response->addError($msg);
                }

            }
        }
    }

    /**
     * @param $requestStart
     * @param $requestEnd
     * @param $contractStart
     * @param $contractEnd
     * @return bool
     */
    private function checkPeriod($requestStart, $requestEnd, $contractStart, $contractEnd)
    {
        return $requestStart <= $contractEnd && $requestEnd >= $contractStart;
    }

    /**
     * @param Request $request
     *
     * @return Response
     * @throws Exception
     */
    public function process(Request $request)
    {
        $this->response = new Response();

        $dateDiff = $request->getBeginDate()->diff($request->getEndDate());

        if ($request->getBeginDate()->format('Y-m-d') === $request->getEndDate()->format('Y-m-d')) {
            $allWorkHour = (int)$request->getEndDate()->format('H') - (int)$request->getBeginDate()->format('H') + 1;
            if ($allWorkHour > 16) {
                //Добавляем ошибку в ответ
                $this->response->addError('Раб не может работать больше 16 часов');
            }
            $this->rentCheck($request);
        } elseif ($dateDiff->days !== 0 && $dateDiff->h === 0) {
            $allWorkHour = $dateDiff->days * 24;
            $this->rentCheck($request);
        } else {
            $startLastDay = new DateTime($request->getEndDate()->format('Y-m-d'));
            $endFirstDay = new DateTime($request->getBeginDate()->format('Y-m-d').'23:00:00');

            $startHour = $request->getBeginDate()->diff($endFirstDay)->h + 1;
            $endHour = $request->getEndDate()->diff($startLastDay)->h + 1;

            $allWorkHour = $dateDiff->h + 1;

            if ($startHour > 16 || $endHour > 16) {
                //Добавляем ошибку в ответ
                $this->response->addError('Раб не может работать больше 16 часов');
            }
            $this->rentCheck($request);
        }

        //На основе рабочих часов считаем цену аренды
        $rentContractPrice = round($allWorkHour * $request->getSlave()->getPricePerHour(), 2);

        //Смотрим, есть ли ошибки, если ошибок нет, создаем контракт, сохраняем его и отдаем в ответ
        if (empty($this->response->getErrors())){
            $newRentContract = new RentContract(2, $request->getMaster(), $request->getSlave(), $request->getBeginDate(), $request->getEndDate(), $rentContractPrice);
            $this->rentContractRepository->save($newRentContract);
            $this->response->setStatus('success');
            $this->response->setRentContract($newRentContract);
        }

        return $this->response;
    }
}