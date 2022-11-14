<?php

namespace Source\Model;

class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $quantity;

    public function __construct(
        $id = NULL,
        $name = NULL, 
        $description = NULL, 
        $price = NULL,
        $quantity = NULL
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;

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
                $prod->quantity
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
            "quantity" => $this->quantity
        ];
    }

    public function insert() {
        $query = "INSERT INTO products(name, description, price, quantity) VALUES (:name, :description, :price, :quantity)";
        $stmt = $this->db->query($query, [
            "name" => $this->name,
            "description" => $this->description,
            "price" => $this->price,
            "quantity" => $this->quantity
        ]);

        $this->id = $this->db->getLastId();
        return $this;
    }

    public function update() {
        $fields = [];
        $values = [];

        if (isset($this->name)) {
            $fields[] = "name";
            $values[] = $this->name;
        }
        if (isset($this->description)) {
            $fields[] = "description";
            $values[] = $this->description;
        }
        if (isset($this->price)) {
            $fields[] = "price";
            $values[] = $this->price;
        }
        if (isset($this->quantity)) {
            $fields[] = "quantity";
            $values[] = $this->quantity;
        }

        $queryText = [];
        $queryVars = [ "id" => $this->id ];
        foreach($fields as $i => $field) {
            $value = $values[$i];
            $queryText[] = "$field = :$field";
            $queryVars[$field] = $value;
        }
        $queryText = implode(',', $queryText);

        $query = "UPDATE products SET $queryText WHERE id = :id";
        // return $queryText;
        $stmt = $this->db->query($query, $queryVars);

        if($stmt->rowCount() == 0){
            return false;
        }

        $this->getById();
        return $this;
    }

}