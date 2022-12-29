<?php
class ProductModel extends BaseModel
{
    const TABLE = 'products';

    public function getAll()
    {
        return $this->all(self::TABLE);
    }

    public function getAllDESC($arr)
    {
        return $this->getAllNew(self::TABLE, 'DESC', $arr, 'id');
    }

    public function getPrd()
    {
        $sql = "SELECT products.id, products.name,price, image, discount, quantity,view,bought,category.name as cate FROM products LEFT JOIN category on products.category_id = category.id ORDER BY products.id DESC";
        return $this->query_all($sql);
    }
}