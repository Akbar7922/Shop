<div class="row row-cols-1 row-cols-sm-4 rol-cols-md-1 row-cols-lg-4 mt-3">
    @foreach($events as $item)
    <div class="card col mb-1" data-item="{{ $item }}" data-name="{{ $item->getFullTitle() }}">
        <div class="card border-bottom border-bottom-dark">
            <div class="img">
                <img class="img-fluid img-thumbnail rounded-4 h-150px w-100" src="{{ $item->getPicPath() }}" alt="{{$item->title}}">
            </div>
            <div class="pt-5 ps-2 mb-4">
                <div class="text-center p-2">
                    {{$item->title}}
                </div>
                <div class="text-center mt-2">
                    <span class="btn btn-sm btn-danger btn-icon btn-circle ms-2 delete_item" data-link="{{ route('event.destroy' , $item->id) }}" data-name="{{ $item->getFullTitle() }}">
                        <i class="fas fa-trash-alt p-3"></i>
                    </span>
                    <span class="btn btn-sm btn-primary btn-icon btn-circle ms-2 show_item" >
                        <i class="fas fa-eye p-3"></i>
                    </span>
                    <a href="{{ route('event.edit' , $item->id) }}">
                        <span class="btn btn-sm btn-info btn-icon btn-circle ms-1">
                            <i class="fas fa-edit p-3"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="pagination">
    {{ $events->links() }}
</div>
