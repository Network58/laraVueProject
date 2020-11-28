<template>
  <div>
    <b-button @click="addRoom" :disabled="isLoading" :loading="isLoading">{{isLoading ? 'Loading...' : 'Add Rooms'}}</b-button>
  </div>
</template>

<script>
export default{
  data(){
    return{
      data:{
        id:null
      },
      isLoading:false
    }
  },
  methods:{
    async addRoom(){
      this.isLoading = true
      const res = await this.callApi('get', '/app/checkAdmin')
      if(res.status == 401){
        this.isLoading = false
        this.e(res.data.msg)
      }
      if(res.status == 200){
        this.isLoading = false
        this.s(res.data.msg)
        this.$router.push(`/add-room/${this.data.id}`)
      }
    }
  },


  async created(){
    const id = parseInt(this.$route.params.id)
    this.data.id = id
    console.log(this.data.id)
    if(!id){
      return this.$router.push('/')
    }
    // const res = await this. callApi('get', '/app/getRooms')
  }
}
</script>

<style scoped>

</style>