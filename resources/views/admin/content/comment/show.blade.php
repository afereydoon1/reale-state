@extends('admin.layouts.master')

@section('title','نمایش نظر')

@section('content')

  <section class="row mt-30">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
               نمایش نظر
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                <a href="{{ route('content.comment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section class="card mb-3">
                <section class="card-header text-white bg-custom-yellow">
                    {{ $comment->user->fullName  }} - {{ $comment->user->id  }}
                </section>
                <section class="card-body">
                    <h5 class="card-title">مشخصات کالا : {{ $comment->commentable->title }} کد کالا : {{ $comment->commentable->id }}</h5>
                    <p class="card-text">{{ $comment->body }}</p>
                </section>
            </section>

            @if($comment->parent_id == null)
            <section>
                <form action="{{ route('content.comment.answer', $comment->id) }}" method="post">
                    @csrf
                    <section class="row">
                        <section class="col-12">
                            <div class="form-group">
                                <label for="">پاسخ ادمین</label>
                               ‍<textarea class="form-control form-control-sm" name="body" rows="4"></textarea>
                            </div>
                        </section>
                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>
            @endif

        </section>
    </section>
</section>

@endsection