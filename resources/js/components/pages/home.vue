<template>
    <div>
        <div class="head">
                <b-row align-h="center">
                    <h2>Search our catalog of hotels</h2>
                </b-row>
                <b-row align-h="center">
                    <b-col cols="10" >
                        <b-form @submit="onSubmit">
                            <b-form-group
                        label="State"
                        description="The State where the Hotel is located is required"
                        >
                        <b-form-select v-model="form.state_id">
                            <template #first>
                                <b-form-select-option disabled :value="null">--Please Choose State--</b-form-select-option>
                            </template>
                                <b-form-select-option v-for="(s, i) in states" :value="s.id" :key="i">{{s.stateName}}</b-form-select-option>
                        </b-form-select>
                        </b-form-group>
                        <div class="space"/>
                        <b-button type="submit">Submit</b-button>
                        </b-form>
                    </b-col>
                </b-row>
        </div>
        <div col-sm="12" class="car">
            <b-container fluid>
                <b-row align-h="center">
                    <b-col cols="10" >
                        <h2>Checkout our Hotspots</h2>
                        <b-carousel
                            id="carousel-1"
                            v-model="slide"
                            :interval="2400"
                            controls
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
                                img-src="./test-images/flower.jpg"
                            ></b-carousel-slide>

                            <!-- Slides with custom text -->
                            <b-carousel-slide img-src="./test-images/mary.jpg" style="width:500px, height:300px">
                                <h1>Hello world!</h1>
                            </b-carousel-slide>

                            <!-- Slides with image only -->
                            <b-carousel-slide img-src="./test-images/uchiha.jpg"></b-carousel-slide>

                            <!-- Slides with img slot -->
                            <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
                            <b-carousel-slide>
                                <template v-slot:img>
                                <img
                                    class="d-block img-fluid w-100"
                                    width="1024"
                                    height="480"
                                    src="./test-images/flower.jpg"
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
                </b-row>   
            </b-container>
        </div>
        <div class="foot">
            <h4>You an Sign-up for easier access and updates on new improvements</h4>
            <b-button to="/signup" variant="outline-warning" >Sign Up</b-button>
        </div>
    </div>
</template>


<script>
  export default {
    data() {
      return {
          form:{
              state_id:null,
          },
        states:[],
        slide: 0,
        sliding: null
      }
    },
    methods: {
      onSlideStart(slide) {
        this.sliding = true
      },
      onSlideEnd(slide) {
        this.sliding = false
      },
      onSubmit(){
        event.preventDefault()
        // console.log(this.form.state_id)
        this.$router.push(`/hotels/${this.form.state_id}`)
      },
    },
    async created(){
       const res = await this.callApi('get', 'app/getStates')
       if (res.status==200) {
        this.states = res.data
       }
   }
  }
</script>

<style scoped>
.head{
    background-color: rgba(17, 17, 17, 0.753);
    color:#fff;
    text-align:center;
    font-weight: 900;
    border-style: solid;
    border-width: medium;
    border-color: rgb(255, 174, 0);
    padding-bottom: 20px;
}
.car{
    padding-top: 50px;
    padding-bottom: 20px;
}
.space{
    padding-bottom: 20px;
}
.foot{
    border-top-style: solid;
    border-top-color: rgb(168, 81, 0);
    border-top-width: 1rem;
    background-color: rgb(0, 0, 0);
    color: #ffffff;
    text-align: center;
    font-weight: 800;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    padding-bottom: 50px;
    padding-bottom: 20px;
}

</style>