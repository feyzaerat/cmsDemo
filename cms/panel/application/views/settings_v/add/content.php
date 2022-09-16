<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo lang('add-new-page-setting')?>
        </h4>
    </div><!-- END column -->


    <div class="col-md-12">
        <form action="<?php echo base_url("Settings/save"); ?>" method="post" enctype="multipart/form-data">

          <div class="widget">
            <div class="m-b-lg nav-tabs-horizontal">
                <!-- tabs list -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-3" role="tab" data-toggle="tab"><?php echo lang('site-info')?></a></li>
                    <li role="presentation"><a href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab"><?php echo lang('address')?></a></li>
                    <li role="presentation"><a href="#tab-3" aria-controls="tab-3" role="tab" data-toggle="tab"><?php echo lang('about-us')?></a></li>
                    <li role="presentation"><a href="#tab-4"  aria-controls="tab-4" role="tab" data-toggle="tab"><?php echo lang('vision')?></a></li>
                    <li role="presentation"><a href="#tab-5"  aria-controls="tab-5" role="tab" data-toggle="tab"><?php echo lang('mission')?></a></li>
                    <li role="presentation"><a href="#tab-6"  aria-controls="tab-6" role="tab" data-toggle="tab"><?php echo lang('social-media')?></a></li>
                    <li role="presentation"><a href="#tab-7"  aria-controls="tab-7" role="tab" data-toggle="tab"><?php echo lang('logo')?></a></li>
                    <li role="presentation"><a href="#tab-8"  aria-controls="tab-8" role="tab" data-toggle="tab"><?php echo lang('footer')?></a></li>
                </ul><!-- .nav-tabs -->

                <!-- Tab panes -->

                   <div class="tab-content p-md">

                       <?php $this->load->view("{$vFolder}/{$subFolder}/tabs/site_info")?>

                       <?php $this->load->view("{$vFolder}/{$subFolder}/tabs/address")?>

                       <?php $this->load->view("{$vFolder}/{$subFolder}/tabs/about_us")?>

                       <?php $this->load->view("{$vFolder}/{$subFolder}/tabs/vision")?>

                       <?php $this->load->view("{$vFolder}/{$subFolder}/tabs/mission")?>

                       <?php $this->load->view("{$vFolder}/{$subFolder}/tabs/social_media")?>

                       <?php $this->load->view("{$vFolder}/{$subFolder}/tabs/logo")?>



                   </div><!-- .tab-content  -->

            </div><!-- .nav-tabs-horizontal -->

          </div><!-- .widget -->
            <div class="widget">
                <div class="widget-body">
                    <?php if(isDemo()){ ?>
                        <button type="submit" class="btn btn-primary btn-md btn-outline"><?php echo lang('save')?></button>
                    <?php }?>
                    <a href="<?php echo base_url(""); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </div>
            </div>
        </form>
    </div><!-- END column -->


</div>