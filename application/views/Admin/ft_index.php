<!--start page content-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="pull-left">List of Bank Accounts</div>
                <div class="pull-right"><?php echo $this->session->flashdata('msg'); ?></div><br>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div style="cursor: default" class="btn btn-dropbox">Total Amount in Bank Account : <i class="fa fa fa-rupee"></i> <?= $this->customlib->inr_format($total_amount) ?></div>
                        <div class="pull-right">
                            <button class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Import From Excel</button>
                            <a href="<?= base_url('Admin/FundTracking/addbank') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Bank</a>
                        </div>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Bank Name</th>
                                    <th>Branch Address</th>
                                    <th>Account Detail</th>
                                    <th>Total Amount</th>
                                    <th>Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($bank_list) > 0) {
                                    $sr = 1;
                                    foreach ($bank_list as $value) {
                                        ?>
                                        <tr onmouseover="highlight(this)" onmouseout="rem_highlight(this)" style="cursor: pointer" onclick="javascript:window.location.href = '<?= base_url('Admin/FundTracking/addbank/' . $value['id']) ?>'">
                                            <td> <?= $sr++ ?> </td>
                                            <td><?= $value['bank_name'] ?></td>
                                            <td><?= $value['branch_address'] ?></td>
                                            <td><b>Acc. Number :</b> <?= $value['account_number'] ?><br><b>IFSC :</b> <?= $value['ifsc_account'] ?></td>
                                            <td><?= $this->customlib->inr_format($value['avail_amount']) ?></td>
                                            <td><?= date('d M, Y', strtotime((!is_null($value['update_on']) ? $value['update_on'] : $value['create_on']))) ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?> <tr><td colspan="6" class="text-center text-danger">No Data Found !</td></tr> <?php
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
<script>
    function highlight(res) {
        res.style.color = "#000";
        res.style.backgroundColor = "#EEE";
    }

    function rem_highlight(res) {
        res.style.color = "#777";
        res.style.backgroundColor = "#FFF";
    }
</script>
<!--end page content-->


