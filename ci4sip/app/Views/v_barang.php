<?php if ($action == 'view') { ?>
    <div class="box box-primary">
        <div class="box-header">
            <a href="barang/create" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-striped" id="table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th width=100>Id</th>
                        <th>Name</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Jumlah</th>
                        <th>HP</th>
                        <th>HJ</th>
                        <th width=80>Aksi</th>
                    </tr>
                </thead>
                <?php
                foreach ($data->getresultArray() as $rs) :
                ?>
                    <tr>
                        <td><?= $rs['id']; ?></td>
                        <td><?= $rs['name']; ?></td>
                        <td><?= $rs['deskripsi']; ?></td>
                        <td><?= $rs['kategori']; ?></td>
                        <td><?= $rs['satuan']; ?></td>
                        <td class="text-center"><?= rupiah($rs['jumlah']); ?></td>
                        <td class="text-right"><?= rupiah($rs['hp']); ?></td>
                        <td class="text-right"><?= rupiah($rs['hj']); ?></td>
                        <?php
                        $change = '<a href="' . base_url() . "barang/change/" . $rs['id'] . '" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Change"><i class="fa fa-edit"></i></a>';
                        $delete = '<a href="' . base_url() . "barang/delete/" . $rs['id'] . '" class="btn btn-danger btn-xs tombol-hapus" value="' . $rs['id'] . '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>';
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
                    <h4 class="box-title">Formulir Penambahan Barang</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Instansi Id</label>
                                <div class="col-md-9">
                                    <select name="level" class="form-control">
                                        <?php
                                        if (session()->get('sip_level') == 'administrator') {
                                            foreach ($data_instansi->getresultArray() as $rs) :
                                                if ($instansi_selected == $rs['id']) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                        ?>
                                                <option value="<?= $rs['id']; ?>" <?= $selected; ?>>
                                                    <?= $rs['id'] . " ( " . $rs['name'] . " )"; ?></option>
                                            <?php endforeach;
                                        } else { ?>
                                            <option value="<?= $instansi_id; ?>" selected>
                                                <?= $instansi_id . " ( " . $instansi_name . " )"; ?></option>
                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" value="<?= $name; ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Deskripsi</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="deskripsi" value="<?= $deskripsi; ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Kategori</label>
                                <div class="col-md-9">
                                    <select name="kategori" class="form-control">
                                        <?php foreach ($data_kategori->getresultArray() as $rs) :
                                            if ($kategori_selected == $rs['id']) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                        ?>
                                            <option value="<?= $rs['id']; ?>" <?= $selected; ?>><?= $rs['kategori']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Satuan</label>
                                <div class="col-md-9">
                                    <select name="satuan" class="form-control">
                                        <?php foreach ($data_satuan->getresultArray() as $rs) :
                                            if ($satuan_selected == $rs['id']) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                        ?>
                                            <option value="<?= $rs['id']; ?>" <?= $selected; ?>><?= $rs['satuan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Jumlah</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="jumlah" value="<?= $jumlah; ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Harga Pokok</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-rupiah" name="hp" value="<?= $hp; ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Harga Jual</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-rupiah" name="hj" value="<?= $hj; ?>" required />
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