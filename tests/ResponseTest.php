<?php



use Misha\Gachimuchi\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function test_AddError_success()
    {
        $response = new Response();

        $response->addError('error');

        $this->assertNotEmpty($response->getErrors());
        $this->assertEquals('error', $response->getErrors()[0]);
    }
}
