<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplikasi Klasifikasi Kelulusan Siswa SD dengan Metode KNN">
    <meta name="url" content="<?= base_url() ?>">

    <?php $this->load->view('includes/favicon') ?>

    <title>Klasifikasi Kelulusan Siswa SD Metode KNN<?= isset($title) ? " - $title" : '' ?></title>

    <?php $this->load->view('includes/auth/style') ?>

    <?php if (!empty($ext_styles)) : ?>
        <?php foreach ($ext_styles as $ext_style) : ?>
            <link rel="stylesheet" href="<?= $ext_style ?>" />
        <?php endforeach ?>
    <?php endif ?>
</head>

<body>
    <div class="container">
        <?php $this->load->view($page) ?>
    </div>

    <?php $this->load->view('includes/auth/script') ?>

    <?php if (!empty($ext_scripts)) : ?>
        <?php foreach ($ext_scripts as $ext_script) : ?>
            <script defer src="<?= $ext_script ?>"></script>
        <?php endforeach ?>
    <?php endif ?>
</body>

</html>