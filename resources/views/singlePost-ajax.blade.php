@foreach ($blogs as $index => $blog)
<div class="row mx-0 justify-content-center mb-4">
    <!--single feed -->

    <div class="col-md-12">
        <div class="d-flex flex-column comment-section">
            <div class="bg-white p-2">
                <div class="d-flex flex-row user-info"><img class="rounded-circle"
                        src="{{ asset('uploads/professors') }}/{{ $blog->professor->image ?? 'defult.jpg'  }}" width="40">
                    <div class="d-flex flex-column justify-content-start ml-2"><span
                            class="d-block font-weight-bold name">{{ $blog->title }}</span><span
                            class="date text-black-50">{{ $blog->professor->user->name ?? '' }} -
                            {{ $blog->post_date }} - {{ $blog->type->type ??'' }} </span></div>
                </div>

                <div class="image-left" style="min-height: 300px">
                    <div>
                        <img class="img1"  src="{{ asset('uploads/posts') }}/{{ $blog->image }}"
                            alt="Human Rights Logo" />

                    </div>

                    <p> {!! $blog->text !!}</p>


                </div>
                <div class="bg-white">
                    <div class="d-flex flex-row fs-12">

                        <div class="like p-2 cursor" onclick="comments({{ $index }})"><i
                                class="fa fa-comment"></i><span
                                class="ml-1">{{ $blog->comments->count() }} Comment</span></div>

                    </div>
                </div>
                <div class="bg-light p-2">
                    <form id="comment{{ $index }}"  method="get" >

                    <div class="d-flex flex-row align-items-start"><img class="rounded-circle"
                            src="{{ asset('uploads/students') }}/{{ $blog->subject->student->image ?? 'defult.jpg' }}" width="40">
                        <textarea id="comment_text{{ $index }}" name="comment_text"  class="form-control ml-1 shadow-none textarea"></textarea>
                    </div>
                    <div class="mt-2 text-right">

                            <input type="hidden" name="post_id" id="post_id{{ $index }}" value="{{$blog->id  }}">
                            <input type="hidden" name="user_id" id="user_id{{ $index }}" value="{{Auth::user()->id}}">

                            <button type="submit" onclick="commentsSubmit({{ $index }})" class="btn btn-primary btn-sm shadow-none" type="button">Post
                            comment</button>

                    </div>
                </form>
                </div>
                <!--comments section -->
                <div class="coment-bottom bg-white p-2 px-4" id="comDiv{{ $index }}"
                    style="display: none">
                    @isset($blog->comments)
                        @foreach ($blog->comments as $comment)
                            <div class="commented-section mt-2">
                                <div class="d-flex flex-row align-items-center commented-user">
                                    <h5 class="mr-2"><img
                                        src="{{ asset('uploads/students') }}/{{ $comment->student->image ?? 'defult.jpg'  }}" width="40"> {{ $comment->student->user->name ?? '' }}</h5><span
                                        class="dot mb-1"></span><span class="mb-1 ml-2">
                                        {{ \Carbon\Carbon::parse($comment->comment_date)->diffForHumans() }}</span>
                                </div>
                                <div class="comment-text-sm"><span>{{ $comment->comment }}</span></div>

                            </div>
                        @endforeach
                    @endisset


                </div>
            </div>
        </div>

    </div>

    </div>
@endforeach
