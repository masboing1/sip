<?php if ($action == 'view') { ?>
    <div class="box box-primary">
        <div class="box-header">
            <a href="users/create" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-striped" id="table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Instansi Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Foto</th>
                        <th width=80>Aksi</th>
                    </tr>
                </thead>
                <?php foreach ($user as $rs) : ?>
                    <tr>
                        <td><?= $rs['instansi_id']; ?></td>
                        <td><?= $rs['name']; ?></td>
                        <td><span class="label label-success"><?= $rs['username']; ?></span></td>
                        <td><?= $rs['level']; ?></td>
                        <td><img src="<?= base_url('adminlte/') . 'dist/img/' . $rs['foto']; ?>" class="profile-user-img img-responsive img-circle" style="width:80px;height:80px;"></td>
                        <?php
                        $change = '<a href="' . base_url() . "users/" . $rs['username'] . '" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Change"><i class="fa fa-edit"></i></a>';
                        $delete = '<a href="' . base_url() . "users/delete/" . $rs['username'] . '" class="btn btn-danger btn-xs tombol-hapus" value="' . $rs['username'] . '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>';
                        $reset = '<a href="' . base_url() . "password/reset/" . $rs['username'] . '" class="btn btn-info btn-xs" value="' . $rs['username'] . '" data-toggle="tooltip" data-placement="top" title="Reset"><i class="fa fa-key"></i></a>';
                        echo '<td><div class="btn-group">' . $change . $delete . $reset . '</div></td>';
                        ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
<?php } else { ?>
    <div class="container">
        <form class="form-horizontal" method="POST" action="<?= $action_link; ?>" enctype="multipart/form-data">
            <?php csrf_field(); ?>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h4 class="box-title">User Registration Form</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Instansi Id</label>
                                <div class="col-md-9">
                                    <select name="instansi_id" class="form-control">
                                        <?php foreach ($data_instansi->getresultArray() as $rs) :
                                            if ($instansi_selected == $rs['id']) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                        ?>
                                            <option value="<?= $rs['id']; ?>" <?= $selected; ?>><?= $rs['id']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" value="<?= $name; ?>" autofocus />
                                </div>
                            </div>
                            <?php if ($action == 'create') { ?>
                                <div class="form-group <?= ($validation->hasError('username')) ? 'has-error' : ''; ?>">
                                    <label class="col-md-3 control-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="username" value="<?= $username; ?>" />
                                        <span class="help-block"><?= $validation->getError('username'); ?></span>
                                    </div>
                                </div>
                            <?php }; ?>
                            <?php if ($action == 'create') { ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" value="<?= $password; ?>" />
                                    </div>
                                </div>
                            <?php }; ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Level</label>
                                <div class="col-md-9">
                                    <select name="level" class="form-control">
                                        <?php foreach ($data_level->getresultArray() as $rs) :
                                            if ($level_selected == $rs['level']) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                        ?>
                                            <option value="<?= $rs['level']; ?>" <?= $selected; ?>><?= $rs['level']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Foto</label>
                                <div class="col-md-3">
                                    <img src="<?= base_url('adminlte/') . 'dist/img/' . $foto; ?>" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-md-6">
                                    <div class="custom-file">
                                        <input type="hidden" name="fotolama" value="<?= $foto; ?>">
                                        <input type="file" class="custom-file-input" name="foto" id="foto" onchange="previewimg()">
                                        <label class="custom-file-label" for="foto"><?= $foto; ?></label>
                                        <div class="invalid-feedback">type file jpg|png, Maksimal file size 200 KB.</div>
                                    </div>

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