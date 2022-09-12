

        <!-- Main content -->

        <section class="content">
            <div class="row">



                <div class="col-md-8" id="chatSection">
                    <!-- DIRECT CHAT -->
                    <div class="box box-warning direct-chat direct-chat-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title" id="ReciverName_txt"><?=/*$chatTitle;*/""?></h3>

                            <div class="box-tools pull-right">
                                <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
                                <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>-->
                                <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Clear Chat"
                                         data-widget="chat-pane-toggle">
                                   <i class="fa fa-comments"></i></button>-->
                                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                 </button>-->
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages" id="content">
                                <!-- /.direct-chat-msg -->

                                <div id="dumppy"></div>

                            </div>
                            <!--/.direct-chat-messages-->

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <!--<form action="#" method="post">-->
                            <div class="input-group">
                                <?php
                                $obj=&get_instance();
                                $obj->load->model('UserModel');
                                //$profile_url = $obj->UserModel->PictureUrl();
                                //$user=$obj->UserModel->GetUserData();
                                $user=getActiveUser();
                                ?>

                                <input type="hidden" id="Sender_Name" value="<?php echo $user->id;?>">
                                <input type="hidden" id="Sender_ProfilePic" value="<?php echo $user->img_url?>">

                                <input type="hidden" id="ReciverId_txt">
                                <input type="text" name="message" placeholder="Type Message ..." class="form-control message">
                                <span class="input-group-btn">
                             <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>
                             <div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i>
                             <input type="file" name="file" class="upload_attachmentfile"/></div>
                          </span>
                            </div>
                            <!--</form>-->
                        </div>
                        <!-- /.box-footer-->
                    </div>
                    <!--/.direct-chat -->
                </div>




                <div class="col-md-4">
                    <!-- USERS LIST -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?=/*$strTitle;*/""?></h3>

                            <div class="box-tools pull-right">
                                <span class="label label-danger"><?=/*count($vendorslist);*/""?> <?=/*$strsubTitle;*/""?></span>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">

                                <?php if(!empty($users)){
                                    foreach($users as $v):
                                        ?>
                                        <li class="selectVendor" id="<?php echo $v->id;?>" title="<?php echo $v->full_name;?>">
                                            <img src="<?php echo $v->img_url;?>" alt="<?=/*$v['name'];*/""?>" title="<?=/*$v['name'];*/""?>">
                                            <a class="users-list-name" href="#"><?=/*$v['name'];*/""?></a>
                                            <!--<span class="users-list-date">Yesterday</span>-->
                                        </li>
                                    <?php endforeach;?>

                                <?php }else{?>
                                    <li>
                                        <a class="users-list-name" href="#">No Vendor's Find...</a>
                                    </li>
                                <?php  }?>


                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                        <!-- <div class="box-footer text-center">
                           <a href="javascript:void(0)" class="uppercase">View All Users</a>
                         </div>-->
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>
                <!-- /.col -->
            </div>

            <!-- /.row -->



        </section>

        <!-- /.content -->



    <!-- /.content-wrapper -->

