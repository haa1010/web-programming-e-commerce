<?php
class ProductController extends BaseController
{
    public function viewall()
    {
        if (isset($_GET['id'])) {
            $pid = intval($_GET['id']);
            // print_r(get_class_methods($this->ProductModel));
            $product = $this->Product->select($pid);
        } else {
            $product = $this->Product->selectAll();
        }
        if (!$product) {
            show_404();
        } else {
            $this->set('productList', $product);
        }
    }
}
