<?php

namespace Source\Model;

class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $quantity;
    private $image;
    private $db;

    public function __construct(
        $id = NULL,
        $name = NULL, 
        $description = NULL, 
        $price = NULL,
        $quantity = NULL,
        $image = NULL
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->image = $image;

        $this->db = new \Source\Core\Database();
    }

    public function getById() {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->db->query($query, [ "id" => $this->id ]);

        if($stmt->rowCount() == 0){
            return false;
        } 

        $product = $stmt->fetch();
        $this->id = $product->id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->image = $product->image;

        return $this;
    }

    public static function getAll() {
        $query = "SELECT * FROM products";
        $stmt = (new \Source\Core\Database())->query($query, []);

        if($stmt->rowCount() == 0){
            return false;
        } 

        $products = [];
        while($prod = $stmt->fetch()) {
            $products[] = new Product(
                $prod->id,
                $prod->name,
                $prod->description,
                $prod->price,
                $prod->quantity,
                $prod->image,
            );
        }
        return $products;
    }

    public function getInfo() {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "price" => $this->price,
            "quantity" => $this->quantity,
            "image" => $this->image
        ];
    }

    public function insert() {
        $query = "INSERT INTO products(name, description, price, quantity, image) VALUES (:name, :description, :price, :quantity, :image)";
        $stmt = $this->db->query($query, [
            "name" => $this->name,
            "description" => $this->description,
            "price" => $this->price,
            "quantity" => $this->quantity,
            "image" => $this->image
        ]);

        $this->id = $this->db->getLastId();
        return $this;
    }

    public function update() {
        $fields = [];

        if (isset($this->name)) {
            $fields[] = [
                "name" => "name",
                "value" => $this->name
            ];
        }
        if (isset($this->description)) {
            $fields[] = [
                "name" => "description",
                "value" => $this->description
            ];
        }
        if (isset($this->price)) {
            $fields[] = [
                "name" => "price",
                "value" => $this->price
            ];
        }
        if (isset($this->quantity)) {
            $fields[] = [
                "name" => "quantity",
                "value" => $this->quantity
            ];
        }
        if (isset($this->image)) {
            $fields[] = [
                "name" => "image",
                "value" => $this->image
            ];
        }

        foreach($fields as $field) {
            $fieldName = $field["name"];
            $value = $field["value"];
            $sql = "UPDATE products SET $fieldName = :value WHERE id = :id";
            $stmt = $this->db->query($sql, [
                "value" => $value,
                "id" => $this->id
            ]);
        }

        $this->getById();
        return $this;
    }

}