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

    public function detail()
    {

        if (isset($_GET["prd"]) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $detailPrd = $this->productModel->getOne($id);
            $cate = $detailPrd['category_id'];

            // get products similar
            $listProduct = $this->productModel->getPrdSimilar($cate, $id);
        }

        return $this->view('frontend.pages.detailPrd', [
            'detailPrd' => $detailPrd,
            'listProduct' => $listProduct
        ]);
    }
}