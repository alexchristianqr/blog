<template>
    <!-- Portfolio -->
    <div class="row">
        <!-- is Computer -->
        <template v-if="util.getStorage('data_screen').isComputer">
            <div class="col-lg-6 col-sm-12 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="images/search.png" alt=""></a>
                    <div class="card-body bg-light">
                        <h4 class="card-title">
                            <a href="#">App Gmail Hibrida</a>
                        </h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam
                            aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt,
                            dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="images/search.png" alt=""></a>
                    <div class="card-body bg-light">
                        <h4 class="card-title">
                            <a href="#">App Gmail Hibrida</a>
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
        <!-- is Mobile -->
        <template v-if="util.getStorage('data_screen').isSmall" >
            <table class="w-100">
                <tr>
                    <td>
                        <ul class="pagination justify-content-center ml-2 mr-2">
                            <li :class="disabledBack ? 'page-item disabled' : 'page-item'">
                                <button :class="disabledBack ? 'page-link' : 'page-link border-primary'" @click="back"><i class="fa fa-angle-left"></i></button>
                            </li>
                        </ul>
                    </td>
                    <td>
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top" src="images/search.png" alt=""></a>
                            <div class="card-body bg-light">
                                <h4 class="card-title">
                                    <a href="#">Web Portal Autoatención</a>
                                </h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra
                                    euismod odio, consectetur
                                    adipisicing elit.</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <ul class="pagination justify-content-center mr-2 ml-2">
                            <li :class="disabledNext ? 'page-item disabled' : 'page-item'">
                                <button class="page-link border-primary" @click="next"><i class="fa fa-angle-right"></i></button>
                            </li>
                        </ul>
                    </td>
                </tr>
            </table>
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