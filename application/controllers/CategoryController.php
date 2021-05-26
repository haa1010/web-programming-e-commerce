<?php
class CategoryController extends BaseController
{
    public function view($id, $subid = NULL)
    {
        if (isset($_GET['page'])) $page = intval($_GET['page']);
        else $page = 1;

        $page = ($page > 0) ? $page : 1;
        $limit = 15;
        $offset = ($page - 1) * $limit;
        if ($subid)
            $query = "select * from `product` where SubCategoryId =" . $subid . ' and CategoryId= ' . $id;
        else $query = 'select * from `product` where CategoryId= ' . $id;
        $this->Category->connect();
        $product = $this->Category->query($query);
        //print_r($product);
        $this->set('productList', $product);
    }
}
