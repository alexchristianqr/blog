{{--<layout-history/>--}}
<div class="mb-4">
    <div id="hrefYears">
        <ul class="list-group">
            <!-- Years -->
            <li class="list-group-item bg-light">
                <h5 class="text-dark my-auto">History</h5>
            </li>
            @foreach($dataHistory as $k => $v)
                <li class="list-group-item">
                <a href="#hrefMonths{{$k}}" class="btn btn-link w-100 h-100 text-left" data-toggle="collapse" aria-expanded="true">{{$k}}</a>
                <div id="hrefMonths{{$k}}" class="collapse" data-parent="#hrefYears">
                    <ul class="list-group list-group-flush pl-2">
                        <!-- Months -->
                        @foreach($v as $kk => $vv)
                        <li class="list-group-item p-0">
                            <a href="#hrefMonth{{$kk.'-'.$k}}" class="btn btn-link w-100 h-100 text-left" data-toggle="collapse" aria-expanded="true">{{$kk}}</a>
                            <div class="collapse" id="hrefMonth{{$kk.'-'.$k}}" data-parent="#hrefMonths{{$k}}">
                                <ul class="list-group list-group-flush pl-4">
                                    <!-- Links -->
                                    @foreach($vv as $kkk => $vvv)
                                    <li class="list-group-item p-0 text-truncate">
                                        <a href="{{route('route.blog.post',[$k,$kk,$vvv->kind])}}" class="btn btn-link text-muted w-100 h-100 text-left"><i class="fa fa-link fa-fw"></i>{{$vvv->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>