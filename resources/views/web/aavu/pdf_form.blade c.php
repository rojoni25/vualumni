<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=8.3in, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AAVU Membership Form</title>
    <style>

    </style>

</head>

<body>
    <div class="header" style="display:flex; height:100px; align-items: center;">
        <div style="width:15%; float:left">
            <img style="width:100%; object-fit:contain;" src="{{ public_path('aavu_logo_02.png') }}" alt="">
        </div>
        <div style="width:60%; float: left;">
            <h4 style="line-height: 0; padding: 0; margin: 12px; font-size: 14px;">ALUMNI ASSOCIATION OF VARENDRA
                UNIVERISTY</h4>
            <p
                style="border-bottom: 2px solid black; margin: 12px;padding: 0px; font-size:12px; line-height: 1.5; text-align:center;">
                Non-Communal, Non-Political and Non-Profitable Organization
            </p>
            <p style="margin: 12px;padding: 0px; line-height: 1.2; text-align:center; font-size:12px;">
                Rajshahi Bypass Road, Chandrima, Paba, Rajshahi
            </p>
            <p style="margin: 12px;padding: 0px; line-height: 1.2; text-align:center; font-weight:600; font-size:13px;">
               <b>[Application for {{ $member->membership_type }}]</b>
            </p>
        </div>
        <div style="width: 15%; height:150px; width:150px; float: right;">
            <img style="max-height:100%; max-width:100%; object-fit:contain;" src="{{ public_path($member->photo) }}">
        </div>
    </div>
    <div>
        <div>
            <b>Application for: </b>{{ $member->membership_type }}
        </div>
        <div style="border:1px solid black; border-radius:20px; padding:10px; margin-top:10px;position:relative;">
            <div style="margin-top:0; text-align:center;">
                <b>Personal Information</b>
            </div>
            <div style="margin-top:5px;">
                <b>Name in English: </b><span>{{ $member->name }}</span>
            </div>
            <div style="margin-top:5px;">
                <b>Name in Bangla: </b><span style="font-family: bangla;">{{ $member->name_bangla }}</span>
            </div>
            <div style="margin-top:5px;">
                <b>Date of Birth: </b><span
                    style="font-family: bangla;">{{ date('d/m/Y', strtotime($member->dob)) }}</span>
                <span style="margin-left:5px; padding-left:5px;"><b> Age:</b>
                    {{ Carbon\Carbon::parse($member->dob)->age }} Years</span>
                <span style="margin-left:5px; padding-left:5px;"><b> Blood Group:</b> {{ $member->blood_group }} </span>
                <span style="margin-left:5px; padding-left:5px;"><b> Gender:</b> {{ $member->gender }} </span>
            </div>
            <div style="margin-top:5px;">
                <span style="margin-left:5px; padding-left:5px;"><b> Marital Status:</b> {{ $member->maritial_status }}
                </span>
                <span style="margin-left:5px; padding-left:5px;"><b> Spouse Name (If married):</b>
                    {{ $member->spouse_name }} </span>
            </div>
            <div style="margin-top:5px;">
                <span style="margin-left:5px; padding-left:5px;"><b> No.of Children:</b> {{ $member->son_count }}
                    Son(s), {{ $member->daughter_count }} Daughter(s)</span>
            </div>
            <div style="margin-top:5px;">
                <span style="margin-left:5px; padding-left:5px;"><b> Contact No.:</b> {{ $member->mobile }} </span>
                <span style="margin-left:5px; padding-left:5px;"><b> Email:</b> {{ $member->email }} </span>
            </div>
            <div style="margin-top:5px;">
                <span><u><b>Permanent Address:</b></u> </span>
                <span style="margin-left:5px; padding-left:5px;"><b> House/Holding:</b>
                    {{ $member->permanent_address['house'] }}, <b> Ward:</b> {{ $member->permanent_address['ward'] }},
                    <b> Vill:</b> {{ $member->permanent_address['village'] }}, <b> P.S.:</b>
                    {{ $member->permanent_address['ps'] }}, <b> P.O.:</b>
                    {{ $member->permanent_address['po'] }}, <b> District:</b>
                    {{ $member->permanent_address['district'] }}, <b> Post Code:</b>
                    {{ $member->permanent_address['post_code'] }},
                </span>
            </div>
        </div>

        <div style="border:1px solid black; border-radius:20px; padding:10px; margin-top:10px;position:relative;">
            <div style="margin-top:0; text-align:center;">
                <b>Education Information</b>
            </div>
            <div style="margin-top:10px;">
                <div style="margin-top:5px;">
                    <u><b>Degree obtained from Varendra University</b></u>
                </div>
                <div style="margin-top:5px;">
                    <span><b><u>Bachelor:</u> Year: </b>{{ $member->educations[0]->year }} <b>Dept:
                        </b>{{ $member->educations[0]->department }} <b>Major in (if Applicable):</b>
                        {{ $member->educations[0]->subject }}</span>
                </div>
                <div style="margin-top:5px;">
                    <span><b><u>Master:</u> Year: </b>{{ $member->educations[1]->year }} <b>Dept:
                        </b>{{ $member->educations[1]->department }} <b>Major in (if Applicable):</b>
                        {{ $member->educations[1]->subject }}</span>
                </div>
            </div>
            <div style="margin-top:10px;">
                <div style="margin-top:5px;">
                    <u><b>Degree obtained from Other University: (for Honorary Life Member & Donor Member only)</b></u>
                </div>
                <div style="margin-top:5px;">
                    <span><b><u>Bachelor:</u> Year: </b>{{ $member->educations[2]->year }} <b>Subject:</b>
                        {{ $member->educations[2]->subject }} <b>University:</b>
                        {{ $member->educations[2]->institute }}</span>
                </div>
                <div style="margin-top:5px;">
                    <span><b><u>Master:</u> Year: </b>{{ $member->educations[3]->year }} <b>Subject:</b>
                        {{ $member->educations[3]->subject }} <b>University:</b>
                        {{ $member->educations[3]->institute }}</span>
                </div>
                <div style="margin-top:5px;">
                    <span><b><u>PhD:</u> Year: </b>{{ $member->educations[4]->year }} <b>University:</b>
                        {{ $member->educations[4]->institute }}</span>
                </div>
            </div>
        </div>
        <div style="border:1px solid black; border-radius:20px; padding:10px; margin-top:10px;position:relative;">
            <div style="margin-top:0; text-align:center;">
                <b>Ocupation Information</b>
            </div>

            <div style="margin-top:5px;">
                <span><b>Organization/Institution: </b>{{ $member->ocupation->organization }}</span>
            </div>
            <div style="margin-top:5px;">
                <span><b>Position: </b>{{ $member->ocupation->position }} <b><u>Serving:</u> From: </b>
                    {{ $member->ocupation->from_date }} To:
                    {{ $member->ocupation->continuing ? 'Continuing' : $member->ocupation->to_date }}</span>
            </div>
            <div style="margin-top:5px;">
                <span><b>Address: </b>{{ $member->ocupation->address }}</span>
            </div>
            <div style="margin-top:5px;">
                <span><b>Contact No.: </b>{{ $member->ocupation->contact_number }} <b>Email:
                    </b>{{ $member->ocupation->email }} <b>Web: </b>{{ $member->ocupation->web }}</span>
            </div>
        </div>

        <div style="margin-top:20px;">
            <div style="text-align: center;">
                <img src="{{public_path($member->signature)}}" style="width:300px; height:80px; object-fit: contain;">
                <div style="margin-top:5px;">
                <b style="border-top:2px solid black;">Signature of the Applicant </b>
                </div>
                <span>Date: {{$member->created_at->format('d/m/Y')}}</span>
            </div>
        </div>
</body>

</html>
