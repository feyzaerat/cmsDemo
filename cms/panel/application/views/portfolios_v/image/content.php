<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form data-url="<?php echo base_url("Portfolios/refresh_image_list/$item->id"); ?>" action="<?php echo base_url("Portfolios/imageUpload/$item->id"); ?>" id="dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '<?php echo base_url("Portfolios/imageUpload/$item->id"); ?>'}">
                    <div class="dz-message">
                        <h3 class="m-h-lg"><?php echo lang('drop-here')?></h3>
                        <p class="m-b-lg text-muted">(<?php echo lang('or-click-here')?>)</p>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>

<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <b><?php echo $item->title; ?> </b> <?php echo lang('of-entries')?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget "  style="overflow-x:auto;">
            <div class="widget-body image_list_container">

                <?php $this->load->view("{$vFolder}/{$subFolder}/render_elements/image_list_v"); ?>

            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>

