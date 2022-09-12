$(document).ready(function () {

    $(".news_type_select").change(function () {

        if($(this).val() === "image") {

            $(".video_url_container").hide();
            $(".image_upload_container").fadeIn();

        }

        else if($(this).val() === "video") {

            $(".video_url_container").fadeIn();
            $(".image_upload_container").hide();


        }

    })
    
})