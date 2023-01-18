<?php
class AccountModel extends BaseModel
{
    const TABLE = 'users';

    public function getAllUser()
    {
        return $this->all(self::TABLE, ['email', 'password']);
    }

    public function getAuth($emailUser)
    {
        $sql = "SELECT * FROM users WHERE email = '$emailUser'";
        return $this->query_one($sql);
    }
}