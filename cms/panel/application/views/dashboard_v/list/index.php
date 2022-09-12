<!DOCTYPE html>
<html lang="<?php echo language()->langCode?>">
<head>
    <?php $this->load->view("includes/head"); ?>
    <style>
          .clock-w{
              color: #58585b;
              font-weight: bold;
          }
          .clock-w:hover{
              color: #1f2126;
          }
          #timedate{
              font: small-caps lighter 15px/150% "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
              text-align: left;
              width: 100%;
              margin: 0 auto;
              color: #fff;
              /* border-left: 3px solid #ed1f24; */
              padding: 5px 10px;
          }
    </style>
<script>
    Number.prototype.pad = function(n) {
        for (var r = this.toString(); r.length < n; r = 0 + r);
        return r;
    };

    function updateClock() {
        var now = new Date();
        var milli = now.getMilliseconds(),
            sec = now.getSeconds(),
            min = now.getMinutes(),
            hou = now.getHours(),
            mo = now.getMonth(),
            dy = now.getDate(),
            yr = now.getFullYear();
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var tags = ["mon", "d", "y", "h", "m", "s", "mi"],
            corr = [months[mo], dy, yr, hou.pad(2), min.pad(2), sec.pad(2), milli];
        for (var i = 0; i < tags.length; i++)
            document.getElementById(tags[i]).firstChild.nodeValue = corr[i];
    }

    function initClock() {
        updateClock();
        window.setInterval("updateClock()", 1);
    }
</script>
</head>
<!-- APP CUSTOMIZER -->
<?php $this->load->view("includes/app-customizer"); ?>
<!-- #app-customizer -->



<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->

    <!-- APP NAVBAR ==========-->
    <?php $this->load->view("includes/navbar"); ?>
    <!--========== END app navbar -->

    <!-- APP ASIDE ==========-->
    <?php $this->load->view("includes/aside"); ?>
    <!--========== END app aside -->

    <!-- navbar search -->
    <?php $this->load->view("includes/navbar-search"); ?>
    <!-- .navbar-search -->

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <?php $this->load->view("{$vFolder}/{$subFolder}/content"); ?>
            </section><!-- #dash-content -->
        </div><!-- .wrap -->

        <!-- APP FOOTER -->
        <?php $this->load->view("includes/footer"); ?>
        <!-- /#app-footer -->
    </main>
    <!--========== END app main -->

    <?php $this->load->view("includes/i_scr"); ?>

</body>
</html>