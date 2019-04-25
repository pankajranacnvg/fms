<!--start page content-->
<?php $lable = $this->customlib->getLable(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?= $lable['LABLEONE'] ?> : <?= $unit_detail['parent_lable'] ?> >> <?= $lable['LABLETWO'] ?> : <?= $unit_detail['lable'] ?>
            </div>
            <div class="panel-body kyc">
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

                <form action="<?= base_url('Admin/ManageChild/KYC/') . $hierarchy_id ?>" method="POST">
                    <h4><?= $lable['LABLETWO'] ?> Head Detail</h4>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label class="font-100">Head Name</label>
                            <input name="head_name" placeholder="Head Name" value="<?php echo (set_value('head_name') ? set_value('head_name') : $unit_detail['head_name']) ?>" type="text" class="form-control">
                            <?php echo form_error('head_name', '<div class="error small">', '</div>'); ?>
                        </div>
                        <div class="col-lg-3">
                            <label class="font-100">Head Designation</label>
                            <input name="head_designation" value="<?php echo (set_value('head_designation') ? set_value('head_designation') : $unit_detail['head_designation']) ?>" placeholder="Head Designation" type="text" class="form-control" value="<?php echo set_value('head_name') ?>">
                            <?php echo form_error('head_designation', '<div class="error small">', '</div>'); ?>
                        </div>
                        <div class="col-lg-3">
                            <label class="font-100">Head Email</label>
                            <input name="head_email" value="<?php echo (set_value('head_email') ? set_value('head_email') : $unit_detail['head_email']) ?>" placeholder="Head Email" type="text" class="form-control">
                            <?php echo form_error('head_email', '<div class="error small">', '</div>'); ?>
                        </div>
                        <div class="col-lg-3">
                            <label class="font-100">Head Contact</label>
                            <input name="head_contact" value="<?php echo (set_value('head_contact') ? set_value('head_contact') : $unit_detail['head_contact']) ?>" placeholder="Head Contact" type="text" class="form-control">
                            <?php echo form_error('head_contact', '<div class="error small">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label class="font-100">Office Address</label>
                            <input name="office_address" value="<?php echo (set_value('office_address') ? set_value('office_address') : $unit_detail['office_address']) ?>" class="Office Address" type="text" class="form-control">
                            <?php echo form_error('office_address', '<div class="error small">', '</div>'); ?>
                        </div>
                    </div>
                    <h4><?= $lable['LABLETWO'] ?> Bank Detail</h4>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label class="font-100">Bank Name</label>
                            <input name="bank_name" value="<?php echo (set_value('bank_name') ? set_value('bank_name') : $unit_detail['bank_name']) ?>" placeholder="Bank Name" type="text" class="form-control">
                            <?php echo form_error('bank_name', '<div class="error small">', '</div>'); ?>
                        </div>
                        <div class="col-lg-3">
                            <label class="font-100">Bank Branch</label>
                            <input name="bank_branch" value="<?php echo (set_value('bank_branch') ? set_value('bank_branch') : $unit_detail['bank_branch']) ?>" placeholder="Bank Branch" type="text" class="form-control">
                            <?php echo form_error('bank_branch', '<div class="error small">', '</div>'); ?>
                        </div>
                        <div class="col-lg-3">
                            <label class="font-100">Account Number</label>
                            <input name="account_number" value="<?php echo (set_value('account_number') ? set_value('account_number') : $unit_detail['account_number']) ?>" placeholder="Account Number" type="text" class="form-control">
                            <?php echo form_error('account_number', '<div class="error small">', '</div>'); ?>
                        </div>
                        <div class="col-lg-3">
                            <label class="font-100">IFSC Code</label>
                            <input type="text" value="<?php echo (set_value('ifsc_code') ? set_value('ifsc_code') : $unit_detail['ifsc_code']) ?>" placeholder="IFSC Code" name="ifsc_code" class="form-control">
                            <?php echo form_error('ifsc_code', '<div class="error small">', '</div>'); ?>
                        </div>
                    </div><hr>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <button class="btn btn-primary" type="submit" name="save_kyc">UPDATE KYC DETAIL</button>
                            <a class="btn btn-success kycupdate_success" id="success_btn" style="display: none">Success Message</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--end col-->
</div>

<!--end page content-->


