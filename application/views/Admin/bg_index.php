<!--start page content-->
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-primary padding-0">
            <div class="row row-table">
                <div class="col-xs-12 pv-15 text-center">
                    <h2 class="mv-0"><?= $total_num_bg ?></h2>
                    <div class="text-uppercase">Total Bank Guarantee</div>
                </div>
            </div>
        </div><!--end widget-->
    </div><!--end col-->
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-success padding-0">
            <div class="row row-table">
                <div class="col-xs-12 pv-15 text-center">
                    <h2 class="mv-0"><?= $this->customlib->inr_format($total_bg) ?></h2>
                    <div class="text-uppercase">Total Guarantee Amount</div>
                </div>
            </div>
        </div><!--end widget-->
    </div><!--end col-->
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-danger padding-0">
            <div class="row row-table">
                <div class="col-xs-12 pv-15 text-center">
                    <h2 class="mv-0">0</h2>
                    <div class="text-uppercase">BG Expiring in 15 days</div>
                </div>
            </div>
        </div><!--end widget-->
    </div><!--end col-->
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-danger padding-0">
            <div class="row row-table">
                <div class="col-xs-12 pv-15 text-center">
                    <h2 class="mv-0"><?= $this->customlib->inr_format(0) ?></h2>
                    <div class="text-uppercase">Expiring BG Amount</div>
                </div>
            </div>
        </div><!--end widget-->
    </div><!--end col-->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="pull-left">List of Bank Guarantee</div>
                <div class="pull-right"><?php echo $this->session->flashdata('msg'); ?></div><br>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        //print_r($allbg);
                        ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Client / Firm Name</th>
                                    <th>Project Name</th>
                                    <th>Bank Detail</th>
                                    <th>Amount</th>
                                    <th>Create Date</th>
                                    <th>Expiry Date</th>
                                    <th>Days to Expire</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sr = 1;
                                foreach ($allbg as $value) {
                                    $time_period = $value['time_period'];
                                    ?>
                                    <tr onmouseover="highlight(this)" onmouseout="rem_highlight(this)" style="cursor: pointer">
                                        <td><?= $sr++ ?></td>
                                        <td><?= $value['clientname'] ?></td>
                                        <td><?= $value['project_title'] ?></td>
                                        <td>
                                            <?= $value['bankname'] ?><br>
                                            Branch : <?= $value['branch'] ?><br>
                                            Account Number : <?= $value['accountnumber'] ?><br>
                                            IFSC : <?= $value['ifsc_code'] ?>
                                        </td>
                                        <td><?= $this->customlib->inr_format($value['amount']) ?></td>
                                        <td><?= date('d M, Y', strtotime($value['create_on'])); ?></td>
                                        <td><?= $expireDate = date('d M, Y', strtotime('+' . $time_period . ' Month', strtotime($value['create_on']))); ?></td>
                                        <td>
                                            <?php
                                            $now = time(); // or your date as well
                                            $your_date = strtotime('+' . $time_period . ' Month', strtotime($value['create_on']));
                                            $datediff = $your_date - $now;

                                            echo round($datediff / (60 * 60 * 24));
                                            ?>
                                        </td>
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


