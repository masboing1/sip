<div class="box-footer">
    <div class="row">
        <div class="col-md-12 text-center">
            <button id="loading-btn" name="cmd_simpan" type="submit" class="btn btn-small btn-primary" data-loading-text="Menyimpan">
                <i class="fa fa-save"></i> Simpan
            </button>
            <?php if ($action != 'view') {
                echo '<a href="' . $cancel_link . '" class="btn btn-small btn-default"><i class="fa fa-repeat"></i>Batal</a>';
            }
            ?>
        </div>
    </div>
</div>