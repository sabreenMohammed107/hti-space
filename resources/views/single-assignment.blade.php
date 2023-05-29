@extends('layout.student.main')
@section('add-style')
    <style>
        input[type="file"] {
    display: none;
}
        </style>

@section('breadcrumb')
    <h1 class="text-white mt-4 mb-4">Learn From Home</h1>
    <h1 class="text-white display-1 mb-5"> Assignment</h1>
@endsection
@section('content')
    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="section-title position-relative mb-5">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Assignment Detail
                            </h6>
                            <p >{{ empty($assignment->assignment) ? 'No Title' : $assignment->assignment }}</p>
                        </div>
                        <img style="height: 350px" class="img-fluid rounded w-100 mb-4"
                            src="{{ asset('uploads/subject_assignments') }}/{{ $assignment->image ?? ' ' }}" alt="Image">
                        <p>{{ $assignment->assignment }}</p>
                    </div>


                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="bg-primary mb-5 py-3">
                        <h3 class="text-white py-3 px-4 m-0">Assignment Features</h3>

                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Instructor</h6>
                            <h6 class="text-white my-3">{{ $assignment->professor->user->name ?? '' }}</h6>
                        </div>

                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Subject</h6>
                            <h6 class="text-white my-3">{{ $assignment->subject->name }}</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">deadline</h6>
                            <h6 class="text-white my-3">{{ $assignment->deadline_date }}</h6>
                        </div>


                        <div class="py-3 px-4">
                            <form id="upload_form"
                            action="{{ url('user/upload-solution/') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $studId->id }}">
                            <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">

                            <label for="file-upload" class="btn btn-block btn-secondary py-3 px-5" >
                                Upload Solution
                            </label>
                            <input id="file-upload"
                            @isset($solutions[0])
                            @if ($solutions[0]->degree_pct) disabled @endif
                            @endisset
                            @if ($assignment->deadline_date < now()->format('Y-m-d'))
                            style="display:none"
                            @endif
                             name="attach_image" type="file" onchange="javascript:this.form.submit();" />
                            </form>
                        </div>
                    </div>

                    {{-- <div class="mb-5">
                        <h2 class="mb-3">Categories</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Web Design</a>
                                <span class="badge badge-primary badge-pill">150</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Web Development</a>
                                <span class="badge badge-primary badge-pill">131</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Online Marketing</a>
                                <span class="badge badge-primary badge-pill">78</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Keyword Research</a>
                                <span class="badge badge-primary badge-pill">56</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Email Marketing</a>
                                <span class="badge badge-primary badge-pill">98</span>
                            </li>
                        </ul>
                    </div> --}}


                </div>
            </div>
                <div class="row">
                    <div class="col-lg-12 mt-5 mt-lg-0" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <div class="mb-5">
                            <h2 class="mb-3">Solution</h2>
                            <ul class="list-group list-group-flush">
                                @foreach ($solutions as $index => $solution)
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        <span class="badge  badge-pill">{{ $solution->solution_date }}</span>
                                        <a download="dawnload"
                                            href="{{ asset('uploads/assignment_solutions') }}/{{ $solution->attach_image ?? ' ' }}"
                                            class="text-decoration-none h6 m-0">{{ $solution->attach_image }}</a>
                                        <span class="badge  badge-pill">{{ $solution->description }}</span>
                                        <span class="badge  badge-pill"><strong>degree pct / </strong>{{ $solution->degree_pct }}</span>
                                        {{-- @if (!$solution->degree_pct) --}}
                                            <a href="{{ url('user/del-solution/' . $solution->id) }}"
                                                class="text-decoration-none badge-danger h6 m-0 py-1 px-2">X</a>
                                        {{-- @endif --}}



                                    </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>

                </div>

        </div>
    </div>
    <!-- Detail End -->
@endsection
