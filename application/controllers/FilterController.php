<?php
 class FilterController extends BaseController{
   
  public function filter($categoryId=NULL,$subCategoryId=NULL,$name=NULL,$priceFrom=NULL,$priceTo=NULL,$orderby=NULL)
   {  
   if($categoryId)
   {
       if($subCategoryId){
    $query="select * from `product` 
    where CategoryId=".$categoryId." and SubCategoryId = ".$subCategoryId;  }
    else{
        $query="select * from `product` where  CategoryId=".$categoryId;
    }
}
    else{
        $query="select * from `product`";
    }
    
    $listProduct=$this->Filter->query($query);
  
    $newList=[];

    
    if($name!=NULL){
        echo "name";
        foreach($listProduct as $product){
               
            if($this->str_contains($product['Product']['Name'],$name)){
           
             array_push($newList,$product);
            }
        }
     $listProduct=$newList;
           
     $newList=[];
     }
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
                if($product['Product']['Price']<=$priceTo){
                
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
       // print_r($listProduct);
        $this->set('listProduct', $listProduct);
    
   
   }
 public function findName($name){
    
        
     $query="select * from `product` where Name like '%".$name."%'";
    
     $listProduct=$this->Filter->query($query);
         $this->set('products', $listProduct);
        
     
 }

   function str_contains(string $haystack, string $needle): bool
   {
       return '' === $needle || false !== strpos($haystack, $needle);
   }


}
?>