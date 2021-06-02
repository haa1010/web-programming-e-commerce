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

    // function view($id) //?url=cart/add/1
    // {
    //     if (!empty($id)) {
    //         $product = $this->Product->get_one($id);
    //         $this->set("product", $product['Product']);
    //     }
    //     else {
    //         $this->set("product", "Product not found");
    //     }
    // }
    function view($alias) //?url=cart/add/shoes-s1
    {
        if (!empty($alias)) {
            $product = $this->Product->get_one($alias);
            $this->set("product", $product['Product']);
        }
        else {
            $this->set("product", "Product not found");
        }
    }
}
