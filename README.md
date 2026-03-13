# Этап 1

- [x] - дополнить сущностью брендов (brands) - id | name | created_at;
- [x] - дополнить сущностью продуктов (products) - id | name | mnp | brand_id (foreign keys) | created_at
- [x] - дополнить сущностью Категории продуктов (categories_products) - id | category_id (foreign keys) | product_id (foreign keys) | created_at

- [x] - Создаем CRUD для брендов (Models\Brands, BrandsController);
- [x] - Создаем CRUD для продуктов (Models\Products, ProductsController);

В БД:

1 К М - столбцом в таблице с 1
М К М - отдельной таблицей

# Этап 2

- [x] - выделим новый слой Request (запрос) - который будет в себе содержать всю валидацию и выдавать массив сообщений. Создать Abstract класс AbstractRequest. Должен содержать абстрактный метод validate(?object $json): bool.
- [x] - Создать имплементацию на Products/Create. Проверяем, что наименование не пустое и длина в пределах БД, уникальное. Тоже самое для MPN. Проверяем бренд на существование. Проверяем категории на существование.
- [x] - Создать имплементацию на Brands/Create|Update, Categories/Create|Update, Products/Update. Постараться вынести утилиту по проверки строки в базовый класс либо в отдельный класс валидатор.

# Этап 3

- [x] Модифицировать таблицу продуктов, добавить поле price (float).
- [x] Дополнить Products/create|update|model.
- [] Создать таблицу корзины (cart), счетов (orders) и таблицу (orders_products). Создать Orders/Create, Cart/Add, Cart/Remove, Cart/Update.
- [] Порабать с Select (SQL, modelsManager). При создании заказа для пользователя, мы берем корзину (cart) делаем innerJoin Products, получая формат product_id(cart), quantity(cart), price(products) и создаем на их основе order_products (id, order_id, product_id, price, created_at), т.е. мы на каждый quantity создаем order_products. 
- [] Обновим таблицу Order, добавим статусы (Создан, Завершен, Отменен)