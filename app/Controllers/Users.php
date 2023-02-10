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
            "curUser" => $curUser,
            'id' => $id
        ]);
    }

    public function handleEditUser()
    {
        if (!empty($_POST)) {
            if (!empty($_FILES['avatar']['name'])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES['avatar']['name']);
                move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
                $newAvatar = basename($_FILES['avatar']['name']);
            } else {
                $newAvatar = $_POST['oldAvatar'];
            }
            $id = $_POST['curIdUser'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $avatar = $newAvatar;
            $address = $_POST['address'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $role = $_POST['role'];

            $data = [
                "fullname" =>  $fullname,
                "email" =>  $email,
                "avatar" =>  $avatar,
                "address" =>  $address,
                "password" =>  $password,
                "phone" =>  $phone,
                "role" =>  $role,
            ];
            $this->accountModel->updateUserInfo($data, $id);

            $url = $GLOBALS['domainPage'] . "/users";
            header("location: $url");
        }
    }
}