# Этап 1

- [] - дополнить сущностью брендов (brands) - id | name | created_at;
- [] - дополнить сущностью продуктов (products) - id | name | mnp | brand_id (foreign keys) | created_at
- [] - дополнить сущностью Категории продуктов (categories_products) - id | category_id (foreign keys) | product_id (foreign keys) | created_at

- [] - Создаем CRUD для брендов (Models\Brands, BrandsController);
- [] - Создаем CRUD для продуктов (Models\Products, ProductsController);

В БД:

1 К М - столбцом в таблице с 1
М К М - отдельной таблицей