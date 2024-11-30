@extends('web.layouts.app')
@push('style')
    <style>
        input .radio-input {
            padding: 7px;
        }

        .dropify-wrapper .dropify-message span.file-icon {
            font-size: 16px;
        }

        .dropify-wrapper .dropify-preview .dropify-render img {
            text-align: center;
            text-align: -webkit-center;
        }
    </style>
    @if (Agent::isMobile())
        <style>
            ul li {
                font-size: 11px;
            }
        </style>
    @endif
@endpush
@push('css')
    <link href="{{ asset('assets\dropify\dist\css\dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('main')
    <div class="mx-auto mt-10" style="max-width:1200px; {{ Agent::isMobile() ? 'padding:5px;' : '' }}">
        <ul style="{{ Agent::isMobile() ? 'font-size: 10px;' : 'font-size: 18px;' }}"
            class="justify-center uk-subnav uk-subnav-pill"
            uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium; connect: #form-body; active:{{ session('active_form') ?? 0 }};">
            <li><a class="border rounded-full" style="{{ Agent::isMobile() ? ' font-size:10px;' : 'font-size:14px;' }}"
                    href="#">Requirements</a></li>
            <li><a class="border rounded-full" style="{{ Agent::isMobile() ? ' font-size:10px;' : 'font-size:14px;' }}"
                    href="#">Membership Type</a></li>
            <li><a class="border rounded-full" style="{{ Agent::isMobile() ? ' font-size:10px;' : 'font-size:14px;' }}"
                    href="#">Personal Information</a></li>
            @if (isset($member->completed_steps) && $member->completed_steps + 2 > 2)
                <li><a class="border rounded-full" style="{{ Agent::isMobile() ? ' font-size:10px;' : 'font-size:14px;' }}"
                        href="#">Education Information</a></li>
            @endif
            @if (isset($member->completed_steps) && $member->completed_steps + 2 > 3)
                <li><a class="border rounded-full" style="{{ Agent::isMobile() ? ' font-size:10px;' : 'font-size:14px;' }}"
                        href="#">Profession Information</a></li>
            @endif
            @if (isset($member->completed_steps) && $member->completed_steps + 2 > 4)
                <li><a class="border rounded-full" style="{{ Agent::isMobile() ? ' font-size:10px;' : 'font-size:14px;' }}"
                        href="#">Uploads</a></li>
            @endif
            {{-- @if (isset($member->completed_steps) && $member->completed_steps + 2 > 5)
                <li><a class="border rounded-full" style="{{ Agent::isMobile() ? ' font-size:10px;' : 'font-size:14px;' }}"
                        href="#">Subscription</a></li>
            @endif --}}
        </ul>
        <div class="uk-switcher uk-margin form-body" style="{{ Agent::isMobile() ? 'font-size:11px;' : '' }}"
            id="form-body">
            <div id="requirements">
                <div class="well">
                    <div class="mb-10" style="{{ Agent::isMobile() ? 'font-size:14px' : 'font-size:18px' }}">The following
                        contents are required for signing up</div>
                    <ul style="line-height:20px; padding-left:35px; text-align: justify;">
                        <li class="flex items-center"
                            style="margin-bottom:10px; {{ Agent::isMobile() ? 'font-size:11px' : 'font-size:16px' }}">
                            <i class="mr-3 fa fa-chevron-right" aria-hidden="true"></i>
                            Recent Photo. (Resolution must be 300px X 300px)
                        </li>
                        <li class="flex items-center"
                            style="margin-bottom:10px; {{ Agent::isMobile() ? 'font-size:11px' : 'font-size:16px' }}">
                            <i class="mr-3 fa fa-chevron-right" aria-hidden="true"></i>
                            Signature. (Resolution must be 300px X 80px)
                        </li>
                        <li class="flex items-center"
                            style="margin-bottom:10px; {{ Agent::isMobile() ? 'font-size:11px' : 'font-size:16px' }}">
                            <i class="mr-3 fa fa-chevron-right" aria-hidden="true"></i>
                            Scanned copy of NID.
                        </li>
                        <li class="flex items-center"
                            style="margin-bottom:10px; {{ Agent::isMobile() ? 'font-size:11px' : 'font-size:16px' }}">
                            <i class="mr-3 fa fa-chevron-right" aria-hidden="true"></i>
                            Scanned copy of Academic Certificate or Student ID Card of Varendra University.
                        </li>
                    </ul>
                </div>
                <a uk-switcher-item="next" class="btn btn-success pull-right" id="personalinfobtn-next"
                    href="javascript:void(0)">Proceed</a>
            </div>
            <div id="membership-type">
                <form action="{{ route('register.personal.save') }}" method="POST" id="personal_info_form">
                    @if (isset($member->id))
                        <input type="hidden" name="id" value="{{ $member->id }}">
                    @endif
                    <div class="well">
                        <div class="mb-10">Holders of honors or master degree from Varendra University are eligible to
                            become
                            the member of the AAVU.</div>

                        <div class="mb-3"><u>Membership Categories (Select One):</u> </div>

                        <ul style="line-height:20px; padding-left:35px; text-align: justify;">
                            <li class="flex items-center" style="">
                                <div class="p-1 radio"><label for="membership_type1"
                                        onclick="membership_selection('alumni')"><input type="radio"
                                            value="Regular Member" name="membership_type" id="membership_type1"
                                            class="uk-radio radio-input"
                                            {{ isset($member->membership_type) && $member->membership_type == 'Regular Member' ? 'checked' : '' }}
                                            {{ !isset($member->membership_type) ? 'checked' : '' }}>
                                        <strong>Regular Member</strong>: Subscription/fee for alumni living in Bangladesh
                                        will be BDT 500.00 (five hundred taka) and for overseas alumni will be USD 10.00
                                        (ten USD) per year.</label></div>
                            </li>
                            <li class="flex items-center" style="">
                                <div class="p-1 radio"><label for="membership_type2"
                                        onclick="membership_selection('alumni')"><input type="radio" value="Life Member"
                                            name="membership_type" id="membership_type2" class="uk-radio radio-input"
                                            {{ isset($member->membership_type) && $member->membership_type == 'Life Member' ? 'checked' : '' }}><strong>Life
                                            Member</strong>: For an Alumni living inside and
                                        outside
                                        Bangladesh, the subscription/fees shall be BDT 10,000.00 (ten thousand taka) and USD
                                        100.00
                                        (one
                                        hundred
                                        US dollars) respectively at a time.</label></div>
                            </li>
                            <li class="flex items-center" style="">
                                <div class="p-1 radio"><label for="membership_type3"
                                        onclick="membership_selection('others')"><input type="radio"
                                            {{ isset($member->membership_type) && $member->membership_type == 'Honorary Life Member' ? 'checked' : '' }}
                                            value="Honorary Life Member" name="membership_type" id="membership_type3"
                                            class="uk-radio radio-input"><strong>Honorary Life Member</strong>: A
                                        distinguished person
                                        may be
                                        conferred
                                        the Honorary Life Membership of the association on recognition of his/her long and
                                        distinguished/outstanding/eminent/ services to the cause of humanity, culture,
                                        education and
                                        national
                                        welfare. The Executive Committee may if necessary, grant honorary membership to
                                        non-alumni
                                        who
                                        are
                                        instrumental in the development/expansion of the dignity and interests of the
                                        association,
                                        donors &amp;
                                        eminent person.</label></div>
                            </li>
                            <li class="flex items-center" style="">
                                <div class="p-1 radio"><label for="membership_type4"
                                        onclick="membership_selection('others')"><input type="radio"
                                            {{ isset($member->membership_type) && $member->membership_type == 'Donor Member' ? 'checked' : '' }}
                                            value="Donor Member" name="membership_type" id="membership_type4"
                                            class="uk-radio radio-input"><strong>Donor Member</strong>: An alumni donating
                                        at least BDT
                                        1,00,000.00
                                        (one lac taka) or more at a time shall be offered Donor Membership. A non-Alumni
                                        donating
                                        the
                                        same
                                        amount shall be offered Associate donor membership.</label></div>
                            </li>
                        </ul>
                    </div>
                    <a uk-switcher-item="next" class="btn btn-success pull-right" id="personalinfobtn-next"
                        href="javascript:void(0)">Proceed</a>
            </div>
            <div id="form2">
                @include('web.aavu.form_parts.personal_information')
            </div>

            <div id="form3">
                @include('web.aavu.form_parts.education_information')

            </div>
            <div id="form4">
                @include('web.aavu.form_parts.ocupation_information')
            </div>
            <div id="form5">
                @include('web.aavu.form_parts.uploads')
            </div>
            <div id="form6">
                @include('web.aavu.form_parts.subscription')
            </div>


        </div>

        {{-- <ul class="uk-switcher uk-margin">
            <li>Hello!</li>
            <li>Hello again!</li>
            <li>Bazinga!</li>
        </ul> --}}

    </div>
