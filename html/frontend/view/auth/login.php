<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Đăng nhập </strong></h3>
                    <p class="text-danger"><?= empty($this->msgError) ? '' : $this->msgError ?></p>
                    <p class="text-success"><?= empty($this->msgSuccess) ? '' : $this->msgSuccess ?></p>
                </div>
                <div class="panel-body">
                    <form action='<?= app()->baseUrl ?>/auth/login' method="post" class="form-control needs-validation" novalidate>
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username:</label>
                            <div class="col-sm-9">
                                <input type="text" id="username" name="username" required />
                                <div class="invalid-feedback">Vui lòng điền username.</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password:</label>
                            <div class="col-sm-9">
                                <input type="password" id="password" name="password" required />
                                <div class="invalid-feedback">Vui lòng điền password.</div>
                            </div>

                        </div>
                        <div class="form-group last pt-2">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success btn-sm" name="submit">Đăng nhập</button>
                                <button type="button" class="btn btn-success btn-sm"><a href="<?= app()->baseUrl ?>/auth/register">Đăng ký</a> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>