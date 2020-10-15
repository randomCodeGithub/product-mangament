<?php

class ProductType
{

    //get data from product_types table
    public static function getProductTypes()
    {
        $db = Database::getConnection();

        $sql = 'SELECT * FROM product_types';

        $result = $db->prepare($sql);
        $result->execute();

        return $result->fetchAll();
    }

        //get data from product_types table where
        public static function getProductTypeByName($type_name)
        {
            $db = Database::getConnection();
    
            $sql = 'SELECT * FROM product_types WHERE type_name=:type_name';
    
            $result = $db->prepare($sql);
            $result->bindParam(':type_name', $type_name, PDO::PARAM_STR);
            $result->execute();
    
            return $result->fetch();

        }

    //check size variable type and length
    public static function checkSize($size)
    {
        if (filter_var($size, FILTER_VALIDATE_INT)) {
            if (strlen($size) > 0) {
                return true;
            }
        }
        return false;
    }

    //check weight variable type and length
    public static function checkWeight($weight)
    {
        if (filter_var($weight, FILTER_VALIDATE_FLOAT)) {
            if (strlen($weight) > 0) {
                return true;
            }
        }
        return false;
    }

    //check object measurement(height, width, length) for dimensions
    public static function checkDimension($objectMeasurement)
    {
        if (filter_var($objectMeasurement, FILTER_VALIDATE_INT)) {
            if (strlen($objectMeasurement) > 0) {
                return true;
            }
        }
        return false;
    }
}
