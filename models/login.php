<?php
class Login
{
    public $id_user;
    public $hoten;
    public $username;
    public $password;
    public $phone;
    public $email;

    function __construct($id_user, $hoten, $username, $password, $phone, $email)
    {
        $this->id_user = $id_user;
        $this->hoten = $hoten;
        $this->username = $username;
        $this->password = $password;
        $this->phone = $phone;
        $this->email = $email;
    }
    static function get_all()
    {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM user');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Login($item['id_user'], $item['hoten'], $item['username'],$item['password'], $item['email'], $item['phone']);
    }

    return $list;
  }
}
