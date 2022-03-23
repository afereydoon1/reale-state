@extends('admin.layouts.master')

@section('title','اسلاید جدید')

@section('head-tag')
<link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
  <section class="row  mt-30">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ایجاد اسلاید
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('slide_show.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('slide_show.store') }}" method="POST" enctype="multipart/form-data" id="form">
                    @csrf
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">عنوان اسلاید</label>
                                <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                                @error('title')
                                <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                @enderror
                            </div>
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="url">لینک</label>
                                <input type="text" class="form-control form-control-sm @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}">
                                @error('url')
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
                                       name="address" value="{{ old('address') }}">
                                @error('address')
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
                                       name="amount" value="{{ old('amount') }}">
                                @error('amount')
                                <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                @enderror
                            </div>
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="status">وضعیت</label>
                                <select name="status" id="" class="form-control form-control-sm @error('status') is-invalid @enderror" id="status">
                                    <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
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
                                <label for="">تاریخ انتشار</label>
                                <input type="text" name="published_at" id="published_at" class="form-control form-control-sm d-none">
                                <input type="text" id="published_at_view" class="form-control form-control-sm @error('published_at') is-invalid @enderror">
                                @error('published_at')
                                <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                @enderror
                            </div>
                        </section>

                        <section class="col-6">
                            <div class="form-group">
                                <label for="tags">تگ ها</label>
                                <input type="hidden" class="form-control form-control-sm"  name="tags" id="tags" value="{{ old('tags') }}">
                                <select class="select2 form-control form-control-sm @error('tags') is-invalid @enderror" id="select_tags" multiple>

                                </select>
                                @error('tags')
                                <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                @enderror
                            </div>
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">تصویر </label>
                                <input type="file" name="image" class="form-control form-control-sm custom-file @error('image') is-invalid @enderror">
                                @error('image')
                                <span class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                     </span>
                                @enderror
                            </div>
                        </section>

                        <section class="col-12">
                            <div class="form-group">
                                <label for="">متن پست</label>
                                <textarea name="body" id="body"  class="form-control form-control-sm @error('body') is-invalid @enderror" rows="6">{{ old('body') }}</textarea>
                                @error('body')
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
        CKEDITOR.replace('body');
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

        if(tags_input.val() !== null && tags_input.val().length > 0)
        {
            default_data = default_tags.split(',');
        }

        select_tags.select2({
            placeholder : 'لطفا تگ های خود را وارد نمایید',
            tags: true,
            data: default_data
        });
        select_tags.children('option').attr('selected', true).trigger('change');


        $('#form').submit(function ( event ){
            if(select_tags.val() !== null && select_tags.val().length > 0){
                var selectedSource = select_tags.val().join(',');
                tags_input.val(selectedSource)
            }
        })
    })
</script>

@endsection
