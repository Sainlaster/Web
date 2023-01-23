<?php
$sql_brand= "SELECT * FROM brands";
$q_brand = mysqli_query($connect, $sql_brand);
if(isset($_POST['sbm'])){
    $name = $_POST['prd_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $descr = $_POST['descr'];
    $br_id = $_POST['br_id'];
    $sql ="INSERT INTO products (prd_name, image, price, quantity, descr, br_id ) VALUES('$name', $price, $quantity, '$descr', $br_id)";
    $query = mysqli_query($connect, $sql);
    header('location: index.php?page_layout=list');
}
?>
<div class="main-fuild">
    <div class="c">
        <div class="c-header">
            <h2>Меню добавления</h2>
        </div>
        <div class="c-body">
            <from method="POST" enctype="multipart/f-data">
                <div class="f-group">
                    <label for="">Введите название товара</label>
                    <input type="text" name="prd_name" class="f-control" required>
                </div>
                <div class="f-group">
                    <label for="">Введите цену товара </label>
                    <input type="number" name="price" class="f-control" required>
                </div>
                <div class="f-group">
                    <label for="">Количество товара</label>
                    <input type="number" name="quantity" class="f-control" required>
                </div>
                <div class="f-group">
                    <label for="">Описание товара</label>
                    <input type="text" name="descr" class="f-control" required>
                </div>
                <div class="f-group">
                    <label for="">Категория</label>
                    <select class="f-control" name="br_id" >
                        <?php
                        while($row_brand = mysqli_fetch_assoc($q_brand)){?>
                            <option value = "<?php echo $row_brand['br_id'] ?>"><?php echo $row_brand['brand_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button name="sbm" class="btn btn-success" type="submit">Добавить</button>
            </from>
        </div>
    </div>
</div>
