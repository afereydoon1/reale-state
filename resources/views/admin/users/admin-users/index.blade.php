@extends('admin.layouts.master')

@section('title','داشبورد | لیست کاربران ادمین')

@section('content')

    <section class="row mt-30">
        <section class="col-12">
            <section class="card">
                <section class="card-body">
                    <section class="main-body-container-header">
                        <h5 class="header-title">لیست کاربران ادمین</h5>
                    </section>

                    <section class="d-flex justify-content-between">
                        <h4 class="header-title"><a href="{{ route('admin_user.create') }}" class="btn btn-info btn-sm">ساخت ادمین</a></h4>
                        <div class="max-width-16-rem">
                            <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                        </div>
                    </section>

                    <table class="table w-100 nowrap custom_setting_dataTable">
                        <thead>
                        <tr>
                            <th class="text-center">#id</th>
                            <th class="text-center">نام و نام خانوادگی</th>
                            <th class="text-center">ایمیل</th>
                            <th class="text-center">تلفن</th>
                            <th class="text-center">پروفایل</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($adminUsers as $key => $adminUser)
                            <tr class="table_middle text-center">
                                <td>{{ $key +=1}}</td>
                                <td>{{ $adminUser->full_name }}</td>
                                <td>{{ $adminUser->email }}</td>
                                <td>{{ $adminUser->mobile }}</td>
                                <td>
                                    image
                                </td>
                                <td>
                                    <label>
                                        <input id="{{ $adminUser->id }}" onchange="changeStatus({{ $adminUser->id }})" data-url="{{ route('admin_user.status',$adminUser->id) }}" type="checkbox" @if($adminUser->status === 1) checked @endif>
                                    </label>
                                </td>
                                <td>
                                    <div class="d-block">
                                        <a href="{{ route('model_has_role.create', $adminUser->id) }}" class="btn btn-info btn-sm">تخصیص نقش</a>
                                        <a href="{{ route('model_has_permission.create', $adminUser->id) }}" class="btn btn-primary btn-sm">تخصیص دسترسی</a>
                                        <a href="{{ route('admin_user.edit', $adminUser->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <form class="d-inline" action="{{ route('admin_user.destroy', $adminUser->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i></button>
                                        </form>
                                    </div>
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
@endsection



