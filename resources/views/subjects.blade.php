@extends('layout.student.main')
@section('breadcrumb')
    <h1 class="text-white mt-4 mb-4">Learn From Home</h1>
    <h1 class="text-white display-1 mb-5">Education Subjects</h1>
@endsection
@section('content')
    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0 justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center position-relative mb-5">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Our Subjects</h6>
                        <h1 class="display-4">Checkout New Releases Of Our Subjects</h1>
                    </div>
                </div>
            </div>
            <div class="row" id="subpage">
                @include('subject-ajax')

            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection

@section('scripts')
    <script>

            function enroll(id) {

            $(this).closest("form").submit();
            event.preventDefault();
            var form = $("#enroll"+id).serialize();

       $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        type:'GET',
           url: "{{url('user/enroll/now')}}",
           data: form,
           success: function( msg ) {

            $('#subpage').html(msg);

           },
        error: function (textStatus, errorThrown) {
           alert('error');
        }
       });

return false;
}


function cancelling(id) {

$(this).closest("form").submit();
event.preventDefault();
var form = $("#cancelling"+id).serialize();
$.ajax({
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:'GET',
url: "{{url('user/cancel/registeration')}}",
data: form,
success: function( msg ) {

$('#subpage').html(msg.table_view);
if(msg.succes == false)
{
    alert('Subject has assignments -- can’t cancel registeration')
}
},
error: function (textStatus, errorThrown) {
alert('error');
}
});

return false;
}

    </script>
@endsection
