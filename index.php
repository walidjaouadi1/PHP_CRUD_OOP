<?php
include 'model.php';
$Title = "HomePage";
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
            $insert = $model->insert();
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="" cols="" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'templates/footer.php'
?>