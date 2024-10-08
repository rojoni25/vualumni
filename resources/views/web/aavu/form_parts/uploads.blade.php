<form action="{{ route('register.uploads.save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="membership_id" value="{{ $member->id ?? '' }}">
    <div class="w-full">
        <div class="px-5 py-5 mb-5 border-t border-gray-500 rounded shadow-lg">
            <div class="w-full mb-5 font-semibold text-center">Documents Uploads</div>
            <div class="mb-6 -mx-3 md:flex">
                <div class="flex flex-wrap w-full px-3 mb-6 md:w-1/2 md:mb-0">

                    <label class="w-full text-center">Photo</label>
                    <input type="file" name="photo" id="input-photo" class="dropify" data-max-file-size="2M"
                        @if ($member && $member->photo) data-default-file="{{ asset($member->photo) }}" @else required @endif />
                    <div class="custom-file-container__image-preview"></div>
                </div>
                <div class="flex flex-wrap w-full px-3 mb-6 md:w-1/2 md:mb-0">
                    <label class="w-full text-center">Signature</label>
                    <input type="file" name="signature" id="input-Signature" class="dropify" data-max-file-size="2M"
                        @if ($member && $member->signature) data-default-file="{{ asset($member->signature) }}" @else required @endif />
                    <div class="custom-file-container__image-preview"></div>
                </div>
                <div class="flex flex-wrap w-full px-3 mb-6 md:w-1/2 md:mb-0">
                    <label class="w-full text-center">NID</label>
                    <input type="file" name="nid_photo" id="input-file-now" class="dropify" data-max-file-size="4M"
                        @if ($member && $member->nid_photo) data-default-file="{{ asset($member->nid_photo) }}" @else required @endif />
                    <div class="custom-file-container__image-preview"></div>
                </div>
                <div class="flex flex-wrap w-full px-3 mb-6 md:w-1/2 md:mb-0">

                    <label class="w-full text-center">Recent Certificate / ID Card of VU</label>
                    <input type="file" name="certificate" id="input-file-now" class="dropify" data-max-file-size="4M"
                        @if ($member && $member->certificate) data-default-file="{{ asset($member->certificate) }}" @else required @endif />
                    <div class="custom-file-container__image-preview"></div>
                </div>
            </div>
        </div>
        <a uk-switcher-item="previous" class="btn btn-success pull-left" href="javascript:void(0)">Back</a>
        <input type="submit" class="btn btn-success pull-right" value="Submit">
    </div>
</form>
