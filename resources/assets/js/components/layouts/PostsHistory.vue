<template>
    <div class="mb-4">
        <div id="hrefYears">
            <ul class="list-group">
                <!-- Years -->
                <li class="list-group-item bg-light">
                    <h5 class="text-dark my-auto">History Posts</h5>
                </li>
                <li v-for="dataYear in dataHistory" class="list-group-item">
                    <a :href="'#hrefMonths'+dataYear.year" class="btn btn-link w-100 h-100 text-left" data-toggle="collapse" aria-expanded="true">{{dataYear.year}}</a>
                    <div :id="'hrefMonths'+dataYear.year" class="collapse" data-parent="#hrefYears">
                        <ul class="list-group list-group-flush pl-2">
                            <!-- Months -->
                            <li v-for="dataMonth in dataYear.months" class="list-group-item p-0">
                                <a :href="'#hrefMonth-'+dataMonth.month+'-'+dataYear.year" class="btn btn-link w-100 h-100 text-left" data-toggle="collapse" aria-expanded="true">{{dataMonth.name}}</a>
                                <div class="collapse" :id="'hrefMonth-'+dataMonth.month+'-'+dataYear.year" :data-parent="'#hrefMonths'+dataYear.year">
                                    <ul class="list-group list-group-flush pl-4">
                                        <!-- Links -->
                                        <li v-for="dataLink in dataMonth.links" class="list-group-item p-0 text-truncate">
                                            <a :href="dataLink.href" class="btn btn-link text-muted w-100 h-100 text-left"><i class="fa fa-link fa-fw"></i>{{dataLink.title}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'PostsHistory',
    data: () => ({
      dataHistory: [
        {
          year: 2018, months: [
            {
              month: '1',
              name: 'Enero',
              links: [
                {title: 'El Poderoso Laravel 5.5', href: 'http://blog.acqrdeveloper.com/blog/post/param-title-post'},
                {title: 'Reactivodad Vuejs de Javascript', href: '#'},
              ],
            },
            {
              month: '2',
              name: 'Febrero',
              links: [
                {title: 'title1', href: '#'},
                {title: 'title2', href: '#'},
              ],
            },
            {
              month: '3',
              name: 'Marzo',
              links: [
                {title: 'title1', href: '#'},
                {title: 'title2', href: '#'},
              ],
            },
            {
              month: '4',
              name: 'Abril',
              links: [
                {title: 'title1', href: '#'},
                {title: 'title2', href: '#'},
              ],
            },
            {
              month: '5',
              name: 'Mayo',
              links: [
                {title: 'title1', href: '#'},
                {title: 'title2', href: '#'},
              ],
            },
          ],
        },
        {
          year: 2017, months: [
            {
              month: '1',
              name: 'Enero',
              links: [
                {title: 'title1', href: '#'},
                {title: 'title2', href: '#'},
              ],
            },
            {
              month: '2',
              name: 'Febrero',
              links: [
                {title: 'title1', href: '#'},
                {title: 'title2', href: '#'},
              ],
            },
          ],
        },
      ],
    }),
    created () {
      // console.log(this.dataHistory)
      this.dataHistory.forEach((v, k) => {
        if (v.year == 2018) {
          console.log(v.year)
          v.months.forEach((vv, kk) => {
            if (vv.month == '1') {
              console.log(vv.links)
              vv.links.forEach((vvv, kkk) => {
                console.log(vvv.title)
              })
            }
          })
        }
      })
    },
  }
</script>

<style scoped>

</style>