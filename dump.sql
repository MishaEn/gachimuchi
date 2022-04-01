INSERT INTO slaves_category (id, slaves_id, category_id)
VALUES
(1, 1, 5),
(2, 2, 5),
(3, 3, 5),
(4, 4, 5),
(5, 5, 5),
(6, 6, 5),
(7, 7, 5),
(8, 8, 5),
(9, 9, 5),
(10, 4, 4),
(11, 3, 2),
(12, 15, 3),
(13, 11, 4),
(14, 17, 5),
(15, 1, 6),
(17, 4, 3),
(18, 15, 5),
(19, 15, 4),
(20, 16, 3),
(21, 16, 5),
(22, 16, 5),
(23, 16, 6),
(24, 27, 6),
(25, 13, 6),
(26, 13, 3),
(31, 3, 4),
(32, 27, 4),
(33, 3, 3),
(34, 20, 6),
(35, 21, 6),
(36, 22, 6),
(37, 23, 6),
(38, 24, 6),
(39, 25, 6),
(40, 19, 6),
(41, 18, 6),
(42, 10, 6)


insert into slaves (id, name, sex, age, weight, skin_color, place, description, price_per_hour, full_price)
values
(1, 'slave 1', 'm', 34, 766, 'white', 'place', 'description', 5.1, 11),
(2, 'slave 2', 'f', 34, 766, 'white', 'place', 'description', 5.1, 9),
(3, 'slave 3', 'm', 61, 766, 'white', 'place', 'description', 5.1, 10),
(4, 'slave 4', 'm', 61, 766, 'white', 'place', 'description', 5.1, 10),
(5, 'slave 5', 'm', 34, 766, 'white', 'place', 'description', 5.1, 10),
(6, 'slave 6', 'm', 61, 766, 'white', 'place', 'description', 5.1, 10),
(7, 'slave 7', 'm', 61, 766, 'white', 'place', 'description', 5.1, 10),
(8, 'slave 8', 'm', 61, 766, 'white', 'place', 'description', 5.1, 10),
(9, 'slave 9', 'm', 61, 766, 'white', 'place', 'description', 5.1, 10),
(10, 'slave 10', 'f', 34, 766, 'white', 'place', 'description', 5.1, 10),
(11, 'slave 11', 'f', 34, 766, 'white', 'place', 'description', 5.1, 10),
(12, 'slave 12', 'f', 34, 766, 'white', 'place', 'description', 5.1, 10),
(13, 'slave 13', 'f', 34, 766, 'white', 'place', 'description', 5.1, 10),
(14, 'slave 14', 'f', 34, 766, 'white', 'place', 'description', 5.1, 10),
(15, 'slave 15', 'm', 34, 766, 'white', 'place', 'description', 5.1, 10),
(16, 'slave 16', 'm', 34, 766, 'white', 'place', 'description', 5.1, 10),
(17, 'slave 17', 'm', 34, 766, 'white', 'place', 'description', 5.1, 10),
(18, 'slave 18', 'm', 34, 766, 'white', 'place', 'description', 5.1, 10),
(19, 'slave 19', 'm', 61, 766, 'white', 'place', 'description', 5.1, 10),
(20, 'slave 20', 'm', 34, 766, 'white', 'place', 'description', 5.1, 10),
(21, 'slave 21', 'm', 34, 766, 'white', 'place', 'description', 5.1, 10),
(22, 'slave 22', 'm', 34, 766, 'white', 'place', 'description', 5.1, 10),
(23, 'slave 23', 'm', 34, 766, 'white', 'place', 'description', 5.1, 10),
(24, 'slave 24', 'm', 34, 766, 'white', 'place', 'description', 5.1, 10),
(25, 'slave 25', 'm', 34, 766, 'white', 'place', 'description', 5.1, 10),
(26, 'slave 26', 'm', 34, 766, 'white', 'place', 'description', 5.1, 10),
(27, 'slave 27', 'm', 34, 766, 'white', 'place', 'description', 5.1, 10)


