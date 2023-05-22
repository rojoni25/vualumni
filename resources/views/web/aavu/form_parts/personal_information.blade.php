
    @csrf
    <div class="w-full">
        <div class="rounded border-t border-gray-500 px-5 py-5 shadow-lg mb-5">
            <div class="w-full text-center font-semibold mb-5">Personal Information</div>
            <div class="md:flex -mx-3 mb-6">
                <div class="flex flex-wrap w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="name">
                        Name in English <span class="text-red-500 font-bold">*</span>
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="name" name="name" type="text" value="{{$member->name??''}}" placeholder="Your Full Name" required>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="name_bangla">
                        Name in Bangla <span class="text-red-500 font-bold">*</span>
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="name_bangla" name="name_bangla" type="text" value="{{$member->name_bangla??''}}" placeholder="বাংলায় নাম লিখুন" required>
                </div>
            </div>
            <div class="md:flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="dob">
                        Date of Birth <span class="text-red-500 font-bold">*</span>
                    </label>
                    <input style="line-height:unset;"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="dob" name="dob" type="date" value="{{$member->dob??''}}" placeholder="DD/MM/YYYY" required>

                </div>
                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="blood_group">
                        Blood Group <span class="text-red-500 font-bold">*</span>
                    </label>
                    <select name="blood_group" id="blood_group"
                        class="block text-xs md:text-lg w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option class="text-xs md:text-lg" {{(isset($member->blood_group) && $member->blood_group=='A+(ve)')?'selected':''}} value="A+(ve)">A+(ve)</option>
                        <option class="text-xs md:text-lg" {{(isset($member->blood_group) && $member->blood_group=='A(-ve)')?'selected':''}} value="A(-ve)">A-(ve)</option>
                        <option class="text-xs md:text-lg" {{(isset($member->blood_group) && $member->blood_group=='B(+ve)')?'selected':''}} value="B(+ve)">B(+ve)</option>
                        <option class="text-xs md:text-lg" {{(isset($member->blood_group) && $member->blood_group=='B(-ve)')?'selected':''}} value="B(-ve)">B(-ve)</option>
                        <option class="text-xs md:text-lg" {{(isset($member->blood_group) && $member->blood_group=='AB(+ve)')?'selected':''}} value="AB(+ve)">AB(+ve)</option>
                        <option class="text-xs md:text-lg" {{(isset($member->blood_group) && $member->blood_group=='AB(-ve)')?'selected':''}} value="AB(-ve)">AB(-ve)</option>
                        <option class="text-xs md:text-lg" {{(isset($member->blood_group) && $member->blood_group=='O(+ve)')?'selected':''}} value="O(+ve)">O(+ve)</option>
                        <option class="text-xs md:text-lg" {{(isset($member->blood_group) && $member->blood_group=='O(-ve)')?'selected':''}} value="O(-ve)">O(-ve)</option>
                    </select>

                </div>
                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="gender">
                        Gender <span class="text-red-500 font-bold">*</span>
                    </label>
                    <select name="gender" id="gender"
                        class="block text-xs md:text-lg w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option class="text-xs md:text-lg" {{(isset($member->gender) && $member->gender=='Male')?'selected':''}} value="Male">Male</option>
                        <option class="text-xs md:text-lg" {{(isset($member->gender) && $member->gender=='Female')?'selected':''}} value="Female">Female</option>
                    </select>

                </div>
                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="maritial_status">
                        Marital Status <span class="text-red-500 font-bold">*</span>
                    </label>
                    <select name="maritial_status" id="maritial_status"
                        onchange="displayMarried('#ifMarried');"
                        class="block text-xs md:text-lg w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option {{(isset($member->maritial_status) && $member->maritial_status=='Single')?'selected':''}} value="Single">Single</option>
                        <option {{(isset($member->maritial_status) && $member->maritial_status=='Married')?'selected':''}} value="Married">Married</option>
                    </select>

                </div>
            </div>
            <div class="md:flex flex-wrap -mx-3 mb-6" style="display: {{(isset($member->maritial_status) && $member->maritial_status=='Single')?'none':'flex'}};" id="ifMarried">
                <div class="w-full md:w-3/5 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="spouse_name">
                        Spouse Name <span class="text-red-500 font-bold">*</span>
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="spouse_name" name="spouse_name" type="text" value="{{$member->spouse_name??''}}" placeholder="Spouse Name">
                </div>
                <div class="w-full md:w-1/5 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="son_count">
                        Son(s)
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="son_count" name="son_count" type="number" value="{{$member->son_count??''}}" placeholder="Son(S)">
                </div>
                <div class="w-full md:w-1/5 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="daughter_count">
                        Daughter(s)
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="daughter_count" name="daughter_count" type="number" value="{{$member->daughter_count??''}}" placeholder="Daughter(s)">
                </div>
            </div>
            <div class="md:flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/5 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="nid">
                        NID Number <span class="text-red-500 font-bold">*</span>
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="nid" name="nid" type="text" value="{{$member->nid??''}}" placeholder="xxx xxx xxxx" required>
                </div>
                <div class="w-full md:w-1/5 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="mobile">
                        Contact Number <span class="text-red-500 font-bold">*</span>
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="mobile" name="mobile" type="text" value="{{$member->mobile??''}}" placeholder="+8801XXXXXXXXX" required>
                </div>
                <div class="w-full md:w-1/5 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="email">
                        Email <span class="text-red-500 font-bold">*</span>
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="email" name="email" type="email" value="{{$member->email??''}}" placeholder="user@email.com" required>
                        @if (session('email_error'))
                        <label class="block tracking-wide text-red-500 text-xs md:text-lg font-bold mb-2" for="email">{{session('email_error')}}</label>
                        @endif
                </div>
                <div class="w-full md:w-1/5 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="permanent_address[house]">
                        House/Holding
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="permanent_address[house]" name="permanent_address[house]" type="text" value="{{$member->permanent_address['house']??''}}" placeholder="House/Holding">
                </div>
                <div class="w-full md:w-1/5 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="permanent_address[ward]">
                        Ward No.
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="permanent_address[ward]" name="permanent_address[ward]" type="number" value="{{$member->permanent_address['ward']??''}}" placeholder="Ward">
                </div>
                <div class="w-full md:w-1/5 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="permanent_address[village]">
                        Village
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="permanent_address[village]" name="permanent_address[village]" type="text" value="{{$member->permanent_address['village']??''}}" placeholder="Village">
                </div>
                <div class="w-full md:w-1/5 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="permanent_address[district]">
                        District <span class="text-red-500 font-bold">*</span>
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="permanent_address[district]" name="permanent_address[district]" type="text" value="{{$member->permanent_address['district']??''}}" placeholder="District">
                </div>
                <div class="w-full md:w-1/5 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="permanent_address[ps]">
                        P.S.
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="permanent_address[ps]" name="permanent_address[ps]" type="text" value="{{$member->permanent_address['ps']??''}}" placeholder="P.S.">
                </div>
                <div class="w-full md:w-1/5 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="permanent_address[po]">
                        P.O.
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="permanent_address[ward]" name="permanent_address[po]" type="text" value="{{$member->permanent_address['po']??''}}" placeholder="P.O.">
                </div>
                <div class="w-full md:w-1/5 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="permanent_address[post_code]">
                        Post Code
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="permanent_address[post_code]" name="permanent_address[post_code]" type="number" value="{{$member->permanent_address['post_code']??''}}" placeholder="Post Code">
                </div>
            </div>

        </div>

    </div>
    <a uk-switcher-item="previous" class="btn btn-success pull-left" id="personalinfobtn-pre" href="javascript:void(0)">Back</a>
                    <input type="submit" id="personalInfoSubmit" class="btn btn-success pull-right" id="educationbtn-next" value="Save & Continue">
</form>
