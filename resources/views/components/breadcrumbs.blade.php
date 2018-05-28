<ol class="breadcrumb border-1 border-default">
    @foreach($dataBreadcrumb as $item)
        @if($item['status'])
            <li class="breadcrumb-item">
                <a href="{{$item['url']}}">{{$item['title']}}</a>
            </li>
        @else
            <li class="breadcrumb-item active">{{$item['title']}}</li>
        @endif
    @endforeach
</ol>