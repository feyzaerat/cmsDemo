
<script src="<?php echo base_url("assets/"); ?>js/news.js"></script>

<script>

    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="col-md-10 " style="margin-left: 16%"><input type="text" class="form-control" name="terms[]" /><a href="#" class="remove_field " style="position: absolute;margin-top:-5%;margin-left: 97%"> X</a></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
    $(document).ready(function() {
        var max_fields2      = 10; //maximum input boxes allowed
        var wrapper2  		= $(".input_fields_wrap2"); //Fields wrapper
        var add_button2     = $(".add_field_button2"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button2).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields2){ //max input box allowed
                x++; //text box increment
                $(wrapper2).append('<div class="col-md-10 " style="margin-left: 16%"><input type="text" class="form-control" name="detail[]" /><a href="#" class="remove_field2 " style="position: absolute;margin-top:-5%;margin-left: 97%"> X</a></div>'); //add input box
            }
        });

        $(wrapper2).on("click",".remove_field2", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
    $(document).ready(function() {
        var max_fields3      = 10; //maximum input boxes allowed
        var wrapper3  		= $(".input_fields_wrap3"); //Fields wrapper
        var add_button3     = $(".add_field_button3"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button3).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields3){ //max input box allowed
                x++; //text box increment
                $(wrapper3).append('<div class="col-md-10 " style="margin-left: 16%"><input type="text" class="form-control" name="docs[]" /><a href="#" class="remove_field3 " style="position: absolute;margin-top:-5%;margin-left: 97%"> X</a></div>'); //add input box
            }
        });

        $(wrapper3).on("click",".remove_field3", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
    $(document).ready(function() {
        var max_fields4      = 10; //maximum input boxes allowed
        var wrapper4  		= $(".input_fields_wrap4"); //Fields wrapper
        var add_button4    = $(".add_field_button4"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button4).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields4){ //max input box allowed
                x++; //text box increment
                $(wrapper4).append('<div class="col-md-10 " style="margin-left: 16%"><input type="text" class="form-control" name="time[]" /><a href="#" class="remove_field4 " style="position: absolute;margin-top:-5%;margin-left: 97%"> X</a></div>'); //add input box
            }
        });

        $(wrapper4).on("click",".remove_field4", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });


</script>
<style>
    .add_field_button,.add_field_button2,.add_field_button3,.add_field_button4{
        background-color: #04ca03;
        width: 45px;height: 40px;
        margin-left: 75%;
        color: white;
        font-size: x-large;
        font-weight: 600;
        border: 1px solid #04ca03 ;
        border-radius: 10%;
    }

</style>
