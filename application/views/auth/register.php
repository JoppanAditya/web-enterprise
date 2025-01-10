<div class="register-box">
    <div class="register-logo"><b>SiAkad UMB</b></div> <!-- /.register-logo -->
    <div class="card">
        <div class="card-body register-card-body">
            <p class="register-box-msg">Register a new account</p>
            <form action="<?= base_url('auth/register'); ?>" method="post" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
                    <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                </div>
                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>

                <div class="input-group mt-3">
                    <input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                    <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                </div>
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

                <div class="input-group mt-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                </div>
                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>

                <!--begin::Row-->
                <div class="row mt-3">
                    <div class="col-8">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms" name="terms">
                            <label class="form-check-label" for="terms">
                                I agree to the <a href="javascript:void()">terms</a>
                            </label>
                        </div>
                        <?= form_error('terms', '<small class="text-danger">', '</small>'); ?>
                    </div> <!-- /.col -->
                    <div class="col-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div> <!-- /.col -->
                </div> <!--end::Row-->
            </form><!-- /.social-auth-links -->
            <p class="mb-0 text-center">
                <a href="<?= base_url('auth'); ?>" class="text-center">
                    I already have an account
                </a>
            </p>
        </div> <!-- /.register-card-body -->
    </div>
</div>
