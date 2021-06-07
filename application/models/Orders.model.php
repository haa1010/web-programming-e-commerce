<?php
class Orders extends Model
{
    function insert_one($address, $phone, $des, $total)
    {
        $query = "insert into " . $this->_table . "(uid, address, phone, cart_total, description) value (" .
            intval($_SESSION['uid']) . ",'" .
            $this->escape($address) . "','" .
            $this->escape($phone) . "'," .
            $total . ",'" .
            $this->escape($des) . "');";
        $this->query($query);
    }

    function insert_detail($item, $order)
    {
        $query = "insert into order_detail(orderid, productid, quantity, color, size, price) values (" .
            $order . "," .
            intval($item['id']) . "," .
            intval($item['number']) . ",'" .
            $this->escape($item['color']) . "','" .
            $this->escape($item['size']) . "'," .
            intval($item['price']) . ")";
        var_dump($query);
        $this->query($query);
        var_dump($this->getError());
    }
}
