<!DOCTYPE html>
<html lang="en">

<head>
    <title>See products</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-sm">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <h3 class="m-1">Product List</h3>
            </li>
        </ul>
            <div class="btn-group">
                <select id="type" class="text-dark btn btn-light border-secondary" form="form" name="option" required="required">
                    <option value="" selected>Select option</option>
                    <option value="mass delete">Mass delete</option>
                <input type="submit" form="form" class="btn btn-primary" value="Apply">
                <a class="btn btn-primary" href="add.php" role="button">Add new</a>
            </div>
    </nav>
</header>
<form id="form" action="edit.php" method="post">
    <div class="d-flex flex-wrap">

    </div>
</form>
</body>
</html>