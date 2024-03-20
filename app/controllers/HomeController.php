<?php
class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'eShop',
            'description' => 'Головна сторінка Інтернет-магазину'
        ];
        
        $products = $this->model('Product');

        $data['products'] = $products->getProductsLimited('id', 5);

        $this->view('home/index', $data);
    }
}
