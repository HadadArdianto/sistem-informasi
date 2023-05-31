<?php
date_default_timezone_set("Asia/Bangkok");

function validate($field, $value, &$errors)
{
    switch ($field) {
        case 'required':
            if (strlen($value) < 1) {
                $errors[$field] = "This field is required";
            }
            break;
        case 'min':
            if (strlen($value) < 4) {
                $errors[$field] = "The length min 3 character";
            }
            break;

        case 'password':
            if (strlen($value) < 8 || !preg_match('/[A-Z]/', $value) || !preg_match('/[a-z]/', $value) || !preg_match('/[0-9]/', $value) || !preg_match('/[\W]/', $value)) {
                $errors[$field] = "Password must be at least 8 character include (A,a,9,#)";
            }
            break;
        case 'email':
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $errors[$field] = "Invalid email address";
            }
            break;

    }
}
function add_img($img)
{
    echo "https://localhost/web-apk/assets/images/" . $img;
}
function secure_input($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
function db_connect()
{
    $db['db_host'] = "localhost";
    $db['db_user'] = "root";
    $db['db_pass'] = "";
    $db['db_name'] = "pengelolaan_kas";

    foreach ($db as $key => $value) {
        define(strtoupper($key), $value);
    }

    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$connect) {
        die("Failed to connect to MySQL: " . mysqli_errno($connect));

    }
    return $connect;
}
function register($username, $password, &$msg)
{
    secure_input($username);
    secure_input($password);
    $start = db_connect();
    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($start, $query);
    if (mysqli_num_rows($result) > 0) {
        $msg = "username has already register";
    } else {
        $newpass = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user(username,password) VALUES('$username','$newpass')";
        if (mysqli_query($start, $query)) {
            header("location:login&msg=Registration success!");
        } else {
            $msg = "Your registration failed";
        }

    }
    mysqli_close($start);
}

function login($username, $password, &$failedmsg)
{
    $username = secure_input($username);
    $password = secure_input($password);
    $start = db_connect();
    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($start, $query);
    if (mysqli_num_rows($result) > 0) {
        $login = mysqli_fetch_assoc($result);
        if (password_verify($password, $login['password'])) {
            session_start();
            $_SESSION['username'] = $login['username'];

            $today = date("d-F-Y");
            $yesterday = date("d-F-Y", strtotime("-1 days"));
            if ($today != $yesterday) {
                $now = date("l F Y H:i:s");
                $today = date("Y-m-d");
                $file = $today . "_user_login.txt";
                if (file_exists($file)) {
                    $userlog = fopen($today . "_user_login.txt", "a") or die("can't open file");
                    $log = "\n" . $login['username'] . "\t" . $now . "\t" . "success login";
                    fwrite($userlog, $log);
                    fclose($userlog);
                } else {
                    $create_file = fopen($today . "_user_login.txt", "w") or die("can't open file.");
                    $log = $login['username'] . "\t" . $now . "\t" . "success login";
                    fwrite($create_file, $log);
                    fclose($create_file);
                }
            }

            header("location:administrator");
            exit();
        } else {
            $failedmsg = "username or password incorrect!";
        }
    } else {
        $failedmsg = "username or password incorrect!";
    }
    mysqli_close($start);
}
function insert_kategori($kategori, $input, &$failed, &$success)
{
    $input = secure_input($input);
    $start = db_connect();
    $query = "INSERT INTO $kategori($kategori) VALUES('$input')";
    if (mysqli_query($start, $query)) {
        $success = 'Berhasil Ditambahkan';
    } else {
        $failed = 'Gagal input data';
    }
    mysqli_close($start);
}
function show_kategori($item)
{
    $start = db_connect();
    $query = "SELECT * FROM $item";
    $result = mysqli_query($start, $query);
    mysqli_close($start);
    return $result;
}
function generate_kode($tabel, $kolom, $huruf, &$kode)
{
    $start = db_connect();
    $query = "SELECT max($kolom) as kodeTerbesar FROM $tabel";
    $result = mysqli_query($start, $query);
    $data = mysqli_fetch_assoc($result);
    $kode = $data['kodeTerbesar'];
    $urutan = (int) substr($kode, 4, 4);
    $urutan++;
    $kode = $huruf . sprintf("%04s", $urutan);

}
function read_records($item)
{
    $start = db_connect();
    $query = "SELECT * FROM $item";
    $result = mysqli_query($start, $query);
    mysqli_close($start);
    return $result;

}
function insert_dokter($kode, $nama, $sip, $tempatlahir, $tgllahir, $alamat, $tlp, $kategori, &$failed)
{
    $kode = secure_input($kode);
    $start = db_connect();
    $query = "INSERT INTO dokter(kode_dokter,nama_dokter,sip,tempatlahir_dokter,tanggallahir_dokter,alamat_dokter,telepon_dokter,id_kategori_dokter) VALUES('$kode','$nama','$sip','$tempatlahir','$tgllahir','$alamat','$tlp',$kategori)";
    if (mysqli_query($start, $query)) {
        header("location:dokter&msg=Data Berhasil ditambahkan.");
    } else {
        $failed = 'Gagal input data';
    }
    mysqli_close($start);
}
function insert_pasien($kode, $nama, $gender, $tempatlahir, $tgllahir, $alamat, $tlp, $kategori, &$failed)
{
    $kode = secure_input($kode);
    $start = db_connect();
    $query = "INSERT INTO pasien(kode_pasien,nama_pasien,jenis_kelamin,tempatlahir_pasien,tanggallahir_pasien,alamat_pasien,telepon_pasien,id_kategori_pasien) VALUES('$kode','$nama','$gender','$tempatlahir','$tgllahir','$alamat','$tlp',$kategori)";
    if (mysqli_query($start, $query)) {
        header("location:pasien&msg=Data Berhasil ditambahkan.");
    } else {
        $failed = 'Gagal input data';
    }
    mysqli_close($start);
}
function find_kategori($item, $kolom, $id)
{
    $start = db_connect();
    $query = "SELECT * FROM $item WHERE $kolom=$id";
    $result = mysqli_query($start, $query);
    mysqli_close($start);
    return $result;
}