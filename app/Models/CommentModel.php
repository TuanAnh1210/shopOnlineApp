<?php
class CommentModel extends BaseModel
{
    const TABLE = 'comments';

    public function getAllCmt($id)
    {
        $sql = "SELECT comments.id as id_cmt, content, comment_time, product_id, fullname, avatar FROM comments JOIN products ON comments.product_id = products.id JOIN users ON comments.user_id = users.id WHERE products.id = $id";
        return $this->query_all($sql);
    }

    public function addCmt($data)
    {

        return $this->create(self::TABLE, $data);
    }
}