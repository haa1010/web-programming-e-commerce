<?php
class Cart extends Model
{
    function __construct()
    {
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
    }
    function cart_add($pid)
    {
        if (isset($_SESSION['cart'][$pid])) {
            //nếu đã có sp trong giỏ hàng thì số lượng lên 1
            $_SESSION['cart'][$pid]['number']++;
        } else {
            $productModel = new Product();
            $product  = $productModel->select($pid);
            print_r($product);
            print_r("---------------_");
            print_r(count($product));
            $_SESSION['cart'][$pid] = array(
                'id' => $pid,
                'name' => $product['Product']['Name'],
                'image' => $product['Product']['Image1'],
                'number' => 1,
                'typeid' => $product['Product']['TypeId'],
                'percent_off' => $product['Product']['Percent_off'],
                'price' => $product['Product']['Price']
            );
        }
    }
    function cart_update($pid, $number)
    {
        if ($number == 0) {
            //xóa sp ra khỏi giỏ hàng
            unset($_SESSION['cart'][$pid]);
        } else {
            $_SESSION['cart'][$pid]['number'] = $number;
        }
    }
    function cart_delete($pid)
    {
        unset($_SESSION['cart'][$pid]);
    }

    function cart_total()
    {
        $total = 0;
        foreach ($_SESSION['cart'] as $product) {
            if ($product["typeid"] == 3) {
                $total += (($product['price']) - ($product['price']) * ($product['percent_off']) / 100) * $product['number'];
            } else
                $total += $product['price'] * $product['number'];
        }
        return $total;
    }
    function cart_number()
    {
        $number = 0;
        foreach ($_SESSION['cart'] as $product) {
            $number += $product['number'];
        }
        return $number;
    }
    function cart_destroy()
    {
        $_SESSION['cart'] = array();
    }
}
