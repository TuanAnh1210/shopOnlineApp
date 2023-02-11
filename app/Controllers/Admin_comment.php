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
        return $this->view("admin.pages.comment.detail");
    }
}
