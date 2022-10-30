@extends('layouts.default')
@section('title', 'Wisata')
@section('content')
    @push('after-style')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
            integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="icon" type="image/png" href="https://c.cksource.com/a/1/logos/ckeditor5.png">
        <style>
            .ck-editor__editable {
                min-height: 300px;
                margin-bottom: 10px;
            }
        </style>
    @endpush
    {{-- breadcumb --}}

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Wisata</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Tambah Wisata</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- end breadcumb --}}
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Wisata</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="card-body card-dashboard">

                        <form class="form form-horizontal" action="{{ route('backsite.wisata.store') }}" method="POST"
                            enctype="multipart/form-data" id="tambahWisataForm">

                            @csrf

                            <div class="form-body">
                                <div class="form-section">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="name">Nama Wisata <code
                                                style="color:red;">required</code></label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="name" name="name" class="form-control"
                                                placeholder="Contoh Curug Cigorobog" value="{{ old('name') }}"
                                                autocomplete="off" required>

                                            @if ($errors->has('name'))
                                                <p style="font-style: bold; color: red;">
                                                    {{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="description">Deskripsi <code
                                                style="color:red;">required</code></label>
                                        <div class="col-md-9 mx-auto">
                                            <textarea name="description" class="form-control ckeditor-5" id="ckeditor5"></textarea>

                                            @if ($errors->has('description'))
                                                <p style="font-style: bold; color: red;">
                                                    {{ $errors->first('description') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="address">Alamat Wisata <code
                                                style="color:red;">required</code></label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="address" name="address" class="form-control"
                                                placeholder="Jalan Raya Cimalaka" value="{{ old('address') }}"
                                                autocomplete="off" required>

                                            @if ($errors->has('address'))
                                                <p style="font-style: bold; color: red;">
                                                    {{ $errors->first('address') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="longitude">Longitude <code
                                                style="color:red;">required</code></label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="longitude" name="longitude" class="form-control"
                                                placeholder="Longitude" value="{{ old('longitude') }}" autocomplete="off"
                                                required>

                                            @if ($errors->has('longitude'))
                                                <p style="font-style: bold; color: red;">
                                                    {{ $errors->first('longitude') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="latitude">Latitude <code
                                                style="color:red;">required</code></label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="latitude" name="latitude" class="form-control"
                                                placeholder="Latitude" value="{{ old('latitude') }}" autocomplete="off"
                                                required>

                                            @if ($errors->has('latitude'))
                                                <p style="font-style: bold; color: red;">
                                                    {{ $errors->first('latitude') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="thumbnail">Thumbnail <code
                                                style="color:red;">required</code></label>
                                        <div class="col-md-9 mx-auto">
                                            <div class="custom-file">
                                                <input type="file" class="form-control dropify" name="thumbnail"
                                                    id="thumbnail" data-allowed-file-extensions="png jpg jpeg"
                                                    data-show-remove="false">

                                            </div>
                                            @if ($errors->has('thumbnail'))
                                                <p style="font-style: bold; color: red;">
                                                    {{ $errors->first('thumbnail') }}</p>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="gambar">Foto-Foto Wisata <code
                                                style="color:red;">required</code></label>
                                        <div class="col-md-9 mx-auto">

                                            <input type="file" class="form-control dropify" name="gambar[]"
                                                id="gambar" data-allowed-file-extensions="png jpg jpeg"
                                                data-show-remove="false" multiple>
                                            <span class="errorAddImage" style="display: none;">Foto Cafe harus di
                                                isi</span>

                                        </div>
                        </form>

                    </div>
                </div>



                <div class="form-actions text-right">
                    <button type="submit" class="btn btn-primary" id="tambahWisataButton">Buat Cafe</button>
                    <a href="{{ route('backsite.wisata.index') }}" class="btn btn-dark">Kembali</a>
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
@push('after-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor5'), {
                licenseKey: '',
                toolbar: {
                    items: [
                        'heading', '|',
                        'alignment', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'bulletedList', 'numberedList', 'todoList',
                        '-', // break point
                        'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
                        'code', 'codeBlock', '|',
                        'insertTable', '|',
                        'outdent', 'indent', '|',
                        'blockQuote', '|',
                        'undo', 'redo'
                    ],
                }
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(
                    'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                );
                console.warn('Build id: t94173qfk3d4-jfha1cexgplv');
                console.error(error);
            });
    </script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Seret dan jatuhkan file di sini atau klik',
            }
        });
    </script>
    <script>
        Dropzone.options.dropzone = {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) {
                console.log(response);
            },
            error: function(file, response) {
                return false;
            }
        };
    </script>
@endpush
