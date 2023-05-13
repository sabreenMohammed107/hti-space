@extends('layout.prof.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Posts</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
       <a href="{{route('prof.home')}}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Posts</li>

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
            action="{{ route('posts.update', $row->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
 <!--begin::Card header-->
 <div class="card-header">

    <!--begin::Card title-->
    <div class="card-title">
        <h2> {{ $row->title }}</h2>
    </div>
    <!--end::Card title-->
</div>
                    <!--begin::Image input wrapper-->
                    <div class="card-body text-center pt-0">
                        <!--begin::Image input-->
                        <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                            style="background-image: url('{{ asset('uploads/posts') }}/{{ $row->image }}')">
                            <div class="image-input-wrapper w-150px h-150px"
                                style="background-image: url(' {{ asset('uploads/posts') }}/{{ $row->image }}')">

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
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                href="#kt_ecommerce_add_product_general">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                href="#kt_ecommerce_add_product_comments">Comments</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
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
                                            <span class="required"> Subjects</span>

                                        </label>
                                        <!--end::Label-->
                                        <select required class="form-select form-select-solid" name="subject_id"
                                            data-control="select2" data-placeholder="Select an option"
                                            data-allow-clear="true">
                                            <option value=""></option>
                                            @foreach ($subjects as $subject)
                                            <option value=" {{ $subject->id }}" selected>{{ $subject->name ?? '' }}
                                            @endforeach
                                            </option>

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required"> Type</span>

                                        </label>
                                        <!--end::Label-->
                                        <select required class="form-select form-select-solid" name="subject_id"
                                            data-control="select2" data-placeholder="Select an option"
                                            data-allow-clear="true">
                                            <option value=""></option>
                                            <option value=" " selected>{{ $row->type->type ?? '' }}
                                            </option>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" id="title" name="title" value="{{ $row->title }}"
                                            class="form-control ">

                                    </div>
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">post Date</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control  form-control-solid dPick" name="post_date"
                                            value="{{ $row->post_date }}" placeholder="Pick date" id="kt_datepicker_3" />


                                    </div>
                                    <!--end::Input-->

                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="form-label"> Text</label>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="ckeditor form-control" name="text">{{ $row->text }} </textarea>

                                        <!--end::Editor-->

                                    </div>



                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::General options-->


                            <div class="d-flex justify-content-end">
                                <!--begin::Button-->
                                <a href="{{ route('posts.index') }}" id="kt_ecommerce_add_product_cancel"
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


                    {{-- start 2 tab --}}
                    <div class="tab-pane fade" id="kt_ecommerce_add_product_comments" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Comments</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                                     <!--begin::Table-->
                       <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

                                <th class="min-w-200px">student</th>
                                {{-- <th class="text-end min-w-100px">Date</th> --}}
                                {{-- <th class="text-end min-w-100px">Time</th> --}}

                                <th class="text-end min-w-70px">comment date</th>
                                <th class="text-end min-w-70px">comment</th>

                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($row->comments as $index => $comment)
     <!--begin::Table row-->
     <tr>

        <!--begin::Category=-->
        <td>
            <div class="d-flex align-items-center">
      <!--begin::Thumbnail-->
      <a href="#"
      class="symbol symbol-50px">
      <span class="symbol-label"

          style="background-image:url({{ asset('uploads/students') }}/{{ $comment->student->image ?? '' }});"></span>
  </a>
  <!--end::Thumbnail-->
                <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
                    data-kt-ecommerce-category-filter="category_name" >{{ $comment->student->user->name ?? ''}}</a>
                    <!--end::Title-->
                </div>
            </div>
        </td>
 <!--end::Qty=-->
 <td class="text-end pe-0" data-order="15">
    <span class="fw-bolder ms-3">
    {{$comment->comment_date ?? ''}}
    </span>
</td>
<!--end::Price=-->
        <td class="text-end pe-0" data-order="15">
            <input type="hidden" name="" id=""  data-kt-ecommerce-category-filter="category_id" value="{{$row->id}}" >
            <span class="fw-bolder ms-3">
            {{$comment->comment ?? ''}}
            </span>
        </td>

        <!--end::Status=-->

    </tr>
    <!--end::Table row-->
@endforeach


                        </tbody>
                        <!--end::Table body-->
                    </table>
                                </div>
                            </div>
                        </div>
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
