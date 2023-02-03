<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Đăng ký </strong></h3>
                    <p class="text-danger"><?= empty($this->msgError) ? '' : $this->msgError ?></p>
                </div>
                <div class="panel-body">
                    <form action='<?= app()->baseUrl ?>/auth/register' method="post" class="form-control needs-validation" novalidate>
                        <div class="form-group">
                            <label for="username" class="col-sm-12 control-label">Username:</label>
                            <div class="col-sm-9">
                                <input type="text" id="username" name="User[username]" required />
                                <div class="invalid-feedback">Vui lòng điền username.</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-12 control-label">Password:</label>
                            <div class="col-sm-9">
                                <input type="password" id="password" name="User[password]" required />
                                <div class="invalid-feedback">Vui lòng điền password.</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-12 control-label">Nhập lại password:</label>
                            <div class="col-sm-9">
                                <input type="password" id="re-password" name="User[re-password]" required />
                                <div class="invalid-feedback">Vui lòng nhập lại password.</div>
                            </div>
                        </div>

                        <div class="form-group last pt-2">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success btn-sm" name="submit">Đăng ký</button>
                                <button type="button" class="btn btn-success btn-sm"><a href="<?= app()->baseUrl ?>/auth/login">Đăng nhập</a> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>