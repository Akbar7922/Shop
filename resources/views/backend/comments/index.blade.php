@extends('layouts.backend.dashboard')
@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::جستجو-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="جستجو " />
                    </div>
                    <!--end::جستجو-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::گروه actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>انتخاب شده
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">حذف انتخاب شده
                        </button>
                    </div>
                    <!--end::گروه actions-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-center text-gray-400 fw-bolder fs-7 gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                                </div>
                            </th>
                            <th>کاربر</th>
                            <th>محصول</th>
                            <th>کامنت والد</th>
                            <th>کامنت</th>
                            <th>وضعیت نمایش</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600 text-center">
                        @foreach($comments->items() as $comment)
                        <tr data-id="{{ $comment->id }}" data-comment-user="{{ $comment->user->getFullName() }}" data-comment-product="{{ $comment->shopProduct->product->name }}" data-comment-text="{{ $comment->comment }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <span class="text-gray-800 text-hover-primary mb-1">{{$comment->user->getFullName()}}</span>
                            </td>
                            <td>
                                <span class="text-gray-800 text-hover-primary mb-1">{{$comment->shopProduct->product->name}}</span>
                            </td>
                            <td>
                                <span class="text-gray-800 text-hover-primary mb-1">{{$comment->getParent()}}</span>
                            </td>
                            <td>
                                <span class="text-gray-600 text-hover-primary mb-1">{{$comment->getComment()}}</span>
                            </td>
                            <td>
                                <span class="text-gray-600 text-hover-primary mb-1">{{$comment->getStatus()}}</span>
                            </td>
                            <td>
                                <span class="text-gray-600 text-hover-primary mb-1">{{$comment->created_at()}}</span>
                            </td>
                            <!--begin::عملیات=-->
                            <td class="text-end">
                                <a class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">عملیات
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 reply">
                                        <span class="menu-link px-3">پاسخ</span>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <span class="menu-link px-3 changeStatus_comment" data-link="{{ route('comment.status.change', $comment->id) }}" data-user="{{ $comment->user->getFullName() }}" data-status="{{ $comment->isActive }}">
                                            {{ $comment->changeStatusText() }}</span>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 delete_user" data-link="{{route('discount.destroy' , $comment->id)}}" data-name="{{$comment->comment}}">
                                        <span class="menu-link px-3">حذف</span>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                            <!--end::عملیات=-->
                        </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
                <div>
                    {{$comments->links()}}
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

{{-- Modal --}}
<div class="modal fade" id="modal_reply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">پاسخ کامنت</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <!--begin::Form-->
                <div>
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <div class="col-5" style="display: inline-block;">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span>کاربر</span>
                            </label>
                            <!--end::Tags-->
                            <!--begin::Input-->
                            <div>
                                <span class="form-control comment_user"></span>
                            </div>
                        </div>

                        <div class="col-6" style="display: inline-block;float: left;">
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span>محصول</span>
                            </label>
                            <!--end::Tags-->
                            <!--begin::Input-->
                            <div>
                                <span class="form-control comment_product"></span>
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>متن</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <span class="form-control comment_text"></span>
                        </div>
                    </div>
                    <!--end::Input group-->
                </div>

                <form action="{{ route('comment.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="comment_id" id="comment_id">
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>پاسخ</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <textarea name="comment" id="comment" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                </form>
                <!--end::Form-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger col-sm-2" onclick="$('#modal_reply').modal('hide');">انصراف</button>
                    <button type="button" id="add_brand_btn" class="btn btn-primary col-sm-3">
                        تایید
                        <i class="fas fa-sms"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- end Modal --}}
@endsection
@section('script')
<script>
    let token = "{{csrf_token()}}";
    main_id = 11 , sub_id=0;

    @if(Session::exists('status'))
    Swal.fire({
        html: `{{Session::get('status')['message']}}`
        , icon: @if(Session::pull('status')['status'] == 200)
        "success"
        @else "error"
        @endif
        , buttonsStyling: false
        , showCancelButton: true
        , showConfirmButton: false
        , cancelButtonText: "باشه"
        , customClass: {
            cancelButton: "btn btn-primary"
        , }
    });
    @endif

    $('.reply').click(function() {
        let modal = $('#modal_reply');
        modal.modal('show');
        currentRow = $(this).closest('tr');
        modal.find('#comment_id').val(currentRow.attr('data-id'));
        modal.find('.comment_user').text(currentRow.attr('data-comment-user'));
        modal.find('.comment_product').text(currentRow.attr('data-comment-product'));
        modal.find('.comment_text').text(currentRow.attr('data-comment-text'));

    });

    $('.delete_user').click(function() {
        let name = $(this).attr('data-name');
        Swal.fire({
            html: `آیا از حذف تخفیف <span class="badge badge-primary">${name}</span> مطمئن هستید ؟`
            , icon: "question"
            , buttonsStyling: false
            , showCancelButton: true
            , confirmButtonText: "بله ، حذف شود"
            , cancelButtonText: 'خیر'
            , customClass: {
                confirmButton: "btn btn-primary"
                , cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                deleteUser($(this));
            }
        });
    });

    function deleteUser(element) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            }
            , type: 'post'
            , url: element.attr('data-link')
            , data: {
                '_method': 'DELETE'
            }
            , success: function(data) {
                console.log(data)
                if (data.status == 200) {
                    element.closest('tr').remove();
                    Swal.fire({
                        text: data.message
                        , icon: 'success'
                        , confirmButtonText: "باشه"
                    })
                } else
                    Swal.fire({
                        text: data.message
                        , icon: 'error'
                        , confirmButtonText: "باشه"
                    })
            }
            , error: function() {
                Swal.fire({
                    text: 'خطا در حذف رکورد ، مجددا تلاش کنید.'
                    , icon: 'error'
                    , confirmButtonText: "باشه"
                })
            }
        });
    }
    $('.changeStatus_comment').click(function() {
        let name = $(this).attr('data-user');
        Swal.fire({
            html: `آیا از تغییر وضعیت  <span class="badge badge-primary">${name}</span> مطمئن هستید ؟`
            , icon: "question"
            , buttonsStyling: false
            , showCancelButton: true
            , confirmButtonText: "بله"
            , cancelButtonText: 'خیر'
            , customClass: {
                confirmButton: "btn btn-primary"
                , cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                changeStatus($(this));
            }
        });
    });

    function changeStatus(element) {
        var activation = parseInt(element.attr('data-status'));
        if (activation == 1)
            activation--;
        else
            activation++;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            }
            , type: 'post'
            , url: element.attr('data-link')
            , data: {
                'isActive': activation
            }
            , success: function(data) {
                if (data.status == 200) {
                    Swal.fire({
                        text: data.message
                        , icon: 'success'
                        , confirmButtonText: "باشه"
                    }).then((result) => {
                        if (result.isConfirmed)
                            location.reload();
                    });
                } else
                    Swal.fire({
                        text: data.message
                        , icon: 'error'
                        , confirmButtonText: "باشه"
                    })
            }
            , error: function() {
                Swal.fire({
                    text: 'خطا در حذف رکورد ، مجددا تلاش کنید.'
                    , icon: 'error'
                    , confirmButtonText: "باشه"
                })
            }
        });
    }

</script>
@endsection
