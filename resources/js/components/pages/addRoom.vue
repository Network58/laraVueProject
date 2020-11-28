<template>
  <div>
    <b-container>
      <b-col align-self="center" cols="8">
        <div>
          <h1>Add a new Room</h1>
          <p>Fill all fields</p>
          <b-form  @submit="submitHotel">
            <b-form-group
            label="Type of Room"
            >
            <b-form-input 
            required
            v-model="form.type"
            placeholder="Enter the Type of the room"/>
            </b-form-group>
            <b-form-group
            label="Utilities"
            description="Select the Utilities available in the room."
            >
            <b-form-input 
            required
            v-model="form.utilities"
            placeholder="Enter the E-mail Address of the Hotel"/>
            </b-form-group>
            <b-form-group
            label="Room Pricing"
            description="A comprehensive pricing of the Room. Preferably, the price per night."
            >
            <b-form-input 
            required
            v-model="form.price"
            placeholder="Enter the Price of the Room"/>
            </b-form-group>
            <b-form-group
            label="State"
            description="The State where the Hotel is located is required"
            >
            <b-form-select v-model="form.state_id">
                <template #first>
                    <b-form-select-option disabled :value="null">--Please Choose Hotel--</b-form-select-option>
                </template>
                    <b-form-select-option v-for="(s, i) in states" :value="s.id" :key="i">{{s.stateName}}</b-form-select-option>
            </b-form-select>
            </b-form-group>
            <b-button type="submit" variant="warning">Submit</b-button>
            <b-button to="/" variant="danger">Go back to Homepage</b-button>
            <a href="/logout"><b-button variant="danger">Logout</b-button></a>
          </b-form>
        </div>
      </b-col>
    </b-container>
  </div>
</template>

<script>
export default{
  data(){
    return{
      form:{
        type:'',
        price:'',
        utilities:'',
        
      }
    }
  },
  methods:{
    async onSubmit(event){
      event.preventDefault()
      const res = await this.callApi('post', '/app/addRoom', this.form)
      console.log(res)
      if (res.status == 200) {
        this.s('Room added successfully')
      }else{
        this.e(res.data.msg)
      }
    }
  }
}
</script>

<style scoped>

</style>