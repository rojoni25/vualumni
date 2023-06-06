@if ($associationMember->status != 'Approved')
    @if ($associationMember->nid_approval != 'Approved')
        {{-- NID Approval Modal --}}
        <div class="modal fade" id="nidApproveModal" tabindex="-1" role="dialog" aria-labelledby="nidApproveModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nidApproveModalLabel">Approve NID</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <div class="icon-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </div>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.association-members.nid-approve', $associationMember->id) }}"
                            method="post" id="approve_nid">
                            @csrf
                            <input type="hidden" name="member_id" value="{{ $associationMember->id }}">
                            <input type="hidden" name="action" value="Approved">
                            <div class="form-group">
                                <label for="message">Remarks</label>
                                <textarea class="form-input form-control" name="message"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="button" class="btn btn-primary"
                            onclick="$('#approve_nid').submit()">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($associationMember->nid_approval != 'Rejected')
        {{-- NID Decline Modal --}}
        <div class="modal fade" id="nidDeclineModal" tabindex="-1" role="dialog"
            aria-labelledby="nidDeclineModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nidDeclineModalLabel">Decline NID</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <div class="icon-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </div>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.association-members.nid-decline', $associationMember) }}"
                            method="post" id="decline_nid">
                            @csrf
                            <input type="hidden" name="member_id" value="{{ $associationMember->id }}">
                            <input type="hidden" name="action" value="Rejected">
                            <div class="form-group">
                                <label for="message">Reason to Decline</label>
                                <textarea class="form-input form-control" name="message"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                            Discard</button>
                        <button type="button" class="btn btn-primary"
                            onclick="$('#decline_nid').submit()">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if ($associationMember->certificate_approval != 'Approved')
        {{-- Certificate Approval Modal --}}
        <div class="modal fade" id="certificateApprovalModal" tabindex="-1" role="dialog"
            aria-labelledby="certificateApprovalModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="certificateApprovalModalLabel">Approve Certificate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <div class="icon-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </div>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.association-members.certificate-approve', $associationMember) }}"
                            method="post" id="approve_certificate">
                            @csrf
                            <input type="hidden" name="member_id" value="{{ $associationMember->id }}">
                            <input type="hidden" name="action" value="Approved">
                            <div class="form-group">
                                <label for="message">Remarks</label>
                                <textarea class="form-input form-control" name="message"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                            Discard</button>
                        <button type="button" class="btn btn-primary"
                            onclick="$('#approve_certificate').submit()">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($associationMember->certificate_approval != 'Rejected')
        {{-- Certificate Decline Modal --}}

        <div class="modal fade" id="certificateDeclineModal" tabindex="-1" role="dialog"
            aria-labelledby="certificateDeclineModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="certificateDeclineModalLabel">Decline Certificate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <div class="icon-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </div>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.association-members.certificate-decline', $associationMember) }}"
                            method="post" id="decline_certificate">
                            @csrf
                            <input type="hidden" name="member_id" value="{{ $associationMember->id }}">
                            <input type="hidden" name="action" value="Rejected">
                            <div class="form-group">
                                <label for="message">Reason to Decline</label>
                                <textarea class="form-input form-control" name="message"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                            Discard</button>
                        <button type="button" class="btn btn-primary"
                            onclick="$('#decline_certificate').submit()">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

{{-- Membership Approval Modal --}}

<div class="modal fade" id="membershipApprovalModal" tabindex="-1" role="dialog"
aria-labelledby="membershipApprovalModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="membershipApprovalModalLabel">Membership Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.association-members.accept', $associationMember) }}"
                method="post" id="approve_membership">
                @csrf
                <input type="hidden" name="member_id" value="{{ $associationMember->id }}">
                <input type="hidden" name="action" value="Approved">
                <div class="form-group">
                    The Candidate is eligable for the membership.
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                Discard</button>
            <button type="button" class="btn btn-primary"
                onclick="$('#approve_membership').submit()">Confirm</button>
        </div>
    </div>
</div>
</div>
@endif
