<?php
class CartController extends BaseController
{
    function add($id, $color, $size, $quantity)
    {
        $data = new Message();
        if ($id != null) {
            $data->success = $this->Cart->cart_add($id, $color, $size, $quantity);
            $data->message = $data->success ? "Successful added" : "Invalid Product Id";
        }
        $this->set("message", $data->getMesage());
    }
    function view()
    {
        $this->set("cart", $_SESSION['cart']);
        $this->set("total", $this->Cart->cart_total());
    }
    function update()
    {
        $data = new Message(true);
        if (!empty($_POST)) {
            foreach ($_POST['number'] as $pid => $number) {
                if (intval($number) > 0)
                    $data->success &=  $this->Cart->cart_update($pid, $number);
                else {
                    $data->success &= $this->Cart->cart_delete($pid);
                }
            }
        } else
            $this->Cart->cart_destroy();
        $this->set("message", $data->getMesage());
    }
    function clear()
    {
        // $data = new Message(true);
        $this->Cart->cart_destroy();
        // $this->set("message", $data->getMesage());
    }

    function delete($id = NULL)
    {
        $data = new Message();
        if ($id != null) {
            $data->success = $this->Cart->cart_delete($id);
            // $data->message = $data->success ? "Successful deleted" : "Invalid Product Id";
        }
        // $this->set("message", $data->getMesage());
    }

    function checkout()
    {
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
                        $orderModel->insert_detail($item, $result);
                    }
                    $this->clear();
                } else {
                    $this->set("message", $orderModel->getError());
                }
            } else {
                $this->set("message", "Empty Cart");
                redirect("cart", "view");
            }
        } else {
            $this->set("message", "You must login first");
            redirect("user", "login");
        }
    }
}
