<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">CI-Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?= $title == 'Homepage' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url() ?>">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?= $title == 'About' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('about-us') ?>">Tentang Kami <span class="sr-only">(current)</span></a>
                    </li>
                    <?php if (!empty($this->session->is_login) && $this->session->role == 'admin') : ?>
                    <li class="nav-item dropdown <?= $title == 'Homepage' || $title == 'About' ? '' : 'active' ?>">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdown-1" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">Kelola</a>
                        <div class="dropdown-menu bg-light rounded-0 border-0" aria-labelledby="dropdown-1">
                            <a href="<?= base_url('category') ?>" class="dropdown-item">Kategori</a>
                            <a href="<?= base_url('product') ?>" class="dropdown-item">Produk</a>
                            <a href="<?= base_url('order') ?>" class="dropdown-item">Order</a>
                            <a href="<?= base_url('user') ?>" class="dropdown-item">Pengguna</a>
                            <a href="<?= base_url('about-shop') ?>" class="dropdown-item">Tentang Toko</a>
                        </div>
                    </li>
                    <?php endif ?>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?= base_url('cart') ?>" class="nav-link"><i class="fas fa-shopping-cart"></i> Keranjang (<?= getCart() ?>)</a>
                    </li>
                    <?php if(!$this->session->userdata('is_login')) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('login') ?>" class="nav-link">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('register') ?>" class="nav-link">Daftar</a>
                    </li>
                    <?php else : ?>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdown-2" data-toggle="dropdown" aria-expanded="false"
                            aria-haspopup="true"><?= $this->session->userdata('name') ?></a>
                        <div class="dropdown-menu bg-light rounded-0 border-0" aria-labelledby="dropdown-2">
                            <a href="<?= base_url('profile') ?>" class="dropdown-item">Profil</a>
                            <a href="<?= base_url('myorder') ?>" class="dropdown-item">Order</a>
                            <a href="<?= base_url('logout') ?>" class="dropdown-item">Keluar</a>
                        </div>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>