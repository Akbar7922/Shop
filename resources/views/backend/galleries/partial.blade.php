<div class="row row-cols-1 row-cols-sm-4 rol-cols-md-1 row-cols-lg-4 mt-3">
    @foreach($galleries as $item)
    <div class="card col mb-1" data-item="{{ $item }}">
        <div class="card border-bottom border-bottom-dark">
            <div class="img">
                <img class="img-fluid img-thumbnail rounded-4 h-150px w-100" src="{{asset('image/gallery/'.$item->pics)}}" alt="{{$item->title}}">
            </div>
            <div class="d-flex justify-content-end pt-5 ps-2 mb-4">
                <span class="fw-bolder m-auto h-auto" style="width: -webkit-fill-available;overflow-wrap: anywhere;">
                    {{$item->title}}
                </span>
                <span class="btn btn-sm btn-danger btn-icon btn-circle ms-2 delete_item" data-link="{{ route('gallery.destroy' , $item->id) }}" data-name="{{ $item->title }}">
                    <i class="fas fa-trash-alt p-3"></i>
                </span>
                <span class="btn btn-sm btn-info btn-icon btn-circle ms-1 edit_item" data-link="{{ route('gallery.update' , $item->id) }}" >
                    <i class="fas fa-edit p-3"></i>
                </span>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="pagination">
    {{ $galleries->links() }}
</div>
