<?php
class Sanpham
{
  public $id;
  public $title;
  public $price;
  public $number;
  public $thumbnail;
  public $content;
  public $id_category;
  public $created_at;
  public $updated_at;

  function __construct($id, $title, $price, $number, $thumbnail, $content, $id_category, $created_at, $updated_at)
  {
    $this->id = $id;
    $this->title = $title;
    $this->price = $price;
    $this->number = $number;
    $this->thumbnail = $thumbnail;
    $this->content = $content;
    $this->id_category = $id_category;
    $this->created_at = $created_at;
    $this->updated_at = $updated_at;
  }

  static function get_all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM product');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Sanpham($item['id'], $item['title'], $item['price'], $item['number'], $item['thumbnail'], $item['content'], $item['id_category'], $item['created_at'], $item['updated_at']);
    }

    return $list;
  }
  static function get_byid($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM product WHERE id = :id');
    $req->execute(array('id' => $id));

    $item = $req->fetch();
    if (isset($item['id'])) {
      return new Sanpham($item['id'], $item['title'], $item['price'], $item['number'], $item['thumbnail'], $item['content'], $item['id_category'], $item['created_at'], $item['updated_at']);
    }
    return null;
  }
  function add_byid()
  {
    $db = DB::getInstance();
    $target_dir    = "assets/uploads/";
    $filename = basename($this->thumbnail['name']);
    $target_file = $target_dir . $filename;

    if (move_uploaded_file($this->thumbnail['tmp_name'], $target_file)) {
      $sql = 'INSERT INTO product (title, price, number, thumbnail, content, id_category, created_at, updated_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

      $stmt = $db->prepare($sql);
      $stmt->execute([$this->title, $this->price, $this->number, $target_file, $this->content, $this->id_category, $this->created_at, $this->updated_at]);

      return true;
    } else {
      return "Error moving uploaded file.";
    }
  }

  function update()
  {
    $db = DB::getInstance();
    $target_dir = "assets/uploads/";
    $filename = basename($this->thumbnail['name']);
    $target_file = $target_dir . $filename;

    if (move_uploaded_file($this->thumbnail['tmp_name'], $target_file)) {
      $sql = 'UPDATE product SET title = ?, price = ?, number = ?, thumbnail = ?, content = ?, id_category = ?, updated_at = ? WHERE id = ?';
      //echo $sql;
      $stmt = $db->prepare($sql);
      $stmt->execute([$this->title, $this->price, $this->number, $target_file, $this->content, $this->id_category, $this->updated_at, $this->id]);

      return true;
    } else {
      return "Error moving uploaded file.";
    }
  }

  static function delete($id)
  {
    $db = DB::getInstance();
    $sql = "DELETE FROM product WHERE id='$id' ";
    return $db->exec($sql);
  }
}
