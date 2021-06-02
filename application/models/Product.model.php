<?php

class Product extends Model
{
    function get_one($alias)
    {
        return $this->select_by_alias($alias);
    }
    
}
