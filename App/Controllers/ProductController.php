<?php

namespace App\Controllers;

use App\Models\Product;
use Learn\Crud\View;

class ProductController
{
    protected array $data = [];

    public function index()
    {
        $product = new Product();

        $this->data['products_title'] = 'Products page';
        $this->data['products_items'] = $product->getAllProducts();
        View::load('product/index', $this->data);
    }

    public function add()
    {
        View::load('product/add', $this->data);
    }

    public function store()
    {
        if (isset($_POST['submit'])) {
            $values = [
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "description" => $_POST['description'],
                "quantity" => $_POST['quantity'],
            ];

            foreach($values as $key => $value){
                if(empty($value)){
                    $this->data['errors'][$key] = 'The ' . $key . ' is required';
                }
            }
            if (empty($this->data['errors'])){
                $product = new Product();
                $product->insertProduct([$value['name'], $value['price'], $value['description'], $value['quantity']]);

                $this->data['success'] = 'Data added successfuly';
                $this->index();
            }else{
                $this->add();
            } 
        }
    }

    public function edit($id)
    {
        $product = new Product();
        $product_item = $product->getProduct($id);
        if($product_item){
            $this->data['row'] = $product_item[0];
            View::load('product/edit', $this->data);
        }else{
            echo $this->data['edit_errors'] = 'There is an error in fetching the data';
        }
    }

    public function update()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $quantity = $_POST['quantity'];
            $id = $_POST['id'];

            $product = new Product();
            $product->updateProduct($id, [$name, $price, $description, $quantity]);

            $this->data['update'] = 'Data updated successfuly';
            $this->index();
        }
    }

    public function delete($id)
    {
        $product = new Product();
        $product->deleteProduct($id);

        $this->data['delete'] = 'Data deleted successfuly';
        $this->index();
    }
}
