<?php


namespace App\Controllers;

use App\Models\Categories;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Micro\Collection as MicroCollection;
use App\Models\Products; // ОБЯЗАТЕЛЬНО импортируем модель

final class CategoriesController extends Controller
{
    public static function routes(): MicroCollection
    {
        $collection = new MicroCollection();
        $collection->setHandler(new self()); // Используем текущий класс
        $collection->setPrefix('/categories');

        $collection->get('/', 'index');          // GET /products
        $collection->post('/add', 'create');     // POST /products/add
        $collection->get('/delete/{id}', 'delete'); // GET /products/delete/1
        $collection->post('/update/{id}','update');
        

        return $collection;
    }

    public function index()
    {
        $categories = Categories::find();
        return json_encode($categories);
    }

    public function create()
    {
        $categories = new Categories();
        // Берем данные из POST-запроса
        $categories->Name = $this->request->getPost('name');

        if ($categories->create()) {
            return json_encode(['status' => 'Success! Product saved in DB']);
        } else {
            return json_encode(['status' => 'Error', 'messages' => $categories->getMessages()]);
        }
    }

    public function delete($id)
    {
        $categories = Categories::findFirstById($id);
        if ($categories && $categories->delete()) {
            return json_encode(['status' => 'Deleted!']);
        }
        return json_encode(['status' => 'Not found']);
    }

    public function update($id)
    {
        // 1. Ищем категорию в базе по Id
        $categories = Categories::findFirstById($id);

        if (!$categories) {
            return json_encode(['status' => 'Error', 'message' => 'Category not found']);
        }

        // 2. Получаем новое имя из POST-данных
        $newName = $this->request->getPost('name');

        if (!$newName) {
            return json_encode(['status' => 'Error', 'message' => 'Name is required']);
        }

        // 3. Обновляем свойство и сохраняем
        $categories->Name = $newName;

        if ($categories->save()) {
            return json_encode(['status' => 'Success', 'message' => 'Category updated!']);
        } else {
            return json_encode(['status' => 'Error', 'messages' => $categories->getMessages()]);
        }
    }

   
}
