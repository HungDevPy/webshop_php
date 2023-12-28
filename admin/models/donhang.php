<?php
class Donhang
{
  public function get_all()
  {
    $db = DB::getInstance();
    $sql = "SELECT * FROM category";
    return $db->exec($sql);

  }
}
