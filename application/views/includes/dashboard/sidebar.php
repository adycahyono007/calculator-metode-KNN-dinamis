<aside class="main-sidebar sidebar-dark-primary elevation-5">
    <!-- Brand Logo -->
    <a href="<?= base_url('') ?>" class="brand-link">
    <img src="<?= base_url('assets/images/logo_polnes.png') ?>" alt="Logo Kampus" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">Klasifikasi KNN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?= base_url('assets/images/pembuat.jpg') ?>" class="img-circle elevation-2 bg-white" alt="User Image">
        </div>
        <div class="info">
            <a href="<?= base_url('akun') ?>" class="d-block <?= $pageTitle == 'Akun' ? 'text-white' : '' ?>"><?= $this->session->nama ?></a>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?= base_url('dashboard') ?>" class="nav-link<?= $pageTitle == 'Dashboard' ? ' active' : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <li class="nav-item has-treeview <?= $pageTitle == 'Variabel' || $pageTitle == 'Sampel' ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link <?= $pageTitle == 'Variabel' || $pageTitle == 'Sampel' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-database"></i>
                <p>
                    Data Training
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('variabel') ?>" class="nav-link <?= $pageTitle == 'Variabel' ? 'active' : '' ?>">
                        <i class="far fa-plus-square nav-icon"></i>
                        <p>Variabel</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('sampel') ?>" class="nav-link <?= $pageTitle == 'Sampel' ? 'active' : '' ?>">
                        <i class="far fa-share-square nav-icon"></i>
                        <p>Sampel</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('testing') ?>" class="nav-link<?= $pageTitle == 'Data Testing' ? ' active' : '' ?>">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Data Testing
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('hasil') ?>" class="nav-link<?= $pageTitle == 'Hasil Perhitungan' ? ' active' : '' ?>">
                <i class="nav-icon fas fa-poll"></i>
                <p>
                    Hasil Perhitungan
                </p>
                </a>
            </li>
            <li class="nav-item">
                <form action="<?= base_url('logout') ?>" method="POST">
                    <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" class="csrf-input">
                    <button class="btn nav-link btn-block text-left text-white" type="submit">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>