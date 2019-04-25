<!--start page content-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="pull-left">Bank Guarantee Form</div>
                <div class="pull-right"><?php echo $this->session->flashdata('msg'); ?></div><br>
            </div>
            <div class="panel-body">
                <?php
                if ($this->session->flashdata('msg')) {
                    ?> 
                    <script>
                        setTimeout(function () {
                            $("#success_btn").click();
                        }, 2000);
                    </script> 
                    <?php
                }
                ?>
                <form method="post" action="<?= base_url('Admin/BankGuarantee/add') ?>">
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>Client / Firm Name</label>
                            <input type="text" class="form-control" value="<?= set_value('clientname') ?>" name="clientname">
                            <?php echo form_error('clientname', '<div class="error small">', '</div>'); ?>
                        </div>
                        <div class="col-lg-3">
                            <label>Select Project</label>
                            <select class="form-control" name="projectname">
                                <option value="">Select Project</option>
                                <?php
                                foreach ($project_list as $value) {
                                    ?> <option <?php echo set_select('projectname', $value['id']); ?> value="<?= $value['id'] ?>"><?= $value['project_title'] ?></option> <?php
                                }
                                ?>
                            </select>
                            <?php echo form_error('projectname', '<div class="error small">', '</div>'); ?>
                        </div>
                        <div class="col-lg-3">
                            <label>Amount</label>
                            <input type="text" class="form-control" value="<?= set_value('amount') ?>" name="amount">
                            <?php echo form_error('amount', '<div class="error small">', '</div>'); ?>
                        </div>
                        <div class="col-lg-3">
                            <label>Valid From</label>
                            <input type="date" class="form-control" value="<?= (set_value('create_on') ? date('Y-m-d', strtotime(set_value('create_on'))) : date('Y-m-d')) ?>" name="create_on">
                            <?php echo form_error('create_on', '<div class="error small">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>Bank Name</label>
                            <input type="text" class="form-control" value="<?= set_value('bankname') ?>" name="bankname">
                            <?php echo form_error('bankname', '<div class="error small">', '</div>'); ?>
                        </div>
                        <div class="col-lg-3">
                            <label>Branch Address</label>
                            <input type="text" class="form-control" value="<?= set_value('branch') ?>" name="branch">
                            <?php echo form_error('branch', '<div class="error small">', '</div>'); ?>
                        </div>
                        <div class="col-lg-3">
                            <label>Account Number</label>
                            <input type="text" class="form-control" value="<?= set_value('accountnumber') ?>" name="accountnumber">
                            <?php echo form_error('accountnumber', '<div class="error small">', '</div>'); ?>
                        </div>
                        <div class="col-lg-3">
                            <label>IFSC Code</label>
                            <input type="text" class="form-control" value="<?= set_value('ifsc_code') ?>" name="ifsc_code">
                            <?php echo form_error('ifsc_code', '<div class="error small">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>Time Period (in Month)</label>
                            <input type="text" class="form-control" value="<?= set_value('time_period') ?>" name="time_period">
                            <?php echo form_error('time_period', '<div class="error small">', '</div>'); ?>
                        </div>
                        <div class="col-lg-3">
                            <label>Select any file to upload</label>
                            <input type="file" class="form-control" name="any_doc">
                            <?php echo form_error('any_doc', '<div class="error small">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-success BankGuarantee" id="success_btn" style="display: none">Success Message</a>
                    </div>
                </form>
            </div>
        </div>
    </div><!--end col-->
</div>

<!--end page content-->


