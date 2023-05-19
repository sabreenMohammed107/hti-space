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
    <h1 class="text-white display-1 mb-5">Education Posts</h1>
@endsection
@section('content')
    <!-- Detail Start -->
    <section class="posts">
        <div class="container-fluid py-5 ">
            <div class="container py-5">
                <div class="section-title text-center position-relative mb-5">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Posts</h6>
                    <h1 class="display-4">Follow the new Posts on your subjects</h1>
                </div>
                <div id="reComment">
                    @include('singlePost-ajax')
                </div>

            </div>
        </div>
    </section>
    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="section-title text-center position-relative mb-5">
                <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Instructors</h6>
                <h1 class="display-4">Meet Our Instructors</h1>
            </div>
            <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
                @foreach ($professors as $professor)
                    <div class="team-item">
                        <img class="img-fluid w-100"@if ($professor->image) src="{{ asset('uploads/professors') }}/{{ $professor->image }}"
            @else
            src="{{ asset('web-assets/img/team-2.jpg') }}" @endif
                            alt="">
                        <div class="bg-light text-center p-4">
                            <h5 class="mb-3">{{ $professor->user->name ?? '' }}</h5>
                            <p class="mb-2">{{ $professor->position }}</p>
                            <div class="d-flex justify-content-center">
                                <a class="mx-1 p-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="mx-1 p-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="mx-1 p-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="mx-1 p-1" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="mx-1 p-1" href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
@section('scripts')
    <script>
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

            $.ajax({
                type: 'GET',
                url: "{{ route('add.comment') }}",
                data: {
                    user_id: user_id,
                    comment_text: comment_text,
                    post_id: post_id
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
        // });
    </script>
@endsection
