<?php
class Users extends BaseController
{
    private $accountModel;
    public function __construct()
    {
        $this->loadModel("AccountModel");
        $this->accountModel = new AccountModel();
    }

    public function index()
    {
        $listAcc = $this->accountModel->getAll();
        return $this->view("admin.pages.account.index", [
            "listAcc" => $listAcc
        ]);
    }

    public function removeUser()
    {
        if (!empty($_POST)) {
            $ids = $_POST;

            if (!empty($_SESSION['auth'])) {
                $curIdUser = $_SESSION['auth']['id'];

                if (in_array($curIdUser,  $ids)) {
                    echo " <h2>Bạn không thể xóa tài khoản của bạn lúc này</h2>";
                } else {
                    $this->accountModel->deleteUser($ids);


                    $url = $GLOBALS['domainPage'] . "/users";
                    header("location: $url");
                }
            }
        }
    }

    public function checkedUser()
    {
        if (!empty($_POST)) {
            $ids = $_POST;

            $arrId = [];
            foreach ($ids as  $value) {
                array_push($arrId, $value);
            }


            $this->accountModel->updateStatusUser($arrId);
            $url = $GLOBALS['domainPage'] . "/users";
            header("location: $url");
        }
    }

    public function editUser()
    {

        if (!empty($_POST)) {
            $ids = $_POST;
            foreach ($ids as $value) {
                $id = $value;
            }

            $curUser = $this->accountModel->getOne($id);
        }
        return $this->view("admin.pages.account.editUser", [
            "curUser" => $curUser
        ]);
    }
}
