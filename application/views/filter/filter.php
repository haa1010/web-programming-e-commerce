<?php if (sizeof($products) > 0) :

    foreach ($products as $item) {
?>
        <div class="product">
            <div class="item" onclick='direct("<?php
                                                echo $item["Product"]["Alias"];

                                                ?>")'>
                <img src="<?php echo PATH_URL_IMG_PRODUCT . $item['Product']['Image1'] ?>" alt="product" height=250 width=250 />
                <p class="item-name"><?php echo $item['Product']['Name']; ?> </p>
                <?php if ($item["Product"]["isSaleOff"]) : ?>
                    <div class="inline-price">
                        <del class="price">
                            <span class="del-price">
                                <?php echo $item ? number_format($item["Product"]['Price'], 0, ',', '.') : 0; ?>
                                VNĐ
                            </span>
                        </del>
                        <div> <span class="custom_price color-red">
                                <?php echo $item ? number_format(($item["Product"]['Price']) - ($item["Product"]['Price']) * ($item["Product"]['Percent_off']) / 100, 0, ',', '.') : 0; ?>
                                VNĐ</span></div>
                    </div>
                <?php else : ?>
                    <div style="text-align:center;"> <span class="custom_price color-red"> <?php echo $item ? number_format($item["Product"]['Price'], 0, ',', '.') : 0; ?>
                            VNĐ</span></div>

                <?php endif ?>
            </div>
        </div>
    <?php

    }

    ?>



<?php else : ?>
    <div style="text-align:center;height:30vh;font-size:20px;width: 100%;"> No product founds</div>
<?php endif ?>