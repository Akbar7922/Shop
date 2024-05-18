<div class="row row-cols-1 row-cols-sm-4 rol-cols-md-1 row-cols-lg-4 mt-3">
    @foreach($projects as $item)
    <div class="card col mb-1" data-item="{{ $item }}">
        <div class="card border-bottom border-bottom-dark">
            <div class="img">
                <img class="img-fluid img-thumbnail rounded-4 h-150px w-100" src="{{ asset('image/projects/'.$item->pic) }}" alt="{{$item->title}}">
            </div>
            <div class="pt-5 ps-2 mb-4">
                <div class="text-center p-2">
                    {{$item->title}}
                </div>
                <div class="p-3">
                    {{ $item->description }}
                </div>
                <div class="text-center mt-2">
                    <span class="btn btn-sm btn-danger rounded-pill ms-2 delete_item" data-link="{{ route('event.destroy' , $item->id) }}" data-name="{{ $item->title }}">
                        حذف
                        <i class="fas fa-trash-alt p-3"></i>
                    </span>
                        <span class="btn btn-sm btn-info rounded-pill ms-1 edit_item" data-link="{{ route('project.update' , $item->id) }}">
                            ویرایش
                            <i class="fas fa-edit p-3"></i>
                        </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="pagination">
    {{ $projects->links() }}
</div>
