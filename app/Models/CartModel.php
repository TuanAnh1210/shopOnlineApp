<?php
class CartModel extends BaseModel
{
    const TABLE = 'orders';

    public function getAll($id)
    {
        // $sql = "SELECT orders.id as idPrd ,name, price, image, COUNT(orders.quantity) as totalProduct FROM orders JOIN products ON orders.product_id = products.id WHERE orders.user_id = $id GROUP BY products.name";

        $sql = "SELECT orders.id as idPrd ,name, price, image, orders.quantity as totalProduct FROM orders JOIN products ON orders.product_id = products.id WHERE orders.user_id = $id";

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

    public function getInfoOrder($id)
    {
        $sql = "SELECT orders.id as idOrder, orders.quantity as quantityOrd, order_status ,image, name FROM orders JOIN products ON orders.product_id = products.id WHERE user_id = $id";
        return $this->query_all($sql);
    }

    public function updateQuantityPrd($data, $id)
    {
        return $this->update(self::TABLE, $data, $id);
    }

    public function full()
    {
        return $this->all(self::TABLE);
    }
}
