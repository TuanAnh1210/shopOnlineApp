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
        if (!empty($_SESSION['auth'])) {
            $id = $_SESSION['auth']['id'];

            $data = $this->cartModel->getAll($id);
            return $this->view('frontend.pages.cart', [
                'data' => $data
            ]);
        }
    }

    public function addToCart()
    {
        if (!empty($_POST) && !empty($_SESSION['auth'])) {
            $quantity = $_POST['quantityPrd'];
            $product_id = $_POST['idPrd'];
            $user_id = $_SESSION['auth']['id'];

            // fix: check update quantity orders


            $data = [
                "quantity" => $quantity,
                "product_id" => $product_id,
                "user_id" => $user_id,
                "order_status" => 0
            ];

            $preValue = $this->cartModel->full();


            if ($preValue[0]["product_id"] == $product_id && $preValue[0]["user_id"] == $user_id && $preValue[0]["order_status"] == 0) {
                $data = [
                    "quantity" => $quantity + $preValue[0]["product_id"],
                ];


                $id = $preValue[0]["id"];
                $this->cartModel->updateQuantityPrd($data, $id);
            } else {
                $this->cartModel->addCart($data);
            }




            // update quantity total product 
            $totalPrdInCart = $this->cartModel->getTotalPrd($user_id);
            $_SESSION['totalPrdInCart'] = $totalPrdInCart;


            $url = $GLOBALS['domainPage'] . "/product/detail?prd&id=$product_id";
            header("location: $url");
        }
    }
}
