<?php if ($action == 'view') { ?>
    <div class="box box-primary">
        <?php if (session()->get('sip_level') == 'administrator') {; ?>
            <div class="box-header">
                <a href="satuan/create" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
            </div>
        <?php }; ?>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-striped" id="table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th width=100>Id</th>
                        <th>Satuan</th>
                        <?php if (session()->get('sip_level') == 'administrator') {
                            echo "<th width=80>Aksi</th>";
                        } ?>
                    </tr>
                </thead>
                <?php foreach ($data as $rs) : ?>
                    <tr>
                        <td><?= $rs['id']; ?></td>
                        <td><?= $rs['satuan']; ?></td>
                        <?php
                        if (session()->get('sip_level') == 'administrator') {
                            $change = '<a href="' . base_url() . "satuan/change/" . $rs['id'] . '" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Change"><i class="fa fa-edit"></i></a>';
                            $delete = '<a href="' . base_url() . "satuan/delete/" . $rs['id'] . '" class="btn btn-danger btn-xs tombol-hapus" value="' . $rs['id'] . '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>';
                            echo "<td><div class='btn-group'>$change $delete</div></td>";
                        } ?>
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
                    <h4 class="box-title">Satuan Form</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Id</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="id" value="<?= $id; ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Satuan</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="satuan" value="<?= $satuan; ?>" autofocus required />
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