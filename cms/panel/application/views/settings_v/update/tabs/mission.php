<div role="tabpanel" class="tab-pane fade" id="tab-5">
    <div class="row">
        <div class="form-group col-xl-12 col-l-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="form-group">
                <label><?php echo lang('our-mission')?></label>
                <textarea name="mission" class="m-0" data-plugin="summernote" data-options="{height: 250}">
                                            <?php echo isset($form_error) ? set_value("mission") : $item->mission;?>
                                        </textarea>
            </div>
        </div>
    </div>
</div><!-- .tab-pane  -->
