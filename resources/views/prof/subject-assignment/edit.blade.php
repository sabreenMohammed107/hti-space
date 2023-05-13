@extends('layout.prof.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">subject Assignments</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="../dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">subject Assignments</li>

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
            action="{{ route('subject-assignment.update', $row->id) }}" method="post" enctype="multipart/form-data">
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
                style="background-image: url('{{ asset('uploads/subject_assignments') }}/{{ $row->image }}')">
                <div class="image-input-wrapper w-150px h-150px"
                    style="background-image: url(' {{ asset('uploads/subject_assignments') }}/{{ $row->image }}')">

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
                    <iframe src="{{ asset('uploads/subject_assignments/'.$row->file_attach) }}" width="100%" height="400"></iframe>


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
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">Add Subjects</span>

                                </label>
                                <!--end::Label-->
                                <select required class="form-select form-select-solid" name="subject_id"
                                    data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
                                    <option></option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ $row->subject_id == $subject->id ? "selected" :""}}>{{ $subject->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">assignment </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control  form-control-solid " name="assignment"
                                    value="{{$row->assignment }}" />


                            </div>
                            <!--end::Input-->
                            <div class="d-flex flex-wrap gap-5">
                                <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label for="file"> assignment File <span class="text-danger">*</span> </label>
                                    <input type="file" name="file_attach"
                                        class="form-control @error('file_attach') is-invalid @enderror">
                                    @error('file_attach')
                                        <div class="invalid-feedback">{{ $message }} </div>
                                    @enderror
                                    {{-- <label for="book_img" class="btn btn-danger mb-2"> upload File  </label> --}}
                                    <!--end::Label-->
                                    <!--begin::Input-->

                                    {{-- <input type="file" id="book_img"  name="file_path"
                                class="form-control mb-2" placeholder=""
                                value="" /> --}}


                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input-->

                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">assignment Date</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control  form-control-solid dPick" name="assignment_date"
                                    value="{{ $row->assignment_date }}" placeholder="Pick date" id="kt_datepicker_1" />


                            </div>
                            <!--end::Input-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">deadline Date</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control  form-control-solid dPick" name="deadline_date"
                                    value="{{ $row->deadline_date }}" placeholder="Pick date" id="kt_datepicker_3" />


                            </div>
                            <!--end::Input-->



                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->


                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('subject-assignment.index') }}" id="kt_ecommerce_add_product_cancel"
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
@section('scripts')
    <script>

        $(document).ready(function() {
            $(".dPick").flatpickr();
            $("#kt_datepicker_3").flatpickr();
            $("#kt_datepicker_8").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            });

            $("#kt_datepicker_7").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            });
        });
        </script>
    @endsection
