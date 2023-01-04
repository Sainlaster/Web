<?php
$data = new DOMDocument();
$data->load('products.xml');
$products = $data->getElementsByTagName('products')->item(0);
$len=$products->getElementsByTagName('product')->length;
if(isset($_POST['delete_subm'])){
$idn=$_POST['ident'];
    if($idn<=$len&&$idn>=0){
        $i=0;
        while (is_object($products->getElementsByTagName('product')->item($i))){
        $cur_id=$products->getElementsByTagName('product')->item($i)->getElementsByTagName('id')->item(0)->nodeValue;
            if($cur_id===$idn){
                $products->removeChild($products->getElementsByTagName('product')->item($i));
                break;
            }
        $i++;
        }
    $data->formatOutput=true;
    $data->save('products.xml')or die('Error');
    header('location: list.php');
    } 
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
<h1>Удалить товар</h1>
<form method="POST">
    <p>Введите номер элемента(id): <input type="number" name="ident" required></input></p>
    <button name="delete_subm" class="btn btn-success" type="submit">Отправить</button>
</form>
</body>
</html>