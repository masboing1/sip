<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="<?= $action_link; ?>">
        <?php csrf_field(); ?>
        <div class="box box-warning">
            <div class="box-header">
                <h4 class="box-title">Form password</h4>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-10">
                        <?php if ($action == "change") { ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password Lama</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password_lama" required autofocus />
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password Baru</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password_baru" required <?php if ($action == "reset") echo 'autofocus'; ?> />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Konfirmasi</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="konfirmasi_password" required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= view('layouts/partials/action_form'); ?>
        </div>
    </form>
</div>