<ol class="breadcrumb border-1 border-default" style="display: -webkit-box;overflow-x: auto;">
    @foreach($dataBreadcrumb as $k => $item)
        @if($item['status'])
            <li class="breadcrumb-item">
                <a href="{{$item['url']}}">{{$item['title']}}</a>
            </li>
        @else
            @if($k+1 == count($dataBreadcrumb))
                <li class="breadcrumb-item active pr-3">{{$item['title']}}</li>
                @else
                <li class="breadcrumb-item active">{{$item['title']}}</li>
            @endif
        @endif
    @endforeach
</ol>