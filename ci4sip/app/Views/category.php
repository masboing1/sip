<div class="row">
    <div class="col-md-4">
        <div class="box <?php if ($action == 'view') echo "box-success";
                        else echo "box-warning"; ?>">
            <form action="<?php echo $action_link; ?>" method="POST">
                <div class="box-body">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="category" placeholder="Category" value="<?= $category; ?>" required autofocus>
                    </div>
                </div><!-- /.box-body -->
                <?= view('layouts/partials/action_form'); ?>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="col-md-8">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <?php if ($action == 'view') {
                                echo "<th width=80>Aksi</th>";
                            } ?>
                            <th>No</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $rs) { ?>
                            <tr>
                                <?php
                                if ($action == 'view') {
                                    $change = '<a href="' . base_url() . "category/change/" . $rs['id'] . '" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Change"><i class="fa fa-edit"></i></a>';
                                    $delete = '<a href="' . base_url() . "category/delete/" . $rs['id'] . '" class="btn btn-danger btn-xs tombol-hapus" value="' . $rs['id'] . '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>';
                                    echo '<td><div class="btn-group">' . $change . $delete . '</div></td>';
                                }

                                ?>
                                <td><?php echo $rs['id']; ?></td>
                                <td><?php echo $rs['category']; ?></td>

                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>