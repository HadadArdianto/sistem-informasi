<?php
if (isset($_POST["register"])) {
    $errors = array();
    $username = $_POST["username"];
    $password = $_POST["password"];
    validate('required', $username, $errors);
    validate('min', $username, $errors);
    validate('required', $password, $errors);
    validate('password', $password, $errors);
    if (!empty($errors)) {
        $error = $errors;
    } else {
        register($username, $password, $msg);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        <?= $data['title'] ?>
    </title>
    <link rel="stylesheet" href="assets/css/main/app.css" />
    <link rel="stylesheet" href="assets/css/pages/auth.css" />
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png" />
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5">
                        Input your data to register to our website.
                    </p>

                    <form action="" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="username" class="form-control form-control-xl"
                                placeholder="Username" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            <?php
                            if (isset($error)) {
                                ?>
                                <small class="text-danger fs-6">
                                    <?= $error['required'] ?>
                                    <?= $error['min'] ?>
                                </small>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl"
                                placeholder="Password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <?php
                            if (isset($error)) {
                                ?>
                                <small class="text-danger fs-6">
                                    <?= $error['required'] ?>
                                    <?= $error['password'] ?>
                                </small>
                                <?php
                            }
                            ?>
                        </div>
                        <button type="submit" name="register" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">
                            Sign Up
                        </button>
                    </form>
                    <div class="text-center mt-4 text-lg fs-6">
                        <p class="text-gray-600">
                            Already have an account?
                            <a href="login" class="font-bold">Log in</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
</body>

</html>