<template>
    <div class="row">
        <!-- Portfolio -->
        <div id="isMobile" class="col-lg-6 col-sm-6 portfolio-item">
            <div class="card h-100">
                <div class="card-body p-0 text-center my-1 mx-1">
                    <a href="#"><img class="card-img-top" src="images/search.png" alt=""></a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">App Gmail Hibrida</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam
                        aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt,
                        dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
                </div>
            </div>
        </div>
        <div id="isDefault" class="col-lg-6 col-sm-6 portfolio-item">
            <div class="card h-100">
                <div class="card-body p-0 text-center my-1 mx-1">
                    <a href="#"><img class="card-img-top" src="images/search.png" alt=""></a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Web Portal Autoatención</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra
                        euismod odio, gravida pellentesque urna varius vitae Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Accusantium ad aliquam consequuntur cupiditate dolores dolorum ducimus
                        earum esse est eveniet excepturi, facere facilis hic incidunt iure labore officiis,
                        repudiandae ullam.</p>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="col-12">
            <div class="col-sm-6 offset-sm-3 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                <ul class="pagination justify-content-center mb-4">
                    <li :class="disabledBack ? 'page-item disabled' : 'page-item'">
                        <button class="page-link" @click="back">&larr; Older</button>
                    </li>
                    <li class="page-item">
                        <span class="page-link text-muted">{{ dataPaginate.page }} of {{ dataPaginate.total }}</span>
                    </li>
                    <li :class="disabledNext ? 'page-item disabled' : 'page-item'">
                        <button class="page-link" @click="next">Newer &rarr;</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'Portfolio',
    data: () => ({
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