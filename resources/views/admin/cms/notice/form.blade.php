@extends('admin.layouts.app')
{{-- @dd($errors->all()) --}}
@push('styles')
    <link href="{{ asset('admin/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/forms/switches.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('admin/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="{{ asset('assets/ckeditor/contents.css') }}" rel="stylesheet" type="text/css"> --}}

    <style>
        .bootstrap-select.btn-group>.dropdown-toggle {
            height: 45px;
        }

        #cke_noticeContent{
            width: 100%;
        }
    </style>
@endpush
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <form class="needs-validation" novalidate
                        action="{{ Route::currentRouteName() === 'admin.cms.notice.create' ? route('admin.cms.notice.store') : route('admin.cms.notice.update', $notice->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (Route::currentRouteName() === 'admin.cms.notice.edit')
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                    value="{{ $notice->title ?? old('title') }}" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback"{{ $errors->has('title') ? 'style="display:block;"' : '' }}>
                                    Please choose a caption.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-4">
                                <label for="group">Group</label>
                                <div class="input-group">
                                    <select name="group" class="selectpicker form-control" Data Width="100%"
                                        style="padding: 12px 20px;">
                                        <option value="Web" selected>Web</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="group">Category</label>
                                <div class="input-group">
                                    <select name="category" class="selectpicker form-control" Data Width="100%">
                                        <option value="General" selected>General</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="group">Expiration Date</label>
                                <div class="form-group mb-0">
                                    <input id="expirationDate" name="expiration"
                                        value="{{ !empty($notice) && $notice->expiration ? $notice->expiration->format('d-m-Y H:i') : old('expiration') }}"
                                        class="form-control flatpickr flatpickr-input" type="text"
                                        placeholder="Select Date.." readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="content">Content</label>
                                <div class="input-group">
                                    {{-- <div id="noticeContent" style="width:100%; height:360px;" ></div> --}}
                                    <textarea name="content" id="noticeContent" style="width: 100%;" rows="6" class="notice-content"
                                        required>{{ $notice->content ?? old('content') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Attachment</label>
                                    <input type="file" name="file" id="input-photo" value="{{ old('file') }}"
                                        class="dropify"
                                        {{ Route::currentRouteName() === 'admin.cms.notice.edit' ? 'data-default-file=' . asset($notice->file) . '' : 'required' }}
                                        data-allowed-file-extensions="jpg jpeg png gif pdf doc docx xls xlsx" data-max-file-size="10M"
                                         />
                                    <div class="custom-file-container__image-preview"></div>
                                    <div>
                                        <ul>
                                            {{-- <li>Image dimension must be 1920pxX716px</li> --}}
                                            <li>File size must not exceed 10Mb</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="form-check pl-0 d-flex">
                                <label class="switch s-icons s-outline s-outline-default mr-2">
                                    <input type="checkbox" {{ !empty($notice) && $notice->pinned ? 'checked' : '' }}
                                        name="pinned">
                                    <span class="slider round"></span>
                                </label>
                                <label class="">Pin Notice</label>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/assets/js/forms/bootstrap_validation/bs_validation_script.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('admin/plugins/flatpickr/custom-flatpickr.js') }}"></script>
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>

    <script>
        //First upload
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();
        });
    </script>
    <script>
        var datepicker = flatpickr(document.getElementById('expirationDate'), {
            enableTime: true,
            dateFormat: "d-m-Y H:i",
        });
    </script>
    <script>
        CKEDITOR.replace( 'noticeContent',{
            filebrowserImageBrowseUrl: '{{url('/laravel-filemanager?type=Images')}}',
            filebrowserImageUploadUrl: '{{url('/laravel-filemanager/upload?type=Images&_token='.csrf_token())}}',
            filebrowserBrowseUrl: '{{url('/laravel-filemanager?type=Files')}}',
            filebrowserUploadUrl: '{{url('/laravel-filemanager/upload?type=Files&_token='.csrf_token())}}'
} );
</script>
@endpush
