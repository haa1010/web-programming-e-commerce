<?php
class CartController extends BaseController
{
    function add()
    {
        if (isset($_REQUEST['id']))
            $this->Cart->cart_add($_REQUEST['id']);
    }
    function view()
    {
        $this->set("cart", $_SESSION['cart']);
        $this->set("total", $this->Cart->cart_total());
    }
    function update()
    {
        if (!empty($_POST)) {
            foreach ($_POST['number'] as $pid => $number) {
                $this->Cart->cart_update($pid, $number);
            }
        }
        // if (!empty($id) && !empty($number))
        //     $this->Cart->cart_update($id, $number);
    }
    function clear()
    {
        $this->Cart->cart_destroy();
    }

    function delete()
    {
        if (isset($_REQUEST['id']))
            $this->Cart->cart_delete($_REQUEST['id']);
    }

    function checkout()
    {
        if ($_SESSION['cart'] == array()) {
            $this->Cart->checkout();
        }
    }

    function info()
    {
        # code...
    }
}
