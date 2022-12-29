<?php
class Product extends BaseController
{
    private $productModel;
    private $cateModel;

    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;

        $this->loadModel('CategoryModel');
        $this->cateModel = new CategoryModel;
    }

    public function index()
    {
        $listCate = $this->cateModel->getAll();
        $listProduct = $this->productModel->getPrd();
        return $this->view('frontend.pages.product', [
            'listCate' => $listCate,
            'listProduct' => $listProduct
        ]);
    }
}