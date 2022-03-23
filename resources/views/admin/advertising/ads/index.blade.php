@extends('admin.layouts.master')
@section('title','لیست آگهی ها')
@section('content')

  <section class="row mt-30">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  لیست آگهی
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                <a href="{{ route('ads.create') }}" class="btn btn-info btn-sm">ایجاد آگهی</a>
{{--                <div class="max-width-16-rem">--}}
{{--                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">--}}
{{--                </div>--}}
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover" id="ads">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>عنوان</th>
                            <th>دسته</th>
                            <th>آدرس</th>
                            <th>تصویر</th>
                            <th>مشخصات</th>
                            <th>تگ</th>
                            <th>وضعیت</th>
                            <th>کاربر</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ads as $key => $advertise)

                        <tr >
                            <th class="text-center">{{ $key+=1 }}</th>
                            <td class="text-center">{{ $advertise->title }}</td>
                            <td class="text-center">{{ $advertise->adsCategory->name ?? ' ' }}</td>
                            <td class="text-center">{{ $advertise->address }}</td>
                            <td class="text-center">
                                <img src="{{ asset($advertise->image['indexArray']['small']) }}" alt="image">
                            </td>
                            <td class="text-center">
                                <ul>
                                    <li>کف : {{ $advertise->floor }} </li>
                                    <li>سال ساخت : {{ $advertise->year }} </li>
                                    <li>انباری : {{ $advertise->storeRoom() }} </li>
                                    <li>بالکن : {{ $advertise->balcony() }} </li>
                                    <li>متراژ بنا : {{ $advertise->area }} </li>
                                    <li>تعداد اتاق : {{ $advertise->room }} </li>
                                    <li>توالت : {{ $advertise->toilet() }} </li>
                                    <li>پارکینگ : {{ $advertise->parking() }} </li>
                                    <li>نوع آگهی : {{ $advertise->type() }} </li>
                                    <li> وضعیت آگهی : {{ $advertise->sellStatus() }} </li>
                                </ul>
                            </td>
                            <td class="text-center">{{ $advertise->tags }}</td>
                            <td class="text-center">
                                <label>
                                    <input id="{{ $advertise->id }}" onchange="changeStatus({{ $advertise->id }})" data-url="{{ route('ads.status', $advertise->id) }}" type="checkbox" @if ($advertise->status === 1)
                                    checked
                                        @endif>
                                </label>
                            </td>
                            <td class="text-center">{{ $advertise->user->full_name ?? '' }}</td>
                            <td class="width-16-rem text-center">
                                <a href="{{ route('ads.gallery',$advertise->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-images"></i></a>
                                <a href="{{ route('ads.edit', $advertise->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('ads.destroy', $advertise->id) }}" method="post">
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
                            successToast('آگهی با موفقیت فعال شد');
                        } else {
                            element.prop('checked', false);
                            successToast('آگهی با موفقیت غیر فعال شد')
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
            $('#ads').DataTable();
        } );
    </script>
@endsection
