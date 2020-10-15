<?php

class Product
{

    //add products to db
    public static function add($sku, $name, $price, $type_id, $size, $weight, $dimensions)
    {
        $db = Database::getConnection();

        $sql = "INSERT INTO products (sku, name, price, type_id, size, weight, dimensions) VALUES (:sku, :name, :price, :type_id, :size, :weight, :dimensions)";

        $result = $db->prepare($sql);
        //bind parameters
        $result->bindParam(':sku', $sku, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':price', $price, PDO::PARAM_STR);
        $result->bindParam(':type_id', $type_id, PDO::PARAM_STR);
        $result->bindParam(':size', $size, PDO::PARAM_STR);
        $result->bindParam(':weight', $weight, PDO::PARAM_INT);
        $result->bindParam(':dimensions', $dimensions, PDO::PARAM_STR);

        return $result->execute();
    }


    //delete all products from db
    public static function deleteAll()
    {
        $db = Database::getConnection();

        $sql = "DELETE FROM products";

        $result = $db->prepare($sql);

        return $result->execute();
    }


    //delete products by ID from db
    public static function deleteById($id)
    {
        $db = Database::getConnection();

        $sql = "DELETE FROM products  WHERE id=:id";

        $result = $db->prepare($sql);
        //bind parameter
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    //get all products from db
    public static function getProducts()
    {
        $db = Database::getConnection();
        $sql = 'SELECT * FROM products';

        $result = $db->prepare($sql);

        //Return the next row as an array indexed by column names
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetchAll();
    }

    //check sku on existing from db
    public static function checkSkuExists($sku)
    {
        $db = Database::getConnection();

        $sql = 'SELECT COUNT(*) FROM products WHERE sku=:sku';

        $result = $db->prepare($sql);
        $result->bindParam(':sku', $sku, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        }
        return false;
    }

    //check SKU variable length
    public static function checkSku($sku)
    {
        if (strlen($sku) > 6) {
            return true;
        }
        return false;
    }

    //check name variable length
    public static function checkName($name)
    {
        if (strlen($name) >= 3) {
            return true;
        }
        return false;
    }

    //check price variable length
    public static function checkPrice($price)
    {
        if (filter_var($price, FILTER_VALIDATE_FLOAT)) {
            if (strlen($price) > 0) {
                return true;
            }
        }
        return false;
    }
}
