<?php

class Home extends BaseController
{

    private $homeModel;
    private $cartModel;


    public function __construct()
    {
        $this->loadModel('HomeModel');
        $this->homeModel = new HomeModel;



        $this->loadModel('CartModel');
        $this->cartModel = new CartModel;
    }

    public function index()
    {
        $data = $this->homeModel->getProduct(5);
        $bestseller = $this->homeModel->getProduct(10, 'DESC', ['*'], 'bought');


        if (!empty($_SESSION['auth'])) {
            $idUser = $_SESSION['auth']['id'];
            $totalPrdInCart = $this->cartModel->getTotalPrd($idUser);

            $_SESSION['totalPrdInCart'] = $totalPrdInCart;
        }

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
