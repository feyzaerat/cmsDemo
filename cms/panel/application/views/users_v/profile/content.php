<?php $user=getActiveUser();?>
<?php $friends=getUsers();?>
<div class="profile-header">
    <div class="profile-cover">
        <div class="cover-user m-b-lg">
            <div>
                <a href="javascript:void(0)" class="theme-color">
                    <span class="cover-icon"><i class="fa fa-envelope-o"></i></span>
                </a>
            </div>
            <div>
                <div class="avatar avatar-xl avatar-circle">
                    <a href="javascript:void(0)" >
                        <img class="img-responsive" src="<?php echo base_url('uploads/users_v/').$user->img_url ?>" alt="avatar"/>
                    </a>
                </div><!-- .avatar -->
            </div>
            <div>
                <a href="javascript:void(0)" class="theme-color">
                    <span class="cover-icon"><i class="fa fa-history"></i></span>
                </a>
            </div>
        </div>
        <div class="text-center">
            <h4 class="profile-info-name m-b-lg"><a href="javascript:void(0)" class="title-color"><?php echo $user->full_name?></a></h4>
            <div>
                <a href="javascript:void(0)" class="m-r-xl theme-color"><i class="fa fa-bolt m-r-xs"></i> <?php echo $user->user_role?></a>
                <a href="javascript:void(0)" class="theme-color">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
                    </svg>   <?php echo $user->job?></a>
            </div>
        </div>
    </div><!-- .profile-cover -->

    <div class="promo-footer">
        <div class="row no-gutter">
            <div class="col-sm-2 col-sm-offset-3 col-xs-6 promo-tab">
                <div class="text-center">
                    <small><i class="fa fa-phone m-r-xs"></i></small>
                    <small><?php echo lang('phone')?></small>
                    <h4 class="m-0 m-t-xs"><?php echo $user->phone?></h4>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6 promo-tab">
                <div class="text-center">
                    <small><i class="fa fa-envelope m-r-xs"></i></small>
                    <small><?php echo lang('mail-address')?></small>
                    <h4 class="m-0 m-t-xs"><?php echo $user->email?></h4>
                </div>
            </div>
            <div class="col-sm-2 col-xs-12 promo-tab">
                <div class="text-center">
                    <small><i class="fa fa-desktop m-r-xs"></i></small>
                    <small><?php echo lang('current-ip')?></small>
                    <h4 class="m-0 m-t-xs"><?php echo $ip = $this->input->ip_address();?></h4>
                </div>
            </div>
        </div>
    </div><!-- .promo-footer -->
</div><!-- .profile-header -->

