<?php
class Orders extends Model
{
    function insert_one($address, $phone, $des, $total)
    {
        $query = "insert into " . $this->_table . " (customer, address, phone, cart_total, description) value ('" .
            $this->escape($_SESSION['username']) . "','" .
            $this->escape($address) . "','" .
            $this->escape($phone) . "'," .
            $total . ",'" .
            $this->escape($des) . "');";
        return $this->query($query);
    }

    function insert_detail($item, $order)
    {
        print_r($item);
        $query = "insert into order_detail (orderid, productid, quantity, color, size, price) values (" .
            $order . "," .
            intval($item['id']) . "," .
            intval($item['number']) . ",'" .
            $this->escape($item['color']) . "','" .
            $this->escape($item['size']) . "'," .
            intval($item['price']) . ")";
        var_dump($query);
        $this->query($query);
    }

    function get_history($username)
    {
        $query = 'SELECT `orders`.`Cart_total`, `order_detail`.*, `product`.`Name`,`product`.`Image1`,`product`.`Alias` FROM `orders` JOIN `order_detail` ON `order_detail`.`OrderId`=`orders`.`Id` JOIN `product` on `product`.`Id` = `order_detail`.`ProductId` WHERE `orders`.`username`=\'' . $username . '\' ';
        // echo($query);
        return $this->query($query);
    }
}
