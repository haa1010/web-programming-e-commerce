<?php
// print_r($products);
?>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  .product{
    margin-top:20px;
      display:flex;
      flex-direction:column;
      align-items:center;
        height:250px;
        width: 300px;
  }
  .inline-row {
      display: flex;
      flex-direction:row;
      justify-content:start;
      flex-wrap:wrap;
      
  }
.item{
    height:300;
    
     width:200; 
     background: rgb(245, 245, 245)
}

  </style>

</head>
<body>
<div class="content-product">
<div class="inline-row">
<?php

 foreach($products as $item ){
     ?>
     <div class="product">
     <div class="item" >
     <img src="<?php echo PATH_URL_IMG_PRODUCT.$item['Product']['Image1']?>"  alt="product" height=200 width=200/>
     <p> <?php echo $item['Product']['Name'];?>   </p>
     </div>
     </div>
<?php
  
 }

?>


</div>


</div>



</body>

</html>