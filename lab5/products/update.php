<style>
    body{
        background: #FFFFFF;
    }
    .container-fuild{
        position: relative;
        left: 800px;
        font-size: 20px;
        color: black;
        font-family: "Comic Sans MS";
    }
    #button{
        border: solid black;
        border-radius: 10px;
        font-size: 30px;
        font-family: "Comic Sans MS";
        color: black;
        background: gray;
    }
</style>
<?php
$id=$_GET['id'];
$sql_brand= "SELECT * FROM brands";
$q_barnd = mysqli_query($connect, $sql_brand);

$sql_up = "SELECT * FROM products where prd_id = $id";
$query_up=mysqli_query($connect,$sql_up);
$row_up=mysqli_fetch_assoc($query_up);

if(isset($_POST['sbm'])){
    $prd_name = $_POST['prd_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $descr = $_POST['descr'];
    $br_id = $_POST['br_id'];
    $sql ="UPDATE products SET prd_name='$prd_name',
                    image='$image',
                    price=$price,
                    quantity=$quantity,
                    descr='$descr',
                    br_id= $br_id WHERE prd_id=$id";
    $query = mysqli_query($connect, $sql);
    header('location: index.php?page_layout=list');
}
?>

<div class="container-fuild">
    <div class="card">
        <div class="card-header">
            <h2>Меню изменения товара</h2>
        </div>
        <div class="card-body">
            <from method="POST" enctype="multipart/f-data">
                <div class="f-group">
                    <label for="">Введите новое название товара</label>
                    <input type="text" name="prd_name" class="f-control" required value="<?php echo $row_up['prd_name']; ?>">
                </div>
                <div class="f-group">
                    <label for="">Введите новую цену товара</label>
                    <input type="number" name="price" class="f-control" required value="<?php echo $row_up['price']; ?>">
                </div>
                <div class="f-group">
                    <label for="">Введите новое количество товара</label>
                    <input type="number" name="quantity" class="f-control" required value="<?php echo $row_up['quantity']; ?>">
                </div>
                <div class="f-group">
                    <label for="">Введите новое описание товара</label>
                    <input type="text" name="descr" class="f-control" required value="<?php echo $row_up['descr']; ?>">
                </div>
                <div class="f-group">
                    <label for="">Категория</label>
                    <select class="f-control" name="br_id" >
                        <?php
                        while($row_brand = mysqli_fetch_assoc($q_barnd)){?>
                            <option value = "<?php echo $row_brand['br_id'] ?>"><?php echo $row_brand['brand_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button name="sbm" class="btn btn-success" type="submit">Обновить</button>
            </from>
        </div>
    </div>
</div>