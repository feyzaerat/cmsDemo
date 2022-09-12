<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo lang('add-new-course')?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Courses/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><?php echo lang('title')?></label>
                        <input class="form-control" placeholder="<?php echo lang('title')?>" name="title">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label><?php echo lang('description')?></label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 200}"></textarea>
                    </div>



                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label><?php echo lang('educator')?></label>
                                <input class="form-control" placeholder="<?php echo lang('educator')?>" name="by">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                      <div class="form-group image_upload_container">
                        <div class="col-md-6">
                         <label><?php echo lang('choose-a-photo')?></label>
                         <input type="file" name="img_url" class="form-control">
                        </div>
                    </div>
                      <div class="form-group " style="margin-top: 27px !important;">
                            <div class="col-md-4 col-md-offset-1">
                                <label for="datetimepicker1" ><?php echo lang('course-date')?></label>
                                <input  type="hidden" name="event_date" id="datetimepicker1" data-plugin="datetimepicker" data-options="{ inline: true, viewMode: 'days' , format : 'YYYY-MM-DD HH:mm:ss' }">
                            </div>
                        </div>
                    </div>
                    <br/>







                   <button type="submit" class="btn btn-primary btn-md btn-outline"><?php echo lang('save')?></button>
                    <a href="<?php echo base_url("Courses"); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>