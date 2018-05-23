<template>
    <div class="row">
        <!-- Courses -->
        <loading v-if="showLoading"/>
        <template v-else>
            <!-- Computer -->
            <template v-if="isDefault">
                <div v-for="(v,k) in dataCourse" :id="(k == 0) ? 'isMobile' : 'isDefault'" class="col-lg-4 mb-4">
                    <div class="card h-100 bg-light">
                        <h4 class="card-header">{{v.title}}</h4>
                        <div class="card-body h-75">
                            <p class="card-text">{{v.description}}</p>
                        </div>
                        <div class="card-body w-50 mx-auto">
                            <a href="#"><img class="card-img-top" :src="'images/400x400/'+v.image" alt=""></a>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <a href="#" class="btn btn-outline-primary">Learn More</a>
                                </div>
                                <div class="col-6 my-auto text-right">
                                    <strong class="h5 text-muted">{{ v.price.usa }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
            <!-- Mobile -->
            <template v-else>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 bg-light">
                        <h4 class="card-header">{{dataCourse[dataPaginate.page -1].title}}</h4>
                        <div class="card-body h-75">
                            <p class="card-text">{{dataCourse[dataPaginate.page -1].description}}</p>
                        </div>
                        <div class="card-body w-50 mx-auto">
                            <a href="#">
                                <img class="card-img-top" :src="'images/400x400/'+dataCourse[dataPaginate.page -1].image" alt="" />
                            </a>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <a href="#" class="btn btn-outline-primary">Learn More</a>
                                </div>
                                <div class="col-6 my-auto text-right">
                                    <strong class="h5 text-muted">{{ dataCourse[dataPaginate.page -1].price.usa }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </template>
        <!-- Pagination -->
        <div class="col-12">
                <div class="col-sm-12 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
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
            </div>
    </div>
</template>

<script>
  import axios   from 'axios'
  import Loading from '../../layouts/Loading'

  export default {
    name: 'Courses',
    components: {Loading},
    props: {
      dataProps: {},
    },
    data: () => ({
      showLoading: false,
      dataCourse: [
        {
          title: 'Angular 6',
          description: 'Angular is a platform that makes it easy to build applications with the web. Angular empowers developers to build applications that live on the web, mobile, or the desktop.',
          price: {
            per: '10',
            usa: '$18',
          },
          image: 'angular.svg',
        },
        {
          title: 'Vue 2',
          description: 'Vue (pronounced /vjuː/, like view) is a progressive framework for building user interfaces. Unlike other monolithic frameworks, Vue is designed from the ground up to be incrementally adoptable.',
          price: {
            per: '10',
            usa: '$25',
          },
          image: 'vue.png',
        },
        {
          title: 'React',
          description: 'React is a JavaScript library, and so we’ll assume you have a basic understanding of the JavaScript language. If you don’t feel very confident, we recommend refreshing your JavaScript knowledge so you can follow along more easily.',
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
      sizeScreen: window.screen.availWidth,
      isDefault: true,
    }),
    created () {
      this.isDefault = this.sizeScreen > 768
    },
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
        if (this.dataPaginate.page > 1) {
          this.dataPaginate.page = this.dataPaginate.page - 1
          if (this.dataPaginate.page < this.dataPaginate.total) {
            this.disabledNext = false
          }
        }
        if (this.dataPaginate.page == 1) {
          this.disabledBack = true
          return false
        }
      },
      getData () {
        axios.get('https://httpbin.org/get').then(r => {
          console.log(r)
        })
      },
    },
  }
</script>

<style scoped>

</style>