@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Students</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="../dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Students</li>

                    <li class="breadcrumb-item text-dark">All</li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->

        </div>
    </div>
@endsection

@section('content')
    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class="container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
            action="{{ route('students.update', $row->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
     <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2> Edit Thumbnail</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Image input wrapper-->
        <div class="card-body text-center pt-0">
            <!--begin::Image input-->
            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                style="background-image: url('{{ asset('uploads/students') }}/{{ $row->image }}')">
                <div class="image-input-wrapper w-150px h-150px"
                    style="background-image: url(' {{ asset('uploads/students') }}/{{ $row->image }}')">

                </div>
                <!--end::Preview existing avatar-->
                <!--begin::Edit-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="avatar_remove" />
                    <!--end::Inputs-->
                </label>
                <!--end::Edit-->

            </div>
            <!--end::Image input-->
        </div>
        <!--end::Image input wrapper-->
    </div>
    <!--end::Thumbnail settings-->


                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="mb-3">
                            <label class="form-label">name</label>
                            <input type="text" id="name" value="{{$row->user->name ?? ''}}"
                                onkeypress="return /^(?:(?=[\p{Script=Arabic}A-Za-z])\p{L}|\s)+$/u.test(event.key)"
                                name="name" maxlength="15" class="form-control  @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                        <label class="form-label">email</label>
                        <input type="text" value="{{$row->user->email ?? ''}}" name="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">address</label>
                        <input type="text" value="{{$row->address}}" name="address" class="form-control @error('address') is-invalid @enderror">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                        {{-- <div class="mb-3">
                            <label class="form-label">password</label>
                            <input id="password" maxlength="15" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">confirm_password</label>
                            <input id="password-confirm" type="password" class="form-control  " name="confirm-password"
                                autocomplete="new-password">

                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label">mobile</label>
                            <input type="tel" id="mobile" maxlength="11" name="mobile" value="{{$row->mobile}}"
                                class="form-control @error('mobile') is-invalid @enderror">
                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">student_unit</label>
                            <input type="number" id="student_unit" value="{{$row->student_unit}}"
                                name="student_unit"  class="form-control  @error('student_unit') is-invalid @enderror">
                            @error('student_unit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="fs-6 fw-bold form-label mt-3">
                                <option value="">Select Stage..</option>
                            </label>
                            <!--end::Label-->
                            <select required class="form-select form-select-solid dynamic"
                                data-control="select2" data-placeholder="Select an option" required
                                data-show-subtext="true" name="stage_id" data-live-search="true" id="country"
                                data-dependent="sub">
                                <option value=""></option>
                                @foreach ($stages as $stage)
                                    <option value="{{ $stage->id }}" {{ $row->stage_id == $stage->id ? "selected" :""}} >{{ $stage->name ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                    </div>
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->


                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('students.index') }}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection

