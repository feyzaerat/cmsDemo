<?php
$alert = new Alert();

$alert = $this->session->userdata("alert");

if($alert){

    if($alert["type"] ==="success"){?>
        <script>
            iziToast.success({
                title: '<?php echo $alert["title"]?>',
                message: '<?php echo $alert["text"]?>',
                position:"topRight",
                theme:'dark',
                progressBarColor: 'white'
            });
        </script>

    <?php } else { ?>

        <script>
            iziToast.error({
                title: '<?php echo $alert["title"]?>',
                message: '<?php echo $alert["text"]?>',
                position:"topRight",
                theme:'dark',
                progressBarColor: 'white'
            });
        </script>


    <?php  }
}?>
