<template>
    <div class="container" style="padding-top:80px">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-12"></div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">

                          <div class="text-center">
                            <h5>Sign Up</h5>
                            <hr>
                        </div>

                        <form @submit="login">
                                  <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" v-model="name" />
                               
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" v-model="email" />
                               
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" v-model="password"/>
                            </div>
                                <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" v-model="confirm_password"/>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                            </div>

                               <div class="mt-3">
                                <h5>Have an account? <router-link to="/">Sign In</router-link></h5>
                                  
                            </div>
                          
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-3 col-sm-12"></div>

        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
              
                    name:null,
                    email:null,
                    password:null,
                    confirm_password:null
                
            }
        },
        methods:{
            login(e) {
                console.log(this.form);
                this.axios.post("http://127.0.0.1:8000/api/register",{
                   name:this.name,
                   email:this.email,
                   password:this.password,
                }) 
                .then((response) => {

                    if(response.data.error){
                        this.$toastr.e("Error", response.data.error);
                    }
                    else if(response.data.success){
                        localStorage.setItem("name", response.data.user.name);
                         localStorage.setItem("email", response.data.user.email);
                        // console.log("User",response.data.user.email);
                          localStorage.setItem("token", response.data.token);

                         this.$router.push({ path: "/dashboard" });
                    }

                    //console.warn("response.success",response.data.error );
                    //this.$toastr.e("Success", "Hello world");
                });

                 e.preventDefault();
            }
        }
    };

</script>
