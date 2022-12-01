<?php

namespace Source\Controller;

class Api {

    public function getAll() {
        header('Content-Type: application/json;');
        $products = \Source\Model\Product::getAll();
        $data = [];

        if ($products) {
            foreach($products as $prod) {
                $data[] = $prod->getInfo();
            }
        }

        echo json_encode($data);
    }

    public function insert($data) {
        header('Content-Type: application/json;');
        if (!$data || !isset($data["name"]) || !isset($data["description"]) || !isset($data["quantity"]) || !isset($data["price"])) {
            $output = [ "error" => "Must inform all fields" ];
        }
        else {
            $product = new \Source\Model\Product(NULL, $data["name"], $data["description"], $data["price"], $data["quantity"]);
            $product->insert();

            $output["product"] = $product->getInfo();
        }

        echo json_encode($output);
    }


    public function get($data) {
        header('Content-Type: application/json;');
        if (!$data || !isset($data["id"])) {
            $output = [ "error" => "Must inform product id" ];
        }
        else {
            $product = new \Source\Model\Product($data['id']);
            $product = $product->getById();
    
            if (!$product) {
                echo json_encode([ "error" => "Not found" ]);
                return;
            }
        }

        echo json_encode($product->getInfo());
    }

    public function update($data) {
        header('Content-Type: application/json;');
        if (!$data || !isset($data["id"])) {
            $output = [ "error" => "Must inform a product id" ];
        }
        else {
            $data["name"] =  isset($data["name"]) ? $data["name"] : null;
            $data["description"] =  isset($data["description"]) ? $data["description"] : null;
            $data["price"] =  isset($data["price"]) ? $data["price"] : null;
            $data["quantity"] =  isset($data["quantity"]) ? $data["quantity"] : null;
            
            $product = new \Source\Model\Product($data["id"], $data["name"], $data["description"], $data["price"], $data["quantity"]);
            $resp = $product->update();

            if (!$resp) {
                echo json_encode([ "error" => "Not found" ]);
                return;
            }

            // $output["a"] = $a;
            $output["product"] = $product->getInfo();
        }

        echo json_encode($output);
    }

}