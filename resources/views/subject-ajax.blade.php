


<div class="col-lg-8">
    @if(count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
    <div class="row">

        @foreach ($subjects as $index=>$subject)
            <div class="col-lg-6 col-md-6 pb-4">

                <a class="courses-list-item position-relative d-block overflow-hidden mb-2"
                    href="{{ url('user/single-subject/'.$subject->subject->id) }}">
                    <img class="img-fluid" style="height: 350px"
                        src="{{ asset('uploads/subjects') }}/{{ $subject->subject->image ?? 'defult.png' }}"
                        alt="">
                    <div class="courses-text">
                        <h4 class="text-center text-white px-3">{{ $subject->subject->name ?? '' }}</h4>
                        <div class="border-top w-100 mt-3">
                            <div class="d-flex justify-content-between p-4">
                                <?php

                                // prepare once
                                $indexed = [];
                                foreach ($mySubjects as $object) {
                                    $indexed[$object->subject_id] = $object;
                                }

                                ?>
                                @if (isset($indexed[$subject->subject->id]))

                                    <Form method="post" id="cancelling{{ $index }}" action="{{url('user/cancel/registeration')}}">
                                        @csrf
                                        <input type="hidden" name="student_id" value="{{ $studId->id }}" >
                                        <input type="hidden" name="subject_id" value="{{ $subject->subject->id }}" >
                                        <button type="submit"onclick="cancelling({{ $index }})" class="btn btn-block btn-secondary py-3 px-5">Cancel
                                            registration
                                        </button>
                                        </Form>

                                @else

                                        <Form method="post" id="enroll{{ $index }}" action="{{url('user/enroll/now')}}">
                                            @csrf
                                            <input type="hidden" name="student_id" value="{{ $studId->id }}" >
                                            <input type="hidden" name="subject_id" value="{{ $subject->subject->id }}" >
                                            <button type="submit" onclick="enroll({{ $index }})" class="btn btn-block btn-secondary py-3 px-5">Enroll
                                                Now
                                            </button>
                                            </Form>

                                @endif

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach



        <div class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-lg justify-content-center mb-0">
                    <li class="page-item disabled">
                        <a class="page-link rounded-0" href="{{$subjects->previousPageUrl()}}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $subjects->lastPage(); $i++)
                    <li class="page-item {{ $subjects->currentPage() == $i ? ' active' : '' }}"><a class="page-link" href="{{ $subjects->url($i) }}">{{ $i }}</a></li>
                    @endfor

                    <li class="page-item">
                        <a class="page-link rounded-0" href="{{$subjects->nextPageUrl()}}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="col-lg-4 mt-5 mt-lg-0">

    <div class="mb-5">
        <h2 class="mb-4">My Subject</h2>
        @foreach ($mySubjects as $mySubject)
            <a class="d-flex align-items-center text-decoration-none mb-4" href="">
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


    </div>
</div>
