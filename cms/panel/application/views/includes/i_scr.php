<script>
    function demoAlert(){
        //alert("");
        swal({
            title: "<?php echo lang('no-auth-title') ?>",
            text: "<?php echo lang('no-auth-desc') ?>",
            type: "warning",
              }).then(function (result) {
            if (result.value) {
                window.location.href = $data_url;
            }
        });
    }
</script>
<script src="<?php echo cdn();?>assets/libs/bower/jquery/dist/jquery.js"></script>
<script src="<?php echo cdn();?>assets/libs/bower/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo cdn();?>assets/libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
<script src="<?php echo cdn();?>assets/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
<script src="<?php echo cdn();?>assets/libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="<?php echo cdn();?>assets/libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="<?php echo cdn();?>assets/libs/bower/PACE/pace.min.js"></script>




<?php $this->load->view("includes/library"); ?>
<script src="<?php echo cdn();?>assets/js/plugins.js"></script>
<script src="<?php echo cdn();?>assets/js/app.js"></script>

<script src="<?php echo cdn();?>assets/libs/bower/moment/moment.js"></script>
<script src="<?php echo cdn();?>assets/libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="<?php echo cdn();?>assets/js/fullcalendar.js"></script>

<script src="<?php echo cdn();?>assets/js/sweetalert2.all.js"></script>
<script src="<?php echo cdn();?>assets/js/iziToast.min.js"></script>
<?php $this->load->view("includes/alert"); ?>


