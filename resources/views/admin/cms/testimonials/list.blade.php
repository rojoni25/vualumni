@extends('admin.layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/custom_dt_custom.css') }}">
    <link href="{{ asset('admin/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />

@endpush
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="buttons text-right mb-3">
                <a href="{{route('admin.cms.testimonial.create')}}" class="btn btn-success">Add New</a>
            </div>
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="style-2" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="checkbox-column">SL.</th>
                                    <th>Member Name</th>
                                    <th>Photo</th>
                                    <th>Tagline</th>
                                    <th>Added On</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($testimonials as $testimonial)
                                    <tr>
                                        <td class="checkbox-column">{{ $loop->iteration }}</td>
                                        <td>{{ $testimonial->user_name }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                    <img alt="avatar" class="img-fluid rounded-circle" style="object-fit:contain;height:100%;" src="{{asset($testimonial->user_avatar)}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $testimonial->tagline??substr($testimonial->content,0,70) }}</td>
                                        <td>{{ $testimonial->created_at->format('d M Y') }}</td>
                                        <td>{{ $testimonial->status ? 'Active' : 'Deactive' }}</td>
                                        <td class="style-3">
                                            <form action="{{route('admin.cms.testimonial.destroy',$testimonial->id)}}" method="post" id="delete_{{$testimonial->id}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <ul class="table-controls">
                                                <li><a href="{{route('admin.cms.testimonial.edit',$testimonial->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                <li><a href="javascript:setModal('#delete_{{$testimonial->id}}');"  class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteTestimonial" tabindex="-1" role="dialog" aria-labelledby="deleteTestimonialLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteTestimonialLabel">Are You Sure?</h5>
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
                        <div class="text-center">
                            <span>Do you really want to delete this testimonial?</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="button" id="confirmBtn" class="btn btn-primary"
                            onclick="">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        c2 = $('#style-2').DataTable({
            headerCallback: function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML =
                    '<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="testimonial-all">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs: [{
                targets: 0,
                width: "30px",
                className: "",
                orderable: !1,
                render: function(e, a, t, n) {
                    return '<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="testimonial-all">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                }
            }],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5
        });
        multiCheck(c2);
    </script>
    <script>
        function setModal(id){
            $('#confirmBtn').attr('onclick','$("'+id+'").submit();');
            $('#deleteTestimonial').modal();
        }
    </script>
@endpush
