<?php

class ProductListController
{
    public function actionIndex()
    {
        //get all products from db 
        $products = Product::getProducts();

        // include productList.php file
        require_once('./views/productList.php');
        return true;
    }

    public function actionDelete()
    {
        $result = null;

        //check if button with name 'apply' is clicked
        if (isset($_POST['apply'])) {

            //product checkbox
            $checked = $_POST['nums'];
            //select 
            $deleteType = $_POST['delete-type'];

            //check select type value
            switch ($deleteType) {
                case 'checkbox':

                    //if even one product checkbox active
                    if (isset($_POST['nums'])) {

                        //check all active checkbox
                        foreach ($checked as $check) {

                            //delete all products where checkbox value is product id
                            $result = Product::deleteById($check);
                        }
                    }
                    break;
                case 'all':

                    //delete all products
                    $result = Product::deleteAll();
                    break;
            }
        }
        //redirect to home
        header("Location: " . HOME_ROOT);
        return true;
    }
}
