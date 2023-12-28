<?php
class Oder
{
  public $id;
  public $fullname;
  public $phone_number;
  public $email;
  public $address;
  public $note;
  public $order_date;

  function __construct($id, $fullname, $phone_number , $email, $address,$note,$order_date)
  {
    $this->id = $id;
    $this->fullname = $fullname;
    $this->phone_number = $phone_number;
    $this->email = $email;
    $this->address = $address;
    $this->note = $note;
    $this->order_date = $order_date;
  }
  static function get_all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM orders');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Oder($item['id'], $item['fullname'], $item['phone_number'], $item['email'], $item['address'],$item['note'],$item['order_date']);
    }

    return $list;
  }
 
}
