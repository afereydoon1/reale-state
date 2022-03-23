@extends('admin.layouts.master')

@section('title','اسلاید شو')

@section('content')

  <section class="row  mt-30">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 لیست اسلاید ها
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                <a href="{{ route('slide_show.create') }}" class="btn btn-info btn-sm">ایجاد اسلاید </a>
{{--                <div class="max-width-16-rem">--}}
{{--                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">--}}
{{--                </div>--}}
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover" id="slide_show">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>عنوان</th>
                            <th>لینک</th>
                            <th>آدرس</th>
                            <th>مبلغ</th>
                            <th>تصویر</th>
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($slides as $key => $slide)

                        <tr>
                            <td class="text-center">{{ $key += 1 }}</td>
                            <td class="text-center">{{ $slide->title }}</td>
                            <td class="text-center">{{ $slide->url }}</td>
                            <td class="text-center">{{ $slide->address }}</td>
                            <td class="text-center">{{ $slide->amount }}</td>
                            <td class="text-center">
                                <img src="{{ asset($slide->image) }}" alt="" width="100" height="50">
                            </td>
                            <td class="text-center">
                                <label>
                                    <input id="{{ $slide->id }}" onchange="changeStatus({{ $slide->id }})" data-url="{{ route('slide_show.status', $slide->id) }}" type="checkbox" @if ($slide->status === 1)
                                    checked
                                    @endif>
                                </label>
                            </td>

                            <td class="width-16-rem text-left text-center">
                                <a href="{{ route('slide_show.edit', $slide->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('slide_show.destroy', $slide->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i></button>
                            </form>
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
                        successToast('اسلاید  با موفقیت فعال شد')
                    }
                    else{
                        element.prop('checked', false);
                        successToast('اسلاید  با موفقیت غیر فعال شد')
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
                        $('.toast').toast('show').delay(5500).queue(function() {
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
        $('#slide_show').DataTable();
    } );
</script>

@endsection
