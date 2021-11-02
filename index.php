<?php
    require_once 'Model/Database.php';
    require_once 'Controller/BookController.php';
    require_once 'Controller/DvdController.php';
    require_once 'Controller/FurnitureController.php';
    require_once 'Controller/ProductController.php';

    $db = new Database();
    $bookController = new BookController($db);
    $dvdController = new DvdController($db);
    $furnitureController = new FurnitureController($db);
    $productController = new ProductController($db);

    if(isset($_POST['delete_btn']))
    {
        $productController->deleteProducts();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/switcher.js"></script>
    <title>Product list</title>
</head>
<body>
<!--Header-->
<nav class="navbar">
    <div class="navbar-brand">Product List</div>
    <div class="buttons">
        <a href="add_product.php"><div class="btn btn-success">ADD</div></a>
        <form action="index.php" id="delete_form" method="POST">
            <button class="btn btn-danger" type="submit" name="delete_btn">MASS DELETE</button>
        </form>
    </div>
</nav>
<!--Header end-->

<!--Content-->
<div class="products row">
    <?php
        $productController->printProducts($bookController, $dvdController, $furnitureController);
    ?>
</div>
<!--Content end-->

<!--Footer-->
<footer class="footer fixed-bottom">
    <p>Scandiweb Test assignment</p>
</footer>
<!--Footer end-->
</body>
</html>