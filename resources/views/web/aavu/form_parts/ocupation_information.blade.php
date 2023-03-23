@if (isset($member->id) && $member->completed_steps>1)
<form action="{{route('register.ocupation.save')}}" method="POST" id="ocupation_info_form">
    @csrf
    <input type="hidden" name="membership_id" value="{{$member->id??''}}">
    <div class="w-full">
        <div class="rounded border-t border-gray-500 px-5 py-5 shadow-lg mb-5">
            <div class="w-full text-center font-semibold mb-5">Ocupation Information</div>

            <div class="md:flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="organization">
                        Organization/Institute <span class="text-red-500 font-bold">*</span>
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="organization" name="organization" type="text" value="{{$member->ocupation->organization??''}}" placeholder="Organization/Institute">
                </div>
                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="position">
                        Position
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="position" name="position" type="text" value="{{$member->ocupation->position??''}}" placeholder="Position">
                </div>
                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="from_date">
                        Serving From
                    </label>
                    <input style="line-height:unset;"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="from_date" name="from_date" type="date" value="{{$member->ocupation->from_date??''}}" placeholder="DD/MM/YYYY">
                </div>
                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="to_date">
                        Serving To <input type="checkbox" name="continuing" id="continuing" {{(isset($member->ocupation->continuing) && $member->ocupation->continuing==1)?'checked':''}}> Continuing
                    </label>
                    <input style="line-height:unset;"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="to_date" name="to_date" type="date" value="{{$member->ocupation->to_date??''}}" placeholder="DD/MM/YYYY">

                </div>

            </div>
            <div class="md:flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="address">
                        Address
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="address" name="address" type="text" value="{{$member->ocupation->address??''}}" placeholder="Address">
                </div>
                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="contact_number">
                        Contact Number
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="contact_number" name="contact_number" type="text" value="{{$member->ocupation->contact_number??''}}" placeholder="Contact Number">
                </div>
                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="email">
                        Email
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="email" name="email" type="email" value="{{$member->ocupation->email??''}}" placeholder="Email">
                </div>
                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs md:text-lg font-bold mb-2"
                        for="web">
                        Website
                    </label>
                    <input
                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="web" name="web" type="text" value="{{$member->ocupation->web??''}}" placeholder="Website">
                </div>


            </div>

        </div>
    </div>
    <a uk-switcher-item="previous" class="btn btn-success pull-left" href="javascript:void(0)">Education Information</a>
    <input type="submit" class="btn btn-success pull-right" value="Uploads">

</form>
@endif
