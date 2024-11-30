@extends('admin.layouts.app')
{{-- @dd($errors->all()) --}}
@push('styles')
    <link href="{{ asset('admin/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/forms/switches.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('admin/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/select2/select2.min.css') }}">


    <style>
        .bootstrap-select.btn-group>.dropdown-toggle {
            height: 45px;
        }
    </style>
@endpush
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <form class="needs-validation" novalidate
                        action="{{ Route::currentRouteName() === 'admin.cms.testimonial.create' ? route('admin.cms.testimonial.store') : route('admin.cms.testimonial.update', $testimonial->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (Route::currentRouteName() === 'admin.cms.testimonial.edit')
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="user_name">Member</label>
                                <select class="form-control basic" name="user" value="{{old('user')}}" required>
                                    <option value="">--Choose Member--</option>
                                    <option value="2">Non Registered Member</option>
                                    @forelse ($users as $user)
                                        <option value="{{ $user->id }}" {{(!empty($testimonial)&&$testimonial->user_id == $user->id)?'selected':''}}>{{ $user->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div
                                    class="invalid-feedback"{{ $errors->has('user_name') ? 'style="display:block;"' : '' }}>
                                    Please choose user.
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="user_name">Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="user_name" name="user_name"
                                        placeholder="Name of the User" value="{{ $testimonial->user_name ?? old('user_name') }}">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Add A User Name
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="user_name">Designation & Orgainzation</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="designation" name="designation"
                                        placeholder="Designation and Organization" value="{{ $testimonial->designation ?? old('designation') }}">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Include Designation
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Upload Photo</label>
                                    <input type="file" name="user_avatar" id="input-photo" value="{{ old('user_avatar') }}"
                                        class="dropify" {{Route::currentRouteName() === 'admin.cms.testimonial.edit'?'data-default-file='.asset($testimonial->user_avatar).'':'required'}} data-allowed-file-extensions="jpg jpeg png gif"
                                        data-max-file-size="2M" />
                                    <div class="custom-file-container__image-preview"></div>
                                    <div>
                                        <ul>
                                            <li>Image dimension must be 300pxX300px</li>
                                            <li>Image size must not exceed 2Mb</li>
                                            <li>No need to put image if you want to use default</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="tagline">Tagline</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="tagline" name="tagline"
                                        placeholder="Remarkable Line from Testimonial" value="{{ $testimonial->tagline ?? old('tagline') }}">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a Tagline.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="content">Testimonial</label>
                                <div class="input-group">
                                    <textarea name="content" maxlength="1000" id="testimonialText" style="width: 100%;" rows="4" class="testimonial-area" required>{{ $testimonial->content ?? old('content') }}</textarea>
                                </div>
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
    <script src="{{ asset('admin/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/select2/custom-select2.js') }}"></script>
    <script src="{{asset('admin/plugins/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
    <script src="{{asset('admin/plugins/bootstrap-maxlength/custom-bs-maxlength.js')}}"></script>



    <script>
        //First upload
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();
        });
        $(document).ready(function() {
            $('.basic').select2();

            // Restrict input to alphabet values
            $('.basic').on('select2:open', function(e) {
                $(this).data('select2').$dropdown.find('.select2-search__field').on('input', function() {
                    var inputValue = $(this).val();
                    var sanitizedValue = inputValue.replace(/[^a-zA-Z]/g, '');
                    if (inputValue !== sanitizedValue) {
                        $(this).val(sanitizedValue);
                    }
                });
            });
        });
    </script>
    <script>
        $('textarea.testimonial-area').maxlength({
            alwaysShow: true,
        });
    </script>
@endpush
