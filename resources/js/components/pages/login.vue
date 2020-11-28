<template>
    <div class="form-s">
        <b-container>
            <b-col align-self="center" cols="8">
                <h1>Login into Your Account</h1>
                <p>Fill all fields</p>
                <b-form class="form-in" @submit="submitForm" >
                    <b-form-group
                    label="E-mail"
                    description="if you are worried about privacy, we will never share your private details with anyone."
                    >
                    <b-form-input 
                    required
                    v-model="form.email"
                    type="email"
                    placeholder="Enter your E-mail Address"/>
                    </b-form-group>
                    <b-form-group
                    label="Password"
                    description="The password is required to safeguard your account."
                    >
                    <b-form-input 
                    required
                    v-model="form.password"
                    type="password"
                    placeholder="Enter your Password"/>
                    </b-form-group>
                    <div class="space"/>
                    <b-button type="submit" variant="warning">Submit</b-button>
                    <b-button to="/" variant="danger">Go back to Homepage</b-button>
                </b-form>
            </b-col>
        </b-container>
    </div>
</template>

<script>
export default {
  computed:{
      nearState(){
          return this.form.nearBstop.length <5 ? false: true
      }
  },
  data(){
    return{
      form:{
          email:'',
          password:'',
      },
    }
  },
    methods:{
        async submitForm(event){
        event.preventDefault()
            const res = await this.callApi('post', '/app/adminLogin', this.form)
            if (res.status===200) {
                window.location ='/admin'
            } else {
            console.log('error in passwords')
        }
        }
    }
}
</script>

<style scoped>
.form-s{
    /* text-align: center; */
    padding-top: 20px;
    padding-left: 18rem;
}
h1{
    text-align: center;
}
p{
    text-align: center;
}
.form-in{
    padding-top: 10px;
}
.space{
    padding-bottom: 20px;
}
</style>