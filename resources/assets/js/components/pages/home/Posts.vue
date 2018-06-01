<template>
    <div class="row">
        <!-- is Computer -->
        <template v-if="util.getStorage('data_screen').isComputer">
            <div v-for="n in 2" class="col-lg-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="images/750x300/01.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Productividad en Frameworks</h4>
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
            <div class="col-sm-12 mb-0">
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
                <ul class="pagination justify-content-center mt-4">
                    <li :class="disabledBack ? 'page-item disabled' : 'page-item'">
                        <button :class="disabledBack ? 'page-link' : 'page-link border-primary'" @click="back"><i class="fa fa-angle-left mr-2"></i>Back</button>
                    </li>
                    <li :class="disabledNext ? 'page-item disabled' : 'page-item'">
                        <button class="page-link border-primary" @click="next">Next<i class="fa fa-angle-right ml-2"></i></button>
                    </li>
                </ul>
            </div>
        </template>

    </div>
</template>

<script>
  import Util  from '../../../utility'

  export default {
    name: 'Posts',
    props: {
      dataProps: {},
    },
    data: () => ({
      util: Util,
      showLoading: false,
      dataCourse: [
        {
          title: 'Angular 6',
          description: 'Angular is a platform that makes it easy to build applications with the web.',
          price: {
            per: '10',
            usa: '$18',
          },
          image: 'angular.svg',
        },
        {
          title: 'Vue 2',
          description: 'Vue (pronounced /vjuː/, like view) is a progressive framework for building user interfaces.',
          price: {
            per: '10',
            usa: '$25',
          },
          image: 'vue.png',
        },
        {
          title: 'React',
          description: 'React is a JavaScript library, and so we’ll assume you have a basic understanding of the JavaScript language.',
          price: {
            per: '10',
            usa: '$15',
          },
          image: 'react.svg',
        },
      ],
      dataPaginate: {
        total: 6,
        page: 1,
      },
      disabledNext: false,
      disabledBack: true,
    }),
    methods: {
      next () {
        this.showLoading = true
        setTimeout(() => {
          if (this.dataPaginate.page < this.dataPaginate.total) {
            this.dataPaginate.page = this.dataPaginate.page + 1
            if (this.dataPaginate.page > 1) {
              this.disabledBack = false
            }
            this.showLoading = false
          }
          if (this.dataPaginate.page == this.dataPaginate.total) {
            this.disabledNext = true
            return false
          }
        }, 500)
      },
      back () {
        this.showLoading = true
        setTimeout(() => {
          if (this.dataPaginate.page > 1) {
            this.dataPaginate.page = this.dataPaginate.page - 1
            if (this.dataPaginate.page < this.dataPaginate.total) {
              this.disabledNext = false
            }
            this.showLoading = false
          }
          if (this.dataPaginate.page == 1) {
            this.disabledBack = true
            return false
          }
        }, 500)
      },
    },
  }
</script>

<style scoped>

</style>