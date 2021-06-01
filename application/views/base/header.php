
<!DOCTYPE html>

<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    button.dropbtn a {
      text-decoration: none;
      color: white;
    }

    .dropbtn {
      background-color: #04AA6D;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }
    a{text-decoration: none}
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.inline{
  display: flex;
  justify-content:space-between;
align-items:center;
height:150px;

}
.search-input{
  height:40px;
  font-size:18px;
  width:400px;
  padding-left:10px;
  border-top:1px solid rgb(118, 118, 118);
  border-left:1px solid rgb(118, 118, 118);
  border-bottom:1px solid rgb(118, 118, 118);
  border-right:unset;
  padding-bottom:1px !important;
}
.btn-search{
  color:#ffff;
  height:40px;
  width:100px;
  background-color: #04AA6D;
  border:1px solid #04AA6D ;
  border-radius:0px 8px 8px 0px;
}
.dropdown-content a:hover {background-color: #ddd;}
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
    .dropbtn a{
color:white;
    }
.dropdown:hover .dropbtn {background-color: #3e8e41;}
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: #c3f7e4;
  color:black;
  font-size:18px;
  border-radius: 6px;
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  top: 120%;
 right:5px;
 
 
}
ul {
list-style: none;
}
.dropdown:hover .dropbtn {
      background-color: #3e8e41;
    }
 
</style>
<script>
var isViewUser=false;
visible=()=>{
  if(!isViewUser)
  {document.getElementById("tooltip").style.visibility = "visible";
isViewUser=true;
}
else{
  document.getElementById("tooltip").style.visibility = "hidden";
isViewUser=false;
}

}
    

search=()=>{
  $text=document.getElementById("search").value;
  window.location="http://localhost/web-programming-e-commerce/?url=filter/findName/"+$text;
}
</script>
</head>

<body>
<div style="margin-left:15px">
<div class="inline">
<div><img src="<?php echo PATH_URL_IMG_LOGO."logo.png"?>" alt="logo" height=100 width=100/></div>
<div><input class="search-input" placeholder="Áo sơ mi" id="search"/><button class="btn-search" onClick="search()">Search</button></div>
<div style="margin-right:15px"><i class="fa fa-cart-plus" style="font-size:35px;margin-right:15px"></i><i class="fa fa-user tooltip" style="font-size:35px" onclick="visible()">

<div class="tooltiptext" id="tooltip" style="visibility:hidden">
<ul>
<li style="margin-bottom:10px">username</li>
<li  style="cursor:pointer">logout</li>
</ul>
</div>

</i>
 </div>

</div>
<nav>
<div class="dropdown"><button class="dropbtn" ><a href="?url=home/view">Home</a></button></div>
<div class="dropdown">
  <button class="dropbtn">Top</button>
  <div class="dropdown-content">
    <a href="?url=category/view/top/shirt">Shirt</a>
    <a href="?url=category/view/top/t-shirt">T-Shirt</a>
    <a href="?url=category/view/top/coat">Coat</a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">Bottom</button>
  <div class="dropdown-content">
<a href="?url=category/view/bottom/jean">Jean</a>
    <a href="?url=category/view/bottom/short">Short</a>
    
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn"><a href="?url=category/view/shoes">Shoes</a></button>

</div>
</nav>
</div>
  
</body>

</!DOCTYPE>