<?php $this->load->view('includes/alert') ?>

<?php if (!empty($errorForm)) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?= 'Error.' ?></strong>
                <ul class="m-0">
                    <?php foreach ($errorForm as $value) : ?>
                        <?php if (!empty($value)) :  ?>
                            <li class="m-0"><?= $value ?></li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif ?>

<div class="row" id="content">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-right">
                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#add-modal">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah
                </button>
            </div>
            <div class="card-body">
                <?php if (!empty($variabel)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered w-100" id="datatable-table">
                        <thead>
                            <tr class="text-center">
                                <th class="align-middle">No.</th>
                                <?php foreach ($variabel as $value) : ?>
                                    <th class="align-middle"><?= xssFilter($value->nama) ?></th>
                                <?php endforeach ?>
                                <th class="align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $num = 0; if (!empty($sampel)) : foreach ($sampel as $value) : $num++ ?>
                                <tr class="text-center">
                                    <td class="align-middle" style="width: 10px"><?= $num ?>.</td>
                                    <?php foreach ($value->sampel as $value2) : ?>
                                        <td class="align-middle"><?= xssFilter($value2->nilai) ?></td>
                                    <?php endforeach ?>
                                    <td class="align-middle">
                                        <button class="btn btn-warning btn-sm m-1 edit-btn" 
                                            title="Ubah" 
                                            type="button" 
                                            data-id="<?= $value->id ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="<?= base_url("sampel/delete/$value->id") ?>" 
                                            class="d-inline m-1"
                                            method="POST">
                                            <input type="hidden" 
                                                name="<?= $csrf['name'] ?>" 
                                                value="<?= $csrf['hash'] ?>">
                                            <button class="btn btn-sm btn-danger" 
                                                type="submit" 
                                                title="Hapus"
                                                onclick="return confirm('Yakin ingin dihapus')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; endif ?>
                        </tbody>
                    </table>
                </div>
                <?php else : ?>
                    <h5 class="text-bold text-center text-secondary">
                        Variabel tidak ditemukan.
                    </h5>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($variabel)) : ?>
<div class="modal fade" id="add-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('sampel') ?>" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Sampel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">
                    <?php foreach ($variabel as $key => $value) : ?>
                        <div class="form-group">
                            <label for="id_<?= $key ?>"><?= xssFilter($value->nama) ?> <small class="text-warning">*</small></label>
                            <input type="text" class="form-control" id="id_<?= $key ?>" name="nilai[<?= $value->id ?>]" value="<?= $input['nilai'][$value->id] ?>" placeholder="<?= $value->id_status_variabel == 1 ? 'Format Angka / Desimal (10 / 10.10)' : '' ?>" required>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif ?>

<div class="modal fade" id="edit-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="position-absolute d-flex bg-white w-100 h-100 align-items-center justify-content-center" 
                style="z-index: 1000"
                id="edit-loader">
                <p class="font-weight-bold">Mohon tunggu...</p>
            </div>
            <form action="" method="post" id="edit-form">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Sampel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">
                    <?php foreach ($variabel as $key => $value) : ?>
                        <div class="form-group">
                            <label for="edit-id_<?= $key ?>"><?= xssFilter($value->nama) ?> 
                                <small class="text-warning">*</small>
                            </label>
                            <input type="text" 
                                class="form-control" 
                                id="edit-id_<?= $key ?>" 
                                name="nilai[<?= $value->id ?>]" 
                                placeholder="<?= $value->id_status_variabel == 1 ? 'Format Angka / Desimal (10 / 10.10)' : '' ?>" required>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>