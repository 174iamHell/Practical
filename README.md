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

- [] - выделим новый слой Request (запрос) - который будет в себе содержать всю валидацию и выдавать массив сообщений. Создать Abstract класс AbstractRequest. Должен содержать абстрактный метод validate(?object $json): bool.
- [] - Создать имплементацию на Products/Create. Проверяем, что наименование не пустое и длина в пределах БД, уникальное. Тоже самое для MPN. Проверяем бренд на существование. Проверяем категории на существование.