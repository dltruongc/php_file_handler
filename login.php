<?php
    include 'config.php';

    $usr = $_POST['username'];
    $pwd = $_POST['password'];
    $isRemember = $_POST['remember'];
    $saved_usr = '';
    $saved_pwd = '';

    if (isset($_COOKIE['username'])) {
        $saved_usr = $_COOKIE['username'];
    }
    if (isset($_COOKIE['password'])) {
        $saved_pwd = $_COOKIE['password'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = '';
        if (!isset($usr)) {
            $error = $error . "Username missing!";
        }
        if (!isset($pwd)) {
            $error = $error . " Password missing!";
        }

        if (empty($error)) {
            if ($usr == 'le_yen_linh' && $pwd == 'lab7') {
                $_SESSION['logged_in'] = 'le_yen_linh';
                header('Location: ' . 'home.php');

                if (isset($isRemember) && $isRemember == 'on') {
                    // 86400 * 1 == 1 days
                    setcookie('username', $usr, time() + (86400 * 1), "/");
                    setcookie('password', $pwd, time() + (86400 * 1), "/");
                }
            } else {
                $error = 'Invalid username or password!';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h3 class="text-center text-secondary mt-5 mb-3">User Login</h3>
            <form method='post' class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" value="<?= $saved_usr ?>" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" value="<?= $saved_pwd ?>" class="form-control" placeholder="Password">
                </div>
                <div class="form-group custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                    <label class="custom-control-label" for="remember">Remember login</label>
                </div>
                <div class="form-group">
                    <?php if (!empty($error)) { ?>
                        <div class="alert alert-danger"><?= $error ?></div>        
                    <?php } ?>
                    <button class="btn btn-success px-5">Login</button>
                </div>
                <div class="form-group">
                    <p>Forgot password? <a href="#">Click here</a></p>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>
