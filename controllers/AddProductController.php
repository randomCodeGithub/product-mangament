<?php

class AddProductController
{
    public function actionIndex()
    {
        //get product types
        $productTypes = ProductType::getProductTypes();
        //redirection to add product page
        require_once('./views/addProduct.php');

        //destroy session with name 'errors'
        unset($_SESSION['errors']);
        return true;
    }

    public function actionAdd()
    {
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $selectType = $_POST['select-type'];
        // dvd      
        $size = $_POST['size'];
        //book
        $weight = $_POST['weight'];
        //Furniture
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];

        //HxWxL format
        $dimensions = $height . 'x' . $width . 'x' . $length;

        // error messages variable
        $errors = null;

        //if button with name 'submit' is clicked
        if (isset($_POST['submit'])) {

            if (!Product::checkSku($sku))  $errors[] = 'SKU is shorter than 14 symbols !';
            if (Product::checkSkuExists($sku))  $errors[] = 'Current SKU exist!';
            if (!Product::checkName($name)) $errors[] = 'NAME is shorter than 3 symbols !';
            if (!Product::checkPrice($price)) $errors[] = 'Price is empty OR it`s not a number !';

            //check select value
            switch ($selectType) {

                case 'dvd-disc':
                    $weight = $dimensions = null;
                    if (!ProductType::checkSize($size)) $errors[] = 'SIZE is empty OR it`s not a number !';
                    break;

                case 'book':
                    $size = $dimensions = null;
                    if (!ProductType::checkWeight($weight)) $errors[] = 'WEIGHT is empty OR it`s not a number !';
                    break;

                case 'furniture':
                    $size = $weight = null;
                    if (!ProductType::checkDimension($height)) $errors[] = 'HEIGHT is empty OR not NUMBER !';
                    if (!ProductType::checkDimension($width)) $errors[] = 'WIDTH is empty OR not NUMBER !';
                    if (!ProductType::checkDimension($length)) $errors[] = 'LENGTH is empty OR not NUMBER !';
                    break;

                    //if the value does not match with the existing ones
                default:
                    $errors[] = 'PRODUCT TYPE not selected!';
            }

            if ($errors == null) {
                $type = ProductType::getProductTypeByName(ucfirst($selectType));
                Product::add($sku, $name, $price, $type['id'], $size, $weight, $dimensions);
            } else {

                //create session with error array
                $_SESSION['errors'] = $errors;
            }
        }

        // //redirection to add product page
        header("Location: " . HOME_ROOT . "/addProduct/");

        return true;
    }
}
