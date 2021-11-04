<?php
require_once './Model/Product.php';
require_once './Model/Database.php';

class ProductController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function deleteProducts()
    {
        if(array_key_exists('checkbox', $_POST)) {
            $rowCount = count($_POST['checkbox']);

            for ($i = 0; $i < $rowCount; $i++) {
                mysqli_query($this->db->getConnection(),"DELETE FROM product WHERE Sku='".$_POST["checkbox"][$i]."'");
            }
        }

        header('location: index.php');
    }

    public function addProduct()
    {
        $product = new $_POST['type']();
        $product->setData($_POST);

        if ($product->saveToDatabase($this->db->getConnection())) {
            header('Location: index.php');
        } else {
            echo '<div class="error">Product with this SKU already exist!</div>';
        }
    }

    public function printProducts($bookController, $dvdController, $furnitureController)
    {
        foreach ($bookController->getBooks() as $book) {
            echo '
            <div class="product">
                <input type="checkbox" class="delete-checkbox" name="checkbox[]" value="'.$book->getSku().'" form="delete_form">
                <p>'.$book->getSku().'</p>
                <p>'.$book->getName().'</p>
                <p>'.number_format($book->getPrice(), 2, '.', '').' $</p>
                <p>Weight: '.$book->getWeight().'KG</p>
            </div>';
        }

        foreach ($dvdController->getDvds() as $dvd) {
            echo '
            <div class="product">
                <input type="checkbox" class="delete-checkbox" name="checkbox[]" value="'.$dvd->getSku().'" form="delete_form">
                <p>'.$dvd->getSku().'</p>
                <p>'.$dvd->getName().'</p>
                <p>'.number_format($dvd->getPrice(), 2, '.', '').' $</p>
                <p>Size: '.$dvd->getSize().' MB</p>
            </div>';
        }

        foreach ($furnitureController->getFurniture() as $furniture) {
            echo '
             <div class="product">
                <input type="checkbox" class="delete-checkbox" name="checkbox[]" value="'.$furniture->getSku().'" form="delete_form">
                <p>'.$furniture->getSku().'</p>
                <p>'.$furniture->getName().'</p>
                <p>'.number_format($furniture->getPrice(), 2, '.', '').' $</p>
                <p>Dimension: '.$furniture->getHeight().'x'.$furniture->getWidth().'x'.$furniture->getLength().'</p>
            </div>';
        }
    }
}