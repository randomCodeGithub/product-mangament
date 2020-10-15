<?php $router = new Router();
//if uri is addProduct
$productAdd = $router->getURI() == 'addProduct';

//dynamic title 
switch ($router->getURI()):
    case '':
        $title = 'Product list';
        break;
    case 'addProduct':
        $title = 'Add product';
        break;
endswitch;
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo BASE_ROOT ?>/dist/css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo $title ?></title>
</head>

<!-- Get navigation file -->
<?php require_once(VIEW_ROOT . '/templates/navigation.php');  ?>
<body>