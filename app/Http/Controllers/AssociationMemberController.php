<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssociationMemberRequest;
use App\Http\Requests\UpdateAssociationMemberRequest;
use App\Models\AssociationMember;
use App\Models\AssociationMemberEducation;
use App\Models\AssociationMemberOcupation;
use Illuminate\Http\Request;

class AssociationMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreAssociationMemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AssociationMember $associationMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssociationMember $associationMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssociationMemberRequest $request, AssociationMember $associationMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssociationMember $associationMember)
    {
        //
    }

    public function register(){
        $member = null;
        $education = null;
        $ocupation = null;
        if(session('membership_id')!=""){
            $member = AssociationMember::find(session('membership_id'));

            session(['membership_id'=>'']);
            session(['active_form'=>$member->completed_steps+2]);
        }
        return view('web.aavu.form',compact('member','education','ocupation'));
    }
    public function savePersonalInfo(Request $request){
        // dd(session('membership_id'));
        if(isset($request->id)){
            $member = AssociationMember::find($request->id);
        }
        else{
            $member = new AssociationMember();
        }
            $member->name = $request->name;
            $member->name_bangla = $request->name_bangla;
            $member->dob = $request->dob;
            $member->blood_group = $request->blood_group;
            $member->gender = $request->gender;
            $member->maritial_status = $request->maritial_status;
            $member->spouse_name = $request->spouse_name;
            $member->son_count = $request->son_count;
            $member->daughter_count = $request->daughter_count;
            $member->mobile = $request->mobile;
            // $member->emergency_mobile = $request->emergency_mobile;
            $member->email = $request->email;
            $member->permanent_address = $request->permanent_address;
            // $member->present_address = $request->present_address;
            $member->membership_type = $request->membership_type;
            // $member->signature = $request->signature;
            // $member->photo = $request->photo;
            $member->nid = $request->nid;
            // $member->nid_photo = $request->nid_photo;
            // $member->status = $request->status;
            $member->completed_steps = 1;
            $member->save();
        session(['membership_id'=>$member->id]);
        session(['active_form'=>3]);
        // dd(session('membership_id'));
        return redirect()->back();
    }
    public function saveEducationInfo(Request $request){
        // dd(session('membership_id'));

        $educations = AssociationMemberEducation::where('membership_id',$request->membership_id)->delete();

        foreach($request->degree as $key=>$deg){
            $education = new AssociationMemberEducation();
            $education->membership_id = $request->membership_id;
            $education->degree = $deg;
            $education->subject = $request->major[$key];
            $education->year = $request->year[$key];
            $education->department = $request->department[$key];
            $education->institute = $request->institute[$key];
            $education->save();
        }

        $member = AssociationMember::find($request->membership_id);
        $member->completed_steps = 2;
        $member->save();
        session(['membership_id'=>$member->id]);
        session(['active_form'=>4]);

        return redirect()->back();
    }
    public function saveOcupationInfo(Request $request){
        // dd(session('membership_id'));

        $ocupation = AssociationMemberOcupation::firstOrNew(['membership_id'=>$request->membership_id]);
        $ocupation->organization = $request->organization;
        $ocupation->position = $request->position;
        $ocupation->from_date = $request->from_date;
        $ocupation->to_date = $request->to_date;
        $ocupation->continuing = $request->continuing=='on'?1:0;
        $ocupation->address = $request->address;
        $ocupation->contact_number = $request->contact_number;
        $ocupation->email = $request->email;
        $ocupation->web = $request->web;
        $ocupation->save();

        $member = AssociationMember::find($request->membership_id);
        $member->completed_steps = 3;
        $member->save();
        session(['membership_id'=>$member->id]);
        session(['active_form'=>5]);

        return redirect()->back();
    }
}
