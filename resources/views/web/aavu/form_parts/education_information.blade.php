@if (isset($member->id) && $member->completed_steps>0)
<form action="{{route('register.education.save')}}" method="POST" id="education_info_form">
    @csrf
    <input type="hidden" name="membership_id" value="{{$member->id}}">
    <div class="w-full">
        <div class="rounded border-t border-gray-500 px-5 py-5 shadow-lg mb-5">
            <div class="w-full text-center font-semibold mb-5">Education Information</div>
            <div class="mt-3">
                <div class="w-full">Degree Obtained from Varendra University</div>
                <div class="md:flex -mx-3 mb-6">

                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="degree[]">
                            Degree
                        </label>
                        <select name="degree[]" id="degree[]"
                            class="block appearance-none w-full text-xs md:text-lg bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="Bachelor">Bachelor</option>
                        </select>
                    </div>

                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="department[]">
                            Department
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="department[]" name="department[]" type="text" value="{{$member->educations[0]->department??''}}" placeholder="Department">
                    </div>
                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="major[]">
                            Major/Subject
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="major[]" name="major[]" type="text" value="{{$member->educations[0]->subject??''}}" placeholder="Major/Subject">
                    </div>
                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="year[]">
                            Passing Year
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="year[]" name="year[]" type="text" value="{{$member->educations[0]->year??''}}" placeholder="Passing Year">
                    </div>
                    <input type="hidden" name="institute[]" id="institute[]" value="Varendra University">
                </div>
                <div class="md:flex -mx-3 mb-6">

                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="degree[]">
                            Degree
                        </label>
                        <select name="degree[]" id="degree[]"
                            class="block appearance-none w-full text-xs md:text-lg bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="Master">Master</option>
                        </select>
                    </div>

                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="department[]">
                            Department
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="department[]" name="department[]" type="text" value="{{$member->educations[1]->department??''}}" placeholder="Department">
                    </div>
                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="major[]">
                            Major/Subject
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="major[]" name="major[]" type="text" value="{{$member->educations[1]->subject??''}}" placeholder="Major/Subject">
                    </div>
                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="year[]">
                            Passing Year
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="year[]" name="year[]" type="text" value="{{$member->educations[1]->year??''}}" placeholder="Passing Year">
                    </div>
                    <input type="hidden" name="institute[]" id="institute[]" value="Varendra University">
                </div>
            </div>
            <div class="mt-3">
                <div class="w-full">Degree obtained from Other University: (for Honorary Life Member & Donor Member only)</div>
                <div class="md:flex -mx-3 mb-6">

                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="degree[]">
                            Degree
                        </label>
                        <select name="degree[]" id="degree[]"
                            class="block appearance-none w-full text-xs md:text-lg bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="Bachelor">Bachelor</option>
                        </select>
                    </div>

                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="department[]">
                            Department
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="department[]" name="department[]" type="text" value="{{$member->educations[2]->department??''}}" placeholder="Department">
                    </div>
                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="major[]">
                            Major/Subject
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="major[]" name="major[]" type="text" value="{{$member->educations[2]->subject??''}}" placeholder="Major/Subject">
                    </div>
                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="year[]">
                            Passing Year
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="year[]" name="year[]" type="text" value="{{$member->educations[2]->year??''}}" placeholder="Passing Year">
                    </div>
                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="institute[]">
                            Institute/University
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="institute[]" id="institute[]" type="text" value="{{$member->educations[2]->institute??''}}" placeholder="Institute">
                    </div>

                </div>
                <div class="md:flex -mx-3 mb-6">

                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="degree[]">
                            Degree
                        </label>
                        <select name="degree[]" id="degree[]"
                            class="block appearance-none w-full text-xs md:text-lg bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="Master">Master</option>
                        </select>
                    </div>

                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="department[]">
                            Department
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="department[]" name="department[]" type="text" value="{{$member->educations[3]->department??''}}" placeholder="Department">
                    </div>
                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="major[]">
                            Major/Subject
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="major[]" name="major[]" type="text" value="{{$member->educations[3]->subject??''}}" placeholder="Major/Subject">
                    </div>
                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="year[]">
                            Passing Year
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="year[]" name="year[]" type="text" value="{{$member->educations[3]->year??''}}" placeholder="Passing Year">
                    </div>
                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="institute[]">
                            Institute/University
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="institute[]" id="institute[]" type="text" value="{{$member->educations[3]->institute??''}}" placeholder="Institute">
                    </div>
                </div>
                <div class="md:flex -mx-3 mb-6">

                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="degree[]">
                            Degree
                        </label>
                        <select name="degree[]" id="degree[]"
                            class="block appearance-none w-full text-xs md:text-lg bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="PhD">PhD</option>
                        </select>
                    </div>

                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="department[]">
                            Department
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="department[]" name="department[]" type="text" value="{{$member->educations[4]->department??''}}" placeholder="Department">
                    </div>
                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="major[]">
                            Major/Subject
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="major[]" name="major[]" type="text" value="{{$member->educations[4]->subject??''}}" placeholder="Major/Subject">
                    </div>
                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="year[]">
                            Passing Year
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="year[]" name="year[]" type="text" value="{{$member->educations[4]->year??''}}" placeholder="Passing Year">
                    </div>
                    <div class="md:w-1/4 w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                            for="institute[]">
                            Institute/University
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="institute[]" id="institute[]" type="text" value="{{$member->educations[4]->institute??''}}" placeholder="Institute">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a uk-switcher-item="previous" class="btn btn-success pull-left" href="javascript:void(0)">Back</a>
                    <input type="submit" id="educationFormSubmit" class="btn btn-success pull-right" value="Save & Continue">
</form>
@endif
