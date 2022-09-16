<?php $user = getActiveUser();?>
<body onLoad="initClock()">

<div id="timedate" class="text-right">
    <a  class="clock-w" id="mon">January</a>
    <a  class="clock-w" id="d">1</a><a class="clock-w">,</a>
    <a  class="clock-w" id="y">0</a>
    <a  class="clock-w" id="h">12</a>  <a class="clock-w">:</a> <a  class="clock-w" id="m">00</a> <a class="clock-w">:</a> <a  class="clock-w" id="s">00</a>
    <a  class="clock-w" style="display: none" id="mi">000</a>
</div>
<hr style="border:0.75px solid #cccccc">

<h2  style="font-weight: bold"  class="widget-title text-muted"><?php echo lang('activities-of-today')?></h2>
<div class="row" style="margin-top: 1.5vw">
    <div class="col-md-3 text-center">
        <div class="panel panel-inverse panel-custom">
            <div class="panel-body">
                <header class="widget-header">
                    <h4 class="widget-title"><?php echo lang('courses')?></h4>
                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">
                    <div class="clearfix">
                        <div class="pull-left">
                            <div class="pieprogress text-warning" data-plugin="circleProgress" data-value="<?php echo $countCourses2/$countCourses?>" data-thickness="<?php echo $countCourses?>" data-start-angle="90" data-empty-fill="rgba(249, 200, 81, .3)" data-fill="{&quot;color&quot;: &quot;#f9c851&quot;}">
                                <strong><?php echo $countCourses2?></strong>
                            </div>
                        </div>
                        <div class="pull-right">
                            <h3 class="m-b-xs text-right counter" data-plugin="counterUp"><?php echo $countCourses?></h3>
                            <small class="text-muted"><?php echo lang('total')?> <?php echo lang('courses')?></small>
                        </div>
                    </div>
                </div><!-- .widget-body -->
                <a style="float: right" href="<?php echo base_url('add-new-course')?>" type="button" class="btn btn-outline btn-warning" title="<?php echo lang('add-new-course')?>"><i class="fa fa-plus"></i></a>
            </div>

        </div>
    </div><!-- END courses -->
    <div class="col-md-3 text-center">
        <div class="panel panel-inverse panel-custom">

            <div class="panel-body">
                <header class="widget-header">
                    <h4 class="widget-title"><?php echo lang('galleries')?></h4>
                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">
                    <div class="clearfix">
                        <div class="pull-left">
                            <div class="pieprogress text-success" data-plugin="circleProgress" data-value="<?php echo $countGalleries2/$countGalleries?>" data-thickness="<?php echo $countGalleries?>" data-start-angle="90" data-empty-fill="rgba(16, 196, 105,.3)" data-fill="{&quot;color&quot;: &quot;#10c469&quot;}">
                                <strong><?php echo $countGalleries2?></strong>
                            </div>
                        </div>
                        <div class="pull-right">
                            <h3 class="m-b-xs text-right counter" data-plugin="counterUp"><?php echo $countGalleries?></h3>
                            <small class="text-muted"><?php echo lang('total')?> <?php echo lang('galleries')?></small>
                        </div>
                    </div>
                </div><!-- .widget-body -->
                <a style="float: right" href="<?php echo base_url('add-new-galleries')?>" type="button" class="btn btn-outline btn-success" title="<?php echo lang('add-new-gallery')?>"><i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div><!-- END galleries -->
    <div class="col-md-3 text-center">
        <div class="panel panel-inverse panel-custom">

            <div class="panel-body">
                <header class="widget-header">
                    <h4 class="widget-title"><?php echo lang('news')?></h4>
                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">
                    <div class="clearfix">
                        <div class="pull-left">
                            <div class="pieprogress text-primary" data-plugin="circleProgress" data-value="<?php echo $countNews2/$countNews?>" data-thickness="<?php echo $countNews?>" data-start-angle="90" data-empty-fill="rgba(24, 138, 226, .3)" data-fill="{&quot;color&quot;: &quot;#188ae2&quot;}">
                                <strong><?php echo $countNews2?></strong>
                            </div>
                        </div>
                        <div class="pull-right">
                            <h3 class="m-b-xs text-right counter" data-plugin="counterUp"><?php echo $countNews?></h3>
                            <small class="text-muted"><?php echo lang('total')?> <?php echo lang('news')?></small>
                        </div>
                    </div>
                </div><!-- .widget-body -->
                <a style="float: right" href="<?php echo base_url('add-news')?>" type="button" class="btn btn-outline btn-primary" title="<?php echo lang('add-news')?>"><i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div><!-- END services -->
    <div class="col-md-3 text-center">
        <div class="panel panel-inverse panel-custom">

            <div class="panel-body">
                <header class="widget-header">
                    <h4 class="widget-title"><?php echo lang('products')?></h4>
                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">
                    <div class="clearfix">
                        <div class="pull-left">
                            <div class="pieprogress text-danger" data-plugin="circleProgress" data-value="<?php echo $countProducts2/$countProducts?>" data-thickness="<?php echo $countProducts?>" data-start-angle="90" data-empty-fill="rgba(255, 91, 91, .3)" data-fill="{&quot;color&quot;: &quot;#ff5b5b&quot;}">
                                <strong><?php echo $countProducts2?></strong>
                            </div>
                        </div>
                        <div class="pull-right">
                            <h3 class="m-b-xs text-right counter" data-plugin="counterUp"><?php echo $countProducts?></h3>
                            <small class="text-muted"><?php echo lang('total')?> <?php echo lang('products')?></small>
                        </div>
                    </div>
                </div><!-- .widget-body -->
                <a style="float: right" href="<?php echo base_url('add-new-product')?>" type="button" class="btn btn-outline btn-danger" title="<?php echo lang('add-new-product')?>"><i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div><!-- END product -->
