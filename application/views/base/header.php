<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo PATH_URL_STYLE . 'base.css' ?>">
  <link rel="stylesheet" href="<?php echo PATH_URL_STYLE . 'common.css' ?>">

  <script>
    function closePopup() {
      document.getElementById("popup").style.display = "none";
    }

    // When the user clicks anywhere outside of the popup, close it
    window.onclick = function(event) {
      if (event.target == popup)
        closePopup();
    }

    var isViewUser = false;

    visible = () => {
     
        if (!isViewUser) {
          document.getElementById("tooltip").style.display = "block";
          isViewUser = true;
        } else {
          document.getElementById("tooltip").style.display = "none";
          isViewUser = false;
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
      <div class="menu" >
        <div class="dropdown"><button class="dropbtn" onclick="window.location='?url=home/view'">Home</button></div>
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

      <div class="right">
        <div style="margin-right:10px;display: flex"><input class="search-input" placeholder="Search product" id="search" />
          <button class="btn-search" onclick="searchProduct()">Search</button>
        </div>
        <div style="margin-right:15px;display:flex">

          <a href="?url=cart/view"> <img src="<?php echo PATH_URL_IMG_LOGO . "cart.svg"; ?>" width=40 height=40 style="margin-right:15px" /></a>
          <div style=" display: flex;
    justify-content: space-around;">
            <?php if (isset($_SESSION['username'])) : ?>
              <!-- Đăng nhập r -->
              <img src="<?php echo PATH_URL_IMG_LOGO . "user.svg"; ?>" class="fa fa-user tooltip" width=40 height=40 onclick="visible()" />

              <div class="tooltiptext" id="tooltip" style="display:none">
                <ul>
                  <li style="margin-bottom:10px"><?php echo $_SESSION['username']; ?></li>
                  <li style="cursor:pointer" onclick="window.location='?url=user/logout'">Log out</li>
                </ul>
              </div>
            <?php else : ?>
              <!-- Chưa đăng nhập -->
              <a href="?url=user/login&api=1" class="color-green">Login</a>
              <a href="?url=user/signup&api=1" class="color-green">Signup</a>
            <?php endif ?>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <div id="popup" class="popup">
    <div class="popup-content">
      <div class="popup-header">
        <span id="close-btn" onclick="closePopup()">&times;</span>
        <h2 id="inner-header"></h2>
      </div>
      <div class="popup-body">
        <p id="response"></p>
      </div>
    </div>

  </div>