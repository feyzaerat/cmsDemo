<?php $friends=getUsers();?>
<?php $users=getActiveUser();?>

<div id="side-panel" class="side-panel">
    <div class="panel-header">
        <h4 class="panel-title">Active Users</h4>
    </div>
    <div class="scrollable-container">
        <div class="media-group">

            <?php foreach ($friends as $friend){?>
                <?php if($users->id != $friend->id){?>
            <a href="javascript:void(0)" class="media-group-item">
                <div class="media">
                    <div class="media-left">
                        <div class="avatar avatar-xs avatar-circle">
                            <img src="<?php echo base_url('/uploads/users_v/').$friend->img_url?>" alt="<?php echo $friend->img_url?>">
                            <i class="status status-online"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h5 class="media-heading"><?php echo $friend->user_name?></h5>
                        <small class="media-meta">active now</small>
                    </div>
                </div>
            </a><!-- .media-group-item -->
            <?php }}?>
        </div>
    </div><!-- .scrollable-container -->
</div>