
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
  margin-left:15px;
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
height:30px;
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
var isFilter=false;
function getHTTPObject(){if (window.ActiveXObject){return new ActiveXObject("Microsoft.XMLHTTP");}else if (window.XMLHttpRequest){return new XMLHttpRequest();}else {alert("Your browser does not support AJAX.");return null;}}
direct=(id)=>{

    window.location =" ?url=product/view/"+ id;
}
filter=(event)=>{
event.preventDefault();
var priceFrom=document.getElementById("priceFrom").value;
var priceTo =document.getElementById("priceTo").value;
var orderby=document.getElementById("order").value;

var url="http://localhost/web-programming-e-commerce/?url=filter/filter";
if(priceFrom) url=url+"/"+priceFrom;
if(priceTo) url=url+"/"+priceTo;
if(orderby) url=url+"/"+orderby;
url=url+"&api=1";
var http = new XMLHttpRequest();
console.log(url);
httpObject = getHTTPObject();
if (httpObject != null) {
    //httpObject.open('POST', url, true);
   httpObject.open("GET", url, true);
 //httpObject.send(data);
  httpObject.send(null);
  httpObject.onreadystatechange = function() {//Call a function when the state changes.
    if(httpObject.readyState == 4 && httpObject.status == 200) {
   
        document.getElementById("listProduct").innerHTML =this.responseText;
     
    }
}


}
}
</script>
</head>
<body>

 <div class="filter ">
 Price:
 <input placeholder="From--" type ='text' id="priceFrom"></input>
 <input placeholder="To--" id="priceTo"></input>
 <select name="order" id="order">
  <option value="0"> High to Low</option>
  <option value="1"> Low to High</option>
</select>
<button onclick="filter(event)" class="submit">Submit</button>

 </div>
<div class="content-product">
<div class="inline-row" id="listProduct" >

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