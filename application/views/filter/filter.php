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
.filter{
    background:rgb(245, 245, 245);
    height:50px;
    margin-top:20px;
    align-items:center;
    display: flex;
    margin-left:72px;
    padding-left:15px;
    margin-right:15px;
}
.filter input{
    padding-left:5px;

}
.filter button:hover, .filter button:focus{
    background-color: #3e8e41;
}

.filter input, .filter button, .filter select{
    height: 25px;
    width: 80px;
    margin:0 15 0 15;
    border: 1px solid rgb(118, 118, 118);
    border-radius:5px
}
.filter input:hover, .filter button:hover, .filter select:hover,.filter input:focus, .filter button:focus, .filter select:focus,
.filter input:focus-visible, .filter button:focus-visible, .filter select:focus-visible
{
border: 1px solid #04AA6D;
}
.filter button{
    background: #04AA6D;
   
}
.filter select{
width:100px;
}
button.newest{
    height:33px;
    padding:10px;
    background-color:white;
    border:1px solid  rgb(118, 118, 118);
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

<?php
 foreach($listProduct as $item ){
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




</body>

</html>