<div class="wrap">
    <section class="app-content">

        <div class="row">
            <div class="col-md-12">
                <div id="profile-tabs" class="nav-tabs-horizontal white m-b-lg">
                    <!-- tabs list -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#profile-stream" aria-controls="stream" role="tab" data-toggle="tab"><?php echo lang('stream')?></a></li>
                        <li role="presentation"><a href="#profile-friends" aria-controls="friends" role="tab" data-toggle="tab"><?php echo lang('friends')?></a></li>
                    </ul><!-- .nav-tabs -->

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane in active fade" id="profile-stream">
                            <?php foreach ($friends as $friend){?>
                            <?php if($user->id != $friend->id){?>
                            <div class="media stream-post">
                                <div class="media-left">
                                    <div class="avatar avatar-lg avatar-circle">
                                        <img src="<?php echo base_url('uploads/users_v/').$friend->img_url?>" alt="">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading m-t-xs">
                                        <a href="javascript:void(0)"><?php echo $friend->full_name?></a>
                                        <small class="text-muted">posted an update</small>
                                    </h4>
                                    <small class="media-meta">Active 14 minute ago</small>
                                    <div class="stream-body m-t-xl">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae neque incidunt cumque, dolore eveniet porro asperiores itaque! Eligendi minus cupiditate molestiae praesentium, facilis, neque saepe, soluta sapiente aliquid modi sunt.</p>
                                    </div>
                                </div>
                            </div><!-- .stream-post -->
                            <?php }}?>


                        </div><!-- .tab-pane -->

                        <div role="tabpanel" id="profile-photos" class="tab-pane fade p-md">
                            <div class="gallery row">
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <div class="gallery-item">
                                        <div class="thumb">
                                            <a href="<?php echo base_url('assets/images/102.jpg')?>" data-lightbox="profile-gallery">
                                                <img class="img-responsive" src="<?php echo base_url('assets/images/102.jpg')?>" alt="">
                                            </a>
                                        </div>
                                        <div class="gallery-item-overlay">
											<span class="pull-left">
												<a href="#" data-toggle="modal" data-target="#likesModal"><i class="fa fa-thumbs-up"></i>105</a>
											</span>
                                            <span class="pull-right">
												<a href="#" data-toggle="modal" data-target="#likesModal"><i class="fa fa-comment"></i>20</a>
											</span>
                                        </div>
                                    </div><!-- .gallery-item -->
                                </div><!-- END column -->

                            </div><!-- .gallery -->
                        </div><!-- .tab-pane -->

                        <div role="tabpanel" class="tab-pane fade p-md" id="profile-friends">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="user-card">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar avatar-lg avatar-circle">
                                                    <a href="javascript:void(0)"><img src="" alt=""></a>
                                                    <i class="status status-online"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading"><a href="javascript:void(0)" class="title-color">John Doe</a></h5>
                                                <small class="media-meta">Web Developer</small>
                                            </div>
                                        </div>
                                    </div><!-- search-result -->
                                </div><!-- END column -->

                                <div class="col-md-6 col-sm-6">
                                    <div class="user-card">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar avatar-lg avatar-circle">
                                                    <a href="javascript:void(0)"><img src="" alt=""></a>
                                                    <i class="status status-offline"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading"><a href="javascript:void(0)" class="title-color">Ibraham Said</a></h5>
                                                <small class="media-meta">Web Designer</small>
                                            </div>
                                        </div>
                                    </div><!-- search-result -->
                                </div><!-- END column -->

                                <div class="col-md-6 col-sm-6">
                                    <div class="user-card">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar avatar-lg avatar-circle">
                                                    <a href="javascript:void(0)"><img src="" alt=""></a>
                                                    <i class="status status-away"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading"><a href="javascript:void(0)" class="title-color">Sally Adams</a></h5>
                                                <small class="media-meta">Graphical Designer</small>
                                            </div>
                                        </div>
                                    </div><!-- search-result -->
                                </div><!-- END column -->

                                <div class="col-md-6 col-sm-6">
                                    <div class="user-card">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar avatar-lg avatar-circle">
                                                    <a href="javascript:void(0)"><img src="" alt=""></a>
                                                    <i class="status status-offline"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading"><a href="javascript:void(0)" class="title-color">Jeffery Way</a></h5>
                                                <small class="media-meta">Software Engineer</small>
                                            </div>
                                        </div>
                                    </div><!-- search-result -->
                                </div><!-- END column -->

                                <div class="col-md-6 col-sm-6">
                                    <div class="user-card">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar avatar-lg avatar-circle">
                                                    <a href="javascript:void(0)"><img src="" alt=""></a>
                                                    <i class="status status-away"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading"><a href="javascript:void(0)" class="title-color">Adam Smith</a></h5>
                                                <small class="media-meta">UI Designer</small>
                                            </div>
                                        </div>
                                    </div><!-- search-result -->
                                </div><!-- END column -->

                                <div class="col-md-6 col-sm-6">
                                    <div class="user-card">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar avatar-lg avatar-circle">
                                                    <a href="javascript:void(0)"><img src="" alt=""></a>
                                                    <i class="status status-online"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading"><a href="javascript:void(0)" class="title-color">Sandy Matt</a></h5>
                                                <small class="media-meta">Lawyer</small>
                                            </div>
                                        </div>
                                    </div><!-- search-result -->
                                </div><!-- END column -->

                                <div class="col-md-6 col-sm-6">
                                    <div class="user-card">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar avatar-lg avatar-circle">
                                                    <a href="javascript:void(0)"><img src="" alt=""></a>
                                                    <i class="status status-offline"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading"><a href="javascript:void(0)" class="title-color">Sara Adams</a></h5>
                                                <small class="media-meta">Actress</small>
                                            </div>
                                        </div>
                                    </div><!-- search-result -->
                                </div><!-- END column -->

                                <div class="col-md-6 col-sm-6">
                                    <div class="user-card">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar avatar-lg avatar-circle">
                                                    <a href="javascript:void(0)"><img src="" alt=""></a>
                                                    <i class="status status-offline"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading"><a href="javascript:void(0)" class="title-color">John Doe</a></h5>
                                                <small class="media-meta">Factional Character</small>
                                            </div>
                                        </div>
                                    </div><!-- search-result -->
                                </div><!-- END column -->
                            </div><!-- .row -->
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- #profile-components -->
            </div><!-- END column -->
        </div><!-- .row -->
    </section><!-- #dash-content -->
</div><!-- .row -->

<!-- Likes/comments Modal -->
