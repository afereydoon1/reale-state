@extends('admin.layouts.master')

@section('title','ویرایش اگهی')

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <section class="row  mt-30">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد پست
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('ads.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('ads.update',$ad->id) }}" method="POST" enctype="multipart/form-data" id="form">
                        @csrf
                        @method('put')
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان آگهی</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('title') is-invalid @enderror"
                                           name="title" value="{{ old('title',$ad->title) }}">
                                    @error('title')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تصویر </label>
                                    <input type="file" name="image"
                                           class="form-control form-control-sm custom-file @error('image') is-invalid @enderror">
                                    @error('image')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">آدرس</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('address') is-invalid @enderror"
                                           name="address" value="{{ old('address',$ad->address) }}">
                                    @error('address')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">کف</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('floor') is-invalid @enderror"
                                           name="floor" value="{{ old('floor',$ad->floor) }}">
                                    @error('floor')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">سال ساخت</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('year') is-invalid @enderror"
                                           name="year" value="{{ old('year',$ad->year) }}">
                                    @error('year')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">قیمت</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('amount') is-invalid @enderror"
                                           name="amount" value="{{ old('amount',$ad->amount) }}">
                                    @error('amount')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">متراژ بنا</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('area') is-invalid @enderror"
                                           name="area" value="{{ old('area',$ad->area) }}">
                                    @error('area')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تعداد اتاق</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('room') is-invalid @enderror"
                                           name="room" value="{{ old('room',$ad->room) }}">
                                    @error('room')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" class="form-control form-control-sm" name="tags" id="tags"
                                           value="{{ old('tags',$ad->tags) }}">
                                    <select
                                        class="select2 form-control form-control-sm @error('tags') is-invalid @enderror"
                                        id="select_tags" multiple>

                                    </select>
                                    @error('tags')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="description">متن آگهی</label>
                                    <textarea name="description" id="description"
                                              class="form-control form-control-sm @error('description') is-invalid @enderror"
                                              rows="6">{{ old('description',$ad->description) }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="storeroom">انباری</label>
                                    <select name="storeroom"
                                            class="form-control form-control-sm @error('storeroom') is-invalid @enderror"
                                            id="storeroom">
                                        <option value="0" @if(old('storeroom',$ad->storeroom) == 0) selected @endif>ندارد</option>
                                        <option value="1" @if(old('storeroom',$ad->storeroom) == 1) selected @endif>دارد</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="balcony">بالکن</label>
                                    <select name="balcony"
                                            class="form-control form-control-sm @error('balcony') is-invalid @enderror"
                                            id="balcony">
                                        <option value="0" @if(old('balcony',$ad->balcony) == 0) selected @endif>ندارد</option>
                                        <option value="1" @if(old('balcony',$ad->balcony) == 1) selected @endif>دارد</option>
                                    </select>
                                    @error('balcony')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="toilet">توالت</label>
                                    <select name="toilet"
                                            class="form-control form-control-sm @error('toilet') is-invalid @enderror"
                                            id="toilet">
                                        <option value="0" @if(old('toilet',$ad->toilet) == 0) selected @endif>ایرانی</option>
                                        <option value="1" @if(old('toilet',$ad->toilet) == 1) selected @endif>فرنگی</option>
                                        <option value="2" @if(old('toilet',$ad->toilet) == 1) selected @endif>ایرانی و فرنگی
                                        </option>
                                    </select>
                                    @error('toilet')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sell_status">نوع اگهی</label>
                                    <select name="sell_status"
                                            class="form-control form-control-sm @error('sell_status') is-invalid @enderror"
                                            id="sell_status">
                                        <option value="0" @if(old('sell_status',$ad->sell_status) == 0) selected @endif>خرید</option>
                                        <option value="1" @if(old('sell_status',$ad->sell_status) == 1) selected @endif>اجاره</option>
                                    </select>
                                    @error('sell_status')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="type">نوع ملک</label>
                                    <select name="type"
                                            class="form-control form-control-sm @error('type') is-invalid @enderror"
                                            id="balcony">
                                        <option value="0" @if(old('type',$ad->type) == 0) selected @endif>آپارتمان</option>
                                        <option value="1" @if(old('type',$ad->type) == 1) selected @endif>ویلایی</option>
                                        <option value="2" @if(old('type',$ad->type) == 2) selected @endif>زمین</option>
                                        <option value="3" @if(old('type',$ad->type) == 3) selected @endif>سوله</option>
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="parking">پارکینگ</label>
                                    <select name="parking"
                                            class="form-control form-control-sm @error('parking') is-invalid @enderror"
                                            id="parking">
                                        <option value="0" @if(old('parking',$ad->parking) == 0) selected @endif>ندارد</option>
                                        <option value="1" @if(old('parking',$ad->parking) == 1) selected @endif>دارد</option>
                                    </select>
                                    @error('parking')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب دسته</label>
                                    <select name="category_id" id=""
                                            class="form-control form-control-sm @error('category_id') is-invalid @enderror">
                                        <option value="">دسته را انتخاب کنید</option>
                                        @foreach ($adsCategories as $adsCategory)
                                            <option value="{{ $adsCategory->id }}"
                                                    @if(old('category_id',$ad->category_id) == $adsCategory->id) selected @endif>{{ $adsCategory->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6 ">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status"
                                            class="form-control form-control-sm @error('status') is-invalid @enderror"
                                            id="status">
                                        <option value="0" @if(old('status',$ad->status) == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('status',$ad->status) == 1) selected @endif>فعال</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection

@section('script')

    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>

    <script>
        $(document).ready(function () {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        });
    </script>

    <script>
        $(document).ready(function () {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد نمایید',
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');


            $('#form').submit(function (event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>

@endsection
