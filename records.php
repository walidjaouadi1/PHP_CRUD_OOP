<?php
include 'model.php';
$Title = "Records";
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
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Mobile</td>
                            <td>Address</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $model = new model();
                        $rows = $model->getRecords();
                        if (!empty($rows)) {
                            foreach ($rows as $row) {
                        ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['mobile']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td>
                                        <a href="read.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Read</a>
                                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "There Is No Data";
                        }
                        ?>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php
include 'templates/footer.php'
?>