<?php
class CategoryModel extends BaseModel
{
    const TABLE = 'category';

    public function getAll()
    {
        return $this->all(self::TABLE);
    }

    public function getCategory()
    {
        $sql = "SELECT category.id, category.name ,COUNT(category_id) as quantity from products RIGHT JOIN category on products.category_id = category.id GROUP BY category.id";
        return $this->query_all($sql);
    }

    public function updateCategory($data, $id)
    {
        return $this->update(self::TABLE, $data, $id);
    }

    public function deleteCategory($id)
    {
        return $this->delete(self::TABLE, $id);
    }

    public function createCategory($data)
    {
        return $this->create(self::TABLE, $data);
    }

    public function statistical()
    {
        $sql = "SELECT MAX(products.price) as max, MIN(products.price) as min, AVG(products.price) as avg, category.id, category.name ,COUNT(category_id) as quantity from products RIGHT JOIN category on products.category_id = category.id GROUP BY category.id";
        return $this->query_all($sql);
    }
}
