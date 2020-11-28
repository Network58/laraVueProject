export default {
    data(){
        return{

        }
    },

    methods:{

        async callApi(method, url, dataObj ){
            try {
              return await axios({
                    method: method,
                    url: url,
                    data: dataObj
                });
            } catch (e) {
                return e.response
            }
        }, 
        i(msg, title="Info"){
            this.$bvToast.toast(msg,{
                title: title,
                variant: "info",
                solid: true,
            });
         },
        e(msg, title="This is an Error Message"){
            this.$bvToast.toast(msg,{
                title: title,
                variant: "danger",
                solid: true,
            });
         },
        s(msg, title="All Good"){
            this.$bvToast.toast(msg,{
                title: title,
                variant: "success",
                solid: true,
            });
         },
        w(msg, title="This is a Warning"){
            this.$bvToast.toast(msg,{
                title: title,
                variant: "warning",
                solid: true,
                autoHideDelay:4000,
                
            });
         },
    }
}