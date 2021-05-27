<style>
    #search {
        margin-bottom: 0px !important;
    }

    .custom_price {
        color: #000;
        font-weight: 600;
        font-size: 1.3em;
    }

    .item_price {
        display: none;
    }

    .btn-primary {
        margin: 5px 0;
        ;
    }

    .share_nav img {
        width: 30px;
    }

    .share_nav {
        display: flex;
        list-style: none;
    }

    .share_nav li {
        margin: 0 10px;
    }

    .product-info {
        display: inline-flex;
    }

    .custom_price {
        color: red;
    }



    .btn {
        display: inline-block;
        -moz-user-select: none;
        -ms-user-select: none;
        padding: 12px 20px;
        font-size: 14px;
        border-radius: 4px;
    }

    .btn-orange {
        color: #fff;
        background-color: #f5980df0;
        border-color: #f5980df0;
    }

    a {
        text-decoration: none;
    }

    .left-panel,
    .right-panel {
        width: 50vw;
    }

    .item-name {
        border-bottom: solid 1px grey;
        padding: 0 15px 15px 0;
        width: fit-content;
    }

    .del-price {
        color: #5f5d5d;
        font-weight: normal;
    }
</style>



<?php
echo json_encode($product);

?>

<div class="product-model">
    <div class="product-info ">
        <div class="left-panel">
            <img src="<?php echo PATH_URL_IMG_PRODUCT . $product['Image1'] ?>" class="item_image">

            <ul class="slides">
                <?php for ($i = 2; $i < 5; $i++) : ?>
                    <?php if (!empty($product['Image' . $i])) { ?>
                        <li data-thumb="<?php echo PATH_URL_IMG_PRODUCT . $product['Image' . $i] ?>">
                            <div class="thumb-image"><img src="<?php echo PATH_URL_IMG_PRODUCT . $product['Image' . $i] ?>" data-imagezoom="true" class="img-responsive"></div>
                        </li>
                    <?php } else { ?>
                        <img src="<?php echo PATH_URL_IMG_PRODUCT . $product['Image1'] ?>" data-imagezoom="true" class="img-responsive">
                    <?php } ?>
                <?php endfor; ?>
            </ul>
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
                    <span class="item_price">
                        <?php echo $product ? (($product['Price']) - ($product['Price']) * ($product['Percent_off']) / 100) : 0; ?>
                    </span>
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
                    <h4>Color:</h4> <?php echo $product['Color'] ?>
                    <h4>Size:</h4> <?php echo $product['Size'] ?>
                </div>
                <a href="cart/add/<?php echo $product['Id']; ?>" class="btn btn-orange" role="button">ADD TO CART</a>
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