<?php
class CartModel extends BaseModel
{
    const TABLE = 'orders';

    public function getAll($id)
    {
        $sql = "SELECT orders.id as idPrd ,name, price, image, COUNT(orders.quantity) as totalProduct FROM orders JOIN products ON orders.product_id = products.id WHERE orders.user_id = $id GROUP BY products.name";

        return $this->query_all($sql);
    }

    public function getTotalPrd($idUser)
    {
        $sql = "SELECT COUNT(user_id) as totalPrd FROM orders WHERE user_id = $idUser";

        return $this->query_all($sql);
    }

    public function addCart($data)
    {
        return $this->create(self::TABLE, $data);
    }
}
