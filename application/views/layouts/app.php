<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplikasi Klasifikasi Kelulusan Siswa SD dengan Metode KNN">
    <meta name="url" content="<?= base_url() ?>">

    <?php $this->load->view('includes/favicon') ?>

    <title>
        Klasifikasi Kelulusan Siswa SD Metode KNN
        <?= isset($pageTitle) ? "- $pageTitle" : '' ?>
        <?= !empty($pageAction) ? "- $pageAction" : '' ?>
    </title>

    <?php $this->load->view('includes/dashboard/style') ?>

    <?php if (!empty($ext_styles)) : ?>
        <?php foreach ($ext_styles as $ext_style) : ?>
            <link rel="stylesheet" href="<?= $ext_style ?>" />
        <?php endforeach ?>
    <?php endif ?>
</head>

<body class="hold-transition sidebar-mini">
    <span class="csrf d-none" data-name="<?= $csrf['name'] ?>" data-hash="<?= $csrf['hash'] ?>"></span>
    <div class="wrapper">

        <?php $this->load->view('includes/dashboard/navbar') ?>

        <?php $this->load->view('includes/dashboard/sidebar') ?>
    
    <div class="content-wrapper">
        <?php $this->load->view('includes/dashboard/content-header') ?>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <?php $this->load->view($page) ?>
            </div>
        </div>
    </div>

    <?php $this->load->view('includes/dashboard/footer') ?>    

    <?php $this->load->view('includes/dashboard/script') ?>

    <?php if (!empty($ext_scripts)) : ?>
        <?php foreach ($ext_scripts as $ext_script) : ?>
            <script defer src="<?= $ext_script ?>"></script>
        <?php endforeach ?>
    <?php endif ?>
</body>

</html>