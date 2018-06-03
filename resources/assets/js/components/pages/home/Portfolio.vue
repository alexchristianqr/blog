<template>
    <!-- Portfolio -->
    <div class="row">
        <!-- is Computer -->
        <template v-if="util.getStorage('data_screen').isComputer">
            <div v-for="n in 2" class="col-lg-6 portfolio-item">
                <div class="card">
                    <a href="#"><img class="card-img-top" src="images/750x300/01.jpg" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">Gmail Hibrida</a>
                        </h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam
                            aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt,
                            dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
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
        <template v-if="util.getStorage('data_screen').isTablet" >
            <div class="col-md-6 portfolio-item mb-4">
                <div class="card">
                    <a href="#"><img class="card-img-top" src="images/750x300/01.jpg" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title my-auto">
                            <a href="#">Portal Autoatención</a>
                        </h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra
                            euismod odio, consectetur
                            adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 portfolio-item mb-4">
                <div class="card">
                    <a href="#"><img class="card-img-top" src="images/750x300/blogin.jpg" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title my-auto">
                            <a href="#">Portal Autoatención</a>
                        </h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra
                            euismod odio, consectetur
                            adipisicing elit.</p>
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
        <template v-if="util.getStorage('data_screen').isMobile" >
            <div class="col-sm-12 portfolio-item mb-0">
                <div class="card">
                    <a href="#"><img class="card-img-top" src="images/750x300/01.jpg" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title my-auto">
                            <a href="#">Portal Autoatención</a>
                        </h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra
                            euismod odio, consectetur
                            adipisicing elit.</p>
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
  import Util from '../../../utility'

  export default {
    name: 'Portfolio',
    data: () => ({
      util: Util,
      dataPaginate: {
        total: 18,
        page: 1,
      },
      disabledNext: false,
      disabledBack: true,
    }),
    methods: {
      next () {
        if (this.dataPaginate.page < this.dataPaginate.total) {
          this.dataPaginate.page = this.dataPaginate.page + 1
          if (this.dataPaginate.page > 1) {
            this.disabledBack = false
          }
        }
        if (this.dataPaginate.page == this.dataPaginate.total) {
          this.disabledNext = true
          return false
        }
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
    },
  }
</script>

<style scoped>

</style>