<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo PATH_URL_STYLE . 'category.css' ?>">

    <script>
        direct = (id) => {

            window.location = " ?url=product/view/" + id;
        }
    </script>
</head>

<body>

    <?php
    foreach ($listProduct as $item) {
    ?>
        <div class="product">
            <div class="item" onclick='direct("<?php
                                                echo $item["Product"]["Alias"];

                                                ?>")'>
                <img src="<?php echo PATH_URL_IMG_PRODUCT . $item['Product']['Image1'] ?>" alt="product" height=250 width=250 />
                <p class="item-name"><?php echo $item['Product']['Name']; ?> </p>
                <p class="item-price"> <?php echo number_format($item['Product']['Price'], 2, ',', ' ') ?> VND </p>
            </div>
        </div>
    <?php
    }
    ?>




</body>

</html>