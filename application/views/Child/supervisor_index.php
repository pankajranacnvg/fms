<!--start page content-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="pull-left">Add Supervisor</div>
                <div class="pull-right"><?php echo $this->session->flashdata('msg'); ?></div><br>
            </div>
            <div class="panel-body">
                <form method="post" action="<?= base_url('Child/ManageSupervisor') ?>">
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>Supervisor Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" value="<?= set_value('name') ?>">
                            <?php echo form_error('name', '<div class="error small">', '</div>'); ?>

                        </div>
                        <div class="col-lg-4">
                            <label>Designation</label>
                            <input type="text" class="form-control" placeholder="Designation" name="designation" value="<?= set_value('designation') ?>">
                            <?php echo form_error('designation', '<div class="error small">', '</div>'); ?>

                        </div>
                        <div class="col-lg-4">
                            <label>Email Id</label>
                            <input type="text" class="form-control" placeholder="Email Id" name="email" value="<?= set_value('email') ?>">
                            <?php echo form_error('email', '<div class="error small">', '</div>'); ?>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" placeholder="Mobile Number" name="mobile" value="<?= set_value('mobile') ?>">
                            <?php echo form_error('mobile', '<div class="error small">', '</div>'); ?>

                        </div>
                        <div class="col-lg-4">
                            <label>Age</label>
                            <input type="text" class="form-control" placeholder="Age" name="age" value="<?= set_value('age') ?>">
                            <?php echo form_error('age', '<div class="error small">', '</div>'); ?>

                        </div>
                        <div class="col-lg-4">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                                <option <?= set_select('gender', 'male', TRUE) ?> value="male">Male</option>
                                <option <?= set_select('gender', 'female') ?> value="female">Female</option>
                            </select>
                            <?php echo form_error('gender', '<div class="error small">', '</div>'); ?>

                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-primary" type="submit">Save Supervisor</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="row form-group">
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Supervisor Name</th>
                                    <th>Designation</th>
                                    <th>Email Id</th>
                                    <th>Mobile Number</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sr = 1;
                                foreach ($supervisor_list as $value) {
                                    ?>
                                    <tr>
                                        <td><?= $sr++ ?></td>
                                        <td><?= $value['name'] ?></td>
                                        <td><?= $value['designation'] ?></td>
                                        <td><?= $value['email'] ?></td>
                                        <td><?= $value['mobile'] ?></td>
                                        <td><?= $value['age'] ?></td>
                                        <td><?= $value['gender'] ?></td>
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


