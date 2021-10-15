<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product add</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/add_product.js"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-sm">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <h3 class="m-1">Product Add</h3>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item mx-1">
                <input type="submit" form="form" class="btn btn-primary" value="Save">
            </li>
            <li class="nav-item mx-1">
                <a class="btn btn-primary" href="index.php">Cancel</a>
            </li>
        </ul>
    </nav>
</header>
<form id="form" action="upload.php" onsubmit="return validate('form')" method="post">
    <div class="table-responsive table-borderless">
        <table class="table"><tbody>
            <tr><td><label for="sku">SKU:</label></td>
            <td><input id="sku" name="sku" class="mx-2" type="text" required="required" maxlength="9"></td></tr>
            <tr><td><label for="name">Name:</label></td>
            <td><input id="name" name="name" class="mx-2" type="text" required="required" maxlength="40"></td></tr>
            <tr><td><label for="price">Price:</label></td>
            <td><input id="price" name="price" class="mx-2" type="number" step="0.01" required="required" maxlength="9"></td></tr>
        </tbody></table>
    </div>

    <label for="type">Type switcher:</label>
    <select id="type" class="text-primary btn btn-light" oninput="update_form(value);" name="type" required="required">
        <option value="" selected>Select type</option>
    </select>

</form>
</body>
</html>