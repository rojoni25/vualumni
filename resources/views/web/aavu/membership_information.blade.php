@extends('web.layouts.app')

@push('style')
    <style>
        ol,
        ol li {
            list-style-type: unset;
        }

        .well {
            padding: 30px;
        }
    </style>
@endpush
@section('main')
    <div class="container mx-2 mt-10 well" style="line-height:20px;">
        <div class="p-3 mb-10 text-center title">
            <h3>Membership Information</h3>
        </div>
        <ol style="list-style-type:upper-alpha">
            <li style="text-align:justify"><span
                    style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                        style="font-family:Calibri,sans-serif"><span dir="ltr" lang="EN-US"
                            style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                                style="font-family:Times New Roman,serif">Holders
                                of honors or master Degree
                                from VU (Varendra University) are eligible to become the member of the Alumni Association of
                                Varendra University who shall undertake to abide by the rules and regulations as laid down
                                in this constitution. Amendments shall be made from time to time and shall pay into the
                                appropriate fund(s) of the association such subscription/fees as may be proposed herein
                                after.</span></span></span></span></li>
        </ol>

        <p style="text-align:justify">&nbsp;</p>

        <ol start="2" style="list-style-type:upper-alpha">
            <li style="text-align:justify"><span
                    style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                        style="font-family:Calibri,sans-serif"><span dir="ltr" lang="EN-US"
                            style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                                style="font-family:&quot;Times New Roman&quot;,serif">Membership of the Association shall be
                                of four kinds. a) Regular Member b) Life Member c) Honorary life Member and d) Donor
                                Member.</span></span></span></span></li>
        </ol>

        <p style="margin-left:60px; text-align:justify">&nbsp;</p>

        <ol>
            <li style="list-style-type:none">
                <ol style="list-style-type:upper-roman; margin-left:40px">
                    <li style="text-align:justify"><span
                            style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                                style="font-family:Calibri,sans-serif"><strong><span dir="ltr" lang="EN-US"
                                        style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                                            style="font-family:&quot;Times New Roman&quot;,serif">Regular Member
                                            (RM):</span></span></strong><span dir="ltr" lang="EN-US"
                                    style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                                        style="font-family:&quot;Times New Roman&quot;,serif">
                                        <strong>Regular Member (RM):</strong> Membership fee for an Alumni living in
                                        Bangladesh will be Tk. 500 (five hundred) and for an overseas Alumni will be US $10
                                        (ten US dollars) per year. </span></span></span></span></li>
                </ol>
            </li>
        </ol>

        <p style="margin-left:60px; text-align:justify">&nbsp;</p>

        <ol>
            <li style="list-style-type:none">
                <ol start="2" style="list-style-type:upper-roman; margin-left:40px">
                    <li style="text-align:justify"><span
                            style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                                style="font-family:Calibri,sans-serif"><strong><span dir="ltr" lang="EN-US"
                                        style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                                            style="font-family:&quot;Times New Roman&quot;,serif">Life Member
                                            (LM):</span></span></strong><span dir="ltr" lang="EN-US"
                                    style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                                        style="font-family:&quot;Times New Roman&quot;,serif">
                                        For an Alumni living inside and outside Bangladesh, the subscription/fees shall be
                                        Tk. 10,000 (Ten thousand) and US $100 (one hundred US dollars) respectively at a
                                        time.</span></span></span></span></li>
                </ol>
            </li>
        </ol>

        <p style="margin-left:60px; text-align:justify">&nbsp;</p>

        <ol>
            <li style="list-style-type:none">
                <ol start="3" style="list-style-type:upper-roman; margin-left:40px">
                    <li style="text-align:justify"><span
                            style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                                style="font-family:Calibri,sans-serif"><strong><span dir="ltr" lang="EN-US"
                                        style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                                            style="font-family:&quot;Times New Roman&quot;,serif">Honorary Life Member
                                            (HLM):</span></span></strong><span dir="ltr" lang="EN-US"
                                    style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                                        style="font-family:&quot;Times New Roman&quot;,serif"> A
                                        distinguished person may be conferred the Honorary Life Membership of the
                                        association in recognition of her/his long and distinguished/outstanding/eminent
                                        services to the cause of humanity, culture, education, and national welfare. The
                                        Executive Committee may, if necessary, grant honorary membership to non-alumni who
                                        are instrumental in the development/expansion of the dignity and interests of the
                                        Association, donors &amp; eminent persons. S/he shall enjoy all the privileges of a
                                        member excepting right to hold an office of AAVU &amp; shall not have the power to
                                        participate in any selection process.</span></span></span></span></li>
                </ol>
            </li>
        </ol>

        <p style="margin-left:60px; text-align:justify">&nbsp;</p>

        <ol>
            <li style="list-style-type:none">
                <ol start="4" style="list-style-type:upper-roman; margin-left:40px">
                    <li style="text-align:justify"><span
                            style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                                style="font-family:Calibri,sans-serif"><strong><span dir="ltr" lang="EN-US"
                                        style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                                            style="font-family:&quot;Times New Roman&quot;,serif">Donor Member
                                            (DM):</span></span></strong><span dir="ltr" lang="EN-US"
                                    style="{{ Agent::isMobile() ? 'font-size:12px;' : 'font-size:17px;' }} line-height:30px;"><span
                                        style="font-family:&quot;Times New Roman&quot;,serif"> An
                                        Alumni donating at least Tk. 100,000 (one lac) or more at a time shall be offered
                                        Donor Membership (DM). A non-Alumni donating the same amount shall be offered
                                        Associate donor membership (ADM). The photograph of a DM/ADM with name and citation
                                        shall be hung on the wall of the Alumni office, Alumni Web page or such
                                        publications.</span></span></span></span></li>
                </ol>
            </li>
        </ol>


    </div>
@endsection
