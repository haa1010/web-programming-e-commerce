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
    function update_quantity()
    {
    }
}
