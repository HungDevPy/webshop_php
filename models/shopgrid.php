<?php
class Shopgrid
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
            $list[] = new Shopgrid($item['id'], $item['title'], $item['price'], $item['number'], $item['thumbnail'], $item['content'], $item['id_category'], $item['created_at'], $item['updated_at']);
        }

        return $list;
    }
    
}
