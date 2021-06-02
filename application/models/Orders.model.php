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
        $query = "insert into order_detail (orderid, productid, quantity, price) values (" .
            $order . "," .
            intval($item['id']) . "," .
            intval($item['number']) . "," .
            intval($item['price']) . ")";
        var_dump($query);
        $this->query($query);
    }
}
