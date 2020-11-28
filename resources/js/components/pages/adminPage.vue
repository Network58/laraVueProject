<template>
    <div>
      <b-container>
        <b-col align-self="center" cols="8">
          <div>
              <h1>Add new Hotel</h1>
              <p>Fill all fields</p>
                <b-form  @submit="submitHotel">
                    <b-form-group
                    label="Name of the hotel"
                    >
                    <b-form-input 
                    required
                    v-model="form.name"
                    placeholder="Enter the Hotel name"/>
                    </b-form-group>
                    <b-form-group
                    label="E-mail of the hotel"
                    description="This is needed in case a user wishes to submit complains via e-mail. Please, do well to ensure that the e-mail is functional."
                    >
                    <b-form-input 
                    required
                    v-model="form.email"
                    placeholder="Enter the E-mail Address of the Hotel"/>
                    </b-form-group>
                    <b-form-group
                    label="Hotel Address"
                    description="A comprehensive addresss of the hotel"
                    >
                    <b-form-input 
                    required
                    v-model="form.address"
                    placeholder="Enter the Address of the Hotel"/>
                    </b-form-group>
                    <b-form-group
                    label="Nearest Bus Stop"
                    description="Nearest and most popular stop to the Hotel address."
                    >
                    <b-form-input 
                    required
                    v-model="form.nearStop"
                    placeholder="Enter the Nearest Bus-Stop to the Hotel"/>
                    </b-form-group>
                    <b-form-group
                    label="Phone Number"
                    description="The Hotel Telephone phone number is required if there is a need for phone booking, in that case enter the number to help booking."
                    >
                    <b-form-input 
                    required
                    v-model="form.phoneNo"
                    placeholder="Enter the Phone Number of the Hotel"/>
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
                <div class="space"/>
                <b-form  @submit="submitState">
                    <b-form-group
                    label="Enter New State"
                    description="Enter a new state"
                    >
                        <b-form-input
                        v-model="state.stateName"
                        placeholder="Enter new state"/>
                    </b-form-group>
                    <b-button type="submit" variant="info" >Submit State</b-button>
                </b-form>
            </div>
        </b-col>
      </b-container>
    </div>
</template>

<script>
export default {
    data(){
        return{
            form:{
                name:'',
                email:'',
                address:'',
                phoneNo:'',
                state:'',
                state_id:null,
                nearStop:''
            },
            state:{
                stateName:'',
            },
            states:[]
        }
    },
    methods:{
        async submitHotel(event){
            event.preventDefault()
            const res = await this.callApi('post', '/app/submitHotel', this.form)
            if (res.status===201) {
                event.preventDefault()
                this.s('Success')
            }
        },
        async submitState(event){
            event.preventDefault()
            const res = await this.callApi('post', '/app/submitState', this.state)
            if (res.status===200) {
                this.s('Success')
            }
        }
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
.admin-f{
    border-style: solid;
}
.space{
    padding-bottom: 3rem;
}
</style>