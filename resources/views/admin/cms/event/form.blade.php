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

        #cke_eventContent {
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
                        action="{{ Route::currentRouteName() === 'admin.cms.event.create' ? route('admin.cms.event.store') : route('admin.cms.event.update', $event->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (Route::currentRouteName() === 'admin.cms.event.edit')
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                    value="{{ $event->title ?? old('title') }}" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback"{{ $errors->has('title') ? 'style="display:block;"' : '' }}>
                                    Please choose a caption.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="url">Event Link</label>
                                <input type="url" class="form-control" id="eventUrl" name="url" placeholder="Link of the Event"
                                    value="{{ $event->url ?? old('url') }}">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback"{{ $errors->has('title') ? 'style="display:block;"' : '' }}>
                                    Please choose a event Link.
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="venue">Venue</label>
                                <input type="text" class="form-control" id="venue" name="venue" placeholder="Venue of the Event"
                                    value="{{ $event->venue ?? old('venue') }}">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback"{{ $errors->has('title') ? 'style="display:block;"' : '' }}>
                                    Please choose a venue.
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 mb-4">
                                <label for="group">Group</label>
                                <div class="input-group">
                                    <select name="group" class="selectpicker form-control" Data Width="100%"
                                        style="padding: 12px 20px;">
                                        <option value="Web" selected>Web</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="group">Category</label>
                                <div class="input-group">
                                    <select name="category" class="selectpicker form-control" Data Width="100%">
                                        <option value="General" selected>General</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="registration_date">Registration date</label>
                                <div class="form-group mb-0">
                                    <input id="registrationDate" name="registration_date"
                                        value="{{ !empty($event) && $event->registration_date() ? $event->registration_date() : old('registration_date') }}"
                                        class="form-control flatpickr flatpickr-input" type="text"
                                        placeholder="Select Date.." readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-4">
                                <label for="registration_url">Registration Link</label>
                                <input type="text" class="form-control" id="registrationUrl" name="registration_url" value="{{ $event->registration_url ?? old('registration_url') }}" placeholder="Registration Link">
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="event_date">Event Date</label>
                                <div class="form-group mb-0">
                                    <input id="eventDate" name="event_date"
                                        value="{{ !empty($event) && $event->event_date() ? $event->event_date() : old('event_date') }}"
                                        class="form-control flatpickr flatpickr-input" type="text"
                                        placeholder="Select Date.." readonly="readonly">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="content">Content</label>
                                <div class="input-group">
                                    {{-- <div id="eventContent" style="width:100%; height:360px;" ></div> --}}
                                    <textarea name="content" id="eventContent" style="width: 100%;" rows="6" class="event-content"
                                        required>{{ $event->content ?? old('content') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-4">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Banner</label>
                                    <input type="file" name="banner" id="input-photo" value="{{ old('banner') }}"
                                        class="dropify"
                                        {{ Route::currentRouteName() === 'admin.cms.event.edit' ? 'data-default-file=' . asset('storage/images/event/banner/large/'.$event->banner) . '' : 'required' }}
                                        data-allowed-file-extensions="jpg jpeg png gif" data-max-file-size="10M" />
                                    <div class="custom-file-container__image-preview"></div>
                                    <div>
                                        <ul>
                                            <li>Image dimension must be 1920pxX716px</li>
                                            <li>File size must not exceed 10Mb</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="custom-file-container" data-upload-id="mySecondImage">
                                    <label>Thumbnail</label>
                                    <input type="file" name="thumbnail" id="input-photo2" value="{{ old('thumbnail') }}"
                                        class="dropify"
                                        {{ Route::currentRouteName() === 'admin.cms.event.edit' ? 'data-default-file=' . asset('storage/images/event/thumbnail/large/'.$event->thumbnail) . '' : '' }}
                                        data-allowed-file-extensions="jpg jpeg png gif" data-max-file-size="10M" />
                                    <div class="custom-file-container__image-preview"></div>
                                    <div>
                                        <ul>
                                            <li>Image dimension must be 300pxX300px</li>
                                            <li>File size must not exceed 2Mb</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="form-check pl-0 d-flex">
                                <label class="switch s-icons s-outline s-outline-default mr-2">
                                    <input type="checkbox" {{ !empty($event) && $event->pinned ? 'checked' : '' }}
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
        var datepicker = flatpickr(document.getElementById('registrationDate'), {
            enableTime: true,
            mode: "range",
            dateFormat: "d-m-Y H:i",
        });
    </script>
    <script>
        var datepicker = flatpickr(document.getElementById('eventDate'), {
            enableTime: true,
            mode: "range",
            dateFormat: "d-m-Y H:i",
        });
    </script>
    <script>
        CKEDITOR.replace('eventContent', {
            filebrowserImageBrowseUrl: '{{ url('/laravel-filemanager?type=Images') }}',
            filebrowserImageUploadUrl: '{{ url('/laravel-filemanager/upload?type=Images&_token=' . csrf_token()) }}',
            filebrowserBrowseUrl: '{{ url('/laravel-filemanager?type=Files') }}',
            filebrowserUploadUrl: '{{ url('/laravel-filemanager/upload?type=Files&_token=' . csrf_token()) }}'
        });
    </script>
@endpush
