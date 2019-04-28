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
                    if (!is_null($userdetail['logo'])) {
                        ?> <img src="<?= base_url('assets/images/Logo/' . $userdetail['logo']) ?>" style="width:100px;"> <?php
                    }
                    ?>
                    <p style="font-size: 16px; color: #000; margin: 0;"><?= $userdetail['organisation_name'] ?></p>
                </li>
                <hr>
                <?php
                if (array_search('Dashboard', $module) !== FALSE) {
                    ?>
                    <li class="<?= $this->session->userdata('active') == 'Dashboard' ? 'active' : '' ?>">
                        <a href="<?= base_url('Child/Dashboard') ?>"><i class="icon-home"></i> Dashboard</a>
                    </li>
                    <?php
                }
                ?>

                <?php
                if (array_search('ManageProject', $module) !== FALSE) {
                    ?>
                    <li class="<?= $this->session->userdata('active') == 'ManageProject' ? 'active' : '' ?>">
                        <a href="<?= base_url('Child/ManageProject') ?>"><i class="icon-info"></i> Manage Project</a>
                    </li>
                    <?php
                }
                ?>

                <?php
                if (array_search('ManageSupervisor', $module) !== FALSE) {
                    ?>
                    <li class="<?= $this->session->userdata('active') == 'ManageSupervisor' ? 'active' : '' ?>">
                        <a href="<?= base_url('Child/ManageSupervisor') ?>"><i class="icon-wrench"></i> Manage Supervisor</a>
                    </li>
                    <?php
                }
                ?>


                <li style="margin-top: 10px;">
                    <a href="<?= base_url('Setting/logout') ?>" class="bg-danger">
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