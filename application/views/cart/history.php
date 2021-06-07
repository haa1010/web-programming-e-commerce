<head>
    <link rel="stylesheet" href="<?php echo PATH_URL_STYLE . 'cart.css' ?>">

</head>

<form id="cart_form" method="post" action="?url=cart/update/" role="form">
    <div class="col-xs-12">
        <h1>Your cart</h1>
        <br>

        <table class="table ">
            <thead>
                <tr>
                    <th class="hidden-xs">No</th>
                    <th class="hidden-xs">Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 0;
                foreach ($cart as $pid => $product) :
                    $stt++;
                ?>
                    <tr id="row-<?php echo $stt; ?>">
                        <td style="width: 5%" class="test" id="id"><?php echo $stt; ?></td>
                        <td style="width: 10%">
                            <?php
                            $image = PATH_URL_IMG . 'public/images/product/' . $product['image'];
                            if (is_file($image)) {
                                echo '<image src="' . $image . '" style="max-width:100px; max-height:50px;" />';
                            }
                            ?>
                        </td>
                        <td style="width: 20%">
                            <a id="product-name" href="?url=product/view/<?php echo $product['alias']; ?>"><?php echo $product['name']; ?></a>
                        </td>
                        <td style="width: 10%">
                            <?php if ($product["percent_off"]) : ?>
                                <?php echo $product ? number_format(($product['price']) - ($product['price']) * ($product['percent_off']) / 100, 0, ',', '.') : 0; ?>
                            <?php else : ?>
                                <?php echo number_format($product['price'], 0, ',', '.'); ?>
                            <?php endif ?>
                        </td>

                        <td style="width: 10%">
                            <div class="btn-group">
                                <!-- Color!!! -->
                                <?php echo $product['color']; ?>
                            </div>
                        </td>

                        <td style="width: 10%">
                            <div class="btn-group">
                                <!-- Size!! -->
                                <?php echo $product['size']; ?>
                            </div>
                        </td>

                        <td style="width: 10%">
                            <div class="btn-group">
                            <?php echo $product['number']; ?>
                            </div>
                        </td>

                        <td style="width: 10%">
                            <div id="subtotal-<?php echo $stt; ?>" style="color: red">
                                <?php if ($product["percent_off"]) : ?>
                                    <?php echo $product ? number_format(($product['price'] - ($product['price'] * $product['percent_off']) / 100) * $product['number'], 0, ',', '.') : 0; ?>
                                <?php else : ?>
                                    <?php echo number_format($product['price'] * $product['number'], 0, ',', '.'); ?>
                                <?php endif ?>
                            </div>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8" id="total">Total: <span id="total-number"><?php echo number_format($total, 0, ',', '.'); ?></span> VND</th>
                </tr>
            </tfoot>
        </table>
        <br>
    </div>
</form>