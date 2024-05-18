<div>
    <div class="card-body h-250px" id="kt_drawer_chat_messenger_body">
        <div id="cht" class="scroll scroll-y me-n5 pe-5 h-200px" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="200px" data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer" data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
            @foreach ($messages as $item)
            @php
            $status = ($item->user->user_type_id != 1) ? ["start" , "info"] : ["end" , "primary"];
            @endphp
            <div class="d-flex mb-10 justify-content-{{ $status[0] }}">
                <div class="d-flex flex-column align-items-{{ $status[0] }}">
                    <div class="d-flex align-items-center mb-2">
                        @if($status[0] == "start")
                        <div class="symbol symbol-35px symbol-circle">
                            @if($item->user->pic && file_exists(public_path('image/users/'). $item->user->pic))
                            <img alt="Pic" src="{{ asset('image/users/' . $item->user->pic) }}" />
                            @else
                            <img alt="Pic" src="{{ asset('asset/back/metronic/media/svg/avatars/blank-dark.svg') }}" />
                            @endif
                        </div>
                        <div class="ms-3">
                            <span class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">{{ $item->user->getFullName() }}</span>
                            <span class="text-muted fs-7 mb-1">{{ $item->sendDate() }}</span>
                        </div>
                        @else
                        <div class="me-3">
                            <span class="text-muted fs-7 mb-1">{{ $item->sendDate() }}</span>
                            <span class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">{{ $item->user->getFullName() }}</span>
                        </div>
                        <div class="symbol symbol-35px symbol-circle">
                            @if($item->user->pic && file_exists(public_path('image/users/'). $item->user->pic))
                            <img alt="Pic" src="{{ asset('image/users/' . $item->user->pic) }}" />
                            @else
                            <img alt="Pic" src="{{ asset('asset/back/metronic/media/svg/avatars/blank.svg') }}" />
                            @endif
                        </div>
                        @endif

                    </div>
                    <div class="p-5 rounded bg-light-{{ $status[1] }} text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">{{ $item->body }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="card-footer pt-4" id="kt_chat_messenger_footer">
        <textarea id="body" class="form-control mb-3" rows="1" data-kt-element="input" placeholder="نوشتن پیام" wire:model.defer="new_message"></textarea>
        <span class="invalid-feedback"></span>
        <div class="d-flex flex-stack">
            <div class="d-flex align-items-center me-2">
                <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button">
                    <i class="bi bi-paperclip fs-3"></i>
                    <input type="file" style="display: none">
                </button>
            </div>
            <button wire:click="createMessage" id="submit" class="btn btn-primary" type="button" data-kt-element="send">
                <span class="indicator-label" wire:loading.class="d-none" wire:target="createMessage">ارسال</span>
                <span class="indicator-progress" wire:loading.class="d-block" wire:target="createMessage">لطفا صبر کنید...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
        </div>
    </div>
</div>
