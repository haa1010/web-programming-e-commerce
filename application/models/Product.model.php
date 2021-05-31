<?php

class Product extends Model
{
    function get_one($id)
    {
        return $this->select($id);
    }
    
}
