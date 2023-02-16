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

            $url = $GLOBALS['domainPage'] . "/product/detail?prd&id=$product_id";
            header("location: $url");
        }
    }

    public function deleteCmt()
    {
        if (!empty($_GET['id']) && !empty($_GET['prdId'])) {
            $id = $_GET['id'];
            $idPrd = $_GET['prdId'];

            $this->cmtModel->deleteCmt($id);

            $url = $GLOBALS['domainPage'] . "/product/detail?prd&id=$idPrd";
            header("location: $url");
        }
    }

    public function updateCmt()
    {
        if (!empty($_POST)) {
            $product_id = $_POST['curPrd'];
            $id_cmt = $_POST['curCmt'];

            $update_cmt = $_POST['update_cmt'];

            $this->cmtModel->updateCmt($update_cmt, $id_cmt);

            header("location: http://localhost/du_an_mau/product/detail?prd&id=$product_id");
        }
    }
}
