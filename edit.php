<?php
include 'model.php';
$Title = "Edit";
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

                $row = $model->edit($id);
                // update
                if (isset($_POST['update'])) {
                    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])) {
                        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address'])) {
                            $data['id'] = $id;
                            $data['name'] = $_POST['name'];
                            $data['email'] = $_POST['email'];
                            $data['mobile'] = $_POST['mobile'];
                            $data['address'] = $_POST['address'];

                            $update = $model->update($data);
                            if ($update) {
                                echo "<script>alert('Record Updated !')</script>";
                                echo "<script>window.location.href = 'records.php';</script>";
                            } else {
                                echo "<script>alert('Record Update Failed !')</script>";
                                echo "<script>window.location.href = 'records.php';</script>";
                            }
                        } else {
                            echo "<script>alert('Empty Data !')</script>";
                            header("location: edit.php?id=$id");
                        }
                    }
                }

            ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" name="mobile" class="form-control" value="<?php echo $row['mobile']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="" cols="" rows="3" class="form-control"><?php echo $row['address']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="update" class="btn btn-primary">update</button>
                    </div>
                </form>
            <?php
            } else {
                echo "Please Select Record To Edit !";
            }

            ?>
        </div>
    </div>
</div>


<?php
include 'templates/footer.php'
?>