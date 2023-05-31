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
                    <h3>Data Pasien</h3>
                    <p class="text-subtitle text-muted">
                        Daftar semua data pasien klinik ini
                    </p>
                    <?php
                    if (isset($_GET['msg'])) {
                        ?>
                        <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>
                            <?= $_GET['msg'] ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?= $data['title'] ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <?= $data['title'] ?>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Kas Masuk</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false" tabindex="-1">Kas Keluar</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form class="form mt-5" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="kode">Kode Header</label>
                                            <input type="text" id="kode" class="form-control" name="kode" value="DT0001"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Kode Pasien</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="kode" name="nama" value="DT0001" readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="gender">Kode Rekening</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="kode" name="nama" value="DT0001" readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Nota</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Note"
                                                name="tempat-lahir">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Tanggal</label>
                                            <input type="date" id="country-floating" class="form-control"
                                                name="tgl-lahir" placeholder="27-Mei-2023">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Status</label>
                                            <input type="text" id="company-column" class="form-control" name="alamat"
                                                placeholder="Jl.Cindelaras">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Username</label>
                                            <input type="text" id="email-id-column" class="form-control" name="tlp"
                                                placeholder="0812 4567 3456">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Kode Kas Masuk</label>
                                            <input type="text" id="email-id-column" class="form-control" name="tlp"
                                                value="DT0001" readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="kode-dokter">Kode Dokter</label>
                                            <input type="text" id="kode-dokter" class="form-control" placeholder="kode"
                                                name="nama" value="DT0001" readonly>
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
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form class="form mt-5" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="kode">Kode Header</label>
                                            <input type="text" id="kode" class="form-control" name="kode" value="DT0001"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Kode Pasien</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="kode" name="nama" value="DT0001" readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="gender">Kode Rekening</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="kode" name="nama" value="DT0001" readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Nota</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Note"
                                                name="tempat-lahir">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Tanggal</label>
                                            <input type="date" id="country-floating" class="form-control"
                                                name="tgl-lahir" placeholder="27-Mei-2023">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Status</label>
                                            <input type="text" id="company-column" class="form-control" name="alamat"
                                                placeholder="Jl.Cindelaras">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Username</label>
                                            <input type="text" id="email-id-column" class="form-control" name="tlp"
                                                placeholder="0812 4567 3456">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Kode Kas Masuk</label>
                                            <input type="text" id="email-id-column" class="form-control" name="tlp"
                                                value="DT0001" readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="kode-dokter">Kode Dokter</label>
                                            <input type="text" id="kode-dokter" class="form-control" placeholder="kode"
                                                name="nama" value="DT0001" readonly>
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
        </section>
    </div>
    <?php
    get_footer_page();
    ?>