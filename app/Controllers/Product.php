<?php
class Product extends BaseController
{
    private $productModel;
    private $homeModel;

    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;

        $this->loadModel('HomeModel');
        $this->homeModel = new HomeModel;
    }

    public function index()
    {
        $listCate = $this->productModel->getAll();
        $listProduct = $this->homeModel->getAll();
        return $this->view('frontend.pages.product', [
            'listCate' => $listCate,
            'listProduct' => $listProduct
        ]);
    }
}