<?php $user = getActiveUser();?>

<body onLoad="initClock()">

<div id="timedate" class="text-right">
    <a  class="clock-w" id="mon">January</a>
    <a  class="clock-w" id="d">1</a><a class="clock-w">,</a>
    <a  class="clock-w" id="y">0</a>
    <a  class="clock-w" id="h">12</a>  <a class="clock-w">:</a> <a  class="clock-w" id="m">00</a> <a class="clock-w">:</a> <a  class="clock-w" id="s">00</a>
    <a  class="clock-w" style="display: none" id="mi">000</a>
</div>

<div class="row" style="margin-top: 1.5vw">

    <div class="col-md-3 text-center">
        <div class="panel panel-inverse panel-custom">
            <div class="panel-heading">
                <h4 class="panel-title"><?php echo lang('products')?></h4>
            </div>
            <div class="panel-body">
                <a href="<?php echo base_url('add-new-product')?>" type="button" class="btn btn-info"><?php echo lang('add-new')?></a>
            </div>
        </div>
    </div><!-- END product -->
    <div class="col-md-3 text-center">
        <div class="panel panel-inverse panel-custom">
            <div class="panel-heading">
                <h4 class="panel-title"><?php echo lang('courses')?></h4>
            </div>
            <div class="panel-body">
                <a href="<?php echo base_url('add-new-course')?>" type="button" class="btn btn-warning"><?php echo lang('add-new')?></a>
            </div>
        </div>
    </div><!-- END courses -->
    <div class="col-md-3 text-center">
        <div class="panel panel-inverse panel-custom">
            <div class="panel-heading">
                <h4 class="panel-title"><?php echo lang('services')?></h4>
            </div>
            <div class="panel-body">
                <a href="<?php echo base_url('add-new-service')?>" type="button" class="btn btn-primary"><?php echo lang('add-new')?></a>
            </div>
        </div>
    </div><!-- END services -->
    <div class="col-md-3 text-center">
        <div class="panel panel-inverse panel-custom">
            <div class="panel-heading">
                <h4 class="panel-title"><?php echo lang('galleries')?></h4>
            </div>
            <div class="panel-body">
                <a href="<?php echo base_url('add-new-galleries')?>" type="button" class="btn btn-success"><?php echo lang('add-new')?></a>
            </div>
        </div>
    </div><!-- END galleries -->
</div>
<hr style="border:0.75px solid #cccccc">

<div class="row">
    <div class="col-md-3">
        <h5 style="text-transform: uppercase;font-weight: bold" class="media-heading text-muted"> <?php echo lang('courses')?></h5>
    </div><!-- END courses title -->
    <div class="col-md-3">
        <h5 style="text-transform: uppercase;font-weight: bold" class="media-heading text-muted"> <?php echo lang('galleries')?></h5>
    </div><!-- END galleries title -->
    <div class="col-md-3">
        <h5 style="text-transform: uppercase;font-weight: bold" class="media-heading text-muted"> <?php echo lang('news')?></h5>
    </div><!-- END news title -->
    <div class="col-md-3">
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
                                        <small class="text-muted"><?php echo $item->description?></small>
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
                                    <small class="media-meta"><?php echo $item->description?></small>
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
