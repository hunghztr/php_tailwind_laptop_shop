
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset(
            $_POST['email'],
            $_POST['password'],
            $_POST['confirm_password'],
            $_POST['name'],
            $_POST['address']
        )) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $connect = mysqli_connect("localhost", "root", "141512", "laptop_shop");
            if (!$connect) {
                die("Error in connection" . mysqli_connect_error());
                exit();
            }
            $message = "";
            $row = mysqli_fetch_assoc(mysqli_query($connect, "select * from nguoi_dung where email = '$email'"));
            if ($row) {
                $message = "Email đã tồn tại";
                header("Location: ../register.php?value=" . urlencode($message));
                exit();
            }
            if ($password != $confirm_password) {
                $message = "Mật khẩu không khớp";
                header("Location: ../view/register.php?value=" . urlencode($message));
                exit();
            }
            $sql = "insert into nguoi_dung (vai_tro, ho_ten, email, mat_khau, dia_chi) values ('USER','$name', '$email', '$password', '$address')";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                header("Location: ../view/login.php");
                exit();
            }
        }
    }
    ?>

