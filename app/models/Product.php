<?php

require 'app/core/DB.php';

class Product
{
    private $_db = null;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function getProducts()
    {
        $result = $this->_db->query("SELECT * FROM `products` ORDER BY `id` DESC");
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function getProductsLimited($order, $limit)
    {
        $result = $this->_db->query("SELECT * FROM `products` ORDER BY $order ASC LIMIT $limit");
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function getProductsCategory($category)
    {
        $result = $this->_db->query("SELECT * FROM `products` WHERE `category` = '$category' ORDER BY `id` DESC");
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOneProduct($id)
    {
        $result = $this->_db->query("SELECT * FROM `products` WHERE `id` = '$id'");
        return $result->fetch(PDO::FETCH_OBJ);
    }

    public function getProductsCart($items)
    {
        $result = $this->_db->query("SELECT * FROM `products` WHERE `id` IN ($items)");
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
}