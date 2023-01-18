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
                header('location: http://localhost/du_an_mau');
            } else if ($_SESSION['auth']['role'] == 1 && $_SESSION['auth']['status'] == 1) {
                header('location: http://localhost/du_an_mau/admin');
            }
        }
        return $this->view('frontend.pages.account', [
            'listUser' => $listUser
        ]);
    }

    public function info()
    {
        return $this->view('frontend.pages.info');
    }

    public function logout()
    {
        if (isset($_SESSION['auth'])) {
            unset($_SESSION['auth']);
            header('location: http://localhost/du_an_mau/');
        }
    }
}