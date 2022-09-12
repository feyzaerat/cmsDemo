<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo lang('page-settings')?>
            <a href="<?php echo base_url("Settings/newForm"); ?>" class="add btn  btn-xs pull-right"> <i class="fa fa-plus"></i> <?php echo lang('add-new')?></a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p><?php echo lang('no-data')?> <?php echo lang('for-add')?> <a href="<?php echo base_url("Settings/newForm"); ?>"><?php echo lang('click-here')?></a></p>
                </div>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>