<template>
    <div class="form-s">
        <b-container>
            <b-col align-self="center" cols="8">
                <h1>Sign up to our service</h1>
                <p>Fill all fields</p>
                <b-form class="form-in" @submit="submitForm" >
                    <b-form-group
                    label="Name"
                    >
                    <b-form-input 
                     required
                     v-model="form.name"
                     placeholder="Enter your name"/>
                    </b-form-group>
                    <!-- <div class="space"/> -->
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
                    label="Home Address"
                    description="Preferably your permanent and personal address."
                    >
                    <b-form-input 
                    required
                    v-model="form.address"
                    placeholder="Enter your Address"/>
                    </b-form-group>
                    <b-form-group
                    label="Nearest Bus Stop"
                    description="Nearest and most popular stop to your address."
                    >
                    <b-form-input 
                    required
                    v-model="form.nearBstop"
                    :state="nearState"
                    placeholder="Enter your Nearest Bus-Stop"/>
                    </b-form-group>
                    <b-form-group
                    label="Phone Number"
                    description="Your phone number is required if there is a need to contact you."
                    >
                    <b-form-input 
                    required
                    v-model="form.phone"
                    placeholder="Enter your Phone Number"/>
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
                    <b-form-group
                    label="Confirm Password"
                    description="Re-enter the password you entered above."
                    >
                    <b-form-input 
                    required
                    v-model="conPassword"
                    type="password"
                    placeholder="Confirm your Password"/>
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
                name:'',
                email:'',
                address:'',
                nearBstop:'',
                phone:'',
                password:'',
            },
            conPassword:'',
        }
    },
    methods:{
        async submitForm(event){
        event.preventDefault()
        if (this.form.password == this.conPassword) {
            const res = await this.callApi('post', '/app/submitForm', this.form)
            if (res.status===200) {
                event.preventDefault()
                console.log('success')
            }
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