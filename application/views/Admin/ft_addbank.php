<!--start page content-->
<?php
//print_r($bank_list);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="pull-left"><?=(!is_null($id) ? 'Update Bank Account' : 'Add New Bank Account' )?></div>
                <div class="pull-right">
                    <a href="<?= base_url('Admin/FundTracking/') ?>" style="margin-top: -4px;" class="btn btn-dribbble"><i class="fa fa-arrow-left"></i> &nbsp;Back</a>
                </div><br>
            </div>
            <div class="panel-body">

                <?php
                if ($this->session->flashdata('msg')) {
                    ?> <h2 class="text-center"><?= $this->session->flashdata('msg') ?></h2> <?php
                } else {
                    ?> 
                    <form method="post" action="<?= base_url('Admin/FundTracking/addbank/'.$id) ?>">
                        <div class="row form-group">
                            <div class="col-lg-3">
                                <label>Bank Name</label>
                                <input type="text" class="form-control" value="<?= (set_value('bank_name') ? set_value('bank_name') : $bank_list['bank_name']) ?>" name="bank_name" placeholder="">
                                <?php echo form_error('bank_name', '<div class="error small">', '</div>') ?>
                            </div>
                            <div class="col-lg-3">
                                <label>Branch Address</label>
                                <textarea class="form-control" name="branch_address" placeholder=""><?= (set_value('branch_address') ? set_value('branch_address') : $bank_list['branch_address']) ?></textarea>
                                <?php echo form_error('branch_address', '<div class="error small">', '</div>') ?>
                            </div>
                            <div class="col-lg-3">
                                <label>Account Number</label>
                                <input type="text" class="form-control" value="<?= (set_value('account_number') ? set_value('account_number') : $bank_list['account_number']) ?>" name="account_number" placeholder="">
                                <?php echo form_error('account_number', '<div class="error small">', '</div>') ?>
                            </div>
                            <div class="col-lg-3">
                                <label>IFSC Code</label>
                                <input type="text" class="form-control" value="<?= (set_value('ifsc_account') ? set_value('ifsc_account') : $bank_list['ifsc_account']) ?>" name="ifsc_account" placeholder="">
                                <?php echo form_error('ifsc_account', '<div class="error small">', '</div>') ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-3">
                                <?php
                                if (!is_null($id)) {
                                    ?> <label>New Updated Amount (INR)</label> <?php
                                } else {
                                    ?> <label>Available Amount (INR)</label> <?php
                                }
                                ?>
                                <input type="text" class="form-control" value="<?= (set_value('avail_amount') ? set_value('avail_amount') : $bank_list['avail_amount']) ?>" name="avail_amount" placeholder="">
                                <?php echo form_error('avail_amount', '<div class="error small">', '</div>') ?>
                            </div>
                            <div class="col-lg-3">
                                <label>Status</label>
                                <?php
                                if (!is_null($id)) {
                                    ?> 
                                    <select class="form-control" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Suspended</option>
                                    </select> 
                                    <?php
                                } else {
                                    ?> 
                                    <select class="form-control" name="status">
                                        <option value="1">Active</option>
                                    </select> 
                                    <?php
                                }
                                ?>

                                <?php echo form_error('status', '<div class="error small">', '</div>') ?>
                            </div>
                            <div class="col-lg-3">
                                <?php
                                if (!is_null($id)) {
                                    ?> <label>Update On</label> <?php
                                } else {
                                    ?> <label>Account Create On</label> <?php
                                }
                                ?>

                                <input type="date" class="form-control" value="<?= (set_value('create_on') ? date('Y-m-d', strtotime(set_value('create_on'))) : date('Y-m-d')) ?>" name="create_on" placeholder="">
                                <?php echo form_error('create_on', '<div class="error small">', '</div>') ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <?php
                                if (!is_null($id)) {
                                    ?> <button class="btn btn-primary"> Update Bank Detail</button> <?php
                                } else {
                                    ?> <button class="btn btn-primary"> Save Bank Detail</button> <?php
                                }
                                ?>
                                
                            </div>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div><!--end col-->
</div>

<!--end page content-->


