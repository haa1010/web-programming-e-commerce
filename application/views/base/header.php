<html>

<head>
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

    .dropdown:hover .dropbtn {
      background-color: #3e8e41;
    }
  </style>

</head>

<body>
  <p>This is header</p>
  <nav>
    <div class="dropdown"><button class="dropbtn"><a href="?url=home/view">Home</a></button></div>
    <div class="dropdown">
      <button class="dropbtn">Áo</button>
      <div class="dropdown-content">
        <a href="?url=category/view/2/1">Áo sơ mi</a>
        <a href="?url=category/view/2/2">Áo phông</a>
        <a href="?url=category/view/2/8">Áo khoác</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Quần</button>
      <div class="dropdown-content">
        <a href="?url=category/view/1/3">Quần bò</a>
        <a href="?url=category/view/1/4">Quần kaki</a>

      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn"><a href="?url=category/view/3">Giày dép</a></button>

    </div>
  </nav>
</body>

</html>