<?php if ($action == 'view') { ?>
    <div class="box box-primary">
        <div class="box-header">
            <a href="computerspec/create" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
        </div>
        <!-- /.box-header -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> Pesan</h4>
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="box-body table-responsive">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th width=80>Aksi</th>
                        <th>ID</th>
                        <th>Plant</th>
                        <th>Category</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Remaks</th>
                        <th>Registrator</th>
                    </tr>
                </thead>
                <?php foreach ($computerspec as $rs) : ?>
                    <tr>
                        <?php
                        $change = '<a href="' . base_url() . "computerspec/" . $rs['id'] . '" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Change"><i class="fa fa-edit"></i></a>';
                        $delete = '<a href="' . base_url() . "computerspec/delete/" . $rs['id'] . '" class="btn btn-danger btn-xs tombol-hapus" value="' . $rs['id'] . '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>';
                        echo '<td><div class="btn-group">' . $change . $delete . '</div></td>';
                        ?>
                        <td><?= $rs['id']; ?></td>
                        <td><?= $rs['plant_id']; ?></td>
                        <td><?= $rs['category_id']; ?></td>
                        <td><span class="label label-success"><?= $rs['code']; ?></span></td>
                        <td><?= $rs['description']; ?></td>
                        <td><?= $rs['remaks']; ?></td>
                        <td><?= $rs['user_id']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
<?php } else { ?>
    <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="<?= $action_link; ?>">
            <?php csrf_field(); ?>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h4 class="box-title">Computer Spesification Registration Form</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Plant Id</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="plant_id" value="<?= $plant_id; ?>" autofocus />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Category Id</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="category_id" value="<?= $category_id; ?>" />
                                </div>
                            </div>
                            <div class="form-group <?= ($validation->hasError('code')) ? 'has-error' : ''; ?>">
                                <label class="col-md-3 control-label">Code</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="code" value="<?= $code; ?>" />
                                    <span class="help-block"><?= $validation->getError('code'); ?></span>
                                </div>
                            </div>
                            <div class="form-group <?= ($validation->hasError('description')) ? 'has-error' : ''; ?>">
                                <label class="col-md-3 control-label">Description</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="description" value="<?= $description; ?>" />
                                    <span class="help-block"><?= $validation->getError('description'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Remaks</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="remaks" value="<?= $remaks; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">User Id</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="user_id" value="<?= $user_id; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= view('layouts/partials/action_form'); ?>
            </div>
        </form>
    </div>
<?php } ?>