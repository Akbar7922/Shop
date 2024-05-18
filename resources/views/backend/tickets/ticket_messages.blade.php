@extends('layouts.backend.dashboard')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="d-flex flex-column flex-lg-row">
            <div class="flex-lg-row-fluid me-lg-7 me-xl-10">
                <div class="card">
                    <div class="card-header" id="kt_chat_messenger_header">
                        <div class="card-title">
                            <div class="d-flex justify-content-center flex-column me-3">
                                <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{ $ticket->receiver->getFullName() }}</a>
                                <div class="mb-0 lh-1">
                                    <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                    <span class="fs-7 fw-bold text-muted">فعال</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @livewire('ticket-chatroom', ['id' => request()->id])
                </div>
            </div>
            <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="d-flex justify-content-center flex-column me-3">
                                <p class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">اطلاعات تیکت شماره {{ '#'.$ticket->tracking_code }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <p class="col-5 text-gray-900">کاربر : </p>
                            <p class="col-7 text-gray-900 fs-5 fw-bolder">{{ $ticket->receiver->getFullname() }}</p>
                        </div>
                        <div class="row">
                            <p class="col-5 text-gray-900">عنوان تیکت : </p>
                            <p class="col-7 text-gray-900 fs-5 fw-bolder">{{ $ticket->title }}</p>
                        </div>
                        <div class="row">
                            <p class="col-5 text-gray-900">بخش موردنظر : </p>
                            <p class="col-7 text-gray-900 fs-5 fw-bolder">{{ $ticket->getSection() }}</p>
                        </div>
                        <div class="row">
                            <p class="col-5 text-gray-900">وضعیت تیکت : </p>
                            <p class="col-7 text-gray-900 fs-5 fw-bolder">{{ $ticket->getStatus() }}</p>
                        </div>
                        <div class="row">
                            <p class="col-5 text-gray-900">تاریخ ایجاد : </p>
                            <p class="col-7 text-gray-900 fs-5 fw-bolder">{{ $ticket->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('asset/back/metronic/js/customize/validate/ticket.message.js') }}"></script>
<script src="{{ asset('asset/back/metronic/js/custom/apps/chat/chat.js') }}"></script>
<script>
    let token = "{{ csrf_token() }}";
    let sendTicektUrl = "{{ route('ticket.send' , $ticket->id) }}";
    var scroll = document.querySelector("#cht");
    scroll.scrollTop = scroll.scrollHeight;
</script>
@endsection
