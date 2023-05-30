@extends('layout.student.main')
@section('breadcrumb')
    <h1 class="text-white mt-4 mb-4">Learn From Home</h1>
    <h1 class="text-white display-1 mb-5"></h1>
@endsection
@section('content')
    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0 justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center position-relative mb-5">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">HTI Space</h6>
                        <h1 class="display-4">Update your profile data</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 mt-5 mt-lg-0">

                    {{-- <div class="mb-5">
                        <h2 class="mb-4">My Subject</h2>
                        @foreach ($mySubjects as $mySubject)
                            <a class="d-flex align-items-center text-decoration-none mb-4"
                                href="{{ url('user/single-subject/' . $mySubject->subject->id) }}">
                                <img class="img-fluid rounded" style="width:80px;height:80px"
                                    src="{{ asset('uploads/subjects') }}/{{ $mySubject->subject->image ?? 'defult.png' }}"
                                    alt="">
                                <div class="pl-3">
                                    <h6>{{ $mySubject->subject->name ?? '' }}</h6>
                                    <div class="d-flex">
                                        <small class="text-body mr-3"><i
                                                class="fa fa-user text-primary mr-2"></i>{{ $mySubject->subject->professors->last()->user->name ?? '' }}</small>
                                    </div>
                                </div>
                            </a>
                        @endforeach


                    </div> --}}
                </div>


                <div class="col-lg-8">
                    <div class=" slider_details side_right_details" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                <ul class="p-0 m-0" style="list-style: none;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (\Session::has('msg'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                <ul class="p-0 m-0" style="list-style: none;">
                                    <li>{!! \Session::get('msg') !!}</li>

                                </ul>
                            </div>
                        @endif
                        @if (\Session::has('repo'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            <ul class="p-0 m-0" style="list-style: none;">
                                <li>{!! \Session::get('repo') !!}</li>

                            </ul>
                        </div>
                    @endif
                        <form method="POST" class="bg-white rounded shadow-5-strong p-5" enctype="multipart/form-data"
                            action="{{ route('updateProfile') }}">
                            @csrf
                            <input type="hidden" name="student_id" value="{{$studId->id  }}">
                            <input type="hidden" name="user_id" value="{{$studId->user->id  }}">
                            <!-- Email input -->
                            <div class="row mb-3">
                                <label for="form1Example3" class="col-md-3 col-form-label text-md-start">User Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="name" value="{{$studId->user->name ??''}}" id="form1Example3"
                                        class="form-control" />
                                </div>
                            </div>
                            <!-- Email input -->
                            <div class="row mb-3">
                                <label for="form1Example1" class="col-md-3 col-form-label text-md-start">Email Address</label>
                                <div class="col-md-8">
                                    <input type="email" value="{{$studId->user->email ?? ''}}" name="email" id="form1Example1"
                                        class="form-control" />
                                </div>
                            </div>
                            <!-- Email input -->
                            <div class="row mb-3">
                                <label for="form1Example1" class="col-md-3 col-form-label text-md-start">Mobile</label>
                                <div class="col-md-8">
                                    <input type="text" value="{{$studId->mobile}}" name="mobile" id="form1Example1"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="form1Example1" class="col-md-3 col-form-label text-md-start">Stage</label>
                                <div class="col-md-8">
                                    <select required class="form-control" data-control="select2"
                                        data-placeholder="Select an option" required data-show-subtext="true" name="stage_id"
                                        data-live-search="true" id="country" data-dependent="sub">
                                        <option value=""></option>
                                        @foreach ($stages as $stage)
                                            <option value="{{ $stage->id }}"
                                                {{$studId->stage_id == $stage->id ? 'selected' : '' }}>{{ $stage->name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="row mb-3">


                                <label for="form1Example1" class="col-md-3 col-form-label text-md-start">Image</label>
                                <div class="col-md-8">
                                    <input type="file" name="image" id="form1Example1" class="form-control" />
                                    @isset($studId->image)
                                    <img src="{{ asset('uploads/students') }}/{{ $studId->image }}" class="mt-2" width="100" alt="">
                                    @endisset
                                </div>

                            </div>
                            <!-- Password input -->
                            <div class="row mb-3">
                                <label for="form1Example2" class="col-md-3 col-form-label text-md-start">Password</label>
                                <div class="col-md-8">
                                    <input type="password" name="password" id="form1Example2" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-3 col-form-label text-md-start">{{ __('Confirm Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation"  autocomplete="new-password">
                                </div>
                            </div>
                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                                <div class="col d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    {{-- <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                              <label class="form-check-label" for="form1Example3">
                                Remember me
                              </label>
                            </div> --}}
                                </div>

                                {{-- <div class="col text-center">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                          </div> --}}
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </form>
                    </div>

                </div>




            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection

@section('scripts')
    <script>

    </script>
@endsection
