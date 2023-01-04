<?php
$data = new DOMDocument();
$data->load('products.xml');
$products = $data->getElementsByTagName('products')->item(0);
$product=$products->getElementsByTagName('product');
$len = $product->length;
if(isset($_POST['change_sub'])){
    $id=$_POST['ident'];
    if($id<=$len&&$id>=0){
        $i=0;
        while (is_object($products->getElementsByTagName('product')->item($i))){
            $cur_id=$products->getElementsByTagName('product')->item($i)->getElementsByTagName('id')->item(0)->nodeValue;
        if($cur_id===$id){
            $products->getElementsByTagName('product')->item($i)->getElementsByTagName('name')->item(0)->nodeValue=$_POST['nm'];
            $products->getElementsByTagName('product')->item($i)->getElementsByTagName('price')->item(0)->nodeValue=$_POST['pr'];
            $products->getElementsByTagName('product')->item($i)->getElementsByTagName('description')->item(0)->nodeValue=$_POST['des'];
        }
        $i++;
        }
    }
    $data->formatOutput=true;
    $data->save('products.xml')or die('Error');
    header('location: list.php');
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
        
        </style>
</head>
<body>
<?php
require_once('nav.php');
?>
<h1>Изменить товар</h1>
<form method="POST">
    <p>Введите номер элемента(id): <input type="number" name="ident" required></input></p>
    <p>Введите новое название: <input type="text" name="nm" required></input></p>
    <p>Введите новую цену: <input type="number" name="pr" required></input></p>
    <p>Введите новое описание: <input type="text" name="des" required></input></p>
    <button name="change_sub" class="btn btn-success" type="submit">Отправить</button>
</form>
</body>
</html>