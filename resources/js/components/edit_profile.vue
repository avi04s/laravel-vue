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

                                <span class="heading">Employee Photo</span>
                                <b-input-group class="mb-3">
                                    <b-form-file  type="" v-model="file" :state="Boolean(file)"
                                        placeholder=""
                                        drop-placeholder="Drop file here..." ref="form.file" v-on:change="previewImage">
                                    </b-form-file>
                                </b-input-group>

                                <div class="mt-3">
                                    Selected file: {{ file ? file.name : "" }}
                                </div>
                            </div>


                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
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
        data() {
            return {

                name: null,
                email: null,
                file: null

            }
        },
        methods: {
            login(e) {
                console.log(this.form);
                this.axios.post("http://127.0.0.1:8000/api/register", {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                    })
                    .then((response) => {

                        if (response.data.error) {
                            this.$toastr.e("Error", response.data.error);
                        } else if (response.data.success) {
                            localStorage.setItem("name", response.data.user.name);
                            localStorage.setItem("email", response.data.user.email);
                            // console.log("User",response.data.user.email);
                            localStorage.setItem("token", response.data.token);


                        }

                        //console.warn("response.success",response.data.error );
                        //this.$toastr.e("Success", "Hello world");
                    });

                e.preventDefault();
            }
        }
    };

</script>
