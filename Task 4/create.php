<?php
$data = new DOMDocument();
$data->load('products.xml');
$products = $data->getElementsByTagName('products')->item(0);
$product=$products->getElementsByTagName('product');
$len = $product->length;
$id=$product[$len-1]->getElementsByTagName('id')->item(0)->nodeValue+1;
if(isset($_POST['addsub'])){
    $name = $_POST['nm'];
    $price = $_POST['pr'];
    $description = $_POST['des'];
    $cur = $data->createElement('product');
    $node_id = $data->createElement('id',$id);
    $cur->appendChild($node_id);
    $n_name = $data->createElement('name',$name);
    $cur->appendChild($n_name);
    $npc = $data->createElement('price',$price);
    $cur->appendChild($npc);
    $node_description = $data->createElement('description',$description);
    $cur->appendChild($node_description);
    $products->appendChild($cur);
    $data->formatOutput=true;
    $data->save('products.xml')or die('Error');
    header ('Location:index.php?id='.$id);
}
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
    </style>
</head>
<body>
<?php
require_once('nav.php');
?>
<h1>Добавить товар</h1>
<form method="POST">
    <p>Введите название: <input type="text" name="nm" required></input></p>
    <p>Введите цену: <input type="number" name="pr" required></input></p>
    <p>Введите Описание: <input type="text" name="des" required></input></p>
    <button name="addsub" class="btn btn-success" type="submit">Отправить</button>
</form>
</body>
</html>