<?php

class Product extends Model
{
    function get_one($alias)
    {
        return $this->select_by_alias($alias);
    }
    function get_quantity($id, $color, $size)
    {
        $objArr =  json_decode($this->select($id)['Product']['Quantity']);
        foreach ($objArr as $obj) {
            $obj = get_object_vars($obj);
            if ($obj['color'] === $color && $obj['size'] === $size) {
                return $obj['qty'];
            }
        }
        return 0;
    }
    function update_quantity($item)
    {
        $objArr =  json_decode($this->select($item['id'])['Product']['Quantity'], true);
        foreach ($objArr as $i => $obj) {
            if ($obj['color'] === $item['color'] && $obj['size'] === $item['size']) {
                $objArr[$i]['qty'] = strval($objArr[$i]['qty'] - $item['number']);
            }
        }
        $query = "update `" . $this->_table . "` set `Quantity` = '" . json_encode($objArr) . "' where `id`=" . $this->escape($item['id']) . ";";
        $this->query($query);
    }

    function checkCart()
    {
        $result = "";
        foreach ($_SESSION['cart'] as $pid => $item) {
            $left = $this->get_quantity($item['id'], $item['color'], $item['size']);
            if ($item['number'] > intval($left)) {
                $result += "Product " . str_replace("-", " ", $pid) . "Only have " . $left . " item" . "\n";
            }
        }
        return $result;
    }
}
