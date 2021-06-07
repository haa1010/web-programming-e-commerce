<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo PATH_URL_STYLE . 'base.css' ?>">

  <script>
    var isViewUser = false;

    visible = () => {
      // debugger;
      var isLogin = {
        username: false
      };

      if (!isLogin.username) {
        window.location = "?url=user/login&api=1";
      } else {
        if (!isViewUser) {
          document.getElementById("tooltip").style.display = "block";
          isViewUser = true;
        } else {
          document.getElementById("tooltip").style.display = "none";
          isViewUser = false;
        }
      }
    }
    let searchProduct = () => {

      var text = document.getElementById("search").value;
      window.location = "http://localhost/web-programming-e-commerce/?url=filter/findName/" + text;
    }

    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>
</head>

<body>
  <div style="margin:25px" id="header">

    <nav id="not-response">
      <div class="menu">
        <div class="dropdown"><button class="dropbtn"><a href="?url=home/view">Home</a></button></div>
        <div class="dropdown">
          <button class="dropbtn" onclick="window.location='?url=category/view/top'">Top</button>
          <div class="dropdown-content">
            <a href="?url=category/view/top/shirt">Shirt</a>
            <a href="?url=category/view/top/t-shirt">T-Shirt</a>
            <a href="?url=category/view/top/coat">Coat</a>
          </div>
        </div>
        <div class="dropdown">
          <button class="dropbtn" onclick="window.location='?url=category/view/bottom'">Bottom</button>
          <div class="dropdown-content">
            <a href="?url=category/view/bottom/jeans">Jean</a>
            <a href="?url=category/view/bottom/short">Short</a>

          </div>
        </div>
        <div class="dropdown">
          <button class="dropbtn"><a href="?url=category/view/shoes">Shoes</a></button>

        </div>
      </div>
      <div><img src="<?php echo PATH_URL_IMG_LOGO . "logo.png" ?>" alt="logo" height=150 width=150 /></div>

      <div style="display:flex; width:30vw">
        <div style="margin-right:10px"><input class="search-input" placeholder="Search product" id="search" />
          <button class="btn-search" onclick="searchProduct()">Search</button>
        </div>
        <div style="margin-right:15px;display:flex">

          <a href="?url=cart/view"> <img src="<?php echo PATH_URL_IMG_LOGO . "cart.svg"; ?>" width=40 height=40 style="margin-right:15px" /></a>
          <div>
            <?php if ($_SESSION['username']) : ?>
              <!-- Đăng nhập r -->
              <img src="<?php echo PATH_URL_IMG_LOGO . "user.svg"; ?>" class="fa fa-user tooltip" width=40 height=40 onclick="visible()" />

              <div class="tooltiptext" id="tooltip" style="display:none">
                <ul>
                  <li style="margin-bottom:10px">Username</li>
                  <li style="cursor:pointer">Log out</li>
                </ul>
              </div>
            <?php else : ?>
              <!-- Chưa đăng nhập -->
              <a href="?url=user/login&api=1">Login</a>
              <a href="?url=user/signup&api=1">Signup</a>
            <?php endif ?>
          </div>
        </div>
      </div>
    </nav>
  </div>

</body>

</html>