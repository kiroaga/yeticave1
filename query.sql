insert INTO category(name) VALUES ('Доски и лыжи'),('Крепления'),('Ботинки'),('Одежда'),('Инструменты'),('Разное'); /*Запрос на добавление категории*/

insert into bet(date, amount, id_user,id_lot) values ('2020-05-17 10:20:00.000000', 5000, 1, 1), ('2020-05-17 10:20:00.000000', 10000, 2, 2);

insert into user(registration_date, email, name, password, avatar, contact) values ('2020-05-17 10:10:00.000000', 'test@mail.ru', 'Kirill', '12345', 'img.jpeg', '+79654321321'),
                                                                              ('2020-05-17 10:10:00.000000', 'test2@mail.ru', 'Artem', '12345', 'img.jpeg', '+79654321322');

INSERT INTO `lot` (`id_user`, `id_category`, `id_winner`, `create_date`, `name`, `description`, `image`, `start_price`, `end_date`, `step`) VALUES
                                                                                                                                                        (1, 1, 1, current_time, '2014 Rossignol District Snowboard', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.', 'img/lot-1.jpg', 10999, current_time, 1),
                                                                                                                                                        (2, 1, 2, current_time, 'DC Ply Mens 2016/2017 Snowboard', 'Популярный сноуборд Ply по ощущениям немного напоминает скейтборд. Его фирменный и чуткий прогиб Lock & Load в сочетании с приятной гибкостью легкого сердечника Stratus и биаксильной оплеткой его стекловолокном делают сноубординг незабываемым! Жесткость: 6/10', 'img/lot-2.jpg',159000,  current_time, 1),
                                                                                                                                                        (1, 2, 1, current_time, 'Крепления Union Contact Pro 2015 года размер L/XL', 'Крепление для сноуборда UNION CONTACT PRO SS20 - GIGI протестировал, RUF одобрил! \r\nКрепление для сноуборда UNION CONTACT PRO SS20 - это универсальные крепления, созданные для паркового сноубординга и катания по трассам. Они идеально подойдут сноубордистам, которым нужна свобода действий и высокий контроль доски.', 'img/lot-3.jpg', 8000, current_time, 1),
                                                                                                                                                        (2, 3, 2, current_time, 'Ботинки для сноуборда DC Mutiny Charocal', 'Принимая во внимание стиль и быстрое комфортное надевание ботинок Mutiny, можно сказать, что эта модель — скейтовая обувь для сноубордиста. Простота традиционной шнуровки и плотная фиксация пятки за счет внутренней утяжки делают эти ботинки очевидным выбором для любого поклонника фристайла.\r\n\r\n', 'img/lot-4.jpg', 10999, current_time, 1),
                                                                                                                                                        (1, 4, 1, current_time, 'Куртка для сноуборда DC Mutiny Charocal', 'Мембранная ткань с высокими показателями, хороший современный утеплитель, удобный крой и обилие карманов — в ней предусмотрено все, что только может Вам понадобиться. Эта куртка станет незаменимым спутником на склонах в любую погоду. ', 'img/lot-5.jpg', 7500, current_time, 1),
                                                                                                                                                        (2, 6, 2, current_time, 'Маска Oakley Canopy', 'Технология HDO обеспечивает максимальную четкость изображения на всех углах обзора и позволяет избежать перенапряжения глаз. Цветопередача Prizm обеспечивает оптимальный контраст.', 'img/lot-6.jpg', 5400, current_time, 1);


select * from category /*Запрос на выбор всех категорий*/

select lot.name, start_price, image, bet.amount as 'Последня ставка', count(bet.id_lot) as 'Количество ставок', category.name from lot inner join bet on bet.id_lot = lot.id_lot inner join category on
category.id_category = lot.id_category where id_winner is null GROUP by lot.id_lot, lot.name, start_price, image, bet.amount order by create_date desc /*получить самые новые, открытые лоты. Каждый лот должен включать
название, стартовую цену, ссылку на изображение, цену последней ставки,
количество ставок, название категории;*/

SELECT id_lot, lot.name as 'Лот' , category.name as 'Категория' FROM lot INNER JOIN category ON lot.id_category = category.id_category /*показать лот по его id. Получите также название категории, к которой принадлежит лот*/

UPDATE lot SET name = 'Теперь прикольная' where id_lot = 2 /*обновить название лота по его идентификатору;*/

SELECT id_bet, bet.id_user as 'Пользователь',date as 'Дата ставки',amount as 'Сумма', lot.id_lot FROM bet INNER JOIN user ON bet.id_user = user.id_user INNER join lot on lot.id_lot = bet.id_lot WHERE DATE(date) = CURRENT_DATE order by id_bet desc;
/*получить список самых свежих ставок для лота по его идентификатору;*/

