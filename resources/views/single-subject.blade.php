@extends('layout.student.main')
@section('add-style')
    <style>
        .posts {
            background: #e0dfdf45
        }

        .date {
            font-size: 11px
        }

        .comment-text {
            font-size: 12px
        }

        .fs-12 {
            font-size: 12px
        }

        .shadow-none {
            box-shadow: none
        }

        .name {
            color: #007bff
        }

        .cursor:hover {
            color: blue
        }

        .cursor {
            cursor: pointer
        }

        .textarea {
            resize: none
        }

        .image-left img {
            float: left;
            margin: 10px;
            width: 30%;
            height: 250px;
        }

        .image-left p {
            text-align: justify;

        }
    </style>
@endsection
@section('breadcrumb')
    <h1 class="text-white mt-4 mb-4">Learn From Home</h1>
    <h1 class="text-white display-1 mb-5">Subject Details</h1>
@endsection
@section('content')
    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="section-title position-relative mb-5">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Subject Detail
                            </h6>
                            <input type="hidden" name="subject_id" id="subject_id" value="{{  $subject->id }}">
                            <h1 class="display-4">{{  $subject->name }}</h1>
                        </div>
                        <img class="img-fluid rounded w-100 mb-4" style="height: 350px" src="{{ asset('uploads/subjects') }}/{{ $subject->image ?? 'defult.png' }}" alt="Image">
                        <p>{!!  $subject->description !!}</p>
                    </div>




                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="bg-primary mb-5 py-3">
                        <h3 class="text-white py-3 px-4 m-0">Subject Features</h3>
                        @foreach ($subject->professors as $index=>$prof)
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Instructor{{ $index+1 }}</h6>
                            <h6 class="text-white my-3">{{ $prof->user->name ?? '' }}</h6>
                        </div>
                        @endforeach

                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Units</h6>
                            <h6 class="text-white my-3">{{ $subject->subject_unit }}</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Code</h6>
                            <h6 class="text-white my-3">{{ $subject->code }}</h6>
                        </div>
                         {{--<div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Duration</h6>
                            <h6 class="text-white my-3">10.00 Hrs</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Skill level</h6>
                            <h6 class="text-white my-3">All Level</h6>
                        </div>
                        <div class="d-flex justify-content-between px-4">
                            <h6 class="text-white my-3">Language</h6>
                            <h6 class="text-white my-3">English</h6>
                        </div>
                        <h5 class="text-white py-3 px-4 m-0">Course Price: $199</h5>--}}
                        <div class="py-3 px-4">
                            {{-- <a class="btn btn-block btn-secondary py-3 px-5" href="">Enroll Now</a> --}}

                            <?php

                            // prepare once
                            $indexed = [];
                            foreach ($mySubjects as $index=>$object) {
                                $indexed[$object->subject_id] = $object;
                            }

                            ?>
                            @if (isset($indexed[$subject->id]))

                                <Form method="post" id="cancelling{{ $index }}" action="{{url('user/cancel/registeration')}}">
                                    @csrf
                                    <input type="hidden" name="student_id" value="{{ $studId->id }}" >
                                    <input type="hidden" name="subject_id" value="{{ $subject->id }}" >
                                    <button type="submit"onclick="cancelling({{ $index }})" class="btn btn-block btn-secondary py-3 px-5">Cancel
                                        registration
                                    </button>
                                    </Form>

                            @else

                                    <Form method="post" id="enroll{{ $index }}" action="{{url('user/enroll/now')}}">
                                        @csrf
                                        <input type="hidden" name="student_id" value="{{ $studId->id }}" >
                                        <input type="hidden" name="subject_id" value="{{ $subject->id }}" >
                                        <button type="submit" onclick="enroll({{ $index }})" class="btn btn-block btn-secondary py-3 px-5">Enroll
                                            Now
                                        </button>
                                        </Form>

                            @endif
                        </div>
                    </div>

                    <div class="mb-5">
                        <h2 class="mb-3">Materials</h2>
                        <ul class="list-group list-group-flush">
                            @foreach ($subject->materials as $material)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="{{ asset('uploads/subject_materials') }}/{{ $material->file_path ?? ' ' }}" target="_blank" class="text-decoration-none h6 m-0">{{$material->file_path}}</a>
                                <span class="badge badge-primary badge-pill">{{$material->file_type_id}}</span>
                            </li>
                            @endforeach




                        </ul>
                    </div>

                    {{-- <div class="mb-5">
                        <h2 class="mb-4">Recent Courses</h2>
                        <a class="d-flex align-items-center text-decoration-none mb-4" href="">
                            <img class="img-fluid rounded" src="img/courses-80x80.jpg" alt="">
                            <div class="pl-3">
                                <h6>Web design & development courses for beginners</h6>
                                <div class="d-flex">
                                    <small class="text-body mr-3"><i class="fa fa-user text-primary mr-2"></i>Jhon
                                        Doe</small>
                                    <small class="text-body"><i class="fa fa-star text-primary mr-2"></i>4.5 (250)</small>
                                </div>
                            </div>
                        </a>
                        <a class="d-flex align-items-center text-decoration-none mb-4" href="">
                            <img class="img-fluid rounded" src="img/courses-80x80.jpg" alt="">
                            <div class="pl-3">
                                <h6>Web design & development courses for beginners</h6>
                                <div class="d-flex">
                                    <small class="text-body mr-3"><i class="fa fa-user text-primary mr-2"></i>Jhon
                                        Doe</small>
                                    <small class="text-body"><i class="fa fa-star text-primary mr-2"></i>4.5 (250)</small>
                                </div>
                            </div>
                        </a>
                        <a class="d-flex align-items-center text-decoration-none mb-4" href="">
                            <img class="img-fluid rounded" src="img/courses-80x80.jpg" alt="">
                            <div class="pl-3">
                                <h6>Web design & development courses for beginners</h6>
                                <div class="d-flex">
                                    <small class="text-body mr-3"><i class="fa fa-user text-primary mr-2"></i>Jhon
                                        Doe</small>
                                    <small class="text-body"><i class="fa fa-star text-primary mr-2"></i>4.5 (250)</small>
                                </div>
                            </div>
                        </a>
                        <a class="d-flex align-items-center text-decoration-none" href="">
                            <img class="img-fluid rounded" src="img/courses-80x80.jpg" alt="">
                            <div class="pl-3">
                                <h6>Web design & development courses for beginners</h6>
                                <div class="d-flex">
                                    <small class="text-body mr-3"><i class="fa fa-user text-primary mr-2"></i>Jhon
                                        Doe</small>
                                    <small class="text-body"><i class="fa fa-star text-primary mr-2"></i>4.5 (250)</small>
                                </div>
                            </div>
                        </a>
                    </div> --}}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mt-5 mt-lg-0" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                <div class="mb-5">
                    <h2 class="mb-3">Assignments</h2>
                    <ul class="list-group list-group-flush">
                        @foreach ($subject->assignments as $index=>$assignment)
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="{{ url('user/single-assignment/'.$assignment->id) }}" class="text-decoration-none h6 m-0">{{ str_limit($assignment->assignment, $limit = 50, $end = '...') }}
                                 {{-- {{empty($assignment->assignment)? 'No Title':$assignment->assignment }} --}}
                                </a>
                            <span class="badge  badge-pill">assignment / {{ $assignment->assignment_date }}</span>
                            <a download="dawnload" href="{{ asset('uploads/subject_assignments') }}/{{ $assignment->file_attach ?? ' ' }}" class="text-decoration-none h6 m-0">{{ $assignment->file_attach }}</a>
                            <span class="badge  badge-pill">deadline / {{ $assignment->deadline_date }}</span>
                        </li>
                        @endforeach


                    </ul>
                </div>
            </div>

            </div>
        </div>
    </div>
    <!-- Detail End -->

