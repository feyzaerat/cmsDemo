<!DOCTYPE html>
<html lang="<?php echo language()->langCode?>">
<head>
    <?php $this->load->view("includes/head"); ?>
    <?php $this->load->view("{$vFolder}/{$subFolder}/page_style"); ?>
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