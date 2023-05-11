@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">subject materials</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="../dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">subject materials</li>

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
                action="{{ route('subject-materials.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">



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
                                    <option value="">Select Professor..</option>
                                </label>
                                <!--end::Label-->
                                <select required class="form-select form-select-solid dynamic" data-control="select2"
                                    data-placeholder="Select an option" required data-show-subtext="true"
                                    name="professor_id" data-live-search="true" id="country" data-dependent="sub">
                                    <option value=""></option>
                                    @foreach ($professors as $professor)
                                        <option value="{{ $professor->id }}" {{ old('professor_id') == $professor->id ? "selected" :""}} >{{ $professor->user->name ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">Add Subjects</span>

                                </label>
                                <!--end::Label-->
                                <select required class="form-select form-select-solid" name="subject_id"
                                    data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
                                    <option></option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? "selected" :""}}>{{ $subject->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="d-flex flex-wrap gap-5">
                                <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label for="file"> Material File <span class="text-danger">*</span> </label>
                                    <input type="file" name="file_path"
                                        class="form-control @error('file_path') is-invalid @enderror">
                                    @error('file_path')
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
                                <label class="required form-label">upload Date</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control  form-control-solid dPick" name="upload_date" value="{{ old('upload_date') }}"
                                    placeholder="Pick date" id="kt_datepicker_3" />


                            </div>
                            <!--end::Input-->

                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label"> Description</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <textarea class="form-control form-control-solid" rows="3" name="description" placeholder="Description">{{ old('description') }}</textarea>
                                <!--end::Editor-->

                            </div>



                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->


                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('subject-materials.index') }}" id="kt_ecommerce_add_product_cancel"
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