<!-- posts-->
<section class="posts">
    <div class="container-fluid py-5 ">
        <div class="container py-5">
            <div class="section-title text-center position-relative mb-5">
                <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Posts</h6>
                <h1 class="display-4">Follow the new Posts </h1>
            </div>
            <div id="reComment">
                @include('singlePostSubject')
            </div>

        </div>
    </div>
</section>
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
        type:'POST',
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
          type:'POST',
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

function comments(id) {
            var x = document.getElementById("comDiv" + id);

            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        // $(document).ready(function() {
        function commentsSubmit(id) {

            $(this).closest("form").submit();
            event.preventDefault();

            var user_id = $('#user_id' + id).val();
            var comment_text = $('#comment_text' + id).val();
            var post_id = $('#post_id' + id).val();
            var subject_id = $('#subject_id').val();

            $.ajax({
                type: 'GET',
                url: "{{ route('add.subject.comment') }}",
                data: {
                    user_id: user_id,
                    comment_text: comment_text,
                    post_id: post_id,
                    subject_id: subject_id
                },
                success: function(msg) {

                    $('#reComment').html(msg);
                    document.getElementById("comDiv" + id).style.display = "block";

                },
                error: function(textStatus, errorThrown) {
                    alert('error');
                }
            });

            return false;
        }
    </script>
@endsection
