<template>
    <div>

        <div class="container-fulid" style="margin-top:-30px !important;">

            <div class="row">
                <div class="col-12">
                    <navbar></navbar>
                </div>
            </div>
        </div>


        <div class="container  mt-5">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="card" style="">
                        
                        <div class="card-body text-center">
                            <h5>User Profile</h5>
                            <img src="" class="card-img-top" alt="...">
                            <br>
                            <span> <b>Name: </b> {{this.name}}</span><br>
                            <span> <b>Email: </b> {{this.email}}</span><br>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
    import navbar from "./navbar.vue";
    export default {

        data(){
           return{
                name:null,
                email:null,
                file:null
           }
        },
        components: {
            navbar,
        },
        created() {
            this.getUser();
        },

        methods: {
            getUser() {

                var token = "Bearer " + localStorage.getItem("token");


                axios.get('http://127.0.0.1:8000/api/get-user', {
                        headers: {
                            Authorization: token
                        }
                    })

                    .then(res => {
                        console.warn("response", res);

                        this.name = res.data.user.name;
                        this.email = res.data.user.email;
                        //return res.date
                    })
                    .catch(err => {
                        console.log("EError", err)
                    })




            }
        }
    }

</script>
