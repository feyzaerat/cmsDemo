<?php $a_user = getActiveUser(); ?>


            <!-- Page header start -->
            <div class="page-title">
                <div class="row gutters">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <h5 class="title">Chat App</h5>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
                </div>
            </div>
            <!-- Page header end -->

            <!-- Content wrapper start -->
            <div class="content-wrapper">
                <button id="btn1" onclick="toChat()">First Button</button>
                <button id="btn2">Second Button</button
                <!-- Row start -->
                <div class="row gutters">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <div class="card m-0">

                            <!-- Row start -->
                            <div class="row no-gutters">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                                    <div class="users-container">
                                        <div class="chat-search-box">
                                            <div class="input-group">
                                                <input class="form-control" placeholder="Search">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="users">
                                            <?php foreach ($users as $user){?>
                                            <li class="person" data-chat="person1">
                                                <div class="user">
                                                    <img src="<?php echo base_url('uploads/users_v/').$user->img_url?>" alt="Retail Admin">
                                                    <span class="status offline"></span>
                                                </div>
                                                <p class="name-time">
                                                    <span class="name"><a><?php echo $user->full_name?></a></span>
                                                    <span class="time"><?php echo get_readable_date($user->createdAt)?></span>
                                                </p>
                                            </li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url("ChatController/save")?>">


                                    <div class="selected-user">
                                        <span>To: <span class="name">Emily Russell <h1 id="ReciverName_txt"><?php echo $chatTitle;?></h1> </span></span>
                                    </div>
                                    <div class="chat-container">
                                        <?php
                                        $obj=&get_instance();
                                        $obj->load->model('UserModel');
                                        $profile_url = $obj->UserModel->PictureUrl();
                                        $user=$obj->UserModel->GetUserData();
                                        ?>
                                        
                                        <ul class="chat-box chatContainerScroll">
                                            <?php foreach ($users as $user){?>
                                            <?php foreach ($chats as $chat){?>
                                            <?php if ($a_user->id != $chat->sender_id && $user->id === $chat->receiver_id){?>
                                            <li class="chat-left">
                                                    <div class="chat-hour"><?php echo get_readable_hour( $chat->createdAt)?> <span class="fa fa-check-circle"></span></div>
                                                    <div class="chat-text"><?php echo $chat->message?></div>
                                                    <div class="chat-avatar">
                                                        <img src="<?php echo base_url('uploads/users_v/').$user->img_url?>" alt="Retail Admin">
                                                        <div class="chat-name"  id="receiver_name">><?php echo $user->full_name;?></div>
                                                    </div>
                                            </li><?php } if ($a_user->id === $chat->sender_id && $user->id === $chat->sender_id){?>
                                            <li class="chat-right">
                                                <div class="chat-hour"><?php echo get_readable_hour( $chat->createdAt)?> <span class="fa fa-check-circle"></span></div>
                                                <div class="chat-text"><?php echo $chat->message?></div>
                                                <div class="chat-avatar">
                                                    <img src="<?php echo base_url('uploads/users_v/').$a_user->img_url?>" alt="Retail Admin">
                                                    <div class="chat-name"><?php echo $a_user->full_name;?></div>
                                                </div>
                                            </li><?php }}}?>

                                        </ul>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group mt-3 mb-0">
                                                    <input type="text" class="form-control" name="message" rows="3" placeholder="Type your message here...">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary btn-md btn-outline btn-send"><i class="fa fa-send"></i></button>
                                            </div>

                                        </div>

                                    </div>

                                    </form>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>

                    </div>

                </div>
                <!-- Row end -->

            </div>
            <!-- Content wrapper end -->


