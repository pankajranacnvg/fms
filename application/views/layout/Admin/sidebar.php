<?php 
    $module = $this->customlib->getPrivilege(); 
    $userdetail = $this->customlib->userdetail();
?>
<!--left navigation start-->
<aside class="float-navigation light-navigation">
    <div class="nano">
        <div class="nano-content">
            <ul class="metisMenu nav" id="menu">
                <li class="nav-heading text-center">
                    <?php
                        if(!is_null($userdetail['logo'])){
                            ?> <img src="<?=base_url('assets/images/Logo/'.$userdetail['logo'])?>" style="width:100px;"> <?php
                        }
                    ?>
                    <p style="font-size: 16px; color: #000; margin: 0;"><?=$userdetail['organisation_name']?></p>
                </li>
                <hr>
                <?php
                if (array_search('Dashboard', $module) !== FALSE) {
                    ?>
                    <li class="<?= $this->session->userdata('active') == 'Dashboard' ? 'active' : '' ?>">
                        <a href="<?= base_url('Admin/Dashboard') ?>"><i class="icon-home"></i> Dashboard</a>
                    </li>
                    <?php
                }
                ?>

                <?php
                if (array_search('ManageChild', $module) !== FALSE) {
                    ?>
                    <li class="<?= $this->session->userdata('active') == 'ManageChild' ? 'active' : '' ?>">
                        <a href="<?= base_url('Admin/ManageChild') ?>"><i class="icon-user"></i> Child Management</a>
                    </li>
                    <?php
                }
                ?>

                <?php
                if (array_search('ManageProject', $module) !== FALSE) {
                    ?>
                    <li class="<?= $this->session->userdata('active') == 'ManageProject' ? 'active' : '' ?>">
                        <a href="<?= base_url('Admin/ManageProject') ?>"><i class="icon-info"></i> Project Management</a>
                    </li>
                    <?php
                }
                ?>

                <?php
                if (array_search('ManageFund', $module) !== FALSE) {
                    ?>
                    <li class="<?= $this->session->userdata('active') == 'ManageFund' ? 'active' : '' ?>">
                        <a href="<?= base_url('Admin/ManageFund') ?>"><i class="icon-wrench"></i> Fund Management</a>
                    </li>
                    <?php
                }
                ?>

                <?php
                if (array_search('LedgerReport', $module) !== FALSE) {
                    ?>
                    <li class="<?= $this->session->userdata('active') == 'LedgerReport' ? 'active' : '' ?>">
                        <a href="<?= base_url('Admin/LedgerReport') ?>"><i class="icon-compass"></i> Ledger Report</a>
                    </li>
                    <?php
                }
                ?>


                <?php
                if (array_search('BankGuarantee', $module) !== FALSE) {
                    ?>
                    <li class="<?= $this->session->userdata('active') == 'BankGuarantee' ? 'active' : '' ?>">
                        <a href="<?= base_url('Admin/BankGuarantee') ?>"><i class="icon-badge"></i> Bank Guarantee</a>
                    </li>
                    <?php
                }
                ?>

                <?php
                if (array_search('FundTracking', $module) !== FALSE) {
                    ?>
                    <li class="<?= $this->session->userdata('active') == 'FundTracking' ? 'active' : '' ?>">
                        <a href="<?= base_url('Admin/FundTracking') ?>"><i class="icon-compass"></i> Bank Fund Tracking</a>
                    </li>
                    <?php
                }
                ?>

                <?php
                if (array_search('Report', $module) !== FALSE) {
                    ?>
                    <li class="<?= $this->session->userdata('active') == 'Report' ? 'active' : '' ?>">
                        <a href="<?= base_url('Admin/Report') ?>"><i class="icon-puzzle"></i> Reports</a>
                    </li>
                    <?php
                }
                ?>

                <?php
                if (array_search('Setting', $module) !== FALSE) {
                    ?>
                    <li class="<?= $this->session->userdata('active') == 'Setting' ? 'active' : '' ?>">
                        <a href="<?= base_url('Admin/Setting') ?>"><i class="icon-settings"></i> Settings</a>
                    </li>
                    <?php
                }
                ?>


                <li>
                    <a href="<?= base_url('Setting/logout')?>" class="bg-danger">
                        <i class="icon-logout"></i>Logout
                    </a>
                </li>
            </ul>
        </div><!--nano content-->
    </div><!--nano scroll end-->
</aside>
<!--left navigation end-->
<!--main content start-->
<section class="main-content container">
    <!--page header start-->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h4><?= $topbar ?></h4>
            </div>
            <div class="col-sm-6 text-right">
                <ol class="breadcrumb">
                    <?php
                    if ($active == 'BankGuarantee') {
                        ?> <li><a href="<?= base_url('Admin/BankGuarantee/add') ?>" class="btn btn-dropbox">Add New Bank Guarantee</a></li> <?php
                    } elseif ($active == 'BankGuarantee_add') {
                        ?> <li><a href="<?= base_url('Admin/BankGuarantee') ?>" class="btn btn-dropbox">Back</a></li> <?php
                        } else {
                            ?>
                        <li><a href="javascript: void(0);"><i class="fa fa-home"></i></a></li>
                        <li><?= $topbar ?></li>
                        <?php
                    }
                    ?>
                </ol>
            </div>
        </div>
    </div>
    <!--page header end-->