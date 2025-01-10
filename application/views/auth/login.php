<div class="login-box">
    <div class="login-logo"><b>SiAkad UMB</b></div> <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Log in to start your session</p>
            <form action="<?= base_url('auth/login'); ?>" method="post" class="mb-3">
                <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Username" name="username">
                    <div class="input-group-text"> <span class="bi bi-person-fill"></span> </div>
                </div>
                <div class="input-group mb-3"> <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                </div> <!--begin::Row-->
                <div class="row">
                    <div class="col-8">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">
                                Remember Me
                            </label> </div>
                    </div> <!-- /.col -->
                    <div class="col-4">
                        <div class="d-grid gap-2"> <button type="submit" class="btn btn-primary">Login</button> </div>
                    </div> <!-- /.col -->
                </div> <!--end::Row-->
            </form>
            <p class="my-1 text-center"> <a href="javascript:void()">I forgot my password</a> </p>
            <p class="mb-0 text-center"> <a href="<?= base_url('auth/register'); ?>" class="text-center">
                    Don't have an account? Register
                </a> </p>
        </div> <!-- /.login-card-body -->
    </div>
</div> <!-- /.login-box -->
