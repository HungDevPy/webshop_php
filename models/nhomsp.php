<?php
class Nhomsanpham
{
  public $id;
  public $name;
  public $created_at;
  public $updated_at;

  function __construct($id, $name, $created_at, $updated_at)
  {
    $this->id = $id;
    $this->name = $name;
    $this->created_at = $created_at;
    $this->updated_at = $updated_at;
  }

  static function get_all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM category');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Nhomsanpham($item['id'], $item['name'],$item['created_at'],$item['updated_at']);
    }

    return $list;
  }
}
