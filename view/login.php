<?php
if (isset($_POST['signin'])) {
    $errors = array();
    $username = $_POST['username'];
    $password = $_POST['password'];
    validate('required', $username, $errors);
    validate('min', $username, $errors);
    validate('required', $password, $errors);
    validate('password', $password, $errors);
    if (!empty($errors)) {
        $error = $errors;
    } else {
        login($username, $password, $failedmsg);
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
    <link rel="shortcut icon" href="<?php add_img("logo/favicon.svg") ?>" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php add_img("logo/favicon.png") ?>" type="image/png" />
    <link rel="stylesheet" href="assets/extensions/toastify-js/src/toastify.css">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <?php
                    if (isset($failedmsg)) {
                        ?>
                        <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-circle"></i>
                            <?= $failedmsg ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($_GET['msg'])) {
                        ?>
                        <div class="alert alert-success alert-dismissible show fade">
                            <?= $_GET['msg'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }
                    ?>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-4 fs-6">
                        Log in with your data that you entered during registration.
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

                        <button type="submit" name="signin" class="btn btn-primary btn-block btn-lg shadow-lg mt-4">
                            Log in
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/extensions/toastify-js/src/toastify.js"></script>
    <script src="assets/js/pages/toastify.js"></script>
</body>

</html>