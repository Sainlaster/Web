<style>
    body{
        background: #while;
        position: relative;
        left: 100px;
    }
    th{
        padding-right: 200px;
    }
    .container-fuild{
        font-size: 25px;
        font-family: "Comic Sans MS";
        color: black;

    }
    th{
        border: solid  black;
        color:black;
    }
    td{
        border: solid  black;
    }
    a .btn btn-primary{
        border: solid  black;
    }
</style>
<?php$sql="SELECT * FROM products inner join brands on products.brand_id = brands.brand_id";$query=mysqli_query($connect,$sql);?>
<div class="container-fuild">
    <div class="card">
        <div class="card-header">
            <h2>Список товаров</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Фото</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Описание</th>
                    <th>Категория</th>
                    <th>Изменить</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                while($row = mysqli_fetch_assoc($query)){?>
                <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo $row['prd_name']?></td>                    
                    <td><?php echo $row['price']?></td>
                    <td><?php echo $row['quantity']?></td>
                    <td><?php echo $row['descr']?></td>
                    <td><?php echo $row['brand_name']?></td>
                    <td><a href="index.php?page_layout=update&id=<?php echo $row['prd_id']; ?>"> Edit</a></td>
                    <td><a onclick="return Del('<?php echo $row['prd_name'];?>')"  href= "index.php?page_layout=delete&id=<?php echo $row['prd_id']; ?>" >Delete</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <a class="btn btn-primary" href="index.php?page_layout=create">Добавить</a>
        </div>
    </div>
</div>