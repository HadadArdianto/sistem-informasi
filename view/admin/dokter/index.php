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
                    <h3>Data Dokter</h3>
                    <p class="text-subtitle text-muted">
                        Daftar semua data dokter klinik ini
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

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <?= $data['title'] ?>
                    <a href="tambah-dokter" class="btn icon icon-left btn-primary">
                        <i class="bi bi-plus-lg"></i>
                        Dokter</a>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Dokter</th>
                                <th>Nama Dokter</th>
                                <th>Kategori</th>
                                <th>Tempat Lahir</th>
                                <th>Tgl Lahir</th>
                                <th>Alamat</th>
                                <th>SIP</th>
                                <th>Tlp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = read_records('dokter');
                            if (mysqli_num_rows($result) < 1) {
                                ?>
                                <h6>Not Found</h6>
                                <?php
                            } else {
                                $i = 1;
                                while ($dokter = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $i++ ?>
                                        </td>
                                        <td>
                                            <?= $dokter['kode_dokter'] ?>
                                        </td>
                                        <td>
                                            <?= $dokter['nama_dokter'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            $id = $dokter['id_kategori_dokter'];
                                            $result = find_kategori('kategori_dokter', 'id_kategori_dokter', $id);
                                            if (mysqli_num_rows($result) < 1) {
                                                echo "Not Found";
                                            } else {
                                                $kategori = mysqli_fetch_assoc($result);
                                                echo $kategori['kategori_dokter'];
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?= $dokter['tempatlahir_dokter'] ?>
                                        </td>
                                        <td>
                                            <?= $dokter['tanggallahir_dokter'] ?>
                                        </td>
                                        <td>
                                            <?= $dokter['alamat_dokter'] ?>
                                        </td>
                                        <td>
                                            <?= $dokter['sip'] ?>
                                        </td>
                                        <td>
                                            <?= $dokter['telepon_dokter'] ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
    <?php
    get_footer_page();
    ?>