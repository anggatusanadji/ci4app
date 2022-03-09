<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="card shadow col-12 mx-auto mt-3 mb-4">
        <div class="row">
            <div class="card-header col-12 bg-white">
                <h3 class="mb-0 d-inline text-primary">Form Edit Data</h3>
                <a href="/films" type="submit" class="btn float-right btn-sm btn-danger" style="width:33px; font-weight:bold;">X</a>
            </div>

            <div class="card-body">
                <form method="post" action="/films/update/<?= $film['id']; ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="slug" value="<?= $film['slug']; ?>">
                    <input type="hidden" name="sampulLama" value="<?= $film['sampul']; ?>">
                    <div class="form-group">
                        <label class="text-dark" for="judul">Judul Film</label>
                        <input type="text" class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : ''; ?>" id="judul" placeholder="Masukkan Judul" name="judul" value="<?= old('judul', $film['judul']); ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="pencipta">Pencipta</label>
                        <input type="text" class="form-control <?= $validation->hasError('pencipta') ? 'is-invalid' : ''; ?>" id="pencipta" placeholder="Masukkan Pencipta" name="pencipta" value="<?= old('pencipta', $film['pencipta']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('pencipta'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="negara">Negara</label>
                        <input type="text" class="form-control <?= $validation->hasError('negara') ? 'is-invalid' : ''; ?>" id="negara" placeholder="Masukkan Negara" name="negara" value="<?= old('negara', $film['negara']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('negara'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="tanggal_rilis">Tanggal Rilis</label>
                        <input type="date" class="form-control <?= $validation->hasError('tanggal_rilis') ? 'is-invalid' : ''; ?>" id="tanggal_rilis" placeholder="Masukkan Tanggal Rilis" name="tanggal_rilis" value="<?= old('tanggal_rilis', $film['tanggal_rilis']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggal_rilis'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sampul">Sampul</label>
                        <div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= $validation->hasError('sampul') ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('sampul'); ?>
                                </div>
                                <label class="custom-file-label" for="sampul"><?= old('sampul', $film['sampul']); ?></label>
                            </div>
                        </div>
                        <div class="mt-2">
                            <img src="/img/<?= $film['sampul']; ?>" class="img-thumbnail img-preview" height="100px" width="150px">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary col-lg-12">Edit Data!</button>
                </form>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>