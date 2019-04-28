<!--start page content-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="pull-left">Manage Project</div>
                <div class="pull-right"><?php echo $this->session->flashdata('msg'); ?></div><br>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Project Name</th>
                                    <th>Fund Allotted</th>
                                    <th>Fund Spent</th>
                                    <th>Supervisor</th>
                                    <th>Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sr = 1;
                                foreach ($project_list as $value) {
                                    ?>
                                    <tr>
                                        <td><?= $sr++ ?></td>
                                        <td>
                                            <?= $value['project_title'] ?><br>
                                            <small>Project Type : <?= $value['project_type'] ?></small>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td><button class="btn btn-warning btn-xs">Add Supervisor</button></td>
                                        <td></td>
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
    </div><!--end col-->
</div>

<!--end page content-->


