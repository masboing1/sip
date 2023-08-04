<?php if ($display == 'form') { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Item Barang</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Id / Barcode</label>
                                <!-- <input type="text" class="form-control" id="id" placeholder="Id / Barcode" required /> -->
                                <select id="id" class="form-control select2" required autofocus>
                                    <option value="-">~ Pilih Barang ~</option>
                                    <?php foreach ($barang->getresultarray() as $rs) :
                                        $id = $rs['id'];
                                        $name = $rs['name'];
                                        $satuan = $rs['satuan'];
                                        $jumlah = $rs['jumlah'];
                                        echo "<option value='$id'>$id $name [ stock : $jumlah $satuan ]</option>";
                                    endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama Barang</label>

                                <input type="text" class="form-control" id="name" placeholder="Name" required readonly />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Satuan</label>
                                <input type="text" class="form-control" id="satuan" placeholder="Satuan" required readonly />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" class="form-control" id="hb" placeholder="Harga" required />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" placeholder="Jumlah" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body" style="overflow-x:auto;" id="detail_cart"></div>
                <div class="box-footer">
                    <button id="save" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Simpan</button>
                    <button id="reset" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Reset</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function cart_read() {
            $('#detail_cart').load("<?= base_url(); ?>ajax/cart_read");
        }

        cart_read();

        function getbarang(id) {
            $.ajax({
                url: "<?= base_url(); ?>ajax/getbarang",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    document.getElementById("id").value = data["id"];
                    document.getElementById("name").value = data["name"];
                    document.getElementById("satuan").value = data["satuan"];
                    document.getElementById("hb").value = data["hb"];
                    $("#jumlah").focus();
                },
                error: function(xhr, statusText, errorThrown) {
                    alert(xhr.responseText);
                }
            })
        }
        $(document).ready(function() {
            // Load shopping cart

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
                    var hb = $("#hb").val();
                    var jumlah = $("#jumlah").val();
                    $.ajax({
                        url: "<?= base_url(); ?>ajax/cart_add",
                        method: "POST",
                        data: {
                            id: id,
                            name: name,
                            satuan: satuan,
                            hb: hb,
                            jumlah: jumlah
                        },
                        success: function(data) {
                            cart_read();
                            document.getElementById("id").value = '';
                            document.getElementById("name").value = '';
                            document.getElementById("satuan").value = '';
                            document.getElementById("hb").value = '';
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
                    url: "<?= base_url(); ?>ajax/cart_reset",
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
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Sub Total</th>
                <th width=60>Aksi</th>
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
                <td><?= $rs['name']; ?></td>
                <td><?= $rs['satuan']; ?></td>
                <td class="text-right"><?= number_format($rs['price'], 0, ',', '.'); ?></td>
                <td class="text-right"><?= number_format($rs['qty'], 0, ',', '.'); ?></td>
                <td class="text-right"><?= number_format($rs['subtotal'], 0, ',', '.'); ?></td>
                <td><button class="btn btn-danger btn-xs pull-left btn-hapus" value="<?= $rs['rowid']; ?>">delete</button></td>
            </tr>
        <?php }; ?>
        <tr>
            <th colspan="3">Total</th>
            <th class="text-right"><?= $tot_item; ?></th>
            <th class="text-right"><?= number_format($cart->total(), 0, ',', '.'); ?></th>
            <th></th>
        </tr>
    </table>
    <script>
        function cart_read() {
            $('#detail_cart').load("<?= base_url(); ?>ajax/cart_read");
        }

        function cart_delete(id) {
            $.ajax({
                url: "<?= base_url(); ?>ajax/cart_delete/" + id,
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