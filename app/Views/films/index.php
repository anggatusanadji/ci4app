<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary d-inline">Data Film</h6>
                    <a href="/film/create" class="btn btn-sm btn-primary float-right">Tambah Data Film</a>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><?= session()->getFlashdata('pesan'); ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col">Sampul</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Pencipta</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($films as $film) : ?>
                                    <tr>
                                        <th scope="row" class="align-middle text-center"><?= $i++ ?></th>
                                        <td class="align-middle"><img src="/img/<?= $film['sampul']; ?>" alt=""></td>
                                        <td class="align-middle"><?= $film['judul']; ?></td>
                                        <td class="align-middle"><?= $film['pencipta']; ?></td>
                                        <td class="align-middle">
                                            <a href="/film/<?= $film['slug']; ?>" class="btn btn-success">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>