@extends('admin.layouts.app')
@push('styles')
    <link href="{{ asset('admin/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/plugins/lightbox/photoswipe.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('admin/plugins/lightbox/default-skin/default-skin.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('admin/plugins/lightbox/custom-photswipe.css')}}" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/bootstrap-select/bootstrap-select.min.css')}}">
    <style>
        .user-info .photo img {
            width: 150px;
        }
        .signature{
            margin-top:15px;
        }
        .user-info .signature img {
            width: 150px;
            height:40px;
        }
        .proof-image {
            width: 100%;
            height: 350px;
            object-fit: contain;
        }
        .proof-image a{
            width: 100%;
            height: 100%;
        }
        .proof-image a img{
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .pswp__img {
            object-fit: contain;
        }
        .approval-a {
            display: flex;
            background-color: green;
            width: 150px;
            /* height: 22px; */
            padding: 20px;
            position: absolute;
            top: 44%;
            left: 33%;
            /* right: 50%; */
            font-size: 28px;
            /* color: purple; */
            border-radius: 20px;
            border: 2px solid #FFEB3B;
            align-items: center;
            justify-content: center;
        }
        .approval-r {
            display: flex;
            background-color: red;
            width: 150px;
            /* height: 22px; */
            padding: 20px;
            position: absolute;
            top: 44%;
            left: 33%;
            /* right: 50%; */
            font-size: 28px;
            /* color: purple; */
            border-radius: 20px;
            border: 2px solid #FFEB3B;
            align-items: center;
            justify-content: center;
        }
    </style>
@endpush
@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-spacing">

            <!-- Content -->
            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                <div class="user-profile layout-spacing">
                    <div class="widget-content widget-content-area">
                        <div class="d-flex justify-content-between">
                            <h3 class="">Profile</h3>
                            <a href="/users/account_settings" class="mt-2 edit-profile"> <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-edit-3">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                </svg></a>
                        </div>
                        <div class="text-center user-info">
                            <div class="photo">
                                <img src="{{ asset($associationMember->photo) }}" alt="{{ $associationMember->name }}">
                            </div>
                            <div class="signature">
                                <img src="{{ asset($associationMember->signature) }}" alt="{{ $associationMember->name }}">
                            </div>
                            <p class="">{{ $associationMember->name }}</p>
                        </div>
                        <div class="user-info-list">
                            <div class="">
                                <ul class="contacts-block list-unstyled">
                                    <li class="contacts-block__item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-award">
                                            <circle cx="12" cy="8" r="7"></circle>
                                            <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                        </svg> {{{$associationMember->membership_id??'Membership not approved'}}}
                                    </li>
                                    <li class="contacts-block__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee">
                                            <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                            <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                            <line x1="6" y1="1" x2="6" y2="4"></line>
                                            <line x1="10" y1="1" x2="10" y2="4"></line>
                                            <line x1="14" y1="1" x2="14" y2="4"></line>
                                        </svg> {{{$associationMember->membership_type}}}
                                    </li>
                                    <li class="contacts-block__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                            <rect x="3" y="4" width="18" height="18" rx="2"
                                                ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>{{$associationMember->created_at->format('d M Y')}}
                                    </li>
                                    <li class="contacts-block__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>{{$associationMember->permanent_address['house']}},
                                        {{$associationMember->permanent_address['ward']}},
                                        {{$associationMember->permanent_address['village']}},
                                        {{$associationMember->permanent_address['district']}}
                                    </li>
                                    <li class="contacts-block__item">
                                        <a href="mailto:{{$associationMember->email}}"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-mail">
                                                <path
                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                </path>
                                                <polyline points="22,6 12,13 2,6"></polyline>
                                            </svg>{{$associationMember->email}}</a>
                                    </li>
                                    <li class="contacts-block__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                            <path
                                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                            </path>
                                        </svg>{{$associationMember->mobile}}
                                    </li>
                                    {{-- <li class="contacts-block__item">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <div class="social-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-facebook">
                                                        <path
                                                            d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="social-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-twitter">
                                                        <path
                                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="social-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-linkedin">
                                                        <path
                                                            d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                                        </path>
                                                        <rect x="2" y="9" width="4"
                                                            height="12"></rect>
                                                        <circle cx="4" cy="4" r="2"></circle>
                                                    </svg>
                                                </div>
                                            </li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="education layout-spacing ">
                    <div class="widget-content widget-content-area">
                        <h3 class="">Education</h3>
                        <div class="timeline-alter">
                            @forelse ($associationMember->educationsDesc as $education)
                            @if ($education->year !='')

                            <div class="item-timeline">
                                <div class="t-meta-date">
                                    <p class="">{{$education->year}}</p>
                                </div>
                                <div class="t-dot">
                                </div>
                                <div class="t-text">
                                    <p>{{$education->subject}},</p>
                                    <p>{{$education->department}}, {{$education->institute}}</p>
                                </div>
                            </div>
                            @endif
                            @empty

                            @endforelse

                        </div>
                    </div>
                </div>

                <div class="work-experience layout-spacing ">

                    <div class="widget-content widget-content-area">

                        <h3 class="">Work Experience</h3>

                        <div class="timeline-alter">

                            @forelse ($associationMember->ocupationsDesc as $ocupation)

                            <div class="item-timeline">
                                <div class="t-meta-date">
                                    <p class="">{{$ocupation->from_date->format('d M Y')}} - {{$ocupation->continuing?'Present':$ocupation->to_date->format('d M Y')}}</p>
                                </div>
                                <div class="t-dot">
                                </div>
                                <div class="t-text">
                                    <p>{{$ocupation->position}},</p>
                                    <p>{{$ocupation->organization}}</p>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                <div class="skills layout-spacing ">
                    <div class="widget-content widget-content-area">
                        <h3 class="">Personal Information</h3>
                        <div class="p-3">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td colspan="1">Name:</td><td colspan="3">{{$associationMember->name}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Name (Bangla):</td><td colspan="3">{{$associationMember->name_bangla}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth:</td><td>{{$associationMember->dob->format('d M Y')}}</td>
                                        <td>Age:</td><td>{{$associationMember->dob->age}}</td>
                                    </tr>
                                    <tr>
                                        <td>Marital Status</td><td>{{$associationMember->maritial_status}}</td>
                                        <td>Spouse Name</td><td>{{$associationMember->spouse_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Children:</td><td>{{$associationMember->son_count}} Son(s) {{$associationMember->daughter_count}} Daughter(s)</td>
                                        <td>Gender:</td><td>{{$associationMember->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td>NID:</td><td colspan="3">{{$associationMember->nid}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="bio layout-spacing ">
                    <div class="widget-content widget-content-area">
                        <h3 class="">Attachments</h3>
                        <div class="bio-skill-box">
                            <div class="row">
                                <div class="col-12 col-xl-6 col-lg-12 mb-xl-2 mb-2 ">
                                    <div class="d-flex b-skills">
                                        <div class="text-center">
                                            <h5>Photo of NID Card</h5>
                                            <div id="demo-test-gallery" class="demo-gallery proof-image text-center" data-pswp-uid="1">
                                                <a class="" href="{{asset($associationMember->nid_photo)}}" data-size="1600x1068" data-med="{{asset($associationMember->nid_photo)}}" data-med-size="1024x683" data-author="{{$associationMember->name}}">
                                                    <img src="{{asset($associationMember->nid_photo)}}" alt="image-gallery">
                                                    <figure>NID of {{$associationMember->name}}</figure>
                                                    @if ($associationMember->nid_approval =='Approved' || $associationMember->nid_approval == 'Rejected')
                                                        <span class="{{$associationMember->nid_approval =='Approved'?'approval-a':'approval-r'}}">{{$associationMember->nid_approval =='Approved'?'Approved':'Rejected'}}</span>
                                                    @endif
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#" class="btn btn-success mb-4 mr-2 {{$associationMember->nid_approval =='Approved'?'disabled':''}}" title="Approve">
                                                    <div class="icon-container">
                                                        <svg style="height:17px; width:17px; color: white; margin:unset;"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square">
                                                            <polyline points="9 11 12 14 22 4"></polyline>
                                                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                                        </svg>
                                                    </div>
                                                </a>
                                                <a href="#" class="btn btn-danger mb-4 mr-2 {{$associationMember->nid_approval =='Rejected'?'disabled':''}}" title="Reject">
                                                    <div class="icon-container">
                                                        <svg style="height:17px; width:17px; color: white; margin:unset;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">
                                    <div class="d-flex b-skills">
                                        <div class="text-center">
                                            <h5>Certificate of Varendra University</h5>
                                            <div id="demo-test-gallery" class="demo-gallery proof-image text-center" data-pswp-uid="1">
                                                <a class="" href="{{asset($associationMember->certificate)}}" data-size="1600x1068" data-med="{{asset($associationMember->certificate)}}" data-med-size="1024x683" data-author="{{$associationMember->name}}">
                                                    <img src="{{asset($associationMember->certificate)}}" alt="image-gallery">
                                                    <figure>VU Certificate of {{$associationMember->name}}</figure>
                                                    @if ($associationMember->certificate_approval =='Approved' || $associationMember->certificate_approval == 'Rejected')
                                                        <span class="{{$associationMember->certificate_approval =='Approved'?'approval-a':'approval-r'}}">{{$associationMember->certificate_approval =='Approved'?'Approved':'Rejected'}}</span>
                                                    @endif
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#" wire:click class="btn btn-success mb-4 mr-2 {{$associationMember->certificate_approval =='Approved'?'disabled':''}}">
                                                    <div class="icon-container">
                                                        <svg style="height:17px; width:17px; color: white; margin:unset;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                                    </div>
                                                </a>
                                                <a href="#" class="btn btn-danger mb-4 mr-2 {{$associationMember->certificate_approval =='Rejected'?'disabled':''}}">
                                                    <div class="icon-container">
                                                        <svg style="height:17px; width:17px; color: white; margin:unset;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bio layout-spacing ">
                    <div class="widget-content widget-content-area">
                        <h3 class="">Payment Validation</h3>
                        <div class="row">
                            <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 p-1">

                                <div class="card bg-dark">
                                    <div class="card-body">
                                        <div>
                                            <span>Membership: </span><span><b>{{$associationMember->membership_type}}</b></span>
                                        </div>
                                        <div>
                                            <span>Payable Amount: </span><span><b>{{$associationMember->membership_info->registration_fees}}/=</b></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 p-1">
                                <div class="card bg-dark ">
                                    <div class="card-body">
                                        @if ($associationMember->status != 'Approved')

                                        <form action="#" method="POST" id="payment_verification">
                                            @csrf
                                            <div class="form-group">
                                                <label for="method">Payment Method</label>
                                                <select class="selectpicker form-control" name="method" id="payment_method">
                                                    <option value="Bkash" opt-type="mft">Bkash</option>
                                                    <option value="Rocket" opt-type="mft">Rocket</option>
                                                    <option value="Nagad" opt-type="mft">Nagad</option>
                                                    <option value="Bank" opt-type="bank">Bank</option>
                                                    <option value="Cash" opt-type="">Cash</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="amount">Paid Amount</label>
                                                <input type="text" class="form-control" name="amount" placeholder="Paid Amount">
                                            </div>
                                            <div class="form-group">
                                                <label for="payment_date">Payment Date</label>
                                                <input type="date" class="form-control" name="payment_date" placeholder="Payment Date">
                                            </div>
                                            <div class="stmt">
                                                <div class="form-group stmt mftfield">
                                                    <label for="statement['Transaction_ID']">Transaction ID</label>
                                                    <input type="text" class="form-control" name="statement['Transaction_ID']" placeholder="Transaction ID">
                                                </div>
                                                <div class="form-group stmt bankfield">
                                                    <label for="statement['Bank_Name']">Bank Name</label>
                                                    <input type="text" class="form-control" name="statement['Bank_Name']" placeholder="Bank Name">
                                                </div>
                                                <div class="form-group stmt bankfield">
                                                    <label for="statement['Branch']">Branch</label>
                                                    <input type="text" class="form-control" name="statement['Branch']" placeholder="Branch">
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                @if ($associationMember->certificate_approval =='Approved' && $associationMember->nid_approval == 'Approved')
                <a href="#" class="btn btn-success mb-4 mr-2 btn-lg">Approve</a>
                @endif
                <a href="{{route('admin.association-members.print',$associationMember->id)}}" target="_blank" class="btn btn-info mb-4 mr-2 btn-lg">Print</a>
                <a href="#" class="btn btn-danger mb-4 mr-2 btn-lg">Reject</a>
            </div>
        </div>
    </div>

    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe. It's a separate element, as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">
            <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
            <!-- don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                          <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

              </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{asset('admin/plugins/lightbox/photoswipe.min.js')}}"></script>
<script src="{{asset('admin/plugins/lightbox/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('admin/plugins/lightbox/custom-photswipe.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>

<script>
$("#payment_method").change(function(){
    $(".stmt").html('');
    if($("#payment_method").find(":selected").attr('opt-type') =="mft"){
        $(".stmt").append('<div class="form-group stmt mftfield">'+
                            '<label for="statement[Transaction_ID]">Transaction ID</label>'+
                            '<input type="text" class="form-control" name="statement[Transaction_ID]" placeholder="Transaction ID">'+
                        '</div>');
    }else if($("#payment_method").find(":selected").attr('opt-type') =="bank"){
        $(".stmt").append('<div class="form-group stmt bankfield">'+
                                '<label for="statement[Bank_Name]">Bank Name</label>'+
                                '<input type="text" class="form-control" name="statement[Bank_Name]" placeholder="Bank Name">'+
                            '</div>'+
                            '<div class="form-group stmt bankfield">'+
                                '<label for="statement[Branch]">Branch</label>'+
                                '<input type="text" class="form-control" name="statement[Branch]" placeholder="Branch">'+
                            '</div>');
    }
})
</script>
@endpush
