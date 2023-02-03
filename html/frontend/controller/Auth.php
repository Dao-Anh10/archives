<?php

namespace Frontend\Controller;

use Model\User;

class Auth extends Base
{
    public function login()
    {

        if (isset($_POST['submit'])) {
            try {
                $user = new User;

                $userDb = $user->selectOne('username', $_POST['username']);

                if (!$userDb || !password_verify($_POST['password'], $userDb->password)) {
                    $this->view->msgError = '* Username hoặc password không chính xác';
                    $this->view->render('auth/login');
                    exit();
                }

                $_SESSION['username'] = $userDb->username;
                header('Location: ' . app()->baseUrl);
                exit();
            } catch (\Exception $e) {
                echo  $e;
            }
        }

        if (isset($_SESSION['username'])) {
            header('Location: ' . app()->baseUrl);
            exit();
        }

        $this->view->render('auth/login');
    }

    public function register()
    {

        if (isset($_POST['submit'])) {
            try {
                if ($_POST['User']['password'] != $_POST['User']['re-password']) {
                    $this->view->msgError = '* Nhập lại mật khẩu không khớp';
                    $this->view->render('auth/register');
                    exit();
                }

                $user = new User;
                $userDb = $user->selectOne('username', $_POST['User']['username']);

                if ($userDb) {
                    $this->view->msgError = '* Username đã tồn tại';
                    $this->view->render('auth/register');
                    exit();
                }
                $_POST['User']['password'] = password_hash($_POST['User']['password'], PASSWORD_DEFAULT);

                $user->load($_POST['User']);
                $user->insert();

                $this->view->msgSuccess = 'Đăng ký tài khoản thành công!';
                $this->view->render('auth/login');
            } catch (\Exception $e) {
                echo  $e;
            }
        }

        if (isset($_SESSION['username'])) {
            header('Location: ' . app()->baseUrl);
            exit();
        }
        $this->view->render('auth/register');
    }

    public function logout()
    {
        unset($_SESSION["username"]);
        session_destroy();
        header('Location: ' . app()->baseUrl . '/auth/login');
        exit();
    }
}