</div>
<hr style="border:0.75px solid #cccccc">

<div class="row">
    <div class="col-md-3 col-sm-none">
        <h5 style="text-transform: uppercase;font-weight: bold" class="media-heading text-muted"> <?php echo lang('courses')?></h5>
    </div><!-- END courses title -->
    <div class="col-md-3 col-sm-none">
        <h5 style="text-transform: uppercase;font-weight: bold" class="media-heading text-muted"> <?php echo lang('galleries')?></h5>
    </div><!-- END galleries title -->
    <div class="col-md-3 col-sm-none">
        <h5 style="text-transform: uppercase;font-weight: bold" class="media-heading text-muted"> <?php echo lang('news')?></h5>
    </div><!-- END news title -->
    <div class="col-md-3 col-sm-none">
        <h5 style="text-transform: uppercase;font-weight: bold" class="media-heading text-muted"> <?php echo lang('users')?></h5>
    </div><!-- END users title -->
</div><br>
<div class="row">
    <div class="col-md-3 text-center">
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($courses as $item){?>
                    <div class="panel panel-inverse panel-custom">

                        <div class="panel-body">
                            <div class="user-card contact-item p-md">
                                <div class="media">
                                    <div class="media-middle">

                                            <div class="card-img" style="width: 200px;margin:0 auto">
                                                <img src="<?php echo base_url("uploads/courses_v/$item->img_url")?>" alt="<?php echo $item->img_url?>">
                                            </div>

                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading title-color"><?php echo strtoupper($item->title)?></h5>
                                        <small class="media-meta"><?php echo get_readable_date($item->event_date)?></small>
                                        <small class="text-muted">...</small>
                                        <div class="contact-links m-t-sm">
                                            <a href="<?php echo base_url("Courses/updateForm/$item->id")?>" class="icon icon-circle icon-sm m-b-0" data-toggle="tooltip" title="<?php echo lang('edit')?>" data-placement="top"><i class="fa fa-edit"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- user-card -->
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div><!-- END courses -->
    <div class="col-md-3 text-center">
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($galleries as $gallery){?>
                    <div class="panel panel-inverse panel-custom">

                        <div class="panel-body">
                            <div class="user-card contact-item p-md">
                                <div class="media">
                                    <div class="media-middle">
                                        <?php
                                        if($gallery->gallery_type == "image")
                                        {
                                            $buttonIcon = "fa-image";
                                            $buttonUrl = "Galleries/UploadForm/$gallery->id";
                                        }
                                        else if($gallery->gallery_type == "video")
                                        {
                                            $buttonIcon = "fa-play-circle-o";
                                            $buttonUrl = "Galleries/gallery_video_list/$gallery->id";

                                        }
                                        else
                                        {
                                            $buttonIcon = "fa-folder";
                                            $buttonUrl = "Galleries/UploadForm/$gallery->id";
                                        }

                                        ?>

                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading title-color"><?php echo strtoupper($gallery->title)?></h5>
                                        <small class="media-meta"></small>
                                        <div class="contact-links m-t-sm">

                                            <a href="<?php echo base_url($buttonUrl); ?>" class="icon icon-circle icon-sm m-b-0" data-toggle="tooltip" title="<?php echo lang('view-gallery')?>" data-placement="top"><i class="fa <?php echo $buttonIcon?>"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- user-card -->
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div><!-- END galleries -->
    <div class="col-md-3 text-center">
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($news as $item){?>
                    <div class="panel panel-inverse panel-custom">
                    <div class="panel-body">
                        <div class="user-card contact-item p-md">
                            <div class="media">
                                <div class="media-middle">
                                    <?php if($item->news_type === "image"){?>
                                    <div class="card-img" style="width: 200px;margin:0 auto">
                                        <img src="<?php echo base_url("uploads/news_v/$item->img_url")?>" alt="<?php echo $item->img_url?>">
                                    </div>
                                    <?php }
                                    else if ($item->news_type == "video") {?>
                                    <iframe width="200" height="100" src="<?php echo $item->video_url;?>" frameborder="0"
                                            allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="img-rounded">
                                    </iframe>
                                    <?php }?>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading title-color"><?php echo $item->title?></h5>
                                    <small class="media-meta">...</small>
                                    <div class="contact-links m-t-sm">
                                        <a href="<?php echo base_url("News/updateForm/$item->id")?>" class="icon icon-circle icon-sm m-b-0" data-toggle="tooltip" title="<?php echo lang('edit')?>" data-placement="top"><i class="fa fa-edit"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- user-card -->
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div><!-- END news -->
    <div class="col-md-3 text-center">
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($items as $item){?>
                    <?php if($item->id != $user->id){?>
                        <?php if($item->user_role != "Demo"){?>
                            <div class="panel panel-inverse panel-custom">

                                <div class="panel-body">
                                    <div class="user-card contact-item p-md">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar avatar-xl avatar-circle">
                                                    <img src="<?php echo base_url("uploads/users_v/$item->img_url")?>" alt="contact image">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading title-color"><?php echo $item->full_name?></h5>
                                                <small class="media-meta"><?php echo $item->user_role?></small>
                                                <div class="contact-links m-t-sm">
                                                    <a href="mailto:<?php echo $item->email?>" class="icon icon-circle icon-sm m-b-0" data-toggle="tooltip" title="<?php echo $item->email?>" data-placement="top"><i class="fa fa-envelope-o"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- user-card -->
                                </div>
                            </div>
                        <?php }}}?>
            </div>
        </div>
    </div><!-- END users -->
</div>
