<?php
include "app/core/part.php";
include "app/core/core.php";
error_reporting(0);
$url = $_GET['url'];
switch ($url) {
    case null:
        $data = [
            "title" => "Sistem Informasi"
        ];
        include('view/login.php');
        break;
    case "login":
        $data = [
            "title" => "Login Account"
        ];
        include('view/login.php');
        break;
    case "admin-register":
        $data = [
            "title" => "Register Account"
        ];
        include('view/register.php');
        break;
    case "dokter":
        $data = [
            "title" => "List Dokter"
        ];
        include('view/admin/dokter/index.php');
        break;
    case "tambah-dokter":
        $data = [
            "title" => "Tambah Dokter"
        ];
        include('view/admin/dokter/form-tambah-dokter.php');
        break;
    case "kategori-dokter":
        $data = [
            "title" => "Kategori Dokter"
        ];
        include('view/admin/dokter/kategori-dokter.php');
        break;
    case "pasien":
        $data = [
            "title" => "List Pasien"
        ];
        include('view/admin/pasien/index.php');
        break;
    case "kategori-pasien":
        $data = [
            "title" => "Kategori Pasien"
        ];
        include('view/admin/pasien/kategori-pasien.php');
        break;
    case "tambah-pasien":
        $data = [
            "title" => "Tambah Pasien"
        ];
        include('view/admin/pasien/form-tambah-pasien.php');
        break;
    case "header-kas":
        $data = [
            "title" => "KAS"
        ];
        include('view/admin/transaksi/index.php');
        break;
    case "logout":
        session_start();
        if (!empty($_SESSION["username"])) {
            $username = $_SESSION["username"];
            $connect = db_connect();
            $query = "SELECT * FROM user WHERE username='$username'";
            $outcheck = mysqli_query($connect, $query);
            if (mysqli_num_rows($outcheck) > 0) {
                // include('view/logout.php');
                session_destroy();
                header("location:login");
                exit();
            } else {
                $failedmsg = "Something Wrong!";
            }
        } else {
            include('view/404.php');
        }
        include('view/register.php');
        break;
    case "administrator":
        $data = [
            "title" => "Dashboard"
        ];
        session_start();
        if (!empty($_SESSION["username"])) {
            $username = $_SESSION["username"];
            $connect = db_connect();
            $query = "SELECT * FROM user WHERE username='$username'";
            $runcheck = mysqli_query($connect, $query);
            if (mysqli_num_rows($runcheck) > 0) {
                $admin = mysqli_fetch_assoc($runcheck);
                include('view/admin/dashboard.php');
            } else {
                header("HTTPS/1.0 404 Not Found");
                include('view/404.php');
            }
        } else {
            header("HTTPS/1.0 404 Not Found");
            include('view/404.php');
        }
        break;
    default:
        header("HTTPS/1.0 404 Not Found");
        include('view/404.php');
        break;
}