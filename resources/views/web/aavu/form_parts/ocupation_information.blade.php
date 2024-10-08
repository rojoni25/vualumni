@if (isset($member->id) && $member->completed_steps > 1)
    <form action="{{ route('register.ocupation.save') }}" method="POST" id="ocupation_info_form">
        @csrf
        <input type="hidden" name="membership_id" value="{{ $member->id ?? '' }}">
        <div class="w-full">
            <div class="px-5 py-5 mb-5 border-t border-gray-500 rounded shadow-lg">
                <div class="w-full mb-5 font-semibold text-center">Ocupation Information</div>

                <div class="flex-wrap mb-6 -mx-3 md:flex">
                    <div class="w-full px-3 md:w-1/4">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                            for="organization">
                            Organization/Institute <span class="font-bold text-red-500">*</span>
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                            id="organization" name="organization" type="text"
                            value="{{ $member->ocupation->organization ?? '' }}" placeholder="Organization/Institute">
                    </div>
                    <div class="w-full px-3 md:w-1/4">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                            for="position">
                            Position
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                            id="position" name="position" type="text"
                            value="{{ $member->ocupation->position ?? '' }}" placeholder="Position">
                    </div>
                    <div class="w-full px-3 md:w-1/4">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                            for="from_date">
                            Serving From
                        </label>
                        <input style="line-height:unset;"
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            id="from_date" name="from_date" type="date"
                            value="{{ $member->ocupation && $member->ocupation->from_date ? $member->ocupation->from_date->format('Y-m-d') : '' }}"
                            placeholder="DD/MM/YYYY">
                    </div>
                    <div class="w-full px-3 md:w-1/4">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                            for="to_date">
                            Serving To <input type="checkbox" name="continuing" id="continuing"
                                {{ isset($member->ocupation->continuing) && $member->ocupation->continuing == 1 ? 'checked' : '' }}>
                            Continuing
                        </label>
                        <input style="line-height:unset;"
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            id="to_date" name="to_date" type="date"
                            value="{{ $member->ocupation && $member->ocupation->to_date ? $member->ocupation->to_date->format('Y-m-d') : '' }}"
                            placeholder="DD/MM/YYYY">

                    </div>

                </div>
                <div class="flex-wrap mb-6 -mx-3 md:flex">
                    <div class="w-full px-3 md:w-1/4">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                            for="address">
                            Address
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                            id="address" name="address" type="text" value="{{ $member->ocupation->address ?? '' }}"
                            placeholder="Address">
                    </div>
                    <div class="w-full px-3 md:w-1/4">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                            for="contact_number">
                            Contact Number
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                            id="contact_number" name="contact_number" type="text"
                            value="{{ $member->ocupation->contact_number ?? '' }}" placeholder="Contact Number">
                    </div>
                    <div class="w-full px-3 md:w-1/4">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                            for="email">
                            Email
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                            id="email" name="email" type="email" value="{{ $member->ocupation->email ?? '' }}"
                            placeholder="Email">
                    </div>
                    <div class="w-full px-3 md:w-1/4">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase md:text-lg"
                            for="web">
                            Website
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                            id="web" name="web" type="text" value="{{ $member->ocupation->web ?? '' }}"
                            placeholder="Website">
                    </div>


                </div>

            </div>
        </div>
        <a uk-switcher-item="previous" class="btn btn-success pull-left" href="javascript:void(0)">Back</a>
        <input type="submit" class="btn btn-success pull-right" value="Save & Continue">

    </form>
@endif
