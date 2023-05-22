<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssociationMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;
use Storage;

class AssociationMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['page_name'] = "All Applicants";
        $data['title'] = "All Applicants";
        $data['category_name'] = "applicants";
        $data['has_scrollspy'] = 0;
        $associationMembers = AssociationMember::where('status','!=',null)->where('completed_steps','>',3)->get();
        return view('admin.applicants.list',$data,compact('associationMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $associationMember = AssociationMember::find($id);
        $data['page_name'] = "Applicant Details";
        $data['title'] = "Applicant Details";
        $data['category_name'] = "applicants";
        $data['has_scrollspy'] = 0;
        return view('admin.applicants.details',compact('associationMember'),$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function printForm(string $id){
        $member = AssociationMember::find($id);
        $prefixes = $member->name;
        return $this->generate_pdf($member, $prefixes);
    }

    public function generate_pdf($member, $prefixes)
    {
        // Setup a filename
        $documentFileName = $prefixes . ".pdf";
        // Create the mPDF document
        // $document = new Mpdf( [
        //     'mode' => 'utf-8',
        //     'format' => 'A4',
        //     'margin_header' => '3',
        //     'margin_top' => '5',
        //     'margin_bottom' => '20',
        //     'margin_footer' => '2',
        // ]);

        // Set some header informations for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
        ];

        $mpdf = new Mpdf();

        $mpdf->AddPage();

        $pagecount = $mpdf->setSourceFile(public_path('MembershipForm.pdf'));
        $tplId = $mpdf->importPage(1);

        $actualsize = $mpdf->useTemplate($tplId);

        // Write some simple Content
        // $document->WriteHTML('<h1 style="color:blue">TheCodingJack</h1>');
        // $document->WriteHTML('<p>Write something, just for fun!</p>');

        // Use Blade if you want
        //$document->WriteHTML(view('fun.testtemplate'));
        // $document->WriteHTML(view('web.aavu.pdf_form',compact('member')));
        $mpdf->WriteFixedPosHTML('<img src="' . public_path($member->photo) . '" style="width:133.5px; height:160.5px; object-fit: contain;">', 164.4, 10.1, 150, 170);
        if ($member->membership_type == 'Regular Member') {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:20pt;">&#10003;</div>', 75, 53, 120, 30);
        } else if ($member->membership_type == 'Life Member') {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:20pt;">&#10003;</div>', 106.4, 53, 120, 30);
        } else if ($member->membership_type == 'Honorary Life Member') {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:20pt;">&#10003;</div>', 154.4, 53, 120, 30);
        } else if ($member->membership_type == 'Donor Member') {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:20pt;">&#10003;</div>', 190.5, 53, 120, 30);
        }

        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->name . '</div>', 52, 70, 120, 30);
        $mpdf->WriteFixedPosHTML('<div style="font-family: bangla; font-size:10pt;">' . $member->name_bangla . '</div>', 52, 78.4, 120, 30);
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->dob->format('d/m/Y') . '</div>', 52, 86.5, 120, 30);
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->dob->age . '</div>', 90, 86.5, 120, 30);
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->blood_group . '</div>', 127, 86.5, 120, 30);

        if ($member->gender == 'Male') {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:18pt;">&#10003;</div>', 166.5, 85, 20, 20);
        } else {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:18pt;">&#10003;</div>', 188, 85, 20, 20);
        }
        if ($member->maritial_status == 'Single') {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:18pt;">&#10003;</div>', 57, 93, 20, 20);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">N/A</div>', 130, 94.3, 120, 30);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">N/A</div>', 50, 102.6, 120, 30);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">N/A</div>', 71, 102.6, 120, 30);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">N/A</div>', 95, 102.6, 120, 30);
        } else {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:18pt;">&#10003;</div>', 76.5, 93, 20, 20);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->spouse_name . '</div>', 130, 94.3, 120, 30);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->son_count + $member->daughter_count . '</div>', 50, 102.6, 120, 30);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->son_count . '</div>', 71, 102.6, 120, 30);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->daughter_count . '</div>', 95, 102.6, 120, 30);
        }

        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->mobile . '</div>', 130, 102.6, 120, 30);
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->permanent_address['house'] . '</div>', 82, 111, 25, 7, 'auto');
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->permanent_address['ward'] . '</div>', 124, 111, 25, 7, 'auto');
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->permanent_address['village'] . '</div>', 143, 111, 54, 7, 'auto');
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->permanent_address['district'] . '</div>', 37, 119, 50, 7, 'auto');
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->permanent_address['ps'] . '</div>', 95, 119, 50, 7, 'auto');
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->permanent_address['po'] . '</div>', 159, 119, 38, 5, 'auto');
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->email . '</div>', 40, 125, 100, 10, 'auto');
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->permanent_address['post_code'] . '</div>', 160, 125, 100, 10, 'auto');

        if (trim($member->educations[0]->year) != '') {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:18pt;">&#10003;</div>', 37, 148.2, 20, 20);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->educations[0]->year . '</div>', 53, 150, 20, 20);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->educations[0]->department . '</div>', 78, 150, 42, 6, 'auto');
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->educations[0]->subject . '</div>', 159, 150, 36, 5, 'auto');
        }
        if (trim($member->educations[1]->year) != '') {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:18pt;">&#10003;</div>', 33.8, 156.4, 20, 20);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->educations[1]->year . '</div>', 50, 158, 20, 20);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->educations[1]->department . '</div>', 78, 158, 42, 6, 'auto');
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->educations[1]->subject . '</div>', 159, 158, 36, 5, 'auto');
        }
        if (trim($member->educations[2]->year) != '') {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:18pt;">&#10003;</div>', 37.4, 171.7, 20, 20);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->educations[2]->year . '</div>', 53, 173, 20, 20);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->educations[2]->subject . '</div>', 82, 173, 42, 6, 'auto');
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->educations[2]->institute . '</div>', 142, 173, 54, 5, 'auto');
        }
        if (trim($member->educations[3]->year) != '') {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:18pt;">&#10003;</div>', 34, 177.7, 20, 20);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->educations[3]->year . '</div>', 50, 179, 20, 20);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->educations[3]->subject . '</div>', 82.5, 179, 42, 6, 'auto');
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->educations[3]->institute . '</div>', 142.5, 179, 54, 5, 'auto');
        }
        if (trim($member->educations[4]->year) != '') {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:18pt;">&#10003;</div>', 30.4, 183.5, 20, 20);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->educations[4]->year . '</div>', 46, 185, 20, 20);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->educations[4]->institute . '</div>', 87, 185, 70, 6, 'auto');
        }

        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->ocupation->organization . '</div>', 60, 205, 70, 6, 'auto');
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->ocupation->position . '</div>', 37, 211.5, 40, 6, 'auto');
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->ocupation->from_date . '</div>', 116, 211.5, 40, 6, 'auto');

        if ($member->ocupation->continuing) {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:18pt;">&#10003;</div>', 192.5, 210.5, 20, 20);
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">N/A</div>', 150, 211.5, 40, 6, 'auto');
        } else {
            $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->ocupation->to_date . '</div>', 150, 211.5, 40, 6, 'auto');
        }
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->ocupation->address . '</div>', 38, 217.5, 155, 6, 'auto');
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->ocupation->contact_number . '</div>', 42, 223.5, 45, 6, 'auto');
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->ocupation->email . '</div>', 95, 223.5, 45, 6, 'auto');
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->ocupation->web . '</div>', 156, 223.5, 45, 6, 'auto');

        $mpdf->WriteFixedPosHTML('<img src="' . public_path($member->signature) . '" style="width:90px; height:24px; object-fit: contain;">', 68, 231.5, 210, 25, 'auto');
        $mpdf->WriteFixedPosHTML('<div style="font-family: arial; font-size:10pt;">' . $member->created_at->format('d/m/Y') . '</div>', 150, 234, 210, 25, 'auto');

        $mpdf->AddPage();

        $pagecount = $mpdf->setSourceFile(public_path('MembershipForm.pdf'));
        $tplId = $mpdf->importPage(2);
        $actualsize = $mpdf->useTemplate($tplId);

        // return $document->Output(public_path('upload/member_forms').'/'.$documentFileName, "F");

        // $request->certificate->move($document->Output($documentFileName, "S"), $documentFileName);


        // Save PDF on your public storage
        // Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));
        Storage::disk('public')->put($documentFileName, $mpdf->Output($documentFileName, "S"));

        // Get file back from storage with the give header informations
        return Storage::disk('public')->download($documentFileName, 'Request', $header); //
    }

    public function attachmentApproval(Request $request){
        $member = AssociationMember::find($request->member_id);
        if($request->attachment =='nid' && $request->action =='Approved'){
            if($member->nid_approval == 'Approved'){
                return back()->with('error', 'NID already approved');
            }else{
                $member->nid_approval = 'Approved';
                $member->remarks = [
                    'nid_approval'=> [
                        'action' =>'Approved',
                        'action_by' => Auth::id(),
                        'message' => $request->message
                    ]
                    ];
                $member->save();
            }
        }
        if($request->attachment =='certificate' && $request->action =='Approved'){
            if($member->certificate_approval == 'Approved'){
                return back()->with('error', 'NID already approved');
            }else{
                $member->nid_approval = 'Approved';
                $member->remarks = [
                    'certificate_approval'=> [
                        'action' =>'Approved',
                        'action_by' => Auth::id(),
                        'message' => $request->message
                    ]
                    ];
                $member->save();
            }
        }
    }
}
