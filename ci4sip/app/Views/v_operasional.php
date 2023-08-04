<?php if ($action == 'view') { ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <a href="<?= base_url(); ?>operasional/create/pemasukan" class="btn btn-success"><i class="fa fa-plus"></i><i class="fa fa-money"></i> Pemasukan</a>
                        <a href="<?= base_url(); ?>operasional/create/pengeluaran" class="btn btn-primary"><i class="fa fa-minus"></i><i class="fa fa-money"></i> Pengeluaran</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="bulan" class="form-control select2" OnChange="window.open(this.options[this.selectedIndex].value,'_self')">
                            <option value="-">~ Pilih Bulan ~</option>
                            <?php
                            foreach ($data_bulan->getresultarray() as $rs) {
                                if ($rs['id'] == $bulan_selected) {
                                    $selected = "selected";
                                } else {
                                    $selected = '';
                                }
                                echo "<option value='$rs[id]' $selected>$rs[bulan]</option>";
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-striped" id="table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th width=100>Id Operasional</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Detail</th>
                        <th>Biaya</th>
                        <th width=80>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tot_biaya = 0;
                    foreach ($data->getresultarray() as $rs) {
                        $tot_biaya = $tot_biaya + $rs['biaya'];
                    ?>
                        <tr>
                            <td><?= $rs['id']; ?></td>
                            <td><?= TanggalIndoPendek($rs['tanggal']); ?></td>
                            <td><?= $rs['jenis_operasional_id']; ?></td>
                            <td><?= $rs['detail']; ?></td>
                            <td class="text-right"><?= rupiah($rs['biaya']); ?></td>
                            <?php
                            $change = '<a href="' . base_url() . "operasional/change/" . $rs['id'] . '" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit"></i></a>';
                            $delete = '<a href="' . base_url() . "operasional/delete/" . $rs['id'] . '" class="btn btn-danger btn-xs tombol-hapus" value="' . $rs['id'] . '" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>';
                            echo '<td><div class="btn-group">' . $change . $delete . '</div></td>';

                            ?>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total</th>
                        <th class="text-right"><?= rupiah($tot_biaya) ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <form class="form-horizontal" method="POST" action="<?= $action_link; ?>" enctype="multipart/form-data">
            <?php csrf_field(); ?>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h4 class="box-title">Form Operasional</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tanggal</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="tanggal" id="datepicker" value="<?= $tanggal; ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Jenis</label>
                                <div class="col-md-9">
                                    <select name="jenis" class="form-control select2" style="width: 100%;">
                                        <?php foreach ($data_jenis->getresultarray() as $rs) :
                                            if ($jenis_selected == $rs['jenis']) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                        ?>
                                            <option value="<?= $rs['id']; ?>" <?= $selected; ?>><?= $rs['uraian']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Detail</label>
                                <div class="col-md-9">
                                    <textarea name="detail" class="form-control" cols="30" rows="3"><?= $detail ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Biaya</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-rupiah" name="biaya" value="<?= rupiah($biaya); ?>" required />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <?= view('layouts/partials/action_form'); ?>
            </div>
        </form>
    </div>
<?php }; ?>