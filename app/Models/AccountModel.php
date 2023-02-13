<?php
class AccountModel extends BaseModel
{
    const TABLE = 'users';

    public function getAllUser()
    {
        return $this->all(self::TABLE, ['email', 'password']);
    }

    public function getAll()
    {
        return $this->all(self::TABLE);
    }

    public function getAuth($emailUser)
    {
        $sql = "SELECT * FROM users WHERE email = '$emailUser'";
        return $this->query_one($sql);
    }

    public function getOne($id)
    {
        return $this->one(self::TABLE, $id);
    }

    public function deleteUser($ids)
    {
        return $this->delete(self::TABLE, $ids);
    }

    public function updateStatusUser($listUserUpdate)
    {
        $arr = [];
        foreach ($listUserUpdate as $key => $value) {
            array_push($arr, "or id = ${value}");
        }

        $newDataString = implode(' ', $arr);
        $testStr = substr($newDataString, 3);
        $sql = "UPDATE users SET status = 1 WHERE $testStr";
        return $this->execute($sql);
    }

    public function updateUserInfo($data, $id)
    {
        return $this->update(self::TABLE, $data, $id);
    }

    public function addNewAcc($data)
    {
        return $this->create(self::TABLE, $data);
    }
}
