@extends('admin.layouts.master')

@section('title','نظرات')

@section('content')

  <section class="row mt-30">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 نظرات
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
{{--                <a href="#" class="btn btn-info btn-sm disabled">ایجاد نظر </a>--}}
{{--                <div class="max-width-16-rem">--}}
{{--                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">--}}
{{--                </div>--}}
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover" id="comment">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نظر</th>
                            <th>پاسخ به</th>
                            <th>کد کاربر</th>
                            <th>نویسنده نظر</th>
                            <th>کد پست</th>
                            <th>پست</th>
                            <th>وضعیت تایید</th>
                            <th>وضعیت کامنت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($comments as $key => $comment)

                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ Str::limit($comment->body, 10) }}</td>
                            <td>{{ $comment->parent_id ? Str::limit($comment->parent->body, 10) : '' }}</td>
                            <td>{{ $comment->author_id }}</td>
                            <td>{{ $comment->user->fullName  }}</td>
                            <td>{{ $comment->commentable_id }}</td>
                            <td>{{ $comment->commentable->title }}</td>
                            <td>{{ $comment->approved == 1 ? 'تایید شده ' : 'تایید نشده'}} </td>
                            <td>
                                <label>
                                    <input id="{{ $comment->id }}" onchange="changeStatus({{ $comment->id }})" data-url="{{ route('content.comment.status', $comment->id) }}" type="checkbox" @if ($comment->status === 1)
                                    checked
                                    @endif>
                                </label>
                            </td>
                            <td class="width-16-rem text-left">
                                <a href="{{ route('content.comment.show', $comment->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>

                                @if($comment->approved == 1)
                                <a href="{{ route('content.comment.approved', $comment->id)}} "class="btn btn-warning btn-sm" type="submit"><i class="fa fa-clock"></i> عدم تایید</a>
                                @else
                                <a href="{{ route('content.comment.approved', $comment->id)}}" class="btn btn-success btn-sm text-white" type="submit"><i class="fa fa-check"></i>تایید</a>
                                @endif
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </section>

        </section>
    </section>
</section>

@endsection

@section('script')

    <script type="text/javascript">
        function changeStatus(id){
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url : url,
                type : "GET",
                success : function(response){
                    if(response.status){
                        if(response.checked){
                            element.prop('checked', true);
                            successToast('نظر  با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('نظر  با موفقیت غیر فعال شد')
                        }
                    }
                    else{
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error : function(){
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });

            function successToast(message){

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                        '<strong class="ml-auto">' + message + '</strong>\n' +
                        '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                            '<span aria-hidden="true">&times;</span>\n' +
                            '</button>\n' +
                            '</section>\n' +
                            '</section>';

                            $('.toast-wrapper').append(successToastTag);
                            $('.toast').toast('show').delay(3500).queue(function() {
                                $(this).remove();
                            })
            }

            function errorToast(message){

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                        '<strong class="ml-auto">' + message + '</strong>\n' +
                        '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                            '<span aria-hidden="true">&times;</span>\n' +
                            '</button>\n' +
                            '</section>\n' +
                            '</section>';

                            $('.toast-wrapper').append(errorToastTag);
                            $('.toast').toast('show').delay(5500).queue(function() {
                                $(this).remove();
                            })
            }
        }
    </script>

    <script>
        $(document).ready( function () {
            $('#comment').DataTable();
        } );
    </script>

@endsection

