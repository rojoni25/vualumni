@extends('user.layouts.app')

@push('styles')
    <style>
        .table td {
            padding: 5px;
        }
    </style>
    @if (Agent::isMobile())
    @else
        <style>
            .table>tbody>tr>td {
                font-size: 15px;
            }
        </style>
    @endif
@endpush
@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="p-3 widget">
                    <div class="widget-heading">
                        <h5 class="">Member Information</h5>
                    </div>
                    <div class="widget-content">
                        <section>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <td colspan="3">{{ $member->name }}</td>
                                </tr>
                                <tr>
                                    <td>Name (in Bangla)</td>
                                    <td colspan="3">{{ $member->name_bangla }}</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td>{{ $member->dob->format('d M Y') }}</td>
                                    <td>Blood Group</td>
                                    <td>{{ $member->blood_group }}</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>{{ $member->gender }}</td>
                                    <td>Maritial Status</td>
                                    <td>{{ $member->maritial_status }}</td>
                                </tr>
                                @if ($member->maritial_status == 'Married')
                                    <tr>
                                        <td>Spouse Name</td>
                                        <td colspan="3">{{ $member->spouse_name }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Mobile</td>
                                    <td>{{ $member->mobile }}</td>
                                    <td>Email</td>
                                    <td>{{ $member->email }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td colspan="3">
                                        {{ $member->permanent_address['house'] }}/{{ $member->permanent_address['ward'] }},
                                        {{ $member->permanent_address['village'] }},
                                        {{ $member->permanent_address['ps'] }}, {{ $member->permanent_address['po'] }},
                                        {{ $member->permanent_address['district'] }}-{{ $member->permanent_address['post_code'] }}
                                    </td>
                                </tr>
                            </table>
                        </section>
                    </div>
                </div>
                <div class="p-3 mt-3 widget">
                    <div class="widget-heading">
                        <h5 class="">Profession Information</h5>
                    </div>
                    <div class="widget-content">
                        <section>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Designation</th>
                                    <th>Organization</th>
                                    <th>Duration</th>
                                </tr>
                                @foreach ($member->ocupationsDesc as $item)
                                    <tr>
                                        <td>{{ $item->position }}</td>
                                        <td>{{ $item->organization }}</td>
                                        <td>{{ $item->from_date->format('Y') }} to
                                            {{ $item->to_date ? $item->to_date->format('Y') : 'Continuing' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </section>
                    </div>
                </div>
                <div class="p-3 mt-3 widget">
                    <div class="widget-heading">
                        <h5 class="">Education Information</h5>
                    </div>
                    <div class="widget-content">
                        <section>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Degree</th>
                                    <th>Department</th>
                                    <th>Institute</th>
                                    <th>Passing Year</th>
                                </tr>
                                @foreach ($member->educationsDesc->where('year', '!=', '') as $item)
                                    <tr>
                                        <td>{{ $item->degree }}</td>
                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->institute }}</td>
                                        <td>{{ $item->year }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </section>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="p-3 mb-3 widget">
                    <div class="widget-heading">
                        <h5 class="">Member Photo/Signature</h5>
                    </div>
                    <div class="text-center widget-content">
                        <div class="mb-2 avatar">
                            <img style="width:150px;" src="{{ asset($member->photo) }}" alt="">
                        </div>
                        <div class="avatar">
                            <img style="width: 150px;" src="{{ asset($member->signature) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="p-3 widget">
                    <div class="widget-heading">
                        <h5 class="">Membership Information</h5>
                    </div>
                    <div class="text-center widget-content">
                        <table class="table table-bordered">
                            <tr>
                                <td>Membership Type</td>
                                <td>{{ $member->membership_type }}</td>
                            </tr>
                            <tr>
                                <td>Membership Fees</td>
                                <td>BDT {{ $member->membership_info->registration_fees }} / USD
                                    {{ $member->membership_info->fees_usd }}</td>
                            </tr>
                            <tr>
                                <td>Payment Status</td>
                                <td>{{ $member->payment_approval }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                @if ($member->payment_approval == 'Pending')
                    <div class="p-3 mt-3 widget">
                        <div class="w-full">
                            <form action="{{ route('member.pay') }}" method="POST">
                                @csrf
                                <input type="hidden" name="member_id" value="{{ $member->id }}">
                                <button style="width: 100%;" type="submit" class="btn btn-success">Pay Now</button>
                            </form>
                        </div>
                    </div>
                @endif

            </div>


        </div>

    </div>
@endsection

@push('scripts')

    @if (session('success'))
        <script>
            swal({
                title: 'Congrats!',
                text: "{{ session('success') }}",
                type: 'success',
                padding: '2em'
            });
        </script>
    @endif
@endpush
