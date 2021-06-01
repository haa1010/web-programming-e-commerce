<?php
 class FilterController extends BaseController{
   
  public function filter($priceFrom=NULL,$priceTo=NULL,$orderby=NULL)
   {  
    $query="select * from `product` ";  
    $listProduct=$this->Filter->query($query);
  
    $newList=[];
        if($priceFrom){
           foreach($listProduct as $product){
               if($product['Product']['Price']>=$priceFrom){
                array_push($newList,$product);
               }
           }
           $listProduct=$newList;
           $newList=[];
        }
        
        if($priceTo){
            
            foreach($listProduct as $product){
                if($product['Product']['Price']<=$priceFrom){
                 array_push($newList,$product);
                }
            }
            $listProduct=$newList;
            $newList=[];
        }
        
        function usortAscending($a, $b) {
            return $a['Product']['Price']>$b['Product']['Price'];
        }
        function usortDescending($a,$b){
            return $a['Product']['Price']<$b['Product']['Price'];
        }
        if($orderby==1)
        usort($listProduct, "usortAscending");
        else  usort($listProduct, "usortDescending");
        $this->set('products', $listProduct);
     
   
   }
   function str_contains(string $haystack, string $needle): bool
   {
       return '' === $needle || false !== strpos($haystack, $needle);
   }
   public function findName($name){
    $query="select * from `product` ";  
    $listProduct=$this->Filter->query($query);
  
    if($name!=null){
                  
                   $listProduct = array_filter(
                    $listProduct,
                    function ($product) {
                        return $this->str_contains($product['Product']['Name'],$name);
                    }
                );
                $this->set('products', $listProduct);
                }
   }

}
?>