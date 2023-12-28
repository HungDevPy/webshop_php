<?php
require_once('controllers/base_controller.php');
require_once('models/nhomsp.php');
require_once('models/db.php');

class NhomspController extends BaseController
{
  function __construct()
  {
    $this->folder = 'nhomsp';//Tên thư mục của module home trong view
  
  }
  public function index()
  {
    $nhomsp = Nhomsanpham::get_all();
    $data = array('nhomsp' => $nhomsp);
    $this->render('index', $data);
  }

  public function detail()
  {
    $nhomsp = Nhomsanpham::get_byid($_GET['id']);
    $data = array('nhomsp' => $nhomsp);
    $this->render('detail', $data);
  }
  public function add()
  {
    $this->render('add');
  }
  public function add_submit()
  {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $name    = isset($_POST['name']) ? $_POST['name'] : '';
    //Mã hóa MD5 cho mật khẩu  
    $created_at = $updated_at = date('Y-m-d H:s:i');
    if (($id != '') && ($name != '')) {
      $nhomsp = new Nhomsanpham($id, $name,$created_at,$updated_at);
      $results = $nhomsp->add_byid();

      if ($results) {
        echo "<script> alert('Thêm mới thành công.') </script>";
      } else {
        echo "<script> alert('Lỗi thêm dữ liệu!') </script>";
      }

      $this->index();
    } else {

      echo "<script> alert('Lỗi: !') </script>";
      $this->add();
    }
  }
  public function edit()
  {
    $nhomsp = Nhomsanpham::get_byid($_GET['id']);
    $data = array('nhomsp' => $nhomsp);
    $this->render('edit', $data);
  }

  public function edit_submit()
  {

    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $name    = isset($_POST['name']) ? $_POST['name'] : '';
    $created_at = $updated_at = date('Y-m-d H:s:i');

    if (($id != '') && ($name != '')) {
      $nhomsp = new Nhomsanpham($id, $name,$created_at,$updated_at);


      $results = $nhomsp->update();
      if ($results) {
        echo "<script> alert('Sửa thành công.') </script>";
      } else {
        echo "<script> alert('Lỗi sửa dữ liệu!') </script>";
      }

      //Trở về trang chủ  
      $this->index();
    } else {
      //Hiển thị thông báo  
      echo "<script> alert('Lỗi: !') </script>";

      //Trở về trang sửa  

      echo "<script> history.go(-1) </script>";
    }
  }
  public function del()
  {
    $nhomsp = Nhomsanpham::delete($_GET['id']); //Gọi phương thức   delete() của model Taikhoan.  

    //Trở về trang chủ  
    $this->index();
  }
}
