<?php

class model
{
    private $server = "localhost";
    private $username = "root";
    private $password;
    private $db = "php_crud";
    private $con;

    public function __construct()
    {
        try {
            $this->con = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "Connection Failed" . $e->getMessage();
        }
    }
    // Page Title Function
    public function title($title)
    {
        if ($title === "") {
            echo "Default";
        } else {
            echo $title;
        }
    }
    // Insert Records
    public function insert()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])) {
                if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $mobile = $_POST['mobile'];
                    $address = $_POST['address'];
                    $query = "INSERT INTO records (name, email, mobile, address) VALUES ('$name','$email','$mobile','$address')";
                    if ($sql = $this->con->query($query)) {
                        echo "<script>alert('Data Added !')</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    } else {
                        echo "<script>alert('Add Data Failed ! ')</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    }
                } else {
                    echo "<script>alert('Empty Data !')</script>";
                }
            }
        }
    }
    // get all records
    public function getRecords()
    {
        $records = null;
        $query = "SELECT * FROM records";
        $sql = $this->con->query($query);
        if ($sql) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $records[] = $row;
            }
        }
        return $records;
    }
    // Get Single record (Read)
    public function getOneRecord($id)
    {
        $data = null;
        $query = "SELECT * FROM records WHERE id = '$id'";

        if ($sql =  $this->con->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }
    // Delete
    public function delete($id)
    {
        $query = "DELETE  FROM records WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql) {
            return true;
        } else {
            return false;
        }
    }
    // edit Function
    public function edit($id)
    {
        $data = null;
        $query = "SELECT * FROM records WHERE id = '$id' ";
        $sql = $this->con->query($query);
        if ($sql) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }
    // update function
    public function update($data)
    {
        $query = "UPDATE records SET name='$data[name]',email='$data[email]',mobile='$data[mobile]',address='$data[address]' WHERE id='$data[id]' ";
        $sql = $this->con->query($query);
        if ($sql) {
            return true;
        } else {
            return false;
        }
    }
}
