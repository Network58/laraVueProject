<template>
  <div class="overflow-auto">
    <b-row align-h="end">
      <div class="h-card">
    
        <b-card no-body class="overflow-hidden h-card" border-variant="warning" v-for="(h, i) in hotels" :value="s.id" :key="i">
          <b-row no-gutters >
            <b-col md="6">
              <b-carousel
                  id="carousel-1"
                  v-model="slide"
                  :interval="2400"
                  controls
                  class="rounded-0"
                  indicators
                  background="#ababab"
                  img-width="1024"
                  img-height="480"
                  style="text-shadow: 1px 1px 2px #333;"
                  @sliding-start="onSlideStart"
                  @sliding-end="onSlideEnd"
              >
          <!-- Text slides with image -->
                  <b-carousel-slide
                      caption="First slide"
                      text="Nulla vitae elit libero, a pharetra augue mollis interdum."
                      img-src="../test-images/flower.jpg"
                  ></b-carousel-slide>

                  <!-- Slides with custom text -->
                  <b-carousel-slide img-src="../test-images/mary.jpg" style="width:500px, height:300px">
                      <h1>Hello world!</h1>
                  </b-carousel-slide>

                  <!-- Slides with image only -->
                  <b-carousel-slide img-src="../test-images/uchiha.jpg"></b-carousel-slide>

                  <!-- Slides with img slot -->
                  <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
                  <b-carousel-slide>
                      <template v-slot:img>
                      <img
                          class="d-block img-fluid w-100"
                          width="1024"
                          height="480"
                          src="../test-images/flower.jpg"
                          alt="image slot"
                      >
                      </template>
                  </b-carousel-slide>

                  <!-- Slide with blank fluid image to maintain slide aspect ratio -->
                  <b-carousel-slide caption="Blank Image" img-blank img-alt="Blank image">
                      <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eros felis, tincidunt
                      a tincidunt eget, convallis vel est. Ut pellentesque ut lacus vel interdum.
                      </p>
                  </b-carousel-slide>
              </b-carousel>
            </b-col>
            <b-col md="6">
              <b-card-body class="" :title="h.name">
                <b-card-text>{{h.address}}</b-card-text>
                <b-card-text>{{h.phoneNo}}</b-card-text>
                <b-button @click="$router.push(`/hotel-room/${h.id}`)">Book Hotel</b-button>
              </b-card-body>
            </b-col>
          </b-row>
        </b-card>
        <br>
      </div>
    </b-row>

    <b-table
      id="my-table"
      :items="items"
      :per-page="perPage"
      :current-page="currentPage"
      small
    ></b-table>
    <b-pagination
      v-model="currentPage"
      :total-rows="rows"
      :per-page="perPage"
      aria-controls="my-table"
    ></b-pagination>

    <p class="mt-3">Current Page: {{ currentPage }}</p>

  </div>
</template>

<script>
  export default {
    data() {
      return {
        hotels:[],
        perPage: 3,
        currentPage: 1,
        slide: 0,
        sliding: null,
        items: [
          { id: 1, first_name: 'Fred', last_name: 'Flintstone' },
          { id: 2, first_name: 'Wilma', last_name: 'Flintstone' },
          { id: 3, first_name: 'Barney', last_name: 'Rubble' },
          { id: 4, first_name: 'Betty', last_name: 'Rubble' },
          { id: 5, first_name: 'Pebbles', last_name: 'Flintstone' },
          { id: 6, first_name: 'Bamm Bamm', last_name: 'Rubble' },
          { id: 7, first_name: 'The Great', last_name: 'Gazzoo' },
          { id: 8, first_name: 'Rockhead', last_name: 'Slate' },
          { id: 9, first_name: 'Pearl', last_name: 'Slaghoople' },
          { id: 10, first_name: 'Pearly', last_name: 'Slaghoopler' },
          { id: 11, first_name: 'Pearls', last_name: 'Slaghooples' },
          { id: 12, first_name: 'Pearlsly', last_name: 'Slaghoopled' }
        ]
      }
    },
    methods:{
        onSlideStart(slide) {
        this.sliding = true
      },
      onSlideEnd(slide) {
        this.sliding = false
      },
    },
    computed: {
      rows() {
        return this.items.length
      }
    },

    async created(){
      const id = parseInt(this.$route.params.id)
      console.log(id)
      if(!id){
        return this.$router.push('/notfound')
      }
      const res = await this.callApi('get', `/app/getHotels/${id}`)
      if(res.status == 200){
        console.log(res.data)
        this.hotels = res.data
        this.s('Success')
      }else{
        this.e('Something went wrong')
      }
    }
  }
</script>


<style scoped>
  .h-card{
    max-width: 1000px; 
    margin-bottom: 20px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  }
</style>