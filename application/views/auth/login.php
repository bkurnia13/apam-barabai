</head>

<body>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('<?= base_url('assets/') ?>/img/auth/login-bg.jpg')">
                    <div class="lavalite-overlay"></div>
                    <div class="p-1" style="color: white; position: absolute; bottom: 0;">&copy; 2020 | Bayu Kurnia Dwi Putra</div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href="<?= base_url(); ?>"><img src="<?= base_url('assets/') ?>/img/pln.png" alt="" width="60"></a>
                    </div>
                    <h5 class="text-center">APaM v1.0</h5>
                    <h3 class="text-center">Aplikasi Perminataan Material</h3>
                    <form method="post" action="<?= base_url('auth'); ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
                            <i class="ik ik-user"></i>
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <i class="ik ik-lock"></i>
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="sign-btn text-center">
                            <button type="submit" class="btn btn-theme">Sign In</button>
                        </div>
                    </form>
                    <div class="register">
                        <p>Lupa password? <a href="#">Klik disini!</a></p>
                        <p>Belum punya akun? <a href="<?= base_url('auth/register'); ?>">Daftar disini!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    window.jQuery || document.write('<script src="<?= base_url('assets/'); ?>src/js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>

<script src="<?= base_url('assets/'); ?>node_modules/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/alerts.js"></script>
<?= $this->session->flashdata('notifikasi'); ?>