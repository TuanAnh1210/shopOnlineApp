<?php
class Product extends BaseController
{
    private $productModel;
    private $cateModel;
    private $cmtModel;

    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;

        $this->loadModel('CategoryModel');
        $this->cateModel = new CategoryModel;

        $this->loadModel('CommentModel');
        $this->cmtModel = new CommentModel;
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

            $listCmt = $this->cmtModel->getAllCmt($id);

            // up View
            $this->productModel->upView($id);
        }

        return $this->view('frontend.pages.detailPrd', [
            'detailPrd' => $detailPrd,
            'listProduct' => $listProduct,
            'listCmt' => $listCmt

        ]);
    }
}