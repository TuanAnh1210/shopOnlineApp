<?php

class Home extends BaseController
{

    private $homeModel;

    public function __construct()
    {
        $this->loadModel('HomeModel');
        $this->homeModel = new HomeModel;
    }

    public function index()
    {
        $data = $this->homeModel->getProduct(5);
        $bestseller = $this->homeModel->getProduct(5, 'DESC', ['*'], 'bought');

        return $this->view('frontend.index', [
            'data' => $data,
            'bestseller' => $bestseller
        ]);
    }

    public function contact()
    {
        return $this->view('frontend.pages.contact');
    }

    public function about()
    {
        return $this->view('frontend.pages.about');
    }
}