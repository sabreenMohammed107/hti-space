@extends('layout.student.main')
@section('breadcrumb')
<h1 class="text-white mt-4 mb-4">Learn From Home</h1>
<h1 class="text-white display-1 mb-5">Education In Space</h1>
@endsection
@section('content')

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{asset('web-assets/img/about.jpg')}}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">About Us</h6>
                        <h1 class="display-4">Welcome to HTI-SPACE</h1>
                    </div>
                    <p>Welcome to HTI-SPACE, a leading provider of innovative solutions for education management. With a deep understanding of the challenges faced by educational institutions, we have developed a comprehensive web-based platform that revolutionizes the way schools and colleges operate. Our mission is to empower educators, administrators, and students alike by offering intuitive tools and streamlined processes. By harnessing the power of technology, we aim to enhance accessibility, improve communication, and foster collaboration within the educational ecosystem. Join us on this transformative journey as we pave the way for a more efficient and engaging educational experience.</p>
                    <div class="row pt-3 mx-0">
                        <div class="col-3 px-0">
                            <div class="bg-success text-center p-4">

                                <h1 class="text-white" data-toggle="counter-up">{{ $counterSubject }}</h1>
                                <h6 class="text-uppercase text-white">Available<span class="d-block">Subjects</span></h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="bg-primary text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">{{ $counterPost }}</h1>
                                <h6 class="text-uppercase text-white">Subjects<span class="d-block">posts</span></h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="bg-secondary text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">{{ $counterProf }}</h1>
                                <h6 class="text-uppercase text-white">Skilled<span class="d-block">Instructors</span></h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="bg-warning text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">{{ $counterStud }}</h1>
                                <h6 class="text-uppercase text-white">Happy<span class="d-block">Students</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-image" style="margin: 90px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 my-5 pt-5 pb-lg-5">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Why Choose Us?</h6>
                        <h1 class="display-4">Why You Should Start Learning with Us?</h1>
                    </div>
                    <p class="mb-4 pb-2">Aliquyam accusam clita nonumy ipsum sit sea clita ipsum clita, ipsum dolores amet voluptua duo dolores et sit ipsum rebum, sadipscing et erat eirmod diam kasd labore clita est. Diam sanctus gubergren sit rebum clita amet.</p>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-primary mr-4">
                            <i class="fa fa-2x fa-graduation-cap text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Skilled Instructors</h4>
                            <p>Labore rebum duo est Sit dolore eos sit tempor eos stet, vero vero clita magna kasd no nonumy et eos dolor magna ipsum.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-secondary mr-4">
                            <i class="fa fa-2x fa-certificate text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>International Certificate</h4>
                            <p>Labore rebum duo est Sit dolore eos sit tempor eos stet, vero vero clita magna kasd no nonumy et eos dolor magna ipsum.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="btn-icon bg-warning mr-4">
                            <i class="fa fa-2x fa-book-reader text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Online Classes</h4>
                            <p class="m-0">Labore rebum duo est Sit dolore eos sit tempor eos stet, vero vero clita magna kasd no nonumy et eos dolor magna ipsum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{asset('web-assets/img/feature.jpg')}}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Start -->


    <!-- Subjects Start -->
    <div class="container-fluid px-0 py-5">
        <div class="row mx-0 justify-content-center pt-5">
            <div class="col-lg-6">
                <div class="section-title text-center position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Our Subjects</h6>
                    <h1 class="display-4">Checkout New Releases Of Our Subjects</h1>
                </div>
            </div>
        </div>
        <div class="owl-carousel courses-carousel">
            @foreach ($subjects as $subject)
            <div class="courses-item position-relative">
                <img class="img-fluid" style="height: 300px" src="{{asset('uploads/subjects')}}/{{$subject->subject->image ?? ''}}" alt="">
                <div class="courses-text">
                    <h4 class="text-center text-white px-3">{{ $subject->subject->name ?? '' }}</h4>
                    <div class="border-top w-100 mt-3">
                        <div class="d-flex justify-content-between p-4">
                            <span class="text-white"><i class="fa fa-user mr-2"></i>{{ $subject->professor->user->name ?? '' }}</span>
                        </div>
                    </div>
                    <div class="w-100 bg-white text-center p-4" >
                        <a class="btn btn-primary" href="{{ url('user/single-subject/'.$subject->subject->id) }}">Subject Detail</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
    <!-- Courses End -->


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
                <img class="img-fluid w-100"@if($professor->image) src="{{asset('uploads/professors')}}/{{$professor->image}}"
                @else
                src="{{asset('web-assets/img/team-2.jpg')}}"
                @endif alt="">
                <div class="bg-light text-center p-4">
                    <h5 class="mb-3">{{ $professor->user->name ??'' }}</h5>
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


    <!-- Testimonial Start -->
    <div class="container-fluid bg-image py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Blogs</h6>
                        <h1 class="display-4">Subject Posts</h1>
                    </div>
                    <p class="m-0">EVERYTHING IS PERSONAL. INCLUDING THIS BLOG.

                        Train of Thought</p>
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel">
                        @foreach ($blogs as $blog)
                        <div class="bg-white p-5">
                            <a style="color:#6B6A75;text-decoration: none" href="">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>{{ $blog->title }}</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <img class="img-fluid mr-4" src="{{asset('uploads/posts')}}/{{$blog->image}}" alt="">
                                <div>
                                    <h5>{{$blog->subject->name ?? ''  }}</h5>
                                    <span>{{$blog->professor->user->name ?? '' }}</span>
                                </div>
                            </div>
                        </a>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Start -->


                @endsection

