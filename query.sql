insert INTO category(name) VALUES ('Доски и лыжи'),('Крепления'),('Ботинки'),('Одежда'),('Инструменты'),('Разное'); /*Запрос на добавление категории*/

insert into bet(date, amount, id_user,id_lot) values ('2020-05-17 10:20:00.000000', 5000, 1, 1), ('2020-05-17 10:20:00.000000', 10000, 2, 2);

insert into user(registration_date, email, name, password, avatar, contact) values ('2020-05-17 10:10:00.000000', 'test@mail.ru', 'Kirill', '12345', 'img.jpeg', '+79654321321'),
                                                                              ('2020-05-17 10:10:00.000000', 'test2@mail.ru', 'Artem', '12345', 'img.jpeg', '+79654321322');

insert into lot(id_user, id_category,id_winner, create_date, name, description, image, start_price, end_date, step) values (1, 1, null, '2020-05-17 10:20:00.000000', 'Прикольная доска',
                                                                                                                           'Подойдет', 'image,jpeg', 10000, '2020-05-17 23:59:59.000000', 1000),
                                                                                                                           (1, 1, null, '2020-05-17 10:20:00.000000', 'Неприкольная доска',
                                                                                                                            'Неподойдет', 'image,jpeg', 1000, '2020-05-17 23:59:59.000000', 100);


select * from category /*Запрос на выбор всех категорий*/

select * from lot where id_winner is null order by create_date desc

SELECT id_lot, lot.name as 'Лот' , category.name as 'Категория' FROM lot INNER JOIN category ON lot.id_category = category.id_category /*показать лот по его id. Получите также название категории, к которой принадлежит лот*/

UPDATE lot SET name = 'Теперь прикольная' where id_lot = 2 /*обновить название лота по его идентификатору;*/

SELECT id_bet, bet.id_user as 'Пользователь',date as 'Дата ставки',amount as 'Сумма', lot.id_lot FROM bet INNER JOIN user ON bet.id_user = user.id_user INNER join lot on lot.id_lot = bet.id_lot WHERE DATE(date) = CURRENT_DATE order by id_bet desc;
/*получить список самых свежих ставок для лота по его идентификатору;*/
  
