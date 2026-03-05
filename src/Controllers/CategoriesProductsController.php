<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Categories;
use App\Models\CategoriesProducts;
use App\Models\Products;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Micro\Collection as MicroCollection;

final class CategoriesProductsController extends Controller
{
    public static function routes(): MicroCollection
    {
        $collection = new MicroCollection();
        $collection->setHandler(new self()); // Используем текущий класс
        $collection->setPrefix('/categories_products$categories_products');

        $collection->get('/', 'index');          // GET /products
        $collection->post('/add', 'create');     // POST /products/add
        $collection->get('/delete/{id}', 'delete'); // GET /products/delete/1
        $collection->post('/update/{id}','update');
        

        return $collection;
    }

    public function index():string
    {
        $categories_products = CategoriesProducts::find();
        return json_encode($categories_products);

        
    }

    public function create():void
    {
        
        $json = $this->request->getJsonRawBody();

        $products = new Products();
        $products -> name =  $json -> product_name;
        $products -> mnp = $json -> mnp;
        $products -> brand_id = $json -> brand_id;
        $products->create();

        $categories = new Categories;
        $categories -> name = $json -> categories_name;
        $products -> create();

        $categories_products = new CategoriesProducts();
        $categories_products -> category_id = $categories -> id;
        $categories_products -> product_id =  $products -> id;
        
       
    }

    public function delete($id):string
    {
        $categories_products = CategoriesProducts::findFirstById($id);
        if ($categories_products && $categories_products->delete()) {
            return json_encode(['status' => 'Deleted!']);
        }
        return json_encode(['status' => 'Not found']);
    }

    public function update($id):string
    {
        // 1. Ищем категорию в базе по Id
        $categories_products = CategoriesProducts::findFirstById($id);

        if (!$categories_products) {
            return json_encode(['status' => 'Error', 'message' => 'Category not found']);
        }

        // 2. Получаем новое имя из POST-данных
        $postName = $this->request->getPost('name');

        if (!$postName) {
            return json_encode(['status' => 'Error', 'message' => 'Name is required']);
        }

        // 3. Обновляем свойство и сохраняем
        $categories_products->name = $postName;

        if ($categories_products->update()) {
            return json_encode(['status' => 'Success', 'message' => 'Category updated!']);
        } else {
            return json_encode(['status' => 'Error', 'messages' => $categories_products->getMessages()]);
        }
    }

   
}
