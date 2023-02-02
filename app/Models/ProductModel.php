<?php
class ProductModel extends BaseModel
{
    const TABLE = 'products';

    public function getAll()
    {
        return $this->all(self::TABLE);
    }

    public function getOne($id)
    {
        return $this->one(self::TABLE, $id);
    }

    public function getAllDESC($arr)
    {
        return $this->getAllNew(self::TABLE, 'DESC', $arr, 'id');
    }

    public function getPrd()
    {
        $sql = "SELECT products.id, products.name,price, image, discount, products.desc ,quantity,view,bought,category.name as cate FROM products LEFT JOIN category on products.category_id = category.id ORDER BY products.id DESC";
        return $this->query_all($sql);
    }

    public function getPrdSimilar($cate, $id)
    {
        $sql = "SELECT * from products where category_id = $cate AND id <> $id";
        return $this->query_all($sql);
    }

    public function upView($id)
    {
        $sql = "UPDATE products SET view = view + 1 WHERE id = $id";
        return $this->execute($sql);
    }

    public function deletePrd($id)
    {
        return $this->delete(self::TABLE, $id);
    }
}