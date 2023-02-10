<?php
class Admin extends BaseController
{

    private $productModel;
    private $categoryModel;
    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;

        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel;
    }

    public function index()
    {
        return $this->view('admin.index');
    }

    public function productManage()
    {



        $listPrd = $this->productModel->getPrd();
        return $this->view('admin.pages.products.index', [
            "listPrd" => $listPrd
        ]);
    }

    public function deleteProduct()
    {
        if (!empty($_POST)) {
            $ids = $_POST;

            $this->productModel->deletePrd($ids);

            $url = $GLOBALS['domainPage'] . "/admin/productManage";
            header("location: $url");
        }
    }

    public function editProduct()
    {
        if (!empty($_POST)) {
            $idArr = $_POST;

            foreach ($idArr as $value) {
                $id = $value;
            }

            $data = $this->productModel->getOne($id);
            $listCate = $this->categoryModel->getAll();
        }
        return $this->view("admin.pages.products.editProduct", [
            "data" => $data,
            "listCate" => $listCate
        ]);
    }

    public function handleEditProduct()
    {
        if (!empty($_POST)) {
            if (!empty($_FILES['image']['name'])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                $newAvatar = basename($_FILES['image']['name']);
            } else {
                $newAvatar = $_POST['oldImage'];
            }
            $id = $_POST['curIdProduct'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $newAvatar;
            $discount = $_POST['discount'];
            $quantity = $_POST['quantity'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];

            $data = [
                "name" =>  $name,
                "price" =>  $price,
                "image" =>  $image,
                "discount" =>  $discount,
                "description" =>  $description,
                "quantity" =>  $quantity,
                "category_id" =>  $category_id,
            ];
            $this->productModel->updateInfoProduct($data, $id);

            $url = $GLOBALS['domainPage'] . "/admin/productManage";
            header("location: $url");
        }
    }
}