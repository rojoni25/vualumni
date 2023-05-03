<form action="{{route('register.uploads.save')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="membership_id" value="{{$member->id??''}}">
    <div class="w-full">
        <div class="rounded border-t border-gray-500 px-5 py-5 shadow-lg mb-5">
            <div class="w-full text-center font-semibold mb-5">Documents Uploads</div>
            <div class="md:flex -mx-3 mb-6">
                <div class="flex flex-wrap w-full md:w-1/2 px-3 mb-6 md:mb-0">

                    <label>Upload Photo</label>
                    <input type="file" name="photo" id="input-photo" class="dropify" data-max-file-size="2M" required />
                    <div class="custom-file-container__image-preview"></div>

                </div>
                <div class="flex flex-wrap w-full md:w-1/2 px-3 mb-6 md:mb-0">

                    <label>Upload Signature</label>
                    <input type="file" name="signature" id="input-Signature" class="dropify" data-max-file-size="2M" required />

                    <div class="custom-file-container__image-preview"></div>

                </div>
                <div class="flex flex-wrap w-full md:w-1/2 px-3 mb-6 md:mb-0">

                    <label>Upload NID</label>
                    <input type="file" name="nid_photo" id="input-file-now" class="dropify" data-max-file-size="4M" required />

                    <div class="custom-file-container__image-preview"></div>

                </div>
                <div class="flex flex-wrap w-full md:w-1/2 px-3 mb-6 md:mb-0">

                    <label>Upload Certificate</label>
                    <input type="file" name="certificate" id="input-file-now" class="dropify" data-max-file-size="4M" required />

                    <div class="custom-file-container__image-preview"></div>

                </div>

            </div>


        </div>
        <a uk-switcher-item="previous" class="btn btn-success pull-left" href="javascript:void(0)">Back</a>
                        <input type="submit" class="btn btn-success pull-right" value="Submit">

    </div>
</form>
