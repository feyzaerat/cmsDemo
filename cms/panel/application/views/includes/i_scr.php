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
<script src="<?php echo base_url("assets"); ?>/libs/bower/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/PACE/pace.min.js"></script>




<!--<script src=" <?php echo base_url("assets"); ?>/js/app.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/js/library.js"></script>-->
<?php $this->load->view("includes/library"); ?>
<script src="<?php echo base_url("assets"); ?>/js/plugins.js"></script>
<script src="<?php echo base_url("assets"); ?>/js/app.js"></script>

<script src="<?php echo base_url("assets"); ?>/libs/bower/moment/moment.js"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/js/fullcalendar.js"></script>
<!--<script src="<?php echo base_url("assets"); ?>/js/scripts.js"></script>-->

<script src="<?php echo base_url("assets"); ?>/js/sweetalert2.all.js"></script>
<script src="<?php echo base_url("assets"); ?>/js/iziToast.min.js"></script>
<?php $this->load->view("includes/alert"); ?>


<!--<script src="<?php echo base_url("assets"); ?>/js/custom.js"></script>-->
