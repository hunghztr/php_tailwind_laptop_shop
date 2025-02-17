
    <?php
    require_once '../../model/CoSoDuLieu.php';
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
            $db = new CoSoDuLieu();

            $row = mysqli_fetch_assoc($db->query("select * from nguoi_dung where email = '$email'"));
            $db->NgatKetNoi();
            if ($row) {
                header("Location: ../../view/client/register.php?value=Email đã tồn tại");
                exit();
            }
            if ($password != $confirm_password) {
                header("Location: ../../view/client/register.php?value=Mật khẩu không khớp");
                exit();
            }
            $sql = "insert into nguoi_dung (vai_tro, ho_ten, email, mat_khau, dia_chi) values ('USER','$name', '$email', '$password', '$address')";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                header("Location: ../../view/client/login.php?value=Đăng kí thành công");
                exit();
            }
        }
    }
    ?>

