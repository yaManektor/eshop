<?php

session_start();

class Basket
{
    private $session_name = 'cart';

    public function isSetSession()
    {
        return isset($_SESSION[$this->session_name]);
    }

    public function setSession($val)
    {
        $_SESSION[$this->session_name] = $val;
    }

    public function getSession()
    {
        return $_SESSION[$this->session_name];
    }

    public function deleteSession()
    {
        unset($_SESSION[$this->session_name]);
    }

    public function deleteProductFromSession($id)
    {
        $order = $this->getSession();

        $products = explode(',', $order);
        unset($products[array_search($id, $products)]);

        if (!empty($products)) {
            $products = implode(',', $products);
            $this->setSession($products);
        } else
            $this->deleteSession();
    }

    public function addToCart($itemID)
    {
        if (!$this->isSetSession())
            $this->setSession($itemID);
        else {
            $items = explode(',', $_SESSION[$this->session_name]);

            $itemExists = false;
            foreach ($items as $el) {
                if ($el == $itemID)
                    $itemExists = true;
            }

            if (!$itemExists)
                $_SESSION[$this->session_name] = $_SESSION[$this->session_name] . ',' . $itemID;
        }
    }

    public function countItems()
    {
        if (!$this->isSetSession())
            return 0;
        else {
            $items = explode(',', $_SESSION[$this->session_name]);
            return count($items);
        }
    }
}