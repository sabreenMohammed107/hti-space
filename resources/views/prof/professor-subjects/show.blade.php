@extends('layout.prof.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Professor subjects</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
       <a href="{{route('prof.home')}}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Professor subjects</li>

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
                <!--begin:Form-->
                <form id="kt_modal_update_target_updateForm" class="form"
                    action="{{ route('subject.update', $row->id) }}"
                    method="post" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <!--begin::Heading-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <div class="card-body pt-0">
                    <input type="hidden" name="subject_id"
                        value="{{ $row->id }}" id="">
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3"> subject data</h1>
                        <!--end::Title-->

                    </div>
                    <!--end::Heading-->

<!--begin::Image input wrapper-->
<div class="card-body text-center pt-0">
<!--begin::Image input-->
<div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
style="background-image: url('{{ asset('uploads/subjects') }}/{{ $row->image }}')">
<div class="image-input-wrapper w-150px h-150px"
style="background-image: url(' {{ asset('uploads/subjects') }}/{{ $row->image }}')">

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

                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Subject Name</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7"
                                data-bs-toggle="tooltip"
                                title="Enter subject Name"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid"
                            placeholder="Enter subject Name"
                            name="name"
                            value="{{ $row->name }}" />
                    </div>
                    <!--end::Input group-->



                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Code</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7"
                                data-bs-toggle="tooltip"
                                title="Enter code Name"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid"
                            placeholder="Enter code  Name"
                            name="code"
                            value="{{ $row->code }}" />
                    </div>



                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">description</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7"
                                data-bs-toggle="tooltip"
                                title="Enter description"></i>
                        </label>
                        <!--end::Label-->
                        <textarea class="form-control form-control-solid" rows="3" name="description"
                        placeholder="Type Subject En Overview">{{ $row->description }}</textarea>
                    </div>


                    <!--begin::Actions-->
                        </div>
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('professor-subjects.index') }}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->

                    </div>
                    <!--end::Actions-->
                        </div>
                    </div>
                </form>
                <!--end:Form-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
