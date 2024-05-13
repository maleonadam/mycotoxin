@if(Session::has('success-message'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-check-circle-o"></i></button>
        {{ Session('success-message') }}
    </div>
@endif

@if(Session::has('delete-message'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{ Session('delete-message') }}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle-o"></i></button>
        {{ Session('error') }}
    </div>
@endif

<script>
setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2500);
</script>