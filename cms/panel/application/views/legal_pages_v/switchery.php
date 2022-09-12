<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js" integrity="sha256-CgrKEb54KXipsoTitWV+7z/CVYrQ0ZagFB3JOvq2yjo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha256-JirYRqbf+qzfqVtEE4GETyHlAbiCpC005yBTa4rj6xg=" crossorigin="anonymous"></script>
<script>
    var elems = Array.prototype.slice.call(document.querySelectorAll('.isActive'));

    elems.forEach(function(html) {
        var switchery = new Switchery(html);
    });</script>
<script>
    function userDelete() {


        swal({

                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {

                if (isConfirm) {
                    window.location.href="";
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                }  else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });

    }
</script>