<div class="row min-vh-100 align-items-center">
    <div class="col-lg-9 col-xl-8 mx-auto">
        <div class="card card-signin flex-row my-5">
            <div class="card-img-left d-none d-md-flex align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <img src="<?= base_url('assets/images/logo_polnes.png') ?>" alt="logo" class="img-fluid w-75">
                </div>
            </div>
            <div class="card-body">
                <h1 class="card-title text-center mb-2 font-weight-bold">Klasifikasi Kelulusan <br> Siswa SD <br> Dengan Metode KNN</h1>
                <h5 class="text-center mb-3 font-weight-normal">LOGIN FORM</h5>

                <?php $this->load->view('includes/alert') ?>
                
                <form class="form-signin" action="<?= base_url('') ?>" method="POST">
                    <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">
                    <div class="form-label-group">
                        <input type="text" id="input-username" class="form-control" name="username" value="<?= $input->username ?>" placeholder="Username" required autofocus>
                        <label for="input-username">Username</label>
                        <div class="pl-4">
                            <?= form_error('username') ?>
                        </div>
                    </div>

                    <div class="form-label-group">
                        <input type="password" id="input-password" class="form-control" name="password" value="<?= $input->password ?>" placeholder="Password" required>
                        <label for="input-password">Password</label>
                        <div class="pl-4">
                            <?= form_error('password') ?>
                        </div>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>