<?php
require_once('database/start_session.php');
require_once('controllers/base_controller.php');
require_once('models/login.php');
require_once('database/config.php');
require_once('database/dbhelper.php');

class LoginController extends BaseController
{
  function __construct()
  {
    $this->folder = 'login';
  }
  public function index()
  {
    $data = array();
    $this->render('index', $data);
  }

  public function resetpass()
  {
    $data = array();
    $this->render('resetpass');
    if (isset($_POST["submit"])) {
      if ($_POST["oldpass"] != '' && $_POST["newpass"] != '' && $_POST["repass"] != '') {
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $repass = $_POST['repass'];
        $id_user = $_SESSION['id_user'];
        if ($newpass == $repass) {
          $sql = "UPDATE user SET password = '$newpass' WHERE id_user = $id_user";
          execute($sql);
          echo '<script language="javascript">
                          window.location = "index.php"; 
                      </script>';
        } else {
          echo "<script> alert('Mật khẩu mới phải giống nhau') </script>";
        }
      } else {
        echo "<script> alert('Không được để trống mật khẩu') </script>";
      }
    }
  }
  public function login()
  {
    $data = array();
    $this->render('index', $data);
    if (isset($_POST["submit"]) && $_POST["username"] != '' && $_POST["password"] != '') {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
      $user = executeSingleResult($sql);

      if ($user) {
        // Store user information in sessions
        $_SESSION['username'] = $user['username'];
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['hoten'] = $user['hoten'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['phone'] = $user['phone'];
        echo '<script language="javascript">
                        window.location = "index.php"; 
                    </script>';
      } else {
        echo '<script language="javascript">
                    alert("Tài khoản và mật khẩu không chính xác !");
                </script>';
      }
    }
  }

  public function register()
  {
    $this->render('register');

    if (isset($_POST["submit"]) && $_POST["username"] != '' && $_POST["password"] != '') {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];

      $sql = "INSERT INTO `user`(`id_user`, `hoten`, `username`, `password`, `phone`, `email`) 
      VALUES (null,'$name','$username','$password','$phone','$email')";
      $idUser = executeInsert($sql);
      echo $sql;
      if ($idUser > 0) {
        $sql = "SELECT * FROM user WHERE id_user=$idUser";
        $user = executeSingleResult($sql);
        $_SESSION['username'] = $user['username'];
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['hoten'] = $user['hoten'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['phone'] = $user['phone'];
        echo '<script language="javascript">
                        window.location = "index.php"; 
                    </script>';
      } else {
        echo '<script language="javascript">
                    alert("TThêm thất bại !");
                </script>';
      }
    } else {
      echo 'Nhập thiếu dữ liệu';
    }
  }

  public function logout()
  {
    $_SESSION = array();
    session_destroy();
    $data = array();
    $this->render('index', $data);
  }
}
