<?php if ($action == 'view') { ?>
    <div class="box box-primary">
        <div class="box-header">
            <a href="pelanggan/create" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-striped" id="table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th width=100>Id</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th width=80>Aksi</th>
                    </tr>
                </thead>
                <?php
                foreach ($data->getresultarray() as $rs) :
                ?>
                    <tr>
                        <td><?= $rs['id']; ?></td>
                        <td><?= $rs['name']; ?></td>
                        <td><?= $rs['address']; ?></td>
                        <td><?= $rs['phone']; ?></td>
                        <?php
                        $change = '<a href="' . base_url() . "pelanggan/change/" . $rs['id'] . '" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Change"><i class="fa fa-edit"></i></a>';
                        $delete = '<a href="' . base_url() . "pelanggan/delete/" . $rs['id'] . '" class="btn btn-danger btn-xs tombol-hapus" value="' . $rs['id'] . '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>';
                        ?>
                        <td>
                            <div class="btn-group"><?= $change . $delete; ?></div>
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
                    <h4 class="box-title">Formulir Penambahan Pelanggan</h4>
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
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" value="<?= $name; ?>" autofocus required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Address</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="address" value="<?= $address; ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">phone</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="phone" value="<?= $phone; ?>" required />
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