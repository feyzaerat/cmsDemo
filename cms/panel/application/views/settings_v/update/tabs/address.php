<div role="tabpanel" class="tab-pane fade" id="tab-2">
    <div class="row">
        <div class="form-group col-xl-12 col-l-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="form-group">
                <label><?php echo lang('enter-address')?></label>
                <textarea name="address" class="m-0" data-plugin="summernote" data-options="{height: 250}" >
                  <?php echo isset($form_error) ? set_value("address") : $item->address;?>
                </textarea>
            </div>
        </div>
    </div>

</div><!-- .tab-pane  -->
