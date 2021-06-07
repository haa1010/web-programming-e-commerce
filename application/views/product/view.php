<head>
    <link rel="stylesheet" href="<?php echo PATH_URL_STYLE . 'product.css' ?>">
</head>
<?php
json_encode($product);
$highlight_img = 1;
if (isset($_GET['highlight'])) {
    $highlight_img = $_GET['highlight'];
    if ($highlight_img < 1 || $highlight_img > 4) $highlight_img = 1;
}

if ($product) {
    // get color
    $i = 0;
    if (strpos($product['Color'], ',')) {
        $product['Color'] = str_replace(',', " ", $product['Color']);
        $token = strtok($product["Color"], " ");

        while ($token !== false) {
            $product["color"][$i] = $token;
            $i++;
            $token = strtok(" ");
        }
    }
    //get size
    if (strpos($product['Size'], ',')) {
        $product['Size'] = str_replace(',', " ", $product['Size']);
        $i = 0;
        $token = strtok($product["Size"], " ");

        while ($token !== false) {
            $product["size"][$i] = $token;
            $i++;
            $token = strtok(" ");
        }
    }
}

?>

<script>
    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }

    // When the user clicks anywhere outside of the popup, close it
    window.onclick = function(event) {
        if (event.target == popup)
            closePopup();
    }

    function chooseImg(id) {
        url = window.location.href
        if (url.includes("&highlight=")) {
            url = url.slice(0, -1) + id

        } else
            url += '&highlight=' + id
        window.location.href = url

    }

    function addToCart() {
        event.preventDefault();
        // alert(document.form.color.value + document.form.size.value + document.getElementById('quantity').value + <?php echo $product["Id"]; ?>)

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.responseType = 'json';
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4) {
                response = xmlhttp.response
                if (response.success) {
                    document.getElementById("response").innerHTML = "Product added to your cart!";
                    var header = document.getElementById("header")
                    header.innerHTML = "Success";
                    header.style.color = "green"
                } else {
                    document.getElementById("response").innerHTML = response.message;
                    var header = document.getElementById("header")
                    header.innerHTML = "Add failed";
                    header.style.color = "red"
                }
                var popup = document.getElementById("popup");
                popup.style.display = "block";
            }
        };
        // path = ?url=cart/add/id/color/size/quantity&api=1
        var url = "?url=cart/add/" + <?php echo $product["Id"]; ?> + "/" + document.form.color.value + "/" + document.form.size.value + "/" + document.getElementById('quantity').value + "&api=1";
        console.log(url)
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }
</script>


<?php if ($product) : ?>


    <div class="product-model">
        <div id="popup" class="popup">
            <div class="popup-content">
                <div class="popup-header">
                    <span id="close-btn" onclick="closePopup()">&times;</span>
                    <h2 id="header"></h2>
                </div>
                <div class="popup-body">
                    <p id="response"></p>
                </div>
            </div>

        </div>

        <div class="product-info ">
            <div class="left-panel">
                <img src="<?php echo PATH_URL_IMG_PRODUCT . $product['Image' . $highlight_img] ?>" id="highlight-img">

                <div class="img-slide">
                    <?php for ($i = 1; $i < 5; $i++) :
                        if ($i != $highlight_img) {

                            echo ('  <img src="' . PATH_URL_IMG_PRODUCT  . $product['Image' . $i] . '" class="img-responsive" ' . 'onclick="chooseImg(' . $i . ')">');
                        } else {
                        }
                    endfor; ?>
                </div>
            </div>

            <div class="right-panel">
                <h2 class="item-name"><?php echo $product['Name'] ?></h2>

                <div class="cart-b">
                    <h4>PRODUCT DETAILS</h4>

                    <div class="rating">
                        <?php for ($i = 0; $i < 5; $i++) {
                            echo ('<span style="color: #ff8f00;">&#9733;</span>');
                        }
                        ?>

                        <div class="clearfix"></div>
                    </div>

                    <?php if ($product["isSaleOff"]) : ?>
                        <del>
                            <h4 class="del-price">Price
                                : <?php echo $product ? number_format($product['Price'], 0, ',', '.') : 0; ?>
                                VNĐ
                            </h4>
                        </del>
                        <span class="custom_price">Sale :
                            <?php echo $product ? number_format(($product['Price']) - ($product['Price']) * ($product['Percent_off']) / 100, 0, ',', '.') : 0; ?>
                            VNĐ</span>
                        <br>
                    <?php else : ?>
                        <span class="item_price"><?php echo $product ? ($product['Price']) : 0; ?></span>
                        <span class="custom_price">Price : <?php echo $product ? number_format($product['Price'], 0, ',', '.') : 0; ?>
                            VNĐ</span>
                        <br>
                    <?php endif ?>


                    <div class="item-detail">
                        <h4>Material Composition:</h4> <?php echo $product['Material'] ?>
                        <form onsubmit="addToCart(event)" name="form">
                            <h4>Color:</h4>

                            <select name="color" id="color">
                                <?php if (array_key_exists('color', $product)) : ?>
                                    <?php
                                    foreach ($product['color'] as $key => $value) :
                                        echo '<option value="' . $value . '">' . $value . '</option>'; //close your tags!!
                                    endforeach;
                                    ?>
                                <?php else : echo '<option value="' . $product["Color"] . '">' . $product["Color"] . '</option>'; ?>
                                <?php endif ?>
                            </select>

                            <h4>Size:</h4>
                            <select name="size" id="size">
                                <?php if (array_key_exists('size', $product)) : ?>
                                    <?php
                                    foreach ($product['size'] as $key => $value) :
                                        echo '<option value="' . $value . '">' . $value . '</option>'; //close your tags!!
                                    endforeach;
                                    ?>
                                <?php else : echo '<option value="' . $product["Size"] . '">' . $product["Size"] . '</option>'; ?>
                                <?php endif ?>
                            </select>
                            <h4>Quantity:</h4>
                            <input type="number" id="quantity" name="quantity" min="1" max="10" value="1">
                    </div>
                    <!-- <a href="cart/add/<?php echo $product['Id']; ?>" class="btn btn-orange" role="button">ADD TO CART</a> -->
                    <button class="btn btn-green" type="submit">ADD TO CART</button>
                    </form>
                </div>
                <h4>Description:</h4>
                <p style="    line-height: 1.75;"><?php echo $product['Description']; ?></p>

                <div class="share">
                    <?php
                    $title = urlencode('Title of Your iFrame Tab');
                    $url = urlencode('http://www.facebook.com/yourfanpage');
                    $summary = urlencode('Custom message that summarizes what your tab is about, or just a simple message to tell people to check out your tab.');
                    $image = urlencode('http://www.yourdomain.com/facebookshare/images/customthumbnail.jpg');
                    ?>
                    <h4>Share Product :</h4>
                    <ul class="share_nav">
                        <li>
                            <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title; ?>&amp;p[summary]=<?php echo $summary; ?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image; ?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><img src="<?php echo PATH_URL_IMG . 'logo/facebook.png' ?>" title="Facebook"></a>
                        </li>
                        <li><a href="#"><img src="<?php echo PATH_URL_IMG . 'logo/twitter.png' ?>" title="Twitter"></a></li>
                        <li><a href="#"><img src="<?php echo PATH_URL_IMG . 'logo/google.png' ?>" title="Google"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php else : echo ("Product not found"); ?>
<?php endif ?>