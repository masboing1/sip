<?php if ($display == 'form') { ?>
    <div class="row">
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Id / Barcode</label>
                                <!-- <input type="text" class="form-control" id="id" placeholder="Id / Barcode" required /> -->
                                <select id="id" class="form-control select2" style="width: 100%;" required autofocus>
                                    <option value="-">~ Pilih Barang ~</option>
                                    <?php foreach ($barang->getresultarray() as $rs) :
                                        $id = $rs['id'];
                                        $name = $rs['name'];
                                        $satuan = $rs['satuan'];
                                        $jumlah = $rs['jumlah'];
                                        echo "<option value='$id'>$id $name [ stock : $jumlah $satuan ]</option>";
                                    endforeach; ?>
                                </select>
                                <input type="hidden" class="form-control" id="name" placeholder="Name" required readonly />
                                <input type="hidden" class="form-control" id="satuan" placeholder="Satuan" required readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" class="form-control" id="hp" placeholder="Harga" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" placeholder="Jumlah" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body" style="overflow-x:auto;" id="detail_cart"></div>
                <div class="box-footer">

                    <button id="reset" class="btn btn-danger pull-left"><i class="fa fa-trash"></i> Reset</button>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <form action="<?= $action_link; ?>" method="post">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Proses Pembelian Barang</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-group" style="width: 100%;">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" name="tanggal" id="datepicker" value="<?= $tanggal; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Suplier</label>
                                    <select name="suplier" class="form-control select2" style="width: 100%;">
                                        <?php foreach ($data_suplier->getresultarray() as $rs) :
                                            $name = $rs['name'];
                                            echo "<option value='$name'>$name</option>";
                                        endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" id="save" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function cart_read() {
            $('#detail_cart').load("<?= base_url(); ?>pembelian/cart_read");
        }
        $(document).ready(function() {
            cart_read();

            function getbarang(id) {
                $.ajax({
                    url: "<?= base_url(); ?>pembelian/getbarang",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        document.getElementById("id").value = data["id"];
                        document.getElementById("name").value = data["name"];
                        document.getElementById("satuan").value = data["satuan"];
                        document.getElementById("hp").value = data["hp"];
                        $("#jumlah").focus();
                    },
                    error: function(xhr, statusText, errorThrown) {
                        alert(xhr.responseText);
                    }
                })
            }
            $("#id").change(function(e) {
                var id = $(this).val();
                getbarang(id);
            });
            $("#id").keypress(function(e) {
                if (e.which == 13) {
                    var id = $(this).val();
                    getbarang(id);
                }
            });

            // untuk menambahkan ke cart
            $("#jumlah").keypress(function(e) {
                if (e.which == 13) {
                    var id = $("#id").val();
                    var name = $("#name").val();
                    var satuan = $("#satuan").val();
                    var hp = $("#hp").val();
                    var jumlah = $("#jumlah").val();
                    $.ajax({
                        url: "<?= base_url(); ?>pembelian/cart_add",
                        method: "POST",
                        data: {
                            id: id,
                            name: name,
                            satuan: satuan,
                            hp: hp,
                            jumlah: jumlah
                        },
                        success: function(data) {
                            cart_read();
                            document.getElementById("id").value = '';
                            document.getElementById("name").value = '';
                            document.getElementById("satuan").value = '';
                            document.getElementById("hp").value = '';
                            document.getElementById("jumlah").value = '';
                            $("#id").focus();
                        },
                        error: function(xhr, statusText, errorThrown) {
                            alert(xhr.responseText);
                        }
                    })
                }
            });

            $("#reset").click(function(e) {
                $.ajax({
                    url: "<?= base_url(); ?>pembelian/cart_reset",
                    method: "get",
                    success: function(data) {
                        cart_read();
                    },
                    error: function(xhr, statusText, errorThrown) {
                        alert(xhr.responseText);
                    }
                })
            });


        });
    </script>
<?php }; ?>
<?php if ($display == 'table') { ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width=60>Aksi</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <?php
        $no = 0;
        $tot_item = 0;
        foreach ($cart->contents() as $rs) {
            $no++;
            $tot_item = $tot_item + $rs['qty'];
        ?>
            <tr>
                <td><button class="btn btn-danger btn-xs pull-left btn-hapus" value="<?= $rs['rowid']; ?>">delete</button></td>
                <td><?= $rs['name']; ?></td>
                <td><?= $rs['satuan']; ?></td>
                <td class="text-right"><?= number_format($rs['price'], 0, ',', '.'); ?></td>
                <td class="text-right"><?= number_format($rs['qty'], 0, ',', '.'); ?></td>
                <td class="text-right"><?= number_format($rs['subtotal'], 0, ',', '.'); ?></td>
            </tr>
        <?php }; ?>
        <tr>
            <th colspan="4">Total</th>
            <th class="text-right"><?= $tot_item; ?></th>
            <th class="text-right"><?= number_format($cart->total(), 0, ',', '.'); ?></th>
        </tr>
    </table>
    <script>
        function cart_read() {
            $('#detail_cart').load("<?= base_url(); ?>pembelian/cart_read");
        }

        function cart_delete(id) {
            $.ajax({
                url: "<?= base_url(); ?>pembelian/cart_delete/" + id,
                method: "get",

                success: function() {
                    cart_read();
                },
                error: function(xhr, statusText, errorThrown) {
                    alert(xhr.responseText);
                }
            })
        }
        $(document).ready(function() {
            $(".btn-hapus").click(function() {
                var id = $(this).val();
                cart_delete(id);
                cart_read();
            });
        });
    </script>
<?php }; ?>