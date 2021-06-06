<head>
    <link rel="stylesheet" href="<?php echo PATH_URL_STYLE . 'cart.css' ?>">

</head>
<!-- <?php $cart = $_SESSION['cart']; ?> -->
<div id="message"><?php if (!empty($message)) {
                        echo $message;
                    } ?></div>
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
                    // print_r($product)
                ?>
                    <tr>
                        <td style="width: 5%"><?php echo $stt; ?></td>
                        <td style="width: 10%">
                            <?php
                            $image = 'public/images/product/' . $product['image'];
                            if (is_file($image)) {
                                echo '<image src="' . $image . '" style="max-width:100px; max-height:50px;" />';
                            }
                            ?>
                        </td>
                        <td style="width: 20%">
                            <a id="product-name" href="product/<?php echo $product['alias']; ?>"><?php echo $product['name']; ?></a>
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
                                Color!!!
                            </div>
                        </td>

                        <td style="width: 10%">
                            <div class="btn-group">
                                Size!!
                            </div>
                        </td>

                        <td style="width: 10%">
                            <div class="btn-group">
                                <input name="number[<?php echo $product['id']; ?>]" type="number" value="<?php echo $product['number']; ?>" size="3" class="form-control text-center" />
                            </div>
                        </td>

                        <td style="width: 10%">
                            <div class="btn-group" style="color: red">
                                <?php if ($product["percent_off"]) : ?>
                                    <?php echo $product ? number_format(($product['price'] - ($product['price'] * $product['percent_off']) / 100) * $product['number'], 0, ',', '.') : 0; ?>
                                <?php else : ?>
                                    <?php echo number_format($product['price'] * $product['number'], 0, ',', '.'); ?>
                                <?php endif ?>
                            </div>
                        </td>

                        <td>
                            <a href="?url=cart/delete/<?php echo $product['id']; ?>" class="text-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8" id="total">Total: <?php echo number_format($total, 0, ',', '.'); ?> VND</th>
                </tr>
            </tfoot>
        </table>
        <br>
        <div class="form-group">
            <div class="btn-group">
                <button type="submit" class="update-btn">Update cart</button>
            </div>
        </div>
    </div>
</form>
<div>
    <form method="post" action="?url=cart/checkout" role="form" id="checkout-form">
        <h3>
            Delivery Infomation:
        </h3>
        <div>
            <label for="address">Address <b style="color: red;">*</b></label>
            <input type="text" name="address" maxlength="200" required>
        </div>
        <div>
            <label for="pn">Phone number <b style="color: red;">*</b></label>
            <input type="text" name="pn" maxlength="10" required>
        </div>
        <div>
            <label for="des">Note</label>
            <input type="text" name="des" maxlength="200">
        </div>
        <div>
            <input type="submit" class="form-control" style="background-color: #04AA6D;color: white;" value="Make Order" />
        </div>
    </form>
</div>
<script>
    document.querySelector("#checkout-form").addEventListener("submit", function(e) {
        let mobile = document.querySelector('input[name=pn]').value;
        let messagedov = document.querySelector('#message')
        var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        if (mobile !== '') {
            if (vnf_regex.test(mobile) == false) {
                e.preventDefault();
                messagedov.textContent = "Invalid Phone Number";
            }
        } else {
            e.preventDefault();
            messagedov.textContent = "Invalid Phone Number";
        }
    })
</script>