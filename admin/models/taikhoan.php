<?php
class Taikhoan
{
  public $tendangnhap;
  public $matkhau;
  public $hoten;
  public $email;
  public $phone;

  function __construct($tendangnhap, $matkhau, $hoten, $email, $phone)
  {
    $this->tendangnhap = $tendangnhap;
    $this->matkhau = $matkhau;
    $this->hoten = $hoten;
    $this->email = $email;
    $this->phone = $phone;
  }

  static function get_all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM user');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Taikhoan($item['username'], $item['password'], $item['hoten'], $item['email'], $item['phone']);
    }

    return $list;
  }
  static function get_byid($username)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM user WHERE username = :username');
    $req->execute(array('username' => $username));

    $item = $req->fetch();
    if (isset($item['username'])) {
      return new Taikhoan($item['username'], $item['password'], $item['hoten'], $item['email'], $item['phone']);
    }
    return null;
  }
  function add_byid()
  {
    $db = DB::getInstance();
    $sql = "INSERT INTO user( hoten, username, password, phone, email)
     VALUES ('$this->hoten','$this->tendangnhap','$this->matkhau','$this->phone','$this->email')";
    return $db->exec($sql);
  }
  function insert()
  {
    $db = DB::getInstance();
    $sql = "INSERT INTO user(hoten, username, password, phone, email)
         VALUES ('$this->tendangnhap', '$this->matkhau', '$this->hoten', '$this->email')";
    return $db->exec($sql);
  }
  function update()
  {
    $db = DB::getInstance();
    $sql = "UPDATE user SET           
     password  = '$this->matkhau',  
     hoten = '$this->hoten',  
     email ='$this->email',
     phone='$this->phone' 
     WHERE username = '$this->tendangnhap' ";
    return $db->exec($sql);
  }
  static function delete($tendangnhap)
  {
    $db = DB::getInstance();
    $sql = "DELETE FROM user WHERE username='$tendangnhap' ";
    return $db->exec($sql);
  }
}
