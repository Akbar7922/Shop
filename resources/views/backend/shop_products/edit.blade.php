@extends('layouts.backend.dashboard')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('asset/back/assets/css/custom/style.css')}}">
    <div class="container">
        <!--begin::مخاطبین-->
        <div class="card card-flush h-lg-100">
            <!--begin::Card header-->
            <div class="card-header pt-7">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                    <span class="svg-icon svg-icon-1 me-2">
                        <i class="fas fa-user-plus"></i>
                    </span>
                    <!--end::Svg Icon-->
                    <h2>افزودن کالای جدید</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
                @if(\Illuminate\Support\Facades\Session::exists('status'))
                    <div
                        class="alert @if(\Illuminate\Support\Facades\Session::get('status')['status'] == 200) alert-success @else alert-danger @endif">
                        {{\Illuminate\Support\Facades\Session::pull('status')['message']}}
                    </div>
                @endif

                <!--begin::Form-->
                <form id="addShopProductForm" class="form" method="post" action="{{route('shopProduct.update' , $shopProduct->id)}}">
                    @csrf
                    @method('PATCH')
                    <div id="user_create_inputs">
                        <!--begin::Row-->
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Tags-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">کالا</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="کالا (اجباری)"></i>
                                    </label>
                                    <!--end::Tags-->
                                    <!--begin::Input-->
                                    <div>
                                        <!--begin::انتخاب2-->
                                        <select id="product" name="product_id"
                                                class="form-select form-select-solid lh-1 py-3 form-control"
                                                data-control="select2"
                                                data-kt-ecommerce-settings-type="select2_flags"
                                                data-placeholder="انتخاب محصول">
                                            @foreach($products as $product)
                                                <option value="{{$product->id}}" @if($shopProduct->product_id == $product->id) selected @endif>{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                        <!--end::انتخاب2-->
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Tags-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">فروشگاه</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="فروشگاه (اجباری)"></i>
                                    </label>
                                    <!--end::Tags-->
                                    <!--begin::Input-->
                                    <!--begin::انتخاب2-->
                                    <select id="shop" name="shop_id"
                                            class="form-select form-select-solid lh-1 py-3 form-control"
                                            data-control="select2"
                                            data-kt-ecommerce-settings-type="select2_flags"
                                            data-placeholder="انتخاب فروشگاه">
                                        @foreach($shops as $shop)
                                            <option value="{{$shop->id}}" @if($shop->id == $shopProduct->shop->id) selected @endif>{{$shop->name}}</option>
                                        @endforeach
                                    </select>
                                    <!--end::انتخاب2-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Row-->
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">برند</span>
                                </label>
                                <!--end::Tags-->
                                <!--begin::انتخاب2-->
                                <div>
                                    <select id="brand" name="brand_id"
                                            class="form-select form-select-solid lh-1 py-3 form-control"
                                            data-control="select2"
                                            data-kt-ecommerce-settings-type="select2_flags"
                                            data-placeholder="انتخاب برند">
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" @if($brand->id == $shopProduct->brand_id) selected @endif>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::انتخاب2-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Tags-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">واحد</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="واحد قابل عرضه (اجباری)"></i>
                                    </label>
                                    <!--end::Tags-->
                                    <select id="unit" name="unit_id"
                                            class="form-select form-select-solid lh-1 py-3 form-control"
{{--                                            data-control="select2"--}}
                                            data-kt-ecommerce-settings-type="select2_flags"
                                            data-placeholder="انتخاب واحد">
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}" @if($unit->id == $shopProduct->unit_id) selected @endif>{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Tags-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">قیمت</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="قیمت کالا به ریال (اجباری)"></i>
                                    </label>
                                    <!--end::Tags-->
                                    <input type="text" class="form-control" name="price" id="price" value="{{number_format($shopProduct->price , 0)}}"/>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    @error('price')
                                    <div class="error_input" style="display: block">{{' * '.$message}}</div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Tags-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">قیمت با تخفیف</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="قیمت با تخفیف کالا به ریال (اجباری)"></i>
                                    </label>
                                    <!--end::Tags-->
                                    <input type="text" class="form-control" name="discounted_price"
                                           id="discounted_price" value="{{number_format($shopProduct->discounted_price , 0)}}"/>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    @error('discounted_price')
                                    <div class="error_input" style="display: block">{{' * '.$message}}</div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">

                            <div class="col">
                                <!--begin::Input group-->
                                <div class="mb-7">
                                    <!--begin::Tags-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span>شرکت سازنده</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="شرکت سازنده (اختیاری)"></i>
                                    </label>
                                    <!--end::Tags-->
                                    <input type="text" class="form-control" name="company"
                                           id="company" value="{{$shopProduct->company}}"/>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>

                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="mb-7">
                                    <!--begin::Tags-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">تعداد</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="تعداد موجودی کالا (اجباری)"></i>
                                    </label>
                                    <!--end::Tags-->
                                    <!--begin::انتخاب2-->
                                    <input type="number" name="count" id="count" class="form-control" value="{{$shopProduct->count}}">
                                    <!--end::انتخاب2-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    @error('count')
                                    <div class="error_input" style="display: block">{{' * '.$message}}</div>
                                    @enderror
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Tags-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">نوع کالا</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="نوع کالای قابل عرضه (اجباری)"></i>
                                    </label>
                                    <!--end::Tags-->
                                    <select id="isProduct" name="isProduct"
                                            class="form-select form-select-solid lh-1 py-3 form-control"
                                            data-control="select2"
                                            data-kt-ecommerce-settings-type="select2_flags"
                                            data-placeholder="انتخاب نوع کالا">
                                        <option value="0">خدمات</option>
                                        <option value="1">کالا</option>
                                    </select>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Separator-->
                        <div class="separator mb-6"></div>
                        <!--end::Separator-->
                        <!--begin::عملیات buttons-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{route('shopProduct.index')}}">
                                <button type="button" data-kt-contacts-type="cancel" class="btn btn-light me-3">انصراف
                                </button>
                            </a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button id="btn_addShopProduct" type="button" data-kt-contacts-type="submit"
                                    class="btn btn-primary">
                                <span class="indicator-label">ذخیره</span>
                                <span class="indicator-progress">لطفا صبر کنید...
															<span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::عملیات buttons-->
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::مخاطبین-->
    </div>
    <!--end::Content-->

@endsection
@section('addScript')
    <!--  Script for ME  -->
    <script>
        let isProduct = {{$shopProduct->isProduct}};
        $('select#isProduct option[value='+isProduct+']').prop('selected' , true);
    </script>
    <script src="{{asset('asset/back/metronic/js/customize/validate/shop.product.create.js')}}"></script>
@endsection
