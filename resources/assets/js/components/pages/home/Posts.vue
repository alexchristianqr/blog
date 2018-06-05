<template>
    <div class="row">
        <!-- is Computer -->
        <template v-if="util.getStorage('data_screen').isComputer">
            <div v-for="(v,k) in dataPosts" class="col-lg-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="images/750x300/01.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">{{v.name}}</h4>
                        <p class="card-text text-truncate">{{v.description}}</p>
                        <a href="#" class="btn btn-primary my-auto">Read More <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by
                        <a href="#">Alex Christian</a>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="col-12">
                <ul class="pagination justify-content-center mb-4">
                    <li :class="disabledBack ? 'page-item disabled' : 'page-item'">
                        <button class="page-link" @click="back"><i class="fa fa-angle-double-left mr-2"></i>Back</button>
                    </li>
                    <li class="page-item disabled">
                        <span class="page-link text-muted">{{ dataPaginate.to }} of {{ dataPaginate.total }}</span>
                    </li>
                    <li :class="disabledNext ? 'page-item disabled' : 'page-item'">
                        <button class="page-link" @click="next">Next<i class="fa fa-angle-double-right ml-2"></i></button>
                    </li>
                </ul>
            </div>
        </template>
        <!-- is Tablet -->
        <template v-if="util.getStorage('data_screen').isTablet">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="images/750x300/01.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title text-dark">Productividad en Frameworks</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis
                            aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis
                            animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a href="#" class="btn btn-primary my-auto">Read More <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by
                        <a href="#">Alex Christian</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="images/750x300/01.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title text-dark">Productividad en Frameworks</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis
                            aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis
                            animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a href="#" class="btn btn-primary my-auto">Read More <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by
                        <a href="#">Alex Christian</a>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="col-12">
                <ul class="pagination justify-content-center mb-4">
                    <li :class="disabledBack ? 'page-item disabled' : 'page-item'">
                        <button class="page-link" @click="back"><i class="fa fa-angle-left mr-3"></i>Back</button>
                    </li>
                    <li class="page-item disabled">
                        <span class="page-link text-muted">{{ dataPaginate.page }} of {{ dataPaginate.total }}</span>
                    </li>
                    <li :class="disabledNext ? 'page-item disabled' : 'page-item'">
                        <button class="page-link" @click="next">Next<i class="fa fa-angle-right ml-3"></i></button>
                    </li>
                </ul>
            </div>
        </template>
        <!-- is Mobile -->
        <template v-if="util.getStorage('data_screen').isMobile">
            <div v-for="(v,k) in dataPosts" class="col-sm-12 mb-0">
                <div class="card h-100">
                    <img class="card-img-top" src="images/750x300/01.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">{{v.name}}</h4>
                        <p class="card-text text-truncate">{{v.description}}</p>
                        <a href="#" class="btn btn-primary my-auto">Read More <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by
                        <a href="#">Alex Christian</a>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="col-12" >
                <ul class="pagination justify-content-center mt-4">
                    <li :class="disabledBack ? 'page-item disabled' : 'page-item'">
                        <button :class="disabledBack ? 'page-link' : 'page-link border-primary'" @click="back"><i class="fa fa-angle-double-left mr-2"></i>Back</button>
                    </li>
                    <li :class="disabledNext ? 'page-item disabled' : 'page-item'">
                        <button  :class="disabledNext ? 'page-link' : 'page-link border-primary'"  @click="next">Next<i class="fa fa-angle-double-right ml-2"></i></button>
                    </li>
                </ul>
            </div>
        </template>
    </div>
</template>

<script>
  import Util  from '../../../utility'
  import Axios from 'axios'

  export default {
    name: 'Posts',
    props: {
      dataProps: {},
    },
    data: () => ({
      util: Util,
      showLoading: false,
      dataPosts: [],
      dataPaginate: {
        total: 0,
        page: 1,
        to: 2,
      },
      disabledNext: false,
      disabledBack: true,
      paginate: 1,
    }),
    created () {
      if (Util.getStorage('data_screen').isTablet) {
        this.paginate = 2
        this.getBlog()
      } else if (Util.getStorage('data_screen').isMobile) {
        this.paginate = 1
        this.getBlog()
      } else if (Util.getStorage('data_screen').isComputer){
        this.paginate = 2
        this.getBlog()
      }
    },
    methods: {
      getBlog (page) {
        Axios.get('get-blog', {params: {paginate: this.paginate, page: page}}).then(r => {
          this.dataPosts = r.data.data
          this.dataPaginate.total = r.data.total
          this.dataPaginate.to = r.data.to
          console.log(r)
        }).catch(e => {
          console.error(e)
        })
      },
      next () {
        this.showLoading = true
        // setTimeout(() => {
          if (this.dataPaginate.page < this.dataPaginate.total) {
            this.dataPaginate.page = this.dataPaginate.page + 1
            this.getBlog(this.dataPaginate.page)
            if (this.dataPaginate.page > 1) {
              this.disabledBack = false
            }
            this.showLoading = false
          }
          if (Util.getStorage('data_screen').isMobile) {
            if (this.dataPaginate.page == this.dataPaginate.total) {
              this.disabledNext = true
              return false
            }
          } else {
            if (this.dataPaginate.page == this.dataPaginate.total / 2) {
              this.disabledNext = true
              return false
            }
          }
        // }, 500)
      },
      back () {
        this.showLoading = true
        // setTimeout(() => {
          if (this.dataPaginate.page > 1) {
            this.dataPaginate.page = this.dataPaginate.page - 1
            this.getBlog(this.dataPaginate.page)
            if (this.dataPaginate.page < this.dataPaginate.total) {
              this.disabledNext = false
            }
            this.showLoading = false
          }
          if (this.dataPaginate.page == 1) {
            this.disabledBack = true
            return false
          }
        // }, 500)
      },
    },
  }
</script>

<style scoped>

</style>