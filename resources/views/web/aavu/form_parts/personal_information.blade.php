@csrf
<div class="w-full well">
    <div class="px-5 py-5 mb-5 text-center border-t border-gray-500 rounded shadow-lg" id="validation_section">
        {{-- <div class="w-full mb-5 font-semibold text-center">Validation</div> --}}
        <div class="flex flex-wrap w-full px-3 m-auto mb-6 md:w-1/2 md:mb-0">
            <label class="block w-full mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                for="name">
                Student ID/Employee ID <span class="font-bold text-red-500">*</span>
            </label>
            <div class="flex w-full">
                <input style="margin-bottom: 0 !important;"
                    class="block w-full px-4 py-3 mb-0 leading-tight text-gray-700 bg-gray-200 border border-red-500 rounded appearance-none focus:outline-none focus:bg-white"
                    id="uid" name="uid" type="text" value=""
                    placeholder="Your VU Student ID / VU Employee ID">
                <a href="javascript:validate()" id="valbtn" class="btn btn-primary">Validate</a>
            </div>
            <div id="msg"></div>
        </div>
    </div>
    <div class="px-5 py-5 mb-5 border-t border-gray-500 rounded shadow-lg" style="display: none;"
        id="personal_info_div">
        <div class="w-full mb-5 font-semibold text-center">Personal Information</div>
        <div class="mb-6 -mx-3 md:flex">
            <div class="flex flex-wrap w-full px-3 mb-6 md:w-1/2 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="name">
                    Name in English <span class="font-bold text-red-500">*</span>
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-red-500 rounded appearance-none focus:outline-none focus:bg-white"
                    id="name" name="name" type="text" value="{{ $member->name ?? '' }}"
                    placeholder="Your Full Name" required>
            </div>
            <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="name_bangla">
                    Name in Bangla <span class="font-bold text-red-500">*</span>
                </label>
                <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    id="name_bangla" name="name_bangla" type="text" value="{{ $member->name_bangla ?? '' }}"
                    placeholder="বাংলায় নাম লিখুন" required>
            </div>
        </div>
        <div class="flex-wrap mb-6 -mx-3 md:flex">
            <div class="w-full px-3 md:w-1/4">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="dob">
                    Date of Birth <span class="font-bold text-red-500">*</span>
                </label>
                <input style="line-height:unset;"
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    id="dob" name="dob" type="date"
                    value="{{ $member ? $member->dob->format('Y-m-d') : '' }}" placeholder="DD/MM/YYYY" required>

            </div>
            <div class="w-full px-3 md:w-1/4">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="blood_group">
                    Blood Group <span class="font-bold text-red-500">*</span>
                </label>
                <select name="blood_group" id="blood_group"
                    class="block w-full px-4 py-3 pr-8 text-xs leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded md:text-lg focus:outline-none focus:bg-white focus:border-gray-500">
                    <option class="text-xs md:text-lg"
                        {{ isset($member->blood_group) && $member->blood_group == 'A+(ve)' ? 'selected' : '' }}
                        value="A+(ve)">A+(ve)</option>
                    <option class="text-xs md:text-lg"
                        {{ isset($member->blood_group) && $member->blood_group == 'A(-ve)' ? 'selected' : '' }}
                        value="A(-ve)">A-(ve)</option>
                    <option class="text-xs md:text-lg"
                        {{ isset($member->blood_group) && $member->blood_group == 'B(+ve)' ? 'selected' : '' }}
                        value="B(+ve)">B(+ve)</option>
                    <option class="text-xs md:text-lg"
                        {{ isset($member->blood_group) && $member->blood_group == 'B(-ve)' ? 'selected' : '' }}
                        value="B(-ve)">B(-ve)</option>
                    <option class="text-xs md:text-lg"
                        {{ isset($member->blood_group) && $member->blood_group == 'AB(+ve)' ? 'selected' : '' }}
                        value="AB(+ve)">AB(+ve)</option>
                    <option class="text-xs md:text-lg"
                        {{ isset($member->blood_group) && $member->blood_group == 'AB(-ve)' ? 'selected' : '' }}
                        value="AB(-ve)">AB(-ve)</option>
                    <option class="text-xs md:text-lg"
                        {{ isset($member->blood_group) && $member->blood_group == 'O(+ve)' ? 'selected' : '' }}
                        value="O(+ve)">O(+ve)</option>
                    <option class="text-xs md:text-lg"
                        {{ isset($member->blood_group) && $member->blood_group == 'O(-ve)' ? 'selected' : '' }}
                        value="O(-ve)">O(-ve)</option>
                </select>

            </div>
            <div class="w-full px-3 md:w-1/4">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="gender">
                    Gender <span class="font-bold text-red-500">*</span>
                </label>
                <select name="gender" id="gender"
                    class="block w-full px-4 py-3 pr-8 text-xs leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded md:text-lg focus:outline-none focus:bg-white focus:border-gray-500">
                    <option class="text-xs md:text-lg"
                        {{ isset($member->gender) && $member->gender == 'Male' ? 'selected' : '' }} value="Male">Male
                    </option>
                    <option class="text-xs md:text-lg"
                        {{ isset($member->gender) && $member->gender == 'Female' ? 'selected' : '' }} value="Female">
                        Female
                    </option>
                </select>

            </div>
            <div class="w-full px-3 md:w-1/4">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="maritial_status">
                    Marital Status <span class="font-bold text-red-500">*</span>
                </label>
                <select name="maritial_status" id="maritial_status" onchange="displayMarried('#ifMarried');"
                    class="block w-full px-4 py-3 pr-8 text-xs leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded md:text-lg focus:outline-none focus:bg-white focus:border-gray-500">
                    <option
                        {{ isset($member->maritial_status) && $member->maritial_status == 'Single' ? 'selected' : '' }}
                        value="Single">Single</option>
                    <option
                        {{ isset($member->maritial_status) && $member->maritial_status == 'Married' ? 'selected' : '' }}
                        value="Married">Married</option>
                </select>

            </div>
        </div>
        <div class="flex-wrap mb-6 -mx-3 md:flex"
            style="display: {{ isset($member->maritial_status) && $member->maritial_status == 'Married' ? 'flex' : 'none' }};"
            id="ifMarried">
            <div class="w-full px-3 md:w-1/4">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="spouse_name">
                    Spouse Name <span class="font-bold text-red-500">*</span>
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="spouse_name" name="spouse_name" type="text" value="{{ $member->spouse_name ?? '' }}"
                    placeholder="Spouse Name">
            </div>
            <div class="w-full px-3 md:w-1/4">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="marriage_date">
                    Marriage Date <span class="font-bold text-red-500">*</span>
                </label>
                <input style="line-height:unset;"
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    id="marriage_date" name="marriage_date" type="date"
                    value="{{ $member && $member->marriage_date ? $member->marriage_date->format('Y-m-d') : '' }}"
                    placeholder="DD/MM/YYYY">
            </div>
            <div class="w-full px-3 md:w-1/4">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="son_count">
                    Son(s)
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="son_count" name="son_count" type="number" value="{{ $member->son_count ?? '' }}"
                    placeholder="Son(S)">
            </div>
            <div class="w-full px-3 md:w-1/4">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="daughter_count">
                    Daughter(s)
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="daughter_count" name="daughter_count" type="number"
                    value="{{ $member->daughter_count ?? '' }}" placeholder="Daughter(s)">
            </div>
        </div>
        <div class="flex-wrap mb-6 -mx-3 md:flex">
            <div class="w-full px-3 md:w-1/5">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="nid">
                    NID Number <span class="font-bold text-red-500">*</span>
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="nid" name="nid" type="text" value="{{ $member->nid ?? '' }}"
                    placeholder="xxx xxx xxxx" required>
            </div>
            <div class="w-full px-3 md:w-1/5">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="mobile">
                    Contact Number <span class="font-bold text-red-500">*</span>
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="mobile" name="mobile" type="text" value="{{ $member->mobile ?? '' }}"
                    placeholder="+8801XXXXXXXXX" required>
            </div>
            <div class="w-full px-3 md:w-1/5">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="email">
                    Email <span class="font-bold text-red-500">*</span>
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="email" name="email" type="email" value="{{ $member->email ?? '' }}"
                    placeholder="user@email.com" required>
                @if (session('email_error'))
                    <label class="block mb-2 text-xs font-bold tracking-wide text-red-500 md:text-lg"
                        for="email">{{ session('email_error') }}</label>
                @endif
            </div>
            <div class="w-full px-3 md:w-1/5">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="permanent_address[house]">
                    House/Holding
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="permanent_address[house]" name="permanent_address[house]" type="text"
                    value="{{ $member->permanent_address['house'] ?? '' }}" placeholder="House/Holding">
            </div>
            <div class="w-full px-3 md:w-1/5">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="permanent_address[ward]">
                    Ward No.
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="permanent_address[ward]" name="permanent_address[ward]" type="number"
                    value="{{ $member->permanent_address['ward'] ?? '' }}" placeholder="Ward">
            </div>
            <div class="w-full px-3 md:w-1/5">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="permanent_address[village]">
                    Village
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="permanent_address[village]" name="permanent_address[village]" type="text"
                    value="{{ $member->permanent_address['village'] ?? '' }}" placeholder="Village">
            </div>
            <div class="w-full px-3 md:w-1/5">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="permanent_address[district]">
                    District <span class="font-bold text-red-500">*</span>
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="permanent_address[district]" name="permanent_address[district]" type="text"
                    value="{{ $member->permanent_address['district'] ?? '' }}" placeholder="District">
            </div>
            <div class="w-full px-3 md:w-1/5">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="permanent_address[ps]">
                    P.S.
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="permanent_address[ps]" name="permanent_address[ps]" type="text"
                    value="{{ $member->permanent_address['ps'] ?? '' }}" placeholder="P.S.">
            </div>
            <div class="w-full px-3 md:w-1/5">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="permanent_address[po]">
                    P.O.
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="permanent_address[ward]" name="permanent_address[po]" type="text"
                    value="{{ $member->permanent_address['po'] ?? '' }}" placeholder="P.O.">
            </div>
            <div class="w-full px-3 md:w-1/5">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                    for="permanent_address[post_code]">
                    Post Code
                </label>
                <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="permanent_address[post_code]" name="permanent_address[post_code]" type="number"
                    value="{{ $member->permanent_address['post_code'] ?? '' }}" placeholder="Post Code">
            </div>
        </div>

    </div>

</div>
<a uk-switcher-item="previous" class="btn btn-success pull-left" id="personalinfobtn-pre"
    href="javascript:void(0)">Back</a>
<input type="submit" id="personalInfoSubmit" class="btn btn-success pull-right" id="educationbtn-next"
    value="Save & Continue">
</form>
