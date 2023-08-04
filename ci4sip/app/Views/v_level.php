<?php if ($action == 'view') { ?>
    <div class="box box-primary">
        <?php if (session()->get('sip_level') == 'administrator') {; ?>
            <div class="box-header">
                <a href="level/create" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
            </div>
        <?php }; ?>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-striped" id="table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Level</th>
                        <th width=80>Aksi</th>
                        <th width=80>Akses</th>
                    </tr>
                </thead>
                <?php foreach ($data as $rs) : ?>
                    <tr>
                        <td><?= $rs['level']; ?></td>
                        <?php
                        $access = '<a href="' . base_url() . "access/change/" . $rs['level'] . '" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Access"><i class="fa fa-eye"></i></a>';
                        if (session()->get('sip_level') == 'administrator') {
                            $change = '<a href="' . base_url() . "level/change/" . $rs['level'] . '" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Change"><i class="fa fa-edit"></i></a>';
                            $delete = '<a href="' . base_url() . "level/delete/" . $rs['level'] . '" class="btn btn-danger btn-xs tombol-hapus" value="' . $rs['level'] . '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>';
                        } else {
                            $change = '';
                            $delete = '';
                        } ?>
                        <td>
                            <div class="btn-group"><?= $change . $delete; ?></div>
                        </td>
                        <td>
                            <div class="btn-group"><?= $access; ?></div>
                        </td>
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
                    <h4 class="box-title">Level Form</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Level</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="level" value="<?= $level; ?>" autofocus required />
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