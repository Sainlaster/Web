<?php
$data = new DOMDocument();
$data->load('products.xml');
$products = $data->getElementsByTagName('products')->item(0);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>L4</title>
    <style>
        body{
            font-family:Arial;
        }
        .price{
            font-family:Lucida Console;
        }
        .desription{
            font-family:Lucida Console;
            font-style:italic;
        }
        </style>
</head>
<body>
    <?php
    require_once('nav.php');
    if(isset($_GET['id'])){
    $id_param = $_GET['id'];
    echo "Товар номер: ".$id_param."<br>";
    echo "Название: <h1>".$products->getElementsByTagName('product')->item($id_param)->getElementsByTagName('name')->item(0)->nodeValue."</h1>";
    echo "Цена(bitcoin) :<p class='price'>".$products->getElementsByTagName('product')->item($id_param)->getElementsByTagName('price')->item(0)->nodeValue."</p><br>";
    echo "Описание :<p class='desription'>".$products->getElementsByTagName('product')->item($id_param)->getElementsByTagName('description')->item(0)->nodeValue."</p><br>";
    }
    else{
        header ('Location:list.php');
    }
    ?>
</body>
</hrml>
