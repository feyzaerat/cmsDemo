<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title </b>". lang('is-updating'); ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Portfolios/update/$item->id"); ?>" method="post">
                    <div class="row">
                        <div class="col-xl-6 col-l-6 col-md-6 col-sm-12 col-xs-12" >
                            <div class="form-group">
                                <label><?php echo lang('title')?></label>
                                <input class="form-control" placeholder="<?php echo lang('title')?>" name="title"
                                       value="<?php echo (isset($form_error)) ? set_value("title") : $item->title; ?>">
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-l-6 col-md-6 col-sm-12 col-xs-12" >
                            <div class="form-group">
                                <label><?php echo lang('category')?></label>
                                <select name="category_id" class="form-control">
                                    <?php foreach($categories as $category) { ?>
                                        <?php $category_id = isset($form_error) ? set_value("category_id") : $item->category_id; ?>
                                        <option
                                            <?php echo ($category->id === $category_id) ? "selected" : ""; ?>
                                                value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                                    <?php } ?>
                                </select>
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("category_id"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-l-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group " >
                                <label for="datetimepicker1" ><?php echo lang('end-date')?></label>
                                <input
                                        type="hidden"
                                        name="finishedAt"
                                        id="datetimepicker1"
                                        data-plugin="datetimepicker"
                                        data-options="{ inline: true, viewMode: 'days' , format : 'YYYY-MM-DD HH:mm:ss' }"
                                        value="<?php echo (isset($form_error)) ? set_value("finishedAt") : $item->finishedAt; ?>" >
                            </div>
                        </div>
                        <div class="col-xl-8 col-l-8 col-md-8 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-xl-12 col-l-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label><?php echo lang('customer')?></label>
                                        <input class="form-control" placeholder="<?php echo lang('customer')?>" name="client"
                                               value="<?php echo (isset($form_error)) ? set_value("client") : $item->client; ?>"
                                        >
                                        <?php if(isset($form_error)){ ?>
                                            <small class="pull-right input-form-error"> <?php echo form_error("client"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-l-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label><?php echo lang('place')?></label>
                                        <input class="form-control" placeholder="<?php echo lang('place')?>" name="place"
                                               value="<?php echo (isset($form_error)) ? set_value("place") : $item->place; ?>"
                                        >
                                        <?php if(isset($form_error)){ ?>
                                            <small class="pull-right input-form-error"> <?php echo form_error("place"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-l-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input class="form-control" placeholder="URL" name="portfolio_url"
                                               value="<?php echo (isset($form_error)) ? set_value("portfolio_url") : $item->portfolio_url; ?>"
                                        >
                                        <?php if(isset($form_error)){ ?>
                                            <small class="pull-right input-form-error"> <?php echo form_error("portfolio_url"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('description')?></label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}">
                            <?php echo (isset($form_error)) ? set_value("description") : $item->description; ?>
                        </textarea>
                    </div>

                    <?php if(isDemoUpdate()){ ?>
                    <button type="submit" class="btn btn-primary btn-md btn-outline"><?php echo lang('update')?></button>
                    <?php }?>
                    <a href="<?php echo base_url("Portfolios"); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>