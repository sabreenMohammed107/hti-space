@extends('layout.prof.main')

@section('style')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link href="{{ asset('vendors/iconic-fonts/font-awesome/css/all.min.css') }}" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('vendors/iconic-fonts/flat-icons/flaticon.css') }}">

<link rel="stylesheet" href="{{ asset('vendors/iconic-fonts/cryptocoins/cryptocoins.css') }}">

<link rel="stylesheet" href="{{ asset('vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    You are a Admin User.
                </div>
            </div>
        </div> --}}
        <div class="card ">
            <div class="card-header my-5">{{ __('Dashboard') }}</div>
        <div class="row mb-3">

            <div class="col-xl-3 col-md-6">
                <div class="ms-card card-gradient-success ms-widget ms-infographics-widget" style="position: relative">
                    <div class="ms-card-body media">
                        <div class="media-body">
                            <h6>Total Professors</h6>
                            <p class="ms-card-change"> <i class="material-icons">arrow_upward</i>{{$professors}}</p>
                            <p class="fs-12">{{$professors}} Professors trying their best.</p>
                        </div>
                    </div>
                    <i class="flaticon-statistics"></i>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="ms-card card-gradient-secondary ms-widget ms-infographics-widget" style="position: relative">
                    <div class="ms-card-body media">
                        <div class="media-body">
                            <h6>Subjects</h6>
                            <p class="ms-card-change">{{$subjects}} Subjects</p>
                            <p class="fs-12">{{$subjects}} are running now</p>

                        </div>
                    </div>
                    <i class="flaticon-stats"></i>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="ms-card card-gradient-warning ms-widget ms-infographics-widget" style="position: relative">
                    <div class="ms-card-body media">
                        <div class="media-body">
                            <h6>Total Students</h6>
                            <p class="ms-card-change"> <i class="material-icons">arrow_upward</i>{{$students}} Students</p>
                            <p class="fs-12">{{$students}} are attending these Subjects</p>
                        </div>
                    </div>
                    <i class="flaticon-user"></i>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="ms-card card-gradient-info ms-widget ms-infographics-widget" style="position: relative" >
                    <div class="ms-card-body media">
                        <div class="media-body">
                            <h6>Posts</h6>
                        <p class="ms-card-change">{{$posts}} Posts</p>
                        <p class="fs-12">{{$posts}} Posts supports Subjects</p>
                        </div>
                    </div>
                    <i class="flaticon-reuse"></i>
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h6>Subjects</h6>
                    </div>
                    <div class="ms-panel-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover thead-light">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th scope="col">code</th>
                                        <th scope="col"> name</th>

                                        <th scope="col">unit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1
                                    @endphp
                                    @foreach ($subjectsTable as $r)
                                        <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $r->code}}</td>
                                        <td class="ms-table-f-w"> {{ $r->name ?? '' }}</td>

                                        <td>{{ $r->unit ?? '' }}</td>
                                    </tr>
                                    @php
                                        $i++
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class="ms-panel ms-panel-fh">
                    <div class="ms-panel-header">
                        <h6>Solutions Timeline</h6>
                    </div>
                    <div class="ms-panel-body" style="overflow-y:scroll;max-height:500px;">
                        <ul class="ms-activity-log">
                            @foreach ($solutionTable as $solution)

                                <li>

                                <div class="ms-btn-icon btn-pill icon btn-success">
                                    <i class="flaticon-tick-inside-circle"></i>
                                </div>
                                <h6>{{ $solution->assignment->title ?? '' }}</h6>
                                <span> <i class="material-icons">student </i>{{ $solution->student->user->name ?? '' }}</span>
                              <p class="fs-14">{{ $solution->degree_pct ?? '' }}</p>

                            </li>

                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
