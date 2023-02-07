<?php
class Category extends BaseController
{
    private $categoryModel;

    public function __construct()
    {
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $listCate = $this->categoryModel->getCategory();

        return $this->view('admin.pages.category.index', [
            "listCate" => $listCate
        ]);
    }

    public function updateCate()
    {
        if (!empty($_GET['id']) && !empty($_GET['value'])) {
            $id = $_GET['id'];
            $name = $_GET['value'];

            $data = [
                'name' => $name
            ];

            $this->categoryModel->updateCategory($data, $id);
            $url = $GLOBALS['domainPage'] . "/category";


            header("location: $url");
        }
    }

    public function deleteCate()
    {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];



            $this->categoryModel->deleteCategory($id);
            $this->categoryModel->resetId('category');
            $url = $GLOBALS['domainPage'] . "/category";


            header("location: $url");
        }
    }

    public function addNewCate()
    {
        if (!empty($_POST['cateName'])) {
            $name = $_POST['cateName'];

            $data = [
                "name" => $name
            ];
            $this->categoryModel->createCategory($data);

            $url = $GLOBALS['domainPage'] . "/category";


            header("location: $url");
        }

        return $this->view("admin.pages.category.addCate");
    }
}
