<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        //set initial state.
        $('#multi-read').val($(this).is(':checked'));

        $('#multi-read').change(function() {
            //$('.read').attr('checked',true)
            $('.textbox1').attr('checked',true)
        });
    });

    $(document).ready(function() {
        //set initial state.
        $('#multi-read').val($(this).is('checked'));

        $('#multi-read').change(function() {
            //$('.read').attr('checked',true)
            $('.textbox2').attr('checked',false)
        });
    });



</script>