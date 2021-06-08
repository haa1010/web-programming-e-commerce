<?php
class AdminController extends BaseController
{
    private $_product;

    function __construct($model, $controller, $action, $api = false)
    {
        parent::__construct($model, $controller, $action, $api);
        if (!isset($this->_product)) {
            $this->_product = new Product();
        }
    }

    function manage()
    {
        if (!(isset($_SESSION['is_admin']) && $_SESSION['is_admin'])) {
            show_404();
        } else {
        }
    }

    function view()
    {
        $return = new Message();
        $data = $this->_product->selectAll();
        if ($data != null) {
            $return->success = true;
            $return->data = $data;
        } else {
            $return->message = "Error when fetch data from server";
        }
        $this->set("message", $return->getMesage());
    }
}
