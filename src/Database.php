<?php
require_once 'Product.php';
require_once 'DVD.php';
require_once 'Furniture.php';
require_once 'Book.php';
require_once 'Type.php';

class Database
{
    private $servername = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'scandiweb';
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->servername, $this->user, $this->password, $this->dbname);
        if ($this->connection->connect_errno)
        {
            echo "Failed to connect to database: " . $this->connection->connect_error;
            exit();
        }
    }

    public function getConnection(): mysqli
    {
        return $this->connection;
    }

    public function deleteProducts()
    {
        if(array_key_exists('checkbox', $_POST))
        {
            $rowCount = count($_POST['checkbox']);

            for($i = 0; $i < $rowCount; $i++)
            {
                mysqli_query($this->getConnection(),"DELETE FROM product WHERE Sku='".$_POST["checkbox"][$i]."'");
            }
        }

        header('location: index.php');
    }

    public function addProduct()
    {
        $product = new $_POST['type']();
        $product->setData($_POST);
        $product->saveToDatabase($this->getConnection());
        header("Location: index.php");
        exit;
    }

    public function getBooks(): array
    {
        $booksArray = [];
        $result = mysqli_query($this->getConnection(), "SELECT * FROM product WHERE Type = 'Book'");

        while($row = $result->fetch_assoc())
        {
            $book = new Book();
            $book->setData($row);
            array_push($booksArray, $book);
        }

        return $booksArray;
    }

    public function getDvds(): array
    {
        $dvdArray = [];
        $result = mysqli_query($this->getConnection(), "SELECT * FROM product WHERE Type = 'DVD'");

        while($row = $result->fetch_assoc())
        {
            $dvd = new DVD();
            $dvd->setData($row);
            array_push($dvdArray, $dvd);
        }

        return $dvdArray;
    }
    
    public function getFurniture(): array
    {
        $furnitureArray = [];
        $result = mysqli_query($this->getConnection(), "SELECT * FROM product WHERE Type = 'Furniture'");

        while($row = $result->fetch_assoc())
        {
            $furniture = new Furniture();
            $furniture->setData($row);
            array_push($furnitureArray, $furniture);
        }

        return $furnitureArray;
    }

    public function printProducts()
    {
        foreach ($this->getBooks() as $book)
        {
            echo '
            <div class="product">
                <input type="checkbox" class="delete-checkbox" name="checkbox[]" value="'.$book->getSku().'" form="delete_form">
                <h1 class="text-center">'.$book->getType().'</h1>
                <p>SKU: '.$book->getSku().'<br>
                Name: '.$book->getName().'<br>
                Price: '.number_format($book->getPrice(), 2, '.', '').' $<br>
                Weight: '.$book->getWeight().'KG</p>
            </div>';
        }

        foreach ($this->getDvds() as $dvd)
        {
            echo '
            <div class="product">
                <input type="checkbox" class="delete-checkbox" name="checkbox[]" value="'.$dvd->getSku().'" form="delete_form">
                <h1 class="text-center">'.$dvd->getType().'</h1>
                <p>SKU: '.$dvd->getSku().'<br>
                Name: '.$dvd->getName().'<br>
                Price: '.number_format($dvd->getPrice(), 2, '.', '').' $<br>
                Size: '.$dvd->getSize().' MB</p>
            </div>';
        }

        foreach ($this->getFurniture() as $furniture)
        {
            echo '
             <div class="product">
                <input type="checkbox" class="delete-checkbox" name="checkbox[]" value="'.$furniture->getSku().'" form="delete_form">
                <h1 class="text-center">'.$furniture->getType().'</h1>
                <p>SKU: '.$furniture->getSku().'<br>
                Name: '.$furniture->getName().'<br>
                Price: '.number_format($furniture->getPrice(), 2, '.', '').' $<br>
                Dimension: '.$furniture->getHeight().'x'.$furniture->getWidth().'x'.$furniture->getLength().'</p>
            </div>';
        }
    }

    public function getTypes(): array
    {
        $typeArray = [];
        $result = mysqli_query($this->getConnection(), "SELECT * FROM product_type");

        while($row = $result->fetch_assoc())
        {
            $type = new Type();
            $type->setName($row['Name']);
            array_push($typeArray, $type);
        }

        return $typeArray;
    }

    public function displayTypes()
    {
        foreach ($this->getTypes() as $type)
        {
            echo '<option value='.$type->getName().' name='.$type->getName().'>'.$type->getName().'</option>';
        }
    }
}