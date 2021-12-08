<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-right">
                <button class="btn btn-warning btn-sm"
                    data-toggle="modal" 
                    data-target="#edit-modal">
                    <i class="fas fa-edit mr-1"></i>
                    Ubah
                </button>
            </div>
            <div class="card-body">
                <?= form_error('nama') ?>
                <?= form_error('username') ?>
                <?= form_error('old_password') ?>
                <?= form_error('password') ?>
                <table class="table table-bordered">
                    <tr>
                        <th class="w-25">Nama</th>
                        <td class="w-75 align-middle"><?= $akun['nama'] ?></td>
                    </tr>
                    <tr>
                        <th class="w-25">Username</th>
                        <td class="w-75 align-middle"><?= $akun['username'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('akun') ?>" method="post" id="edit-form">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Akun</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">
                    <div class="form-group">
                        <label for="nama">Nama <small class="text-warning">*</small></label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $input['nama'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username <small class="text-warning">*</small></label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $input['username'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="old_password">Old Password <small class="text-warning">*</small></label>
                        <input type="password" class="form-control" id="old_password" name="old_password" required>
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Opsional">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>