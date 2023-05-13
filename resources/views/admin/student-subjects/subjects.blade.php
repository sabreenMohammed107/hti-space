@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2"> subject students </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="../dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">subject students</li>

                    <li class="breadcrumb-item text-dark">All</li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->

        </div>
    </div>
@endsection

@section('content')
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class="container-xxl">
            <!--begin::Form-->

            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_product_general">General Setting</a>
                    </li>
                    <!--end:::Tab item-->

                </ul>
                <!--end:::Tabs-->
                <!--begin::Tab content-->
                <div class="tab-content">
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade active show" id="kt_ecommerce_add_product_general" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <!--begin::General options-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Subject Degree - {{ $row->student->user->name ?? '' }}</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">

                                    <div class="box-body">
                                        <?php

                                        $counter = 1;

                                        ?>
                                        <?php
                                        $counterrrr = 1;
                                        ?>

                                        <table class="table align-middle table-row-dashed fs-6 gy-5 table-striped-columns"
                                            id="kt_ecommerce_sliders_table">
                                            <thead>
                                                <tr>
                                                    <th data-field="state" data-checkbox="false"></th>



                                                    <th> Subject</th>

                                                    <th> degree pct %</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                @foreach ($degrees as $index => $degree)
                                                    <tr>
                                                        <td></td>

                                                        <td>
                                                            <input type="hidden"
                                                                name="student_subjects_id{{ $counter }}"
                                                                value="{{ $degree->id }}">

                                                            <input type="text" name="student_id{{ $counter }}"
                                                                readonly value="{{ $degree->subject->name ?? '' }}"
                                                                class="form-control" id="room_rent_paid{{ $counter }}"
                                                                placeholder="25">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="grade_pct{{ $counter }}"
                                                                value="{{ $degree->grade_pct ?? '' }}" class="form-control"
                                                                id="grade_pct{{ $counter }}" placeholder="">
                                                        </td>





                                                    </tr>
                                                    <?php
                                                        ++$counter;

                                                        if ($counter > count($degrees)) {
                                                        ?>
                                                @break

                                                <?php }
                                                        $counterrrr++;

                                                        ?>
                                            @endforeach

                                            <!-- Delete Modal -->



                                        </tbody>
                                    </table>
                                    <input type="hidden" name="counter" value="{{ $counterrrr }}">


                                    <div class="box-footer">
                                        <a href="{{ route('student-subjects.index') }}" id="kt_ecommerce_add_product_cancel"
                                        class="btn btn-light me-5">Cancel</a>                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::General options-->

                    </div>
                </div>
                <!--end::Tab pane-->

            </div>

        </div>
        <!--end::Main column-->
        <div></div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Container-->
</div>
@endsection
