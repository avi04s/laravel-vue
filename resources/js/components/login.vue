<template>
    <div class="container" style="padding-top:150px">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-12"></div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h5>Sign In</h5>
                            <hr>
                        </div>
                        <form @submit="login">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" v-model="email" />
                               
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" v-model="password" />
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" v-model="remember_me"  @change="remember" />
                                <label class="form-check-label" for="exampleCheck1" >Remember Me</label>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                            <div class="mt-3">
                                <h5>Create an account <router-link to="/register">Sign Up</router-link></h5>
                                  
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
              
        
                    email: localStorage.getItem("email1"),
                    password: localStorage.getItem("password"),
                    remember_me: localStorage.getItem("remember_me"),
                
            }
        },
        created(){
           // this.remember_me = localStorage.getItem("remember_me");
           // console.log("Hello",this.remember_me);
        },
        methods:{

             remember() {
                //localStorage.removeItem("remember_me");
                //console.warn("hello",this.remember_me);

                if (this.remember_me == true) {
                    localStorage.setItem("remember_me", this.remember_me);
                    localStorage.setItem("email1", this.email);
                    localStorage.setItem("password", this.password);
                } else  {
                    localStorage.setItem("remember_me", this.remember_me);
                    localStorage.removeItem("email1", this.email);
                    localStorage.removeItem("password", this.password);
                }
            },

            login(e) {
                this.axios.post("http://127.0.0.1:8000/api/login",{
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
                          localStorage.setItem("token", response.data.token);
                        // console.log("User",response.data.user.email);

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
