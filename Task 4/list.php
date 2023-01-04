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
        table {
        font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
        font-size: 14px;
        border-radius: 10px;
        border-spacing: 0;
        text-align: center;
        }
        th {
        background: #BCEBDD;
        color: white;
        text-shadow: 0 1px 1px #2D2020;
        padding: 10px 20px;
        }
        th, td {
        border-style: solid;
        border-width: 0 1px 1px 0;
        border-color: white;
        }
        th:first-child, td:first-child {
        text-align: left;
        }
        th:first-child {
        border-top-left-radius: 10px;
        }
        th:last-child {
        border-top-right-radius: 10px;
        border-right: none;
        }
        td {
        padding: 10px 20px;
        background: #F8E391;
        }
        tr:last-child td:first-child {
        border-radius: 0 0 0 10px;
        }
        tr:last-child td:last-child {
        border-radius: 0 0 10px 0;
        }
        tr td:last-child {
        border-right: none;
        }
        </style>
</head>
<body>
<?php
require_once('nav.php');
?>
<table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Имя</th>
                    <th>Цена(bitcoin)</th>
                    <th>Описание</th>
                </tr>
                </thead>
                <tbody>
    <?php
    $id=0;
    while(is_object($products->getElementsByTagName('product')->item($id))){
        ?>
        <tr>
        <td><?php echo $id?></td>
        <td><a href="index.php?id=<?php echo $id?>"><?php echo $products->getElementsByTagName('product')->item($id)->getElementsByTagName('name')->item(0)->nodeValue?></a></td>
        <td><?php echo $products->getElementsByTagName('product')->item($id)->getElementsByTagName('price')->item(0)->nodeValue?></td>
        <td><?php echo $products->getElementsByTagName('product')->item($id)->getElementsByTagName('description')->item(0)->nodeValue?></td></tr>
        <?php
        $id+=1;    
        }
    ?>

</body>
</html>