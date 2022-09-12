<?php $settings = getSettings();?>

<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
    <!-- navbar header -->
    <div class="navbar-header">
        <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
        </button>

        <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="zmdi zmdi-hc-lg zmdi-more"></span>
        </button>

        <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="zmdi zmdi-hc-lg zmdi-search"></span>
        </button>
        <a href="<?php echo base_url('Dashboard')?>" class="navbar-brand">
            <span class="brand-icon">
        <?php if ($settings->logo !="default") {?>
             <img class="img-responsive text-center" width="40" src="<?php echo base_url("uploads/settings_v/$settings->logo");?>">
        <?php } else {?>
             <img class="img-responsive text-center" width="40" src="<?php echo base_url("assets/images/default_logo.png") ?>">
        <?php }?>
        </span>
            <span class="brand-name " style="font-size: medium"><?php echo $settings->company_name;?> </span>
        </a>
    </div><!-- .navbar-header -->

    <div class="navbar-container container-fluid">
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
                <li class="hidden-float hidden-menubar-top">
                    <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger">
                        <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                    </a>
                </li>
                <li>
                    <h5 class="page-title hidden-menubar-top hidden-float">Dashboard</h5>
                </li>
            </ul>
            <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle usertitle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                            <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z"/>
                            <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z"/>
                        </svg>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu animated flipInY">
                        <li>
                            <a class="text-color" href="<?=base_url('language/change/'.'tr')?>">
                                <img class="mr-2"
                                     src="<?=base_url('assets/images/lang/tr.svg')?>"
                                     style="height:20px"> <?=lang('langTurkish')?>

                            </a>
                        </li>
                        <li>
                            <a class="text-color" href="<?=base_url('language/change/'.'en')?>">
                                <img class="mr-2"
                                     src="<?=base_url('assets/images/lang/en.svg')?>"
                                     style="height:20px"> <?=lang('langEnglish')?>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-notifications"></i></a>
                    <div class="media-group dropdown-menu animated flipInY">
                        <a href="javascript:void(0)" class="media-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="avatar avatar-xs avatar-circle">
                                        <img src="" alt="">
                                        <i class="status status-online"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">John Doe</h5>
                                    <small class="media-meta">Active now</small>
                                </div>
                            </div>
                        </a><!-- .media-group-item -->

                        <a href="javascript:void(0)" class="media-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="avatar avatar-xs avatar-circle">
                                        <img src="" alt="">
                                        <i class="status status-offline"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">John Doe</h5>
                                    <small class="media-meta">2 hours ago</small>
                                </div>
                            </div>
                        </a><!-- .media-group-item -->

                        <a href="javascript:void(0)" class="media-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="avatar avatar-xs avatar-circle">
                                        <img src="" alt="">
                                        <i class="status status-away"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">Sara Smith</h5>
                                    <small class="media-meta">idle 5 min ago</small>
                                </div>
                            </div>
                        </a><!-- .media-group-item -->

                        <a href="javascript:void(0)" class="media-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="avatar avatar-xs avatar-circle">
                                        <img src="" alt="">
                                        <i class="status status-away"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">Donia Dyab</h5>
                                    <small class="media-meta">idle 5 min ago</small>
                                </div>
                            </div>
                        </a><!-- .media-group-item -->
                    </div>
                </li>

                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-account"></i></a>
                    <ul class="dropdown-menu animated flipInY">
                        <li><a href="<?php echo base_url('profile')?>"><i class="zmdi m-r-md zmdi-hc-lg zmdi-account-box"></i><?php echo lang('my-profile')?></a></li>
                        <li><a href="javascript:void(0)"><i class="zmdi m-r-md zmdi-hc-lg zmdi-balance-wallet"></i>Balance</a></li>
                        <li><a href="javascript:void(0)"><i class="zmdi m-r-md zmdi-hc-lg zmdi-phone-msg"></i>Connection<span class="label label-primary">3</span></a></li>
                        <li><a href="<?php echo base_url('Logout')?>"><i class="m-r-md  fa fa-power-off"></i><?php echo lang('logout')?></a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:void(0)" class="side-panel-toggle" data-toggle="class" data-target="#side-panel" data-class="open" role="button"><i class="zmdi zmdi-hc-lg zmdi-apps"></i></a>
                </li>
            </ul>


        </div>
    </div><!-- navbar-container -->
</nav>