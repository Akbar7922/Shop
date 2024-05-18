@foreach ($products->items() as $product)
    <tr>
        <td>
            <a href="javascript:void(0)">
                <img src="../assets/images/pro3/1.jpg" class="blur-up lazyloaded" alt="">
            </a>
        </td>
        <td>
            <span class="mt-0">{{ $product->product->name }}</span>
        </td>
        <td>
            <span>تی شرت پولو بنفش</span>
        </td>
        <td>
            <span class="theme-color fs-6">149.54</span>
        </td>
        <td>
            <a href="javascript:void(0)" class="btn btn-xs btn-solid">
                خرید کردن
            </a>
        </td>
    </tr>
@endforeach
