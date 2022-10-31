<?php $settings = getSettings();?>
<?php $user = getActiveUser();?>

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

                <?php if($settings->logo != "default"){ ?>
                    <img
                            width="60"
                            src="<?php echo base_url("uploads/settings_v/").$settings->logo ?>"
                            alt=""
                            class="img-responsive">

                <?php } else {?>

                    <img
                            width="60"
                            src="<?php echo base_url("assets/images/default_logo.png"); ?>"
                            alt=""
                            class="img-responsive">

                <?php } ?>

            </span>
            <span class="brand-name " style="font-size: medium;line-height: 45px!important;"><?php echo $settings->company_name;?> </span>
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
                        <li>
                            <a class="text-color" href="<?=base_url('language/change/'.'de')?>">
                                <img class="mr-2"
                                     src="<?=base_url('assets/images/lang/de.svg')?>"
                                     style="height:20px"> <?=lang('langGerman')?>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="<?php echo base_url('Logout')?>"><i class="m-r-md  fa fa-power-off"></i></a>

                </li>
            </ul>


        </div>
    </div><!-- navbar-container -->
</nav>