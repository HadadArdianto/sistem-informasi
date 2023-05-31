<?php
generate_kode('pasien', 'kode_pasien', 'PSN', $kode);
if (isset($_POST['tambah-pasien'])) {
    $errors = array();
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $tempatlahir = $_POST['tempat-lahir'];
    $tgllahir = $_POST['tgl-lahir'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['tlp'];
    $kategori = $_POST['kategori'];
    validate('required', $kode, $errors);
    validate('required', $nama, $errors);
    validate('required', $gender, $errors);
    validate('required', $tempatlahir, $errors);
    validate('required', $tgllahir, $errors);
    validate('required', $alamat, $errors);
    validate('required', $tlp, $errors);
    validate('required', $kategori, $errors);
    if (!empty($errors)) {
        $error = $errors;
    } else {
        insert_pasien($kode, $nama, $gender, $tempatlahir, $tgllahir, $alamat, $tlp, $kategori, $failed);
    }
}
?>

<?php
get_header_page($data);
get_sidebar_page();
?>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Form Tambah Data</h3>
                    <p class="text-subtitle text-muted">Masukkan data yang diminta sesuai inputan.</p>
                    <?php
                    if (isset($failed)) {
                        ?>
                        <div class="alert alert-danger alert-dismissible show fade">
                            <?= $failed ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?= $data['title'] ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Masukkan Data</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" method="post">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kode">Kode Pasien</label>
                                                <input type="text" id="kode" class="form-control" name="kode"
                                                    value="<?= $kode ?>" readonly>
                                                <?php
                                                if (isset($error)) {
                                                    ?>
                                                    <small class="text-danger">
                                                        <?= $error['required'] ?>
                                                    </small>
                                                    <small class="text-danger">
                                                        <?= $error['min'] ?>
                                                    </small>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Nama Pasien</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                    placeholder="Nama lengkap" name="nama">
                                                <?php
                                                if (isset($error)) {
                                                    ?>
                                                    <small class="text-danger">
                                                        <?= $error['required'] ?>
                                                    </small>
                                                    <small class="text-danger">
                                                        <?= $error['min'] ?>
                                                    </small>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select class="choices form-select" id="gender" name="gender">
                                                    <optgroup label="Jenis Kelamin">
                                                        <option value="L">Laki-laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </optgroup>
                                                </select>
                                                <?php
                                                if (isset($error)) {
                                                    ?>
                                                    <small class="text-danger">
                                                        <?= $error['required'] ?>
                                                    </small>
                                                    <small class="text-danger">
                                                        <?= $error['min'] ?>
                                                    </small>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Tempat Lahir</label>
                                                <input type="text" id="city-column" class="form-control"
                                                    placeholder="Yogyakarta" name="tempat-lahir">
                                                <?php
                                                if (isset($error)) {
                                                    ?>
                                                    <small class="text-danger">
                                                        <?= $error['required'] ?>
                                                    </small>
                                                    <small class="text-danger">
                                                        <?= $error['min'] ?>
                                                    </small>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="country-floating">Tanggal Lahir</label>
                                                <input type="date" id="country-floating" class="form-control"
                                                    name="tgl-lahir" placeholder="27-Mei-2023">
                                                <?php
                                                if (isset($error)) {
                                                    ?>
                                                    <small class="text-danger">
                                                        <?= $error['required'] ?>
                                                    </small>
                                                    <small class="text-danger">
                                                        <?= $error['min'] ?>
                                                    </small>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="company-column">Alamat</label>
                                                <input type="text" id="company-column" class="form-control"
                                                    name="alamat" placeholder="Jl.Cindelaras">
                                                <?php
                                                if (isset($error)) {
                                                    ?>
                                                    <small class="text-danger">
                                                        <?= $error['required'] ?>
                                                    </small>
                                                    <small class="text-danger">
                                                        <?= $error['min'] ?>
                                                    </small>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Telepon</label>
                                                <input type="text" id="email-id-column" class="form-control" name="tlp"
                                                    placeholder="0812 4567 3456">
                                                <?php
                                                if (isset($error)) {
                                                    ?>
                                                    <small class="text-danger">
                                                        <?= $error['required'] ?>
                                                    </small>
                                                    <small class="text-danger">
                                                        <?= $error['min'] ?>
                                                    </small>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="select-kategori">Kategori</label>
                                                <select class="choices form-select" id="select-kategori"
                                                    name="kategori">
                                                    <optgroup label="kategori">
                                                        <?php
                                                        $result = show_kategori('kategori_pasien');
                                                        if (mysqli_num_rows($result) < 1) {
                                                            ?>
                                                            <option>Not Found</option>
                                                            <?php
                                                        } else {
                                                            while ($data = mysqli_fetch_assoc($result)) {
                                                                ?>
                                                                <option value="<?= $data['id_kategori_pasien'] ?>">
                                                                    <?= $data['kategori_pasien'] ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </optgroup>
                                                </select>
                                                <?php
                                                if (isset($error)) {
                                                    ?>
                                                    <small class="text-danger">
                                                        <?= $error['required'] ?>
                                                    </small>
                                                    <small class="text-danger">
                                                        <?= $error['min'] ?>
                                                    </small>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end mt-2 ">
                                            <button type="submit" name="tambah-pasien"
                                                class="btn icon icon-left btn-primary me-1 mb-1"><i
                                                    class="bi bi-cloud-upload"></i> Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
    </div>
    <?php
    get_footer_page();
    ?>