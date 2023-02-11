<?php
class Admin_comment extends BaseController
{

    private $commentModel;

    public function __construct()
    {
        $this->loadModel("CommentModel");
        $this->commentModel = new CommentModel;
    }

    public function index()
    {

        $listCmt = $this->commentModel->getComment();
        return $this->view("admin.pages.comment.index", [
            "listCmt" => $listCmt
        ]);
    }

    public function detailComment()
    {
        if (!empty($_GET['id']) && $_GET['id'] > 0) {
            $id = $_GET['id'];

            $listCmt = $this->commentModel->getDetailCmt($id);
        }

        return $this->view("admin.pages.comment.detail", [
            'listCmt' => $listCmt,

        ]);
    }

    public function handleUpdateComment()
    {
        if (!empty($_GET["id"]) && !empty($_GET['value']) && !empty($_GET['product_id'])) {
            $id = $_GET['id'];
            $product_id = $_GET['product_id'];
            $content = $_GET['value'];

            $data = [
                'content' => $content
            ];

            $this->commentModel->updateDetailComment($data, $id);

            $url = $GLOBALS['domainPage'] . "/admin_comment/detailComment?id=$product_id";
            header("location: $url");
        }
    }

    public function deleteDetailCmt()
    {
        if (!empty($_GET['id']) && !empty($_GET['product_id'])) {
            $id = $_GET['id'];
            $product_id = $_GET['product_id'];

            $this->commentModel->deleteCmt($id);
            $url = $GLOBALS['domainPage'] . "/admin_comment/detailComment?id=$product_id";
            header("location: $url");
        }
    }
}
