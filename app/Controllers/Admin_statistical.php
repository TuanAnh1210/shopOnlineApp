<?php
class Admin_statistical extends BaseController
{
    private $statisticalModel;
    public function __construct()
    {
        $this->loadModel("CategoryModel");
        $this->statisticalModel = new CategoryModel;
    }


    public function index()
    {
        $data = $this->statisticalModel->statistical();


        return $this->view("admin.pages.statistical.index", [
            "data" => $data
        ]);
    }

    public function chart()
    {
        $listCate = $this->statisticalModel->getCategory();

        return $this->view("admin.pages.statistical.chart", [
            "listCate" => $listCate
        ]);
    }
}
