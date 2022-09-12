<!DOCTYPE html>
<html lang="<?php echo language()->langCode?>">
<head>
    <?php $this->load->view("includes/head"); ?>
    <?php $this->load->view("members_v/list/page_style"); ?>
    <?php $this->load->view("members_v/list/page_script"); ?>
    <script type="application/javascript" src="<?php echo base_url('assets/js/chat.js')?>" ></script>

    <link type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" >

    <script>
        function toChat(){

            alert('Button 1 clicked');
            //alert('fdfdfd');
        }
        $(document).ready(function() {
            $('#btn1').on('click', function() {
                alert('Button 1 clicked');

                $('#btn2').data('btn1-clicked', true);
            });

            $('#btn2').on('click', function() {
                var el = $(this);

                if (el.data('btn1-clicked')) {
                    alert('Button 2 clicked');
                } else {
                    alert('Please click the 1st button first');
                }
            })
        });
    </script>
</head>
<!-- APP CUSTOMIZER -->
<?php $this->load->view("includes/app-customizer"); ?>
<!-- #app-customizer -->




<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->

    <!-- APP NAVBAR ==========-->
    <?php $this->load->view("includes/navbar"); ?>
    <!--========== END app navbar -->

    <!-- APP ASIDE ==========-->
    <?php $this->load->view("includes/aside"); ?>
    <!--========== END app aside -->

    <!-- navbar search -->
    <?php $this->load->view("includes/navbar-search"); ?>
    <!-- .navbar-search -->

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <?php $this->load->view("{$vFolder}/{$subFolder}/content"); ?>
            </section><!-- #dash-content -->
        </div><!-- .wrap -->

        <!-- APP FOOTER -->
        <?php $this->load->view("includes/footer"); ?>
        <!-- /#app-footer -->
    </main>
    <!--========== END app main -->

    <?php $this->load->view("includes/i_scr"); ?>

</body>
</html>