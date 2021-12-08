<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $pageTitle ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item<?= empty($pageAction) ? ' active' : '' ?>">
                    <?= !empty($pageAction) ? '<a href="' . base_url($this->session->role_name . '/' . $indexUrl) . '">' : '' ?>
                        <?= $pageTitle ?>
                    <?= !empty($pageAction) ? '</a>' : '' ?>
                </li>
                <?php if (!empty($pageAction)) : ?>
                    <li class="breadcrumb-item active"><?= ucfirst($pageAction) ?></li>
                <?php endif ?>
            </ol>
        </div>
        </div>
    </div>
</div>