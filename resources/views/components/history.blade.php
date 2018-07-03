<layout-history/>
{{--<div class="mb-4">--}}
    {{--<div id="hrefYears">--}}
        {{--<ul class="list-group">--}}
            {{--<!-- Years -->--}}
            {{--<li class="list-group-item bg-light">--}}
                {{--<h5 class="text-dark my-auto">History</h5>--}}
            {{--</li>--}}
            {{--<li v-for="dataYear in dataHistory" class="list-group-item">--}}
                {{--<a :href="'#hrefMonths'+dataYear.year" class="btn btn-link w-100 h-100 text-left" data-toggle="collapse" aria-expanded="true">{{dataYear.year}}</a>--}}
                {{--<div :id="'hrefMonths'+dataYear.year" class="collapse" data-parent="#hrefYears">--}}
                    {{--<ul class="list-group list-group-flush pl-2">--}}
                        {{--<!-- Months -->--}}
                        {{--<li v-for="dataMonth in dataYear.months" class="list-group-item p-0">--}}
                            {{--<a :href="'#hrefMonth-'+dataMonth.month+'-'+dataYear.year" class="btn btn-link w-100 h-100 text-left" data-toggle="collapse" aria-expanded="true">{{dataMonth.name}}</a>--}}
                            {{--<div class="collapse" :id="'hrefMonth-'+dataMonth.month+'-'+dataYear.year" :data-parent="'#hrefMonths'+dataYear.year">--}}
                                {{--<ul class="list-group list-group-flush pl-4">--}}
                                    {{--<!-- Links -->--}}
                                    {{--<li v-for="dataLink in dataMonth.links" class="list-group-item p-0 text-truncate">--}}
                                        {{--<a :href="dataLink.href" class="btn btn-link text-muted w-100 h-100 text-left"><i class="fa fa-link fa-fw"></i>{{dataLink.title}}</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--</div>--}}