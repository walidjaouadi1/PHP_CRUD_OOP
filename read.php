<?php
include 'model.php';
$Title = "Read";
include 'templates/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">PHP OOP CRUD</h1>
            <hr style="height: 1px;color:black;background-color:black">
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <?php
            $model = new model();
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $row = $model->getOneRecord($id);
                if (!empty($row)) {
            ?>
                    <div class="card">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <p>Name: <?php echo $row['name']; ?></p>
                            <p>Email: <?php echo $row['email']; ?></p>
                            <p>Mobile: <?php echo $row['mobile']; ?></p>
                            <p>Adress: <?php echo $row['address']; ?></p>
                        </div>
                    </div>
            <?php } else {
                    echo "There Is Nod Data";
                }
            } else {
                echo "Please Select Record To Read !";
            }
            ?>
        </div>
    </div>
</div>

<?php
include 'templates/footer.php'
?>