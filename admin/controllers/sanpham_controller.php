<?php
require_once('controllers/base_controller.php');
require_once('models/sanpham.php');
require_once('models/db.php');
require_once('models/nhomsp.php');

class SanphamController extends BaseController
{
  function __construct()
  {
    $this->folder = 'sanpham'; //Tên thư mục của module home trong view
  }

  public function index()
  {
    $sanpham = Sanpham::get_all();
    $data = array('sanpham' => $sanpham);
    $this->render('index', $data);
  }

  public function detail()
  {
    $sanpham = Sanpham::get_byid($_GET['id']);
    $data = array('sanpham' => $sanpham);
    $this->render('detail', $data);
  }
  public function add()
  {
    $nhomsp = Nhomsanpham::get_all();
    $data = array('nhomsp' => $nhomsp);
    $this->render('add', $data);
  }
  public function add_submit()
  {
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $number = isset($_POST['number']) ? $_POST['number'] : '';
    $thumbnail = isset($_FILES['thumbnail']) ? $_FILES['thumbnail'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $id_category = isset($_POST['nhomid']) ? $_POST['nhomid'] : '';
    $created_at = $updated_at = date('Y-m-d H:i:s');

    if (!empty($title) && !empty($price)) {
      $sanpham = new Sanpham(null, $title, $price, $number, $thumbnail, $content, $id_category, $created_at, $updated_at);

      $result = $sanpham->add_byid();

      if ($result === true) {
        echo "<script> alert('Thêm mới thành công.') </script>";
      } else {
        echo "<script> alert('Lỗi thêm dữ liệu!');</script>";
      }

      $this->index();
    } else {
      echo "<script> alert('Lỗi: Tên sản phẩm và giá không được để trống!');</script>";
      $this->add();
    }
  }
  public function edit()
  {
    $nhomsp = Nhomsanpham::get_all();
    $sanpham = Sanpham::get_byid($_GET['id']);
    $data = array('sanpham' => $sanpham, 'nhomsp' => $nhomsp);
    $this->render('edit', $data);
  }

  public function edit_submit()
  {
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $number = isset($_POST['number']) ? $_POST['number'] : '';
    $thumbnail = isset($_FILES['thumbnail']) ? $_FILES['thumbnail'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $id_category = isset($_POST['nhomid']) ? $_POST['nhomid'] : '';
    $updated_at = date('Y-m-d H:i:s');

    if (!empty($title) && !empty($price)) {
      $sanpham = new Sanpham($id, $title, $price, $number, $thumbnail, $content, $id_category, $updated_at, $updated_at);
      $result = $sanpham->update();

      if ($result) {

        echo "<script> alert('Cập nhật thành công.') </script>";
      } else {
        echo "<script> alert('Lỗi cập nhật dữ liệu!');</script>";
      }
    }

    $this->index();
  }

  public function del()
  {
    $sanpham = Sanpham::delete($_GET['id']); //Gọi phương thức   delete() của model Taikhoan.  

    //Trở về trang chủ  
    $this->index();
  }
}
