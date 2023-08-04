<?php if ($display == 'form') { ?>
    <div class="row">
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Faktur</label>
                                <input type="text" class="form-control" id="faktur" placeholder="Faktur" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Id / Barcode</label>
                                <!-- <input type="text" class="form-control" id="id" placeholder="Id / Barcode" required /> -->
                                <select id="barang_id" class="form-control select2" style="width: 100%;" required autofocus>
                                    <option value="-">~</option>

                                </select>
                                <input type="hidden" class="form-control" id="name" required readonly />
                                <input type="hidden" class="form-control" id="satuan" required readonly />
                                <input type="hidden" class="form-control" id="hp" required readonly />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" class="form-control input-rupiah" id="hj" placeholder="Harga" required readonly />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="hidden" id="stok" required readonly />
                                <input type="number" class="form-control input-rupiah" id="jumlah" placeholder="Jumlah" required />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Potongan</label>
                                <input type="text" class="form-control input-rupiah" id="potongan" placeholder="Potongan" required readonly />
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
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">TOTAL</span>
                                <b>
                                    <h3 id="ltotal">0</h3>
                                </b>
                                <input type="hidden" name="total" id="total">
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Retur</label>
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
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" id="save" class="btn btn-primary pull-left"><i class="fa fa-save"></i>
                            Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        var total = 0,
            bayar = 0,
            kembalian = 0;

        function getfaktur(faktur) {
            $.ajax({
                url: "<?= base_url(); ?>returpenjualan/getfaktur",
                method: "POST",
                data: {
                    faktur: faktur
                },
                success: function(data) {
                    $("#barang_id").empty();
                    var selOpts = "<option value='-'>~ Pilih Barang ~</option>";
                    for (i = 0; i < data.length; i++) {
                        var id = data[i]['barang_id'];
                        var name = data[i]['name'];
                        var jumlah = data[i]['jumlah'];
                        var satuan = data[i]['satuan'];
                        selOpts += "<option value='" + id + "'>" + name + " [ " + jumlah + " " + satuan + " ]" +
                            "</option>";
                    }
                    $('#barang_id').append(selOpts);
                },
                error: function(xhr, statusText, errorThrown) {
                    alert(xhr.responseText);
                }
            })
        }

        function getbarang(faktur, id) {
            $.ajax({
                url: "<?= base_url(); ?>returpenjualan/getbarang",
                method: "POST",
                data: {
                    faktur: faktur,
                    id: id
                },
                success: function(data) {
                    $('#barang_id').val(data["barang_id"]);
                    $('#name').val(data["name"]);
                    $('#satuan').val(data["satuan"]);
                    $('#hp').val(data["hp"]);
                    $('#hj').val(data["hj"]);
                    $('#potongan').val(data["potongan"]);
                    $('#stok').val(data["jumlah"]);
                    $("#jumlah").attr({
                        "max": data["jumlah"]
                    });
                    $("#jumlah").focus();
                },
                error: function(xhr, statusText, errorThrown) {
                    alert(xhr.responseText);
                }
            })
        }

        function cart_read() {
            $('#detail_cart').load("<?= base_url(); ?>returpenjualan/cart_read");
            //menghitung total
            $.ajax({
                url: "<?= base_url(); ?>returpenjualan/total",
                method: "get",
                success: function(data) {
                    total = data;
                    $('#ltotal').html(formatAngka(data));
                    $('#total').val(data);
                }
            })
        }

        function cart_add() {
            var id = $("#barang_id").val();
            var name = $("#name").val();
            var satuan = $("#satuan").val();
            var hp = $("#hp").val();
            var hj = $("#hj").val();
            var stok = $("#stok").val();
            var jumlah = $("#jumlah").val();
            var potongan = $("#potongan").val();
            if (jumlah > stok) {
                alert("Jumlah tidak boleh dari stok");
            } else {
                $.ajax({
                    url: "<?= base_url(); ?>returpenjualan/cart_add",
                    method: "POST",
                    data: {
                        id: id,
                        name: name,
                        satuan: satuan,
                        hp: hp,
                        hj: hj,
                        jumlah: jumlah,
                        stok: stok,
                        potongan: potongan,
                    },
                    success: function(data) {
                        cart_read();
                        $('#barang_id').val("");
                        $('#name').val("");
                        $('#satuan').val("");
                        $('#hp').val("");
                        $('#hj').val("");
                        $('#stok').val("");
                        $('#jumlah').val("");
                        $('#potongan').val("");
                        $("#id").focus();
                    },
                    error: function(xhr, statusText, errorThrown) {
                        alert(xhr.responseText);
                    }
                })
            }

        }

        $(document).ready(function() {
            cart_read();
            $("#faktur").change(function(e) {
                var faktur = $(this).val();
                getfaktur(faktur);
            });
            $("#barang_id").change(function(e) {
                var faktur = $("#faktur").val();
                var id = $(this).val();
                getbarang(faktur, id);
            });
            $("#barang_id").keypress(function(e) {
                if (e.which == 13) {
                    var id = $(this).val();
                    getbarang(id);
                }
            });

            // untuk menambahkan ke cart
            $("#jumlah").keypress(function(e) {
                if (e.which == 13) {
                    cart_add();
                }
            });
            $("#potongan").keypress(function(e) {
                if (e.which == 13) {
                    cart_add();
                }
            });

            $("#reset").click(function(e) {
                $.ajax({
                    url: "<?= base_url(); ?>returpenjualan/cart_reset",
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

        function proses_bayar() {
            document.getElementById('bayar').value = '';
            document.getElementById('bayar').focus();
        }
        $('#bayar').on('keypress', function(e) {
            var c = e.keyCode || e.charCode;
            switch (c) {
                case 8:
                case 9:
                case 27:
                case 13:
                    return;
                case 65:
                    if (e.ctrlKey === true) return;
            }
            if (c < 48 || c > 57) e.preventDefault();
        }).on('keyup', function() {
            var inp = $(this).val().replace(/\./g, '');
            // set nilai ke variabel bayar
            total = $('#total').val();
            bayar = new Number(inp);
            kembalian = bayar - total;
            //if (total > bayar) kembali = 0;
            $('#kembalian').val(formatAngka(kembalian));
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
                <th>Potongan</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <?php
        $no = 0;
        $tot_item = 0;
        $tot_potongan = 0;
        foreach ($cart->contents() as $rs) {
            $no++;
            $tot_item = $tot_item + $rs['qty'];
            $tot_potongan = $tot_potongan + $rs['potongan'];
        ?>
            <tr>
                <td><button class="btn btn-danger btn-xs pull-left btn-hapus" value="<?= $rs['rowid']; ?>">delete</button></td>
                <td><?= $rs['name']; ?></td>
                <td><?= $rs['satuan']; ?></td>
                <td class="text-right"><?= number_format($rs['price'], 0, ',', '.'); ?></td>
                <td class="text-right"><?= number_format($rs['qty'], 0, ',', '.'); ?></td>
                <td class="text-right"><?= number_format($rs['potongan'], 0, ',', '.'); ?></td>
                <td class="text-right"><?= number_format($rs['subtotal'] - $rs['potongan'], 0, ',', '.'); ?></td>
            </tr>
        <?php }; ?>
        <tr>
            <th colspan="4">Total</th>
            <th class="text-right"><?= $tot_item; ?></th>
            <th class="text-right"><?= $tot_potongan; ?></th>
            <th class="text-right"><?= number_format($cart->total() - $tot_potongan, 0, ',', '.'); ?></th>
        </tr>
    </table>
    <script>
        function cart_read() {
            $('#detail_cart').load("<?= base_url(); ?>penjualan/cart_read");
            //menghitung total
            $.ajax({
                url: "<?= base_url(); ?>penjualan/total",
                method: "get",
                success: function(data) {
                    $('#ltotal').html(formatAngka(data));
                    $('#total').val(data);
                }
            })

        }

        function cart_delete(id) {
            $.ajax({
                url: "<?= base_url(); ?>penjualan/cart_delete/" + id,
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