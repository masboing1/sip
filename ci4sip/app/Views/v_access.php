<div class="container">
    <form class="form-horizontal" method="POST" action="<?= $action_link; ?>" enctype="multipart/form-data">
        <?php csrf_field(); ?>
        <div class="box box-success">
            <div class="box-header with-border">
                <h4 class="box-title">Hak Akses Level Form</h4>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Level</label>
                            <div class="col-md-9">
                                <select name="level" class="form-control" id="level">
                                    <?php foreach ($data_level->getresultArray() as $rs) :
                                        if ($level_selected == $rs['level']) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }
                                    ?>
                                    <option value="<?= base_url('access/change/') . $rs['level']; ?>" <?= $selected; ?>>
                                        <?= $rs['level']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Akses menu</label>
                            <div class="col-md-9">
                                <table class="table table-striped" id="table2">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th width=100>
                                                <label>
                                                    <input type="checkbox" />
                                                    <span class="lbl"> Check All</span>
                                                </label>
                                            </th>
                                            <th>Breadcrumb</th>
                                            <th>Menu</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($data as $rs) :
                                        $menu_id = $rs['id'];
                                        $rowmenu = db_connect()->query("select * from tb_access where level = '$level_selected' and menu_id = '$menu_id'")->getNumRows();
                                        if ($rowmenu > 0) $checked = 'checked';
                                        else $checked = '';
                                    ?>
                                    <tr>
                                        <td class='center'>
                                            <label><input type='checkbox' name='check_list1[]' value='<?= $rs["id"] ?>'
                                                    <?= $checked; ?> />
                                            </label>
                                        </td>
                                        <td><?= $rs['breadcrumb']; ?></td>
                                        <td><?= $rs['menu']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= view('layouts/partials/action_form'); ?>
        </div>
    </form>
</div>

<script type="text/javascript">
$(function() {
    $('table th input:checkbox').on('click', function() {
        var that = this;
        $(this).closest('table').find('tr > td:first-child input:checkbox')
            .each(function() {
                this.checked = that.checked;
                $(this).closest('tr').toggleClass('selected');
            });

    });

    $('#level').on('change', function() {
        var url = $(this).val(); // get selected value
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
    });
});
</script>