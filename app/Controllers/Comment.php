<?php
class Comment extends BaseController
{
    private $cmtModel;
    public function __construct()
    {


        $this->loadModel('CommentModel');
        $this->cmtModel = new CommentModel;
    }


    public function addCmt()
    {
        if (!empty($_POST['cmt_user']) && !empty($_POST['idPrd'])) {
            $contentCmt = $_POST['cmt_user'];
            $product_id = $_POST['idPrd'];

            $data = [
                'content' => $contentCmt,
                'comment_time' =>  date("Y-m-d H:i:s"),
                'product_id' =>  $product_id,
                'user_id' => $_SESSION['auth']['id']
            ];

            $this->cmtModel->addCmt($data);

            header("location: http://localhost/du_an_mau/product/detail?prd&id=$product_id");
        }
    }
}