<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto d-">
        <li class="nav-item dropdown">
            <form action="<?= base_url('logout') ?>" method="post" class="d-lg-none">
                <input type="hidden" class="app-csrf" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">
                <button class="btn" type="submit">Logout</button>
            </form>
        </li>
    </ul>
</nav>