@extends('layouts.backend.dashboard')
@section('content')
<style>
    .delete_item_icon {
        padding: 0px 8px;
        color: red;
        border: 1px solid;
        border-radius: 50%;
        margin: 0px 4px;
        cursor: pointer;
    }

    .delete_item_icon .fas {
        color: red;
        font-size: 12px;
        vertical-align: middle;
        margin-top: 2px;
    }

    .list-group-item {
        font-size: 1.1rem;
    }

    .btn-circle {
        border-radius: 50% !important;
        padding: 10px 15px !important;
        margin-bottom: 8px !important;
    }

    .btn-circle i {
        padding: 0px !important;
        margin-top: 2px;
    }

    .filter_button {
        text-align: left;
        margin-top: 1rem;
    }

    .spinner {
        display: none;
    }

</style>
<script>
    let members = {{$members->pluck('user_id')}};
</script>
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="card">
            <div class="row container" id="filter_div" style="margin-top: 1.5rem;display: none;">
                <div class="col-4">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <input type="checkbox" name="filter" id="filter_0">
                        <span>نوع</span>
                    </label>
                    <div class="form-floating border rounded">
                        <select id="type" name="isGroup" class="form-select lh-1 py-3" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب نوع">
                            @foreach ($userTypes as $userType)
                            <option value="{{ $userType->id }}">{{ $userType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <input type="checkbox" name="filter" id="filter_1">
                        <span>استان</span>
                    </label>
                    <div class="form-floating border rounded">
                        <select id="state" name="state" class="form-select lh-1 py-3" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب استان">
                            @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <input type="checkbox" name="filter" id="filter_2">
                        <span>شهر</span>
                    </label>
                    <div class="form-floating border rounded">
                        <select id="city" name="city" class="form-select lh-1 py-3" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب شهر">
                        </select>
                    </div>
                </div>
                <br>
                <div class="filter_button">
                    <button type="button" id="submit_filter" class="btn btn-info col-md-2">
                        <i class="fas fa-filter"></i>
                        <div style="display: inline-block">
                            <span class="text">اعمال فیلتر</span>
                            <span class="spinner spinner-border spinner-border-sm align-middle ms-2"></span>
                        </div>
                        {{-- <i class="fas fa-filter"></i> --}}
                    </button>
                </div>
            </div>
            <div class="row container">
                <div style="text-align: center;margin-top: 25px;border-radius: 10px;border-bottom: 1px solid;">
                    <button id="show_filter" type="button" class="btn btn-danger btn-circle">
                        <i class="fas fa-arrow-down"></i>
                    </button>
                    <p>نمایش فیلتر</p>
                </div>
            </div>
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <ul class="list-group list-group-horizontal-md" id="members_list">
                        @foreach($members as $value)
                        <li class="list-group-item" id="{{ 'mem'.$value->user_id }}">
                            <span>{{ $value->user->name.' - '.$value->user->mobile }}</span>
                            {{-- <span class="delete_item_icon">
                                <i class="fas fa-trash-alt"></i>
                            </span> --}}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <!--begin::Add customer-->
                        <button type="button" class="btn btn-primary" id="addToGroup">افزودن به گروه</button>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Toolbar-->
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
            <div class="card-body pt-0 items-list">
                @include('backend.groups.list')
                <!--begin::Table-->
                {{-- <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->
                        <tr class="text-center text-gray-400 fw-bolder fs-7 gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                           data-kt-check-target="#kt_customers_table .form-check-input" value="1"/>
                                </div>
                            </th>
                            <th class="min-w-125px">نام</th>
                            <th class="min-w-125px">موبایل</th>
                            <th class="min-w-125px">استان</th>
                            <th class="min-w-125px">شهر</th>
                            <th class="min-w-125px">وضعیت</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600 text-center">
                        @foreach($users->items() as $item)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1"/>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-gray-800 text-hover-primary mb-1">{{$item->name}}</span>
                </td>
                <td>
                    <span class="text-gray-800 text-hover-primary mb-1">{{$item->mobile}}</span>
                </td>
                <td>
                    <span class="text-gray-800 text-hover-primary mb-1">{{$item->city->name}}</span>
                </td>
                <td>
                    <span class="text-gray-600 text-hover-primary mb-1">{{$item->city->parent->name}}</span>
                </td>
                <td>
                    <span class="text-gray-600 text-hover-primary mb-1"></span>
                </td>
                </tr>
                @endforeach
                </tbody>
                <!--end::Table body-->
                </table>
                <!--end::Table-->
                <div>
                    {{$groups->links()}}
                </div> --}}
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection
@section('script')
<script>
    let getCitiesUrl = "{{route('cities')}}";

</script>
<script src="{{ asset('asset/back/metronic/js/customize/members.js') }}"></script>
<script src="{{ asset('asset/back/metronic/js/customize/cities.js') }}"></script>

<script type="text/javascript">
    let token = "{{csrf_token()}}";
    var filterUserUrl = "{{ route('users.list.filter') }}";
    $(window).on('hashchange', function() {
        // if (window.location.hash) {
        //     var page = window.location.hash.replace('#', '');
        //     if (page == Number.NaN || page <= 0) {
        //         return false;
        //     } else {
        //         getData(page);
        //     }
        // }
    });

    $(document).ready(function() {

        $(document).on('click', '#show_filter', function(event) {
            var filter_div = $('#filter_div');
            if (filter_div.is(':visible')) {
                filter_div.hide(2000);
                $(this).find('i').removeClass('fa-arrow-up');
                $(this).find('i').addClass('fa-arrow-down');
            } else {
                filter_div.show(2000);
                $(this).find('i').removeClass('fa-arrow-down');
                $(this).find('i').addClass('fa-arrow-up');
            }
        });

        $(document).on('click', '#submit_filter', function(event) {
            $(this).find('.text').hide();
            $(this).find('.spinner').show();
            getFilter(1 , true);
        });

        function getFilter(page , isFilter) {
            var type = null
                , state = null
                , city = null;
            if ($('#filter_0').is(':checked'))
                type = $('#type').val();
            if ($('#filter_1').is(':checked'))
                state = $('#state').val();
            if ($('#filter_2').is(':checked'))
                city = $('#city').val();
            getData(page, type, state, city , isFilter);
        }

        $(document).on('click', '.pagination a', function(event) {
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            event.preventDefault();
            var myurl = $(this).attr('href');
            var page = $(this).attr('href').split('page=')[1];

            $(".items-list").empty().html(`
            <div class="row container">
                <div class="text-center" style="margin: 1rem 0.5rem;font-size: 1.5rem;">
                    <span class="text">درحال دریافت  اطلاعات ، لطفا شکیبا باشید .... </span>
                    <span class="spinner spinner-border spinner-border-sm align-middle ms-2" style="display:inline-block"></span>
                </div>
            </div>
            `);

            getFilter(page , false);
        });
    });

    function getData(page, type, state, city , isFilter) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            , }
            , type: 'get'
            , url: "{{ route('group.members' , $id) }}" + '?page=' + page
            , data: {
                'type': type
                , 'state': state
                , 'city': city
            }
            , success: function(data) {
                $(".items-list").empty().html(data);
                var s = document.createElement('script');
                s.src = "{{ asset('asset/back/metronic/js/customize/members.js') }}";
                document.body.appendChild(s);
                if(isFilter){
                    $('#submit_filter').find('.text').show();
                    $('#submit_filter').find('.spinner').hide();
                }
            }
            , error: function(e) {
                console.log(e);
                if(isFilter){
                    $('#submit_filter').find('.text').show();
                    $('#submit_filter').find('.spinner').hide();
                }else{
                    $(".items-list").empty().html(`
                    <div class="row container">
                        <div class="text-center" style="margin: 1rem 0.5rem;font-size: 1.5rem;">
                            <span class="text">خطا در دیافت اطلاعات ، مجددا تلاش کنید</span>
                            <span class="spinner spinner-border spinner-border-sm align-middle ms-2" style="display:inline-block"></span>
                        </div>
                    </div>
                    `);
                }

            }
        });
    }

    $('#addToGroup').click(function() {
        console.log(members);
        let name = "{{ $group->title }}";
        Swal.fire({
            html: `آیا کاربران به گروه <span class="badge badge-primary">${name}</span> اضافه شوند ؟`
            , icon: "question"
            , buttonsStyling: false
            , showCancelButton: true
            , confirmButtonText: "بله ، اضافه شوند"
            , cancelButtonText: 'خیر'
            , customClass: {
                confirmButton: "btn btn-primary"
                , cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                addToGroup($(this));
            }
        });

    })


    function addToGroup(element) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            }
            , type: 'post'
            , url: "{{ route('group.members.add' , $id) }}"
            , data: {
                'members_id': members
            }
            , success: function(data) {
                console.log(data)
                if (data.status == 200) {
                    // element.closest('tr').remove();
                    Swal.fire({
                        text: data.message
                        , icon: 'success'
                        , confirmButtonText: "باشه"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location="{{ route('group.index') }}";
                        }
                    });
                } else
                    Swal.fire({
                        text: data.message
                        , icon: 'error'
                        , confirmButtonText: "باشه"
                    })
            }
            , error: function(e) {
                console.log(e)
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
