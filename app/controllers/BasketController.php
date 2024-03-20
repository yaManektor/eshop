<?php

class BasketController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Корзина',
            'description' => 'Корзина товарів'
        ];

        $cart = $this->model('Basket');

        if (isset($_POST['item_id']))
            $cart->addToCart($_POST['item_id']);

        if ($cart->isSetSession()) {
            $products = $this->model('Product');
            $data['order'] = $products->getProductsCart($cart->getSession());
        }

        $this->view('basket/index', $data);
    }

    public function confirm()
    {
        require 'vendor/autoload.php';
        \Cloudipsp\Configuration::setMerchantId(1396424);
        \Cloudipsp\Configuration::setSecretKey('test');

        $checkoutData = [
            'currency' => 'UAH',
            'amount' => $_POST['amount'] * 100,
            'order_desc' => 'Оплата покупки в eShop'
        ];
        \Cloudipsp\Checkout::url($checkoutData)->toCheckout();
    }

    public function delete()
    {
        $cart = $this->model('Basket');

        if (isset($_POST['itemID'])) {
            $cart->deleteProductFromSession($_POST['itemID']);
        } elseif (isset($_POST['delete_all'])) {
            $cart->deleteSession();
        }

        header('Location: /basket');
    }
}