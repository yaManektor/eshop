<?php

class CategoriesController extends Controller
{
    public function index($current_page = 1)
    {
        $products = $this->model('Product');
        $result = $products->getProducts();

        $pages = ceil(count($result) / 3);

        $result = array_slice($result, $current_page * 3 - 3, 3);

        $data = [
            'title' => 'Всі товари на сайті',
            'description' => 'Всі товари на сайті',
            'products' => $result,
            'pages' => $pages,
        ];

        $this->view('categories/index', $data);
    }

    public function smartphones()
    {
        $products = $this->model('Product');

        $data = [
            'title' => 'Смартфони',
            'description' => 'Всі товари категорії смартфони',
            'products' => $products->getProductsCategory('smartphones')
        ];

        $this->view('categories/index', $data);
    }

    public function monitors()
    {
        $products = $this->model('Product');

        $data = [
            'title' => 'Монітори',
            'description' => 'Всі товари категорії монітори',
            'products' => $products->getProductsCategory('monitors')
        ];

        $this->view('categories/index', $data);
    }

    public function mouses()
    {
        $products = $this->model('Product');

        $data = [
            'title' => 'Мишки',
            'description' => 'Всі товари категорії мишки',
            'products' => $products->getProductsCategory('mouses')
        ];

        $this->view('categories/index', $data);
    }

    public function watches()
    {
        $products = $this->model('Product');

        $data = [
            'title' => 'Годинники',
            'description' => 'Всі товари категорії годинники',
            'products' => $products->getProductsCategory('watches')
        ];

        $this->view('categories/index', $data);
    }
}