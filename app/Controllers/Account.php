<?php
class Account extends BaseController
{

    private $accountModel;


    public function __construct()
    {
        $this->loadModel('AccountModel');
        $this->accountModel = new AccountModel;
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
        return $this->view('frontend.pages.info');
    }

    public function logout()
    {
        if (isset($_SESSION['auth'])) {
            unset($_SESSION['auth']);
            $url = $GLOBALS['domainPage'];


            header("location:  $url");
        }
    }
}
