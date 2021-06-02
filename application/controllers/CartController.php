<?php
class CartController extends BaseController
{
    function add($id)
    {
        // if (isset($_REQUEST['id']))
        // $this->Cart->cart_add($_REQUEST['id']);
        if ($id != null)
            $this->Cart->cart_add($id);
        redirect("cart", "view");
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

    function delete($id = NULL)
    {
        if ($id)
            $this->Cart->cart_delete($id);
        // if (isset($_REQUEST['id']))
        //     $this->Cart->cart_delete($_REQUEST['id']);
    }

    function checkout()
    {
        // if ($_SESSION['cart'] == array()) {
        //     $this->Cart->checkout();
        // }
        if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
            $pattern = "/((09|03|07|08|05)+([0-9]{8})\b)/";
            $address = $_POST['address'];
            $phone = $_POST['pn'];
            $des = $_POST['des'] or "";
            if (strlen($address) > 200)
                $this->set("message", "Invalid length Address");
            if (strlen($des) > 500)
                $this->set("message", "Invalid length Description");
            if (preg_match_all($pattern, $phone))
                $this->set("message", "Invalid Phone Number");
            // add to DB
            if ($_SESSION['cart'] != array()) {
                $orderModel = new Orders();
                $orderModel->insert_one($address, $phone, $des, $this->Cart->cart_total());
                $result = intval($orderModel->getInserted()['id']);
                print_r($result);
                if ($result > 0) {
                    foreach ($_SESSION['cart'] as $item) {
                        // print_r($item);
                        $orderModel->insert_detail($item, $result);
                    }
                } else {
                    $this->set("message", $orderModel->getError());
                }
            } else
                $this->set("message", "Empty Cart");
        } else {
            $this->set("message", "You must login first");
            redirect("user", "login");
        }
    }
}
