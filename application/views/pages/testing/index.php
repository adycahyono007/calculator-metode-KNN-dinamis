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
            <div class="card-body">
                <form action="<?= base_url('testing') ?>" method="post">
                    <?php if (empty($variabel)) : ?>
                        <h5 class="text-secondary text-center">Variabel is not found.</h5>
                    <?php else : ?>
                        <?php foreach ($variabel as $value) : ?>
                            <?php if ($value->id_status_variabel == 1) : ?>
                                <input type="hidden" 
                                    name="<?= $csrf['name'] ?>" 
                                    value="<?= $csrf['hash'] ?>" />

                                <div class="row">
                                    <div class="col-12 col-lg-auto">
                                        <div class="form-group">
                                            <label for="nilai_<?= xssFilter($value->id) ?>">
                                                <?= xssFilter($value->nama) ?>
                                            </label>
                                            <input type="text" 
                                                class="form-control" 
                                                id="nilai_<?= xssFilter($value->id) ?>"
                                                name="nilai[<?= xssFilter($value->id) ?>]"
                                                value="<?= decimalOrInteger($input['nilai'][$value->id]) ?>"
                                                required>
                                            <small class="text-secondary">
                                                <?= !empty($value->keterangan) ? xssFilter($value->keterangan) : '' ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                        <div class="row">
                            <div class="col-12 col-lg-auto">
                                <button class="btn btn-block btn-primary" type="submit">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </div>
</div>