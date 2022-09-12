<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title </b>". lang('is-updating'); ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Courses/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><?php echo lang('title')?></label>
                        <input class="form-control" placeholder="<?php echo lang('title')?>" name="title" value="<?php echo $item->title; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('description')?></label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 200}">
                            <?php echo $item->description?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><?php echo lang('educator')?></label>
                                        <input class="form-control" value="<?php echo $item->by?>" placeholder="<?php echo lang('educator')?>" name="by">
                                    </div>
                                    <div class="col-md-12" style="margin-top:25px">
                                        <div class="form-group image_upload_container">
                                            <label><?php echo lang('choose-a-photo')?></label>
                                            <input type="file" name="img_url" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12  image_upload_container ">
                                        <br/>
                                        <img width="750" src="<?php echo base_url("uploads/$vFolder/$item->img_url"); ?>" alt="" class="img-rounded text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-md-offset-1" style="margin-top: 125px;">
                                <label for="datetimepicker1" ><?php echo lang('course-date')?></label>
                                 <input value="<?php echo $item->event_date?>"
                                        type="hidden"
                                        name="event_date"
                                        id="datetimepicker1"
                                        data-plugin="datetimepicker"
                                        data-options="{ inline: true, viewMode: 'days' , format : 'YYYY-MM-DD HH:mm:ss' }"
                                 >
                            </div>

                        </div>
                    </div>
                    <div class="row">



                    </div>
                    <br/>

                    <?php if(isDemoUpdate()){ ?>
        <button type="submit" class="btn btn-primary btn-md btn-outline"><?php echo lang('update')?></button>
        <?php }?>
                    <a href="<?php echo base_url("Courses"); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>