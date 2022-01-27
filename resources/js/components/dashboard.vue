<template>

    <div>

        <div class="container-fulid" style="margin-top:-30px !important;">

            <div class="row">
                <div class="col-12">
                    <navbar></navbar>
                </div>
            </div>
        </div>


        <div class="container mt-5">
            <div class="row">

                <div class="col-12">
                    <div class="card text-white bg-dark mb-3 text-center" style="">
                        <div class="card-body">
                            <h5 class="card-title">Login Details</h5>

                            <span>Upload Photo</span> <br>
                            <img src="" alt="Profile Photo"> <br>
                            Hello, {{this.name}} <br>
                            Your Register Email : {{this.email}}




                           
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
        mounted() {
            console.log("Dashboard Component.");
        },
        components: {
            navbar,
        },

        data(){
          return{
            name:localStorage.getItem("name"),
            email:localStorage.getItem("email"),
          }
        }
    };

</script>
