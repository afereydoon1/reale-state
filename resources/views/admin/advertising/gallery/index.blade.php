@extends('admin.layouts.master')

@section('title','گالری تصاویر')

@section('content')
    <section class="row  mt-30">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        گالری تصاویر
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('ads.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('ads.store_gallery_image',$ad->id) }}" method="POST"
                          enctype="multipart/form-data" id="form">
                        @csrf
                        <section class="row">
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

                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

                <section class="col-md-12 mt-4 pt-4">
                    <section class="row">
                        @foreach($galleries as $gallery)
                            <section class="col-md-3 text-center ">

                                <img src="{{ asset($gallery->image) }}" alt="image" width="100" height="100">
                                <a class="btn btn-danger btn-sm"
                                   href="{{ route('ads.delete_gallery_image',$gallery->id) }}"><i
                                        class="fa fa-trash-alt"></i></a>

                            </section>
                        @endforeach
                    </section>
                </section>

            </section>
        </section>
    </section>

@endsection

