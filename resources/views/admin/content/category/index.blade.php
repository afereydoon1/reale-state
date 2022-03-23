@extends('admin.layouts.master')
@section('head-tag','لیست دسته بندی ها')
@section('content')
  <section class="row  mt-30">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  دسته بندی
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                <a href="{{ route('postCategories.create') }}" class="btn btn-info btn-sm">ایجاد دسته بندی</a>
{{--                <div class="max-width-16-rem">--}}
{{--                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">--}}
{{--                </div>--}}
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover" id="category">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>نام دسته بندی</th>
                            <th>اسلاگ</th>
                            <th>تگ ها</th>
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postCategories as $postCategory)

                        <tr>
                            <th class="text-center">1</th>
                            <td class="text-center">{{ $postCategory->name }}</td>
                            <td class="text-center">{{ $postCategory->slug }}</td>
                            <td class="text-center">{{ $postCategory->tags }}</td>
                            <td class="text-center">
                                <label>
                                    <input type="checkbox" @if ($postCategory->status === 1)
                                    checked
                                    @endif>
                                </label>
                            </td>
                            <td class="width-16-rem text-center">
                                <a href="{{ route('postCategories.edit', $postCategory->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('postCategories.destroy', $postCategory->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i></button>
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
        function changeStatus(id) {
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked')

            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('کاربر با موفقیت فعال شد');
                        } else {
                            element.prop('checked', false);
                            successToast('کاربر با موفقیت غیر فعال شد')
                        }
                    } else {
                        element.prop('checked', elementValue);
                        erroreToast('تغییر وضعیت با مشکل رو برو شده است')
                    }
                },
                error: function () {
                    element.prop('checked', elementValue);
                    erroreToast('ارتباط با سرور برقرار نشد')
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
                $('.toast').toast('show').delay(2500).queue(function() {
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
                $('.toast').toast('show').delay(2500).queue(function() {
                    $(this).remove();
                })
            }
        }
    </script>
    <script>
        $(document).ready( function () {
            $('#category').DataTable();
        } );
    </script>
@endsection
