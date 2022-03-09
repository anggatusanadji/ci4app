<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card col-12 mx-auto mt-3 mb-4">
                <div class="row">
                    <div class="card-header col-12 bg-white">
                        <h3 class="mb-0 d-inline text-primary">Detail Film</h3>
                        <a href="/films" type="submit" class="btn float-right btn-sm btn-danger" style="width:33px; font-weight:bold;">X</a>
                    </div>

                    <div class="card-header text-center bg-white mx-auto py-4" style="width:100%">
                        <div class="card mx-auto py-2">
                            <img src="/img/<?= $film['sampul']; ?>" width="250px" class="mx-auto mt-3 mb-3 rounded-lg">
                            <h4><?= $film['judul']; ?></h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="120px">Pencipta</th>
                                    <td><?= $film['pencipta']; ?></td>
                                </tr>
                                <tr>
                                    <th>Negara</th>
                                    <td><?= $film['negara']; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Rilis</th>
                                    <td><?= $film['tanggal_rilis']; ?></td>
                                </tr>
                            </thead>
                        </table>
                        <a href="/film/edit/<?= $film['slug']; ?>" class="btn btn-warning">Edit</a>
                        <form action="/film/<?= $film['id']; ?>" method="post" class="d-inline" onsubmit="return confirm('Anda Yakin Ingin Menghapus Film ini?">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>