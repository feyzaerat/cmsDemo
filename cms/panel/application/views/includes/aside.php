<?php $user = getActiveUser();?>

<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <a href="javascript:void(0)"><img  width="20" height="30" class="img-responsive" src="<?php echo base_url('uploads/users_v/').$user->img_url ?>" alt="avatar"/></a>
                </div><!-- .avatar -->
            </div>
            <div class="media-body">
                <div class="foldable">
                    <h5><a href="javascript:void(0)" class="username"><?php echo $user->full_name ?></a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <small><?php echo lang('actions')?></small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="<?php echo base_url();?>">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span><?php echo lang('home')?></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("Users/updateForm/$user->id")?>">
                                        <span class="m-r-xs"><i class="fa fa-server"></i></span>
                                        <span><?php echo lang('my-account')?></span>
                                    </a>
                                </li>


                                <li>
                                    <a class="text-color" href="<?php echo base_url("Settings")?>">
                                        <span class="m-r-xs"><i class="fa fa-gear"></i></span>
                                        <span><?php echo lang('settings')?></span>
                                    </a>
                                </li>



                                <li role="separator" class="divider"></li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("Login/logout")?>">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span><?php echo lang('logout')?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">

                <?php if(isAllowedViewModule('Settings')){?>
                <li>
                    <a href="<?php echo base_url("Settings")?>">
                        <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                        <span class="menu-text"><?php echo lang('site-settings')?></span>
                    </a>
                </li>
                <?php }?>

                <?php if(isAllowedViewModule("Email_settings")){?>
                <li>
                    <a href="<?php echo base_url("Email_settings")?>">
                        <i class="menu-icon zmdi zmdi-email zmdi-hc-lg"></i>
                        <span  class="menu-text"><?php echo lang('mail-settings')?></span>
                    </a>
                </li>
                <?php }?>


                <?php if(isAllowedViewModule("User_roles")){?>
                <li>
                    <a href="<?php echo base_url("User_roles")?>">
                        <i class="menu-icon fa fa-key zmdi-hc-lg"></i>
                        <span class="menu-text"><?php echo lang('user-roles')?></span>
                    </a>
                </li>
                <?php }?>
                <?php if(isAllowedViewModule("Users")){?>
                <li>
                    <a href="<?php echo base_url("Users"); ?>">
                        <i class="menu-icon fa fa-user-secret"></i>
                        <span class="menu-text"><?php echo lang('users')?></span>
                    </a>
                </li>
                <?php }?>
                <?php if(isAllowedViewModule("Logs")){?>
                    <li>
                        <a href="<?php echo base_url("Logs"); ?>">
                            <i class="menu-icon fa fa-history"></i>
                            <span class="menu-text"><?php echo lang('logs')?></span>
                        </a>
                    </li>
                    <hr>
                <?php }?>
                <?php if(isAllowedViewModule("Galleries")){?>
                <li>
                    <a href="<?php echo base_url("Galleries"); ?>">
                    <span class="menu-text"><?php echo lang('galleries')?></span>
                    <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                    </a>
                </li>
                <?php }?>
    
                <?php if(isAllowedViewModule("Product")){?>
                <li>
                    <a href="<?php echo base_url("Product"); ?>">
                        <i class="menu-icon fa fa-cubes"></i>
                        <span class="menu-text"><?php echo lang('products')?></span>
                    </a>
                </li>
                <?php }?>
                
                <?php if(isAllowedViewModule("Services")){?>
                <li>
                    <a href="<?php echo base_url("Services"); ?>">
                        <i class="menu-icon zmdi zmdi-view-list zmdi-hc-lg"></i>
                        <span class="menu-text"><?php echo lang('services')?></span>
                    </a>
                </li>
                <?php }?>
                <?php if(isAllowedViewModule("Portfolio_categories") && isAllowedViewModule("Portfolios")){?>

                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon fa fa-asterisk "></i>
                        <span class="menu-text"><?php echo lang('portfolio-actions')?></span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo base_url("Portfolio_categories"); ?>">
                                <i class="menu-icon zmdi zmdi-view-list-alt zmdi-hc-lg"></i>
                                <span class="menu-text"><?php echo lang('portfolio-categories')?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("Portfolios"); ?>">
                                <i class="menu-icon zmdi zmdi-view-list-alt zmdi-hc-lg"></i>
                                <span class="menu-text"><?php echo lang('portfolios')?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php }?>
                <?php if(isAllowedViewModule("News")){?>
                <li>
                    <a href="<?php echo base_url("News"); ?>">
                        <i class="menu-icon fa fa-newspaper-o"></i>
                        <span class="menu-text"><?php echo lang('news')?></span>
                    </a>
                </li>
                <?php }?>
                <?php if(isAllowedViewModule("Courses")){?>
                <li>
                    <a href="<?php echo base_url("Courses"); ?>">
                        <i class="menu-icon fa fa-calendar"></i>
                        <span class="menu-text"><?php echo lang('courses')?></span>
                    </a>
                </li>
                <?php }?>
                <?php if(isAllowedViewModule("References")){?>
                <li>
                    <a href="<?php echo base_url("References"); ?>">
                        <i class="menu-icon zmdi zmdi-check zmdi-hc-lg"></i>
                        <span class="menu-text"><?php echo lang('references')?></span>
                    </a>
                </li>
                <?php }?>
                <?php if(isAllowedViewModule('Brands')){?>
                <li>
                    <a href="<?php echo base_url("Brands"); ?>">
                        <i class="menu-icon zmdi zmdi-puzzle-piece zmdi-hc-lg"></i>
                        <span class="menu-text"><?php echo lang('brands')?></span>
                    </a>
                </li>
                <?php }?>
                
                
                <?php if(isAllowedViewModule("Dashboard")){?>
                <li>
                    <a href="<?php echo base_url(""); ?>">
                        <i class="menu-icon zmdi zmdi-view-web zmdi-hc-lg"></i>
                        <span class="menu-text"><?php echo lang('dashboard')?></span>
                    </a>
                </li>
                <?php }?>
            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>