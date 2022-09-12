<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo lang('add-new-portfolio-cat')?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Portfolio_categories/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><?php echo lang('title')?></label>
                        <input class="form-control" placeholder="<?php echo lang('title')?>" name="title">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <br/>


                    <button type="submit" class="btn btn-primary btn-md btn-outline"><?php echo lang('save')?></button>
                    <a href="<?php echo base_url("Portfolio_categories"); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>