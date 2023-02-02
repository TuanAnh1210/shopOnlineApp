<?php
class Admin extends BaseController
{

    private $productModel;
    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
    }

    public function index()
    {
        return $this->view('admin.index');
    }

    public function productManage()
    {

        if (!empty($_GET['delete'] && !empty($_GET['id']))) {
            // handle delete
        }

        $listPrd = $this->productModel->getPrd();
        return $this->view('admin.pages.products.index', [
            "listPrd" => $listPrd
        ]);
    }
}