@endsection

@push('script')
    <script>
        function displayMarried(selector) {
            if ($("#maritial_status").find(':selected').attr('value') == 'Single') {
                $(selector).css('display', 'none');
            } else {
                $(selector).css('display', 'flex');
            }

        }

        function displayPayment() {
            $('#ref').css('display', 'none');
            $('#trx').css('display', 'none');
            $("#bank").css('display', 'none');
            $("#bankBranch").css('display', 'none');
            if ($("#payment_mode").find(':selected').attr('value') == 'Mobile Banking') {
                $('#ref').css('display', 'block');
                $('#trx').css('display', 'block');
            } else if ($("#payment_mode").find(':selected').attr('value') == 'Bank Deposit') {
                $("#bank").css('display', 'block');
                $("#bankBranch").css('display', 'flex');
            }

        }
    </script>
@endpush
@push('js')
    <script src="{{ asset('assets\dropify\dist\js\dropify.min.js') }}"></script>
    <script>
        //First upload
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();
        });
    </script>
    <script>
        function membership_selection(membership) {
            if (membership == 'alumni') {
                $("#validation_section").show();
                $("#personal_info_div").hide();
                $("#personalInfoSubmit").hide();
            } else {
                $("#validation_section").hide();
                $("#personal_info_div").show();
                $("#personalInfoSubmit").show();

            }
        }
    </script>

    <script>
        function validate() {
            var uid = $("#uid").val();
            $.get("{{ route('member.validate') }}?uid=" + uid, function(details) {
                if (details == '') {
                    $("#personalInfoSubmit").hide();
                    $("#msg").removeClass('text-success');
                    $("#msg").addClass('text-danger');
                    $("#msg").text('Please Provide your valid Student ID / Employee ID of Varendra University');
                } else {
                    var det = JSON.parse(details);
                    if (det.status == 1) {
                        $("#name").val(det.data.name);
                        $("#name").attr('disabled',true);
                        $("#dob").val(det.data.dob);
                        $("#blood_group").val(det.data.blood_group);
                        $("#email").val(det.data.personal_email);
                        $("#gender").val(det.data.gender);
                        if (det.data.personal_phone != '') {
                            $("#mobile").val(det.data.personal_phone);
                        } else {
                            $("#mobile").val(det.data.phone);
                        }
                        $("#validation_section").hide();
                        $("#personal_info_div").show();
                        $("#personalInfoSubmit").show();
                        $("#msg").removeClass('text-danger');
                        $("#msg").addClass('text-success');
                        $("#msg").text('Your Identity has been verified');
                    }
                }
            });
        }

        // Get the input field
        var input = document.getElementById("uid");

        // Execute a function when the user presses a key on the keyboard
        input.addEventListener("keypress", function(event) {
            // If the user presses the "Enter" key on the keyboard
            if (event.key === "Enter") {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                document.getElementById("valbtn").click();
            }
        });
    </script>
@endpush
