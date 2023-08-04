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
                            <input type="hidden" class="form-control" id="name" required readonly />
                            <input type="hidden" class="form-control" id="satuan" required readonly />
                            <input type="hidden" class="form-control" id="hp" required readonly />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control input-rupiah" id="hj" placeholder="Harga" required
                                readonly />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="hidden" id="stok" required readonly />
                            <input type="number" class="form-control input-rupiah" id="jumlah" placeholder="Jumlah"
                                required />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Potongan</label>
                            <input type="text" class="form-control input-rupiah" id="potongan" placeholder="Potongan"
                                required />
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
                                <label>Tanggal</label>
                                <div class="input-group" style="width: 100%;">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" name="tanggal"
                                            id="datepicker" value="<?= $tanggal; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pelanggan</label>
                                <select name="pelanggan" class="form-control select2" style="width: 100%;">
                                    <option value='Pelanggan umum' selected>Pelanggan umum</option>
                                    <?php foreach ($data_pelanggan->getresultarray() as $rs) :
                                            $name = $rs['name'];
                                            echo "<option value='$name'>$name</option>";
                                        endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bayar</label>
                                <div class="input-group" style="width: 100%;">
                                    <input type="text" class="form-control pull-right input-lg input-rupiah"
                                        name="bayar" id="bayar" ">
                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                    <div class="form-group">
                                        <label>Kembalian</label>
                                        <input type="text" class="form-control pull-right input-lg input-rupiah"
                                            name="kembalian" id="kembalian" readonly>
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

function cart_read() {
    $('#detail_cart').load("<?= base_url(); ?>penjualan/cart_read");
    //menghitung total
    $.ajax({
        url: "<?= base_url(); ?>penjualan/total",
        method: "get",
        success: function(data) {
            total = data;
            $('#ltotal').html(formatAngka(data));
            $('#total').val(data);
        }
    })
}

function cart_add() {
    var id = $("#id").val();
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
            url: "<?= base_url(); ?>penjualan/cart_add",
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
                $('#id').val("");
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

    function getbarang(id) {
        $.ajax({
            url: "<?= base_url(); ?>penjualan/getbarang",
            method: "POST",
            data: {
                id: id
            },
            success: function(data) {
                $('#id').val(data["id"]);
                $('#name').val(data["name"]);
                $('#satuan').val(data["satuan"]);
                $('#hp').val(data["hp"]);
                $('#hj').val(data["hj"]);
                $('#potongan').val(0);
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
            url: "<?= base_url(); ?>penjualan/cart_reset",
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