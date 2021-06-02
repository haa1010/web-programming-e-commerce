<style type="text/css">
    .table th,
    .table td {
        text-align: center;
    }

    .table th:nth-child(3),
    .table td:nth-child(3) {
        width: auto;
        text-align: left;
    }

    .table th:nth-child(4),
    .table td:nth-child(4),
    .table th:nth-child(5),
    .table td:nth-child(5) {}

    .table td {
        vertical-align: middle !important;
    }
</style>
<!-- <?php $cart = $_SESSION['cart']; ?> -->
<div id="message"><?php if (!empty($message)) {
                        echo $message;
                    } ?></div>
<form id="cart_form" method="post" action="?url=cart/update/" role="form">
    <div class="col-xs-12">
        <h2>Giỏ hàng</h2><br>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="hidden-xs">STT</th>
                    <th class="hidden-xs">Ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 0;
                foreach ($cart as $pid => $product) :
                    $stt++;
                ?>
                    <tr>
                        <td class="hidden-xs" style="width: 8%"><?php echo $stt; ?></td>
                        <td class="hidden-xs" style="width: 20%">
                            <?php
                            $image = 'public/upload/product/' . $product['image'];
                            if (is_file($image)) {
                                echo '<image src="' . $image . '" style="max-width:100px; max-height:50px;" />';
                            }
                            ?>
                        </td>
                        <td style="width: 20%">
                            <a href="product/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                        </td>
                        <td style="width: 20%">
                            <?php if ($product["typeid"] == 3) : ?>
                                <?php echo $product ? number_format(($product['price']) - ($product['price']) * ($product['percent_off']) / 100, 0, ',', '.') : 0; ?>
                            <?php else : ?>
                                <?php echo number_format($product['price'], 0, ',', '.'); ?>
                            <?php endif ?>
                        </td>
                        <td style="width: 20%">
                            <div class="btn-group">
                                <input name="number[<?php echo $product['id']; ?>]" type="number" value="<?php echo $product['number']; ?>" size="3" class="form-control text-center" />
                            </div>
                        </td>
                        <td>
                            <a href="?url=cart/delete/?id=<?php echo $product['id']; ?>" class="text-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">Thành tiền : <?php echo number_format($total, 0, ',', '.'); ?> VNĐ</th>
                </tr>
            </tfoot>
        </table>
        <br>
        <div class="form-group">
            <!-- Single button -->
            <div class="btn-group" style="padding-right: 30%;">
                <input type="submit" class="form-control btn-primary" value="Cập nhật" />
            </div>
            <!-- <a href="cart/order/checkout" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i> Đơn hàng</a> -->
        </div>
    </div>
</form>
<div>
    <form method="post" action="?url=cart/checkout" role="form" id="checkout-form">
        <h5>
            Delivery Infomation:
        </h5>
        <div>
            Address:
            <input type="text" name="address" maxlength="200" required>
        </div>
        <div>
            Phone number:
            <input type="text" name="pn" maxlength="10" required>
        </div>
        <div>
            Description:
            <input type="text" name="des" maxlength="200">
        </div>
        <div>
            <input type="submit" class="form-control btn-primary" value="Make Order" />
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