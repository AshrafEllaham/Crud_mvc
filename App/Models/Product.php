<?php

namespace App\Models;

use Learn\Crud\DB;

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new DB('products');
    }

    public function getAllProducts()
    {
        return $this->db->getData();
    }

    public function getProduct($id)
    {
        return $this->db->getData(['id =', $id]);
    }

    public function insertProduct($data)
    {
        return $this->db->setData(['name', 'price', 'description', 'quantity'], $data);
    }

    public function updateProduct($id, $data)
    {
        return $this->db->updateData(['name', 'price', 'description', 'quantity'], $id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->db->deleteData($id);
    }
}
