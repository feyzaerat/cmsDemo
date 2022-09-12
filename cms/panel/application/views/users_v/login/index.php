<!DOCTYPE html>
<html lang="<?php echo language()->langCode?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Admin, Dashboard, Bootstrap" />
    <?php $settings = getSettings();?>
    <link rel="shortcut icon" sizes="196x196" href="<?php echo base_url("uploads/settings_v/$settings->logo"); ?>">
    <title><?php echo $settings->company_name.' '.lang('page-title') ?></title>
    <?php $this->load->view("{$vFolder}/{$subFolder}/page_style"); ?>
    <?php $this->load->view("{$vFolder}/{$subFolder}/style/login"); ?>
</head>

<body>
<!--============= start main area -->


    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <?php $this->load->view("{$vFolder}/{$subFolder}/content"); ?>

            </section><!-- #dash-content -->
        </div><!-- .wrap -->

    </main>
    <!--========== END app main -->

<?php $this->load->view("{$vFolder}/{$subFolder}/page_script"); ?>

</body>
</html>