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
  static function get_byid($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM category WHERE id = :id');
    $req->execute(array('id' => $id));

    $item = $req->fetch();
    if (isset($item['id'])) {
      return new Nhomsanpham($item['id'], $item['name'],$item['created_at'],$item['updated_at']);
    }
    return null;
  }
  function add_byid()
  {
    $db = DB::getInstance();
    $sql = "INSERT INTO category( id, name,created_at,updated_at)
     VALUES ('$this->id','$this->name','$this->created_at','$this->updated_at')";
    return $db->exec($sql);
  }
  function insert()
  {
    $db = DB::getInstance();
    $sql = "INSERT INTO category(id, name,)
         VALUES ('$this->id', '$this->name')";
    return $db->exec($sql);
  }
  function update()
  {
    $db = DB::getInstance();
    $sql = 'update category set name="' . $this->name . '", updated_at="' . $this->updated_at . '" where id=' . $this->id;
    return $db->exec($sql);
  }
  static function delete($id)
  {
    $db = DB::getInstance();
    $sql = "DELETE FROM category WHERE id='$id' ";
    return $db->exec($sql);
  }
}
