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
        height:330px;
     width:365px;
        margin-bottom:20px;
  }
  .inline-row {
      display: flex;
      flex-direction:row;
      justify-content:start;
      flex-wrap:wrap;
      
  }
.item{
    height:320;
     background: rgb(245, 245, 245)
}
.item:hover, .item:focus{
    border:1px solid #04AA6D;
}
.item-name{
    font-size:0.75rem;
    line-height:14px;
    text-align:center;
}
.item-price{
    color: #04AA6D;
    font-size:1rem;
    text-align:center;
}
.content-product{
    margin:15px;
}
  </style>
<script>

direct=(id)=>{

    window.location =" ?url=product/view/"+ id;
}

</script>
</head>
<body>
<div class="content-product">
<div class="inline-row">
<?php

 foreach($products as $item ){
     ?>
     <div class="product">
     <div class="item" onclick="direct(<?php echo $item['Product']['Id']?>)" >
     <img src="<?php echo PATH_URL_IMG_PRODUCT.$item['Product']['Image1']?>"  alt="product" height=250 width=250/>
     <p class="item-name" ><?php echo $item['Product']['Name'];?>  </p>
    <p class="item-price"> <?php echo number_format($item['Product']['Price'], 2, ',', ' ') ?> VND  </p>
     </div>
     </div>
<?php
  
 }

?>


</div>


</div>



</body>

</html>