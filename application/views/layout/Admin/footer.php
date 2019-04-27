<!--Start footer-->
<footer class="footer">
    <span>Copyright &copy; <?= date('Y') ?>. <?= $this->lang->line('project_name'); ?></span>
</footer>
<!--end footer-->

</section>
<!--end main content-->



<!--Common plugins-->
<script src="<?= base_url('assets/plugins/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/pace/pace.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/nano-scroll/jquery.nanoscroller.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/metisMenu/metisMenu.min.js') ?>"></script>
<script src="<?= base_url('assets/js/float-custom.js') ?>"></script>
<!--page script-->
<script src="<?= base_url('assets/plugins/chart-c3/d3.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/chart-c3/c3.min.js') ?>"></script>
<!-- iCheck for radio and checkboxes -->
<script src="<?= base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
<!-- Datatables-->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/toast/jquery.toast.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dashboard-alpha.js') ?>"></script>
<script src="plugins/toast/jquery.toast.min.js"></script>
<script>
    $(document).ready(function () {
        
        $(".toastr1").click(function () {
            $.toast({
                heading: 'Welcome back Emily',
                text: 'A simple and easy to use bootstrap admin template',
                position: 'top-right',
                loaderBg: '#fff',
                icon: 'info',
                hideAfter: 3000,
                stack: 1
            });
        });
        $(".toastr2").click(function () {
            $.toast({
                heading: 'Welcome back Emily',
                text: 'A simple and easy to use bootstrap admin template',
                position: 'top-right',
                loaderBg: '#fff',
                icon: 'warning',
                hideAfter: 3000,
                stack: 1
            });
        });
        $(".kycupdate_success").click(function () {
            $.toast({
                heading: 'KYC Updation',
                text: 'KYC for the child has been updated',
                position: 'top-right',
                loaderBg: '#fff',
                icon: 'success',
                hideAfter: 3000,
                stack: 1
            });
        });
        $(".BankGuarantee").click(function () {
            $.toast({
                heading: 'Bank Guarantee',
                text: 'Bank Guarantee Added Successfully',
                position: 'top-right',
                loaderBg: '#fff',
                icon: 'success',
                hideAfter: 3000,
                stack: 1
            });
        });
        
        
    });


    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
    

    function isNumberKey(evt, element) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57) && !(charCode == 46))
        return false;
      else {
        var len = $(element).val().length;
        var index = $(element).val().indexOf('.');
        if (index > 0 && charCode == 46) {
          return false;
        }
        if (index > 0) {
          var CharAfterdot = (len + 1) - index;
          if (CharAfterdot > 3) {
            return false;
          }
        }

      }
      return true;
    }

</script>

</body>

</html>