CREATE TABLE slaves
(
    id int PRIMARY KEY,
    name VARCHAR(20),
    sex VARCHAR(2),
    age INTEGER,
    weight float,
    skin_color VARCHAR(255),
    place VARCHAR(255),
    description TEXT,
    price_per_hour float,
    full_price float
)

CREATE TABLE category
(
    id int PRIMARY KEY,
    parent_id int FOREIGN KEY REFERENCES category(id),
    name varchar(255)
)

CREATE TABLE slaves_category
(
    id int PRIMARY KEY,
    slaves_id INt FOREIGN KEY REFERENCES slaves(id),
    category_id INt FOREIGN KEY REFERENCES category(id)
)

insert into slaves (id, name, sex, age, weight, skin_color, place, description, price_per_hour, full_price)
values
(1, 'slave 1', 'm', 34, 766, 'white', 'place', 'description', 5.1, 11),
(2, 'slave 2', 'f', 34, 766, 'white', 'place', 'description', 5.1, 9),
(3, 'slave 3', 'm', 61, 766, 'white', 'place', 'description', 5.1, 10),
(4, 'slave 4', 'm', 61, 766, 'white', 'place', 'description', 5.1, 10),
(5, 'slave 5', 'm', 34, 766, 'white', 'place', 'description', 5.1, 10),
(6, 'slave 6', 'm', 61, 766, 'white', 'place', 'description', 5.1, 10),
(7, 'slave 7', 'm', 61, 766, 'white', 'place', 'description', 5.1, 10),
(8, 'slave 8', 'm', 61, 766, 'white', 'place', 'description', 5.1, 10),
(9, 'slave 9', 'm', 61, 766, 'white', 'place', 'description', 5.1, 10)

INSERT INTO category (id, parent_id, name)
VALUES
(1, null, 'Popular'),
(2, 1, 'For the kitchen'),
(3, 4, 'Washing dishes'),
(4, 4, 'Cooking'),
(5, 4, 'Cleaning'),
(6, 4, 'Serving'),
(7, 1, 'For the bathroom')

INSERT INTO slaves_category (id, slaves_id, category_id)
VALUES
(1, 1, 2), --
(2, 2, 6), -- f
(3, 3, 6), --
(4, 4, 6), --
(5, 2, 7), -- f
(6, 6, 5), --
(7, 7, 5), --
(8, 2, 6), -- f
(9, 9, 5) --
-----------------------------------------------------
select
    MAX(full_price) As 'Maximal full price',
    MIN(full_price) As 'Minimal full price',
    AVG(full_price) As 'Averge full price'
from
    slaves
WHERE
        weight > 60
-----------------------------------------------------
SELECT
    c.id,
    c.name
FROM
    category c
WHERE
        c.id in (
        SELECT
            sc.category_id
        FROM
            slaves_category sc
        GROUP BY sc.category_id
        HAVING COUNT(*) > 10
    )
-----------------------------------------------------
SELECT
    c.name
FROM (
         SELECT TOP 1
             sc.category_id
         FROM
             slaves_category sc
                 inner join slaves s on s.id = sc.slaves_id
         GROUP BY sc.category_id
         ORDER BY SUM(s.full_price) DESC
     ) as max_sum
         inner join category c on c.id = max_sum.category_id
-----------------------------------------------------
--не получилось написать.
SELECT
    sc.category_id,
    COUNT(s.sex)
FROM
    slaves_category sc
        inner join slaves s on s.id = sc.slaves_id
WHERE
        s.sex = 'f'
GROUP BY sc.category_id

SELECT
    COUNT(*),
    COUNT(case when s.sex = 'm' then 1 end) AS male,
    COUNT(case when s.sex = 'f' then 1 end) AS female
FROM slaves s
         INNER JOIN slaves_category sc on sc.slaves_id = s.id
GROUP BY sc.id
-----------------------------------------------------
SELECT
    *
FROM
    category c
        left join category c_children on c_children.parent_id = c.id
WHERE
        c.name = 'For the kitchen'

select c.id, c.title, count(*)
from slaves s
         join slaves_category sc on sc.slaves_id = s.id
group by c.id, c.title