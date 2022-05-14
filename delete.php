<?php
include 'model.php';
$model = new model();
$id = $_REQUEST['id'];
$delete = $model->delete($id);

if ($delete) {
    echo "<script>alert('Delete Successfuly !')</script>";
    echo "<script>window.location.href = 'records.php';</script>";
}
