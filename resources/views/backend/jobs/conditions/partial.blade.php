<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_condition_table">
    <thead>
        <tr class="text-center text-gray-400 fw-bolder fs-7 gs-0">
            <th class="min-w-50px ms-2">#</th>
            <th class="min-w-125px">نوع شرایط</th>
            <th class="min-w-125px">متن</th>
            <th class="min-w-125px">شغل</th>
            <th class="min-w-70px">عملیات</th>
        </tr>
    </thead>
    <tbody class="fw-bold text-gray-600 text-center">
        @foreach ($conditions->items() as $item)
        <tr data-position=" #{{ ++$loop->index }}">
            <td>
                <span class="text-gray-800">{{ $loop->index }}</span>
            </td>
            <td>
                <span class="text-gray-800 text-hover-primary mb-1">{{ $item->getType() }}</span>
            </td>
            <td>
                <span class="text-gray-800 text-hover-primary mb-1">{{ $item->text }}</span>
            </td>
            <td>
                <span class="text-gray-800 text-hover-primary mb-1">{{ $item->job->name }}</span>
            </td>
            <td class="text-center">
                <span class="btn btn-sm btn-icon btn-circle btn-danger delete" data-link="{{ route('condition.destroy' , $item->id) }}">
                    <i class="fas fa-trash"></i>
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">
    {{ $conditions->links() }}
</div>
