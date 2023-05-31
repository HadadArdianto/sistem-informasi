<?php
if (isset($_POST['tambah-kategori'])) {
    $errors = array();
    $input = $_POST['kategori'];
    validate('required', $input, $errors);
    validate('min', $input, $errors);
    if (!empty($errors)) {
        $error = $errors;
    } else {
        insert_kategori('kategori_dokter', $input, $failed, $success);
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
                    <h3>Data Kategori Dokter</h3>
                    <p class="text-subtitle text-muted">
                        Daftar semua data kategori dokter klinik ini
                    </p>
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
                    <?php
                    if (isset($success)) {
                        ?>
                        <div class="alert alert-success alert-dismissible show fade">
                            <?= $success ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                    <a href="tambah-dokter" data-bs-toggle="modal" data-bs-target="#default"
                        class="btn icon icon-left btn-primary">
                        <i class="bi bi-plus-lg"></i>
                        Kategori</a>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori Dokter</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = show_kategori('kategori_dokter');
                            if (mysqli_num_rows($result) < 1) {
                                ?>
                                <h6>Not Found</h6>
                                <?php
                            } else {
                                $i = 1;
                                while ($item = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $i++ ?>
                                        </td>
                                        <td><span class="badge bg-light-primary">
                                                <?= $item['kategori_dokter'] ?>
                                            </span></td>
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
        <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">Tambah Kategori</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="post">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="kategori">Kategori Dokter</label>
                                        <input type="text" name="kategori" id="kategori" class="form-control"
                                            placeholder="Dokter Gigi">
                                        <?php
                                        if (isset($error)) {
                                            ?>
                                            <small class="text-danger">
                                                <?= $error['required'] ?>
                                            </small>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Cancel</span>
                                </button>
                                <button type="submit" name="tambah-kategori" class="btn btn-primary ml-1"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan</span>
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
    get_footer_page();
    ?>