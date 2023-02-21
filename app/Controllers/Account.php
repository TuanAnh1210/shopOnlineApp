<?php
class Account extends BaseController
{

    private $accountModel;
    private $cartModel;


    public function __construct()
    {
        $this->loadModel('AccountModel');
        $this->accountModel = new AccountModel;

        $this->loadModel('CartModel');
        $this->cartModel = new CartModel;
    }

    public function index()
    {
        $listUser = $this->accountModel->getAllUser();
        if (!empty($_POST['emailLogin']) && !empty($_POST['passLogin'])) {
            $emailUser = $_POST['emailLogin'];
            $auth = $this->accountModel->getAuth($emailUser);
            $_SESSION['auth'] = $auth;

            if ($_SESSION['auth']['role'] == 0) {
                $url = $GLOBALS['domainPage'];
                header("location:  $url");
            } else if ($_SESSION['auth']['role'] == 1 && $_SESSION['auth']['status'] == 1) {
                $url = $GLOBALS['domainPage'] . "/admin";
                header("location: $url");
            } else if ($_SESSION['auth']['role'] == 1 && $_SESSION['auth']['status'] == 0) {
                echo "<script>alert('Tài khoản của bạn đang đợi duyệt !')</script>";
                unset($_SESSION['auth']);
            }
        }
        return $this->view('frontend.pages.account', [
            'listUser' => $listUser
        ]);
    }

    public function handleRegisAcc()
    {
        if (!empty($_POST)) {
            $fullname = $_POST['regis_name'];
            $email = $_POST['regis_email'];
            $avatar = "default.jpg";
            $address = "not available";
            $password = $_POST['regis_pass'];
            $phone = "not available";
            $role = $_POST['regis_option'];

            if ($role == "user") {
                $arrInfo = [
                    "fullname" => $fullname,
                    "email" => $email,
                    "avatar" => $avatar,
                    "address" => $address,
                    "password" => $password,
                    "phone" => $phone,
                    "status" => 1,
                    "role" => 0
                ];

                mailAuth('sendmail', [
                    "arrInfo" => $arrInfo
                ]);
            } else if ($role == "admin") {
                $arrInfo = [
                    "fullname" => $fullname,
                    "email" => $email,
                    "avatar" => $avatar,
                    "address" => $address,
                    "password" => $password,
                    "phone" => $phone,
                    "status" => 0,
                    "role" => 1
                ];

                mailAuth('sendmail', [
                    "arrInfo" => $arrInfo
                ]);
            }
        }
    }

    public function authSuccess()
    {
        if (!empty($_POST)) {
            $fullname = $_POST['fullnameUser'];
            $email = $_POST['emailUser'];
            $avatar = $_POST['avatarUser'];
            $address = $_POST['addressUser'];
            $password = $_POST['passwordUser'];
            $phone = $_POST['phoneUser'];
            $status = $_POST['statusUser'];
            $role = $_POST['roleUser'];

            $data = [
                'fullname' => $fullname,
                'email' => $email,
                'avatar' => $avatar,
                'address' => $address,
                'password' => $password,
                'phone' => $phone,
                'status' => $status,
                'role' => $role,
            ];
            $this->accountModel->addNewAcc($data);
            $url = $GLOBALS['domainPage'] . "/account";
            header("location: $url");
        }
    }

    public function info()
    {
        if (!empty($_SESSION['auth'])) {
            $id = $_SESSION['auth']['id'];
            $data = $this->cartModel->getInfoOrder($id);
        }
        return $this->view('frontend.pages.info', [
            "data" =>  $data
        ]);
    }

    public function logout()
    {
        if (isset($_SESSION['auth'])) {
            unset($_SESSION['auth']);
            unset($_SESSION['totalPrdInCart']);
            $url = $GLOBALS['domainPage'];


            header("location:  $url");
        }
    }


    public function forgotPass()
    {
        if (!empty($_POST["emailIpt"])) {
            $emailCheck = $_POST["emailIpt"];
            mailAuth('forgotPass', [
                "emailCheck" => $emailCheck
            ]);
        }
        return $this->view("frontend.pages.forgotPass");
    }

    public function authForgotPass()
    {
        if (!empty($_POST['emailUser'])) {
            $emailUser = $_POST['emailUser'];
            return $this->view("frontend.pages.updatePass", [
                "emailUser" => $emailUser
            ]);
        }
    }

    public function updatePassword()
    {
        if (!empty($_POST['passIpt']) && !empty($_POST['emailIpt'])) {
            $password = $_POST['passIpt'];
            $email = $_POST['emailIpt'];


            $this->accountModel->updateNewPass($password, $email);
            $url = $GLOBALS['domainPage'];


            header("location:  $url");
        }
    }
}
