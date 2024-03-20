<?php

class ProductController extends Controller
{
    public function index($id)
    {
        $product = $this->model('Product');
        $result = $product->getOneProduct($id);

        $data = [
            'title' => $result->title,
            'description' => $result->title,
            'product' => $result,
        ];

        $this->view('product/index', $data);
    }
}