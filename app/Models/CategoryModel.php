<?php 
    class CategoryModel extends BaseModel {
        const TABLE = 'category';

        public function getAll() {
            return $this -> all(self::TABLE);
        }
    }