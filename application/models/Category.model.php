<?php
 class Category extends Model{
  
    function  getListProduct($query){
        $product=new Product();
        return $product->query($query);

  }
}