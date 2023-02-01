<?php
class Cart extends BaseController
{
    private $cartModel;

    public function __construct()
    {
        $this->loadModel('CartModel');
        $this->cartModel = new CartModel;
    }

    public function index()
    {
        return $this->view('frontend.pages.cart');
    }

    public function addToCart()
    {
        if (!empty($_POST) && !empty($_SESSION['auth'])) {
            $quantity = $_POST['quantityPrd'];
            $product_id = $_POST['idPrd'];
            $user_id = $_SESSION['auth']['id'];
        }
    }
}