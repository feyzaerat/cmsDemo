<?php $permissions = json_decode($item->permissions); ?>


<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title</b>"?> <?php echo lang('change-of-perm')?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("User_roles/updatePermissions/$item->id"); ?>" method="post">
                 <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <th class="text-center"><?php echo lang('module-name')?></th>
                        <th class="text-center"><?php echo lang('view')?></th>
                        <th class="text-center"><?php echo lang('add')?></th>
                        <th class="text-center"><?php echo lang('edit')?></th>
                        <th class="text-center"><?php echo lang('delete')?></th>
                        </thead>
                        <tbody>
                        <?php foreach( getControllerList() as $controllerName ){?>
                        <tr>
                            <td><?php echo strtolower($controllerName)?></td>
                            <td class="w50 text-center">
                                <input type="checkbox"
                                       <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->read)) ? "checked" : "" ;?>
                                       id="read" class="read" name="permissions[<?php echo $controllerName; ?>][read]" data-switchery data-color="#10c469"/>
                            </td>
                            <td class="w50 text-center">
                                <input type="checkbox"
                                       <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->write)) ? "checked" : "" ;?>
                                       id="write" name="permissions[<?php echo $controllerName; ?>][write]" data-switchery data-color="#10c469"/>
                            </td>
                            <td class="w50 text-center">
                                <input type="checkbox"
                                       <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->update)) ? "checked" : "" ;?>
                                       id="update" name="permissions[<?php echo $controllerName; ?>][update]" data-switchery data-color="#10c469"/>
                            </td>
                            <td class="w50 text-center">
                                <input type="checkbox"
                                       <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->delete)) ? "checked" : "" ;?>
                                       id="delete" name="permissions[<?php echo $controllerName; ?>][delete]" data-switchery data-color="#10c469"/>
                            </td>

                        </tr>
                      <?php }?>
                        </tbody>

                    </table><br/>
                 </div>
                    <?php if(isDemoUpdate()){ ?>
                    <button type="submit" class="btn btn-primary btn-md btn-outline"><?php echo lang('update')?></button>
                    <?php }?>
                    <a href="<?php echo base_url("User_roles"); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>