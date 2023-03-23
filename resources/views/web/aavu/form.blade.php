@extends('web.layouts.app')
@push('style')
    <style>
        input .radio-input {
            padding: 7px;
        }
    </style>
@endpush
@push('css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@section('main')
        <div class="mt-10">

            <ul style="font-size: 18px;" class="uk-subnav uk-subnav-pill justify-center"
                uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium; connect: #form-body; active:{{session('active_form')??0}};">
                <li><a class="border rounded-full" style="font-size:14px;" href="#">Requirements</a></li>
                <li><a class="border rounded-full" style="font-size:14px;" href="#">Membership Type</a></li>
                <li><a class="border rounded-full" style="font-size:14px;" href="#">Personal Information</a></li>
                @if (isset($member->completed_steps) && $member->completed_steps+2>2)
                <li><a class="border rounded-full" style="font-size:14px;" href="#">Education Information</a></li>
                @endif
                @if (isset($member->completed_steps) && $member->completed_steps+2>3)
                <li><a class="border rounded-full" style="font-size:14px;" href="#">Ocupation Information</a></li>
                @endif
                @if (isset($member->completed_steps) && $member->completed_steps+2>4)
                <li><a class="border rounded-full" style="font-size:14px;" href="#">Uploads</a></li>
                @endif
                @if (isset($member->completed_steps) && $member->completed_steps+2>5)

                @endif
            </ul>
            <div class="uk-switcher uk-margin form-body" id="form-body">
                <div id="requirements">
                    <div>
                        <div class="mb-10">Please make sure to have the following required materials before signing up</div>
                        <ol style="line-height:20px; padding-left:35px; text-align: justify;">
                            <li class="flex items-center" style="margin-bottom:10px;">
                                Digital copy of your Photo. (Resolution must be 300px X 300px)
                            </li>
                            <li class="flex items-center" style="margin-bottom:10px;">
                                Digital copy of your Signature. (Resolution must be 300px X 80px)
                            </li>
                            <li class="flex items-center" style="margin-bottom:10px;">
                                Scanned copy of your NID.
                            </li>
                            <li class="flex items-center" style="margin-bottom:10px;">
                                Scanned copy of your Academic Certificate of Varendra University.
                            </li>
                        </ol>
                    </div>
                    <a uk-switcher-item="next" class="btn btn-success pull-right" id="personalinfobtn-next" href="javascript:void(0)">Proceed</a>
                </div>
                <div id="membership-type">
                    <form action="{{route('register.personal.save')}}" method="POST" id="personal_info_form">
                        @if (isset($member->id))
                            <input type="hidden" name="id" value="{{$member->id}}">
                        @endif
                    <div>
                        <div class="mb-10">Holders of honors or master degree from Varendra University are eligible to
                            become
                            the member of the AAVU.</div>

                        <div class="mb-3"><u>Membership Categories (Select One):</u> </div>

                        <ul style="line-height:20px; padding-left:35px; text-align: justify;">
                            <li class="flex items-center" style="margin-bottom:10px;">
                                <div class="p-5 radio"><label for="membership_type1"><input type="radio" value="Regular Member" name="membership_type" id="membership_type1"
                                        class="uk-radio radio-input" {{(isset($member->membership_type) && $member->membership_type == 'Regular Member')?'checked':''}} {{!isset($member->membership_type)?'checked':''}}>
                                <strong>Regular Member</strong>: Subscription/fee for alumni living in Bangladesh will be BDT 1,000.00 (one thousand taka) and for overseas alumni will be USD 20.00 (twenty US USD 10.00 per year.</label></div>
                            </li>
                            <li class="flex items-center" style="margin-bottom:10px;"><div class="p-5 radio"><label for="membership_type2"><input type="radio" value="Life Member" name="membership_type" id="membership_type2" class="uk-radio radio-input" {{(isset($member->membership_type) && $member->membership_type == 'Life Member')?'checked':''}}><strong>Life Member</strong>: For an Alumni living inside and
                                outside
                                Bangladesh, the subscription/fees shall be BDT 10,000.00 (ten thousand taka) and USD 100.00
                                (one
                                hundred
                                US dollars) respectively at a time.</label></div></li>
                            <li class="flex items-center" style="margin-bottom:10px;"><div class="p-5 radio"><label for="membership_type3"><input type="radio" {{(isset($member->membership_type) && $member->membership_type == 'Honorary Life Member')?'checked':''}} value="Honorary Life Member" name="membership_type" id="membership_type3"
                                class="uk-radio radio-input"><strong>Honorary Life Member</strong>: A distinguished person
                                may be
                                conferred
                                the Honorary Life Membership of the association on recognition of his/her long and
                                distinguished/outstanding/eminent/ services to the cause of humanity, culture, education and
                                national
                                welfare. The Executive Committee may if necessary, grant honorary membership to non-alumni
                                who
                                are
                                instrumental in the development/expansion of the dignity and interests of the association,
                                donors &amp;
                                eminent person.</label></div></li>
                            <li class="flex items-center" style="margin-bottom:10px;"><div class="p-5 radio"><label for="membership_type4"><input type="radio" {{(isset($member->membership_type) && $member->membership_type == 'Donor Member')?'checked':''}} value="Donor Member" name="membership_type" id="membership_type4"
                                class="uk-radio radio-input"><strong>Donor Member</strong>: An alumni donating at least BDT
                                1,00,000.00
                                (one lac taka) or more at a time shall be offered Donor Membership. A non-Alumni donating
                                the
                                same
                                amount shall be offered Associate donor membership.</label></div></li>
                        </ul>
                    </div>
                    <a uk-switcher-item="next" class="btn btn-success pull-right" id="personalinfobtn-next" href="javascript:void(0)">Personal Information</a>
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
                    <a uk-switcher-item="previous" class="btn btn-success pull-left" href="javascript:void(0)">Uploads</a>
                    <a uk-switcher-item="next" class="btn btn-success pull-right" href="javascript:void(0)">Uploads</a>
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
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
@endpush
