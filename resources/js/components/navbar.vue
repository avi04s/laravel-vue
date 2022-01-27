<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <i class="fas fa-bars" v-b-toggle.sidebar-1
                    style="padding-top: 2px; padding-right: 10px; color: white"></i>
                <a class="navbar-brand" href="#">Navbar</a>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!--  <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>-->
                </ul>
                <span class="navbar-text"> Hello, {{ this.name }} </span>
            </div>
        </nav>

        <b-sidebar id="sidebar-1" title="Sidebar" shadow>
            <div class="px-1 py-2">
                <ul class="list-group">
                    <li class="list-group-item" role="button">
                        <router-link to="/dashboard">
                            <span> <i class="fas fa-home-lg-alt"></i> </span>
                            <span style="padding-top: 7px; padding-left: 8px">Dashboard</span>
                        </router-link>
                    </li>

                    <li class="list-group-item" type="button" @click="toggle">
                        <router-link to="">
                            <span> <i class="fas fa-cog"></i></span>
                            <span style="padding-top: 7px; padding-left: 8px">Setting</span>
                            <span style="padding-left: 8px; float: right">
                                <i class="fas fa-angle-down"></i>
                            </span>
                        </router-link>
                    </li>




                    <ul class="list-group mt-2" v-if="check" role="button">
                        <li class="list-group-item" role="button">
                            <router-link to="/profile">
                                <span style="padding-left: 20px">
                                    <i class="fas fa-user"></i></span>
                                <span style="padding-top: 7px; padding-left: 8px">Profile</span>
                            </router-link>
                        </li>

                        <li class="list-group-item" role="button">
                            <router-link to="/edit-profile">
                                <span>
                                    <i class="fas fa-user-edit" style="padding-left: 20px"></i></span>
                                <span style="padding-top: 7px; padding-left: 8px">Edit Profile</span>
                            </router-link>
                        </li>

                        <li class="list-group-item" role="button">
                            <router-link to="/change-password">
                                <span>
                                    <i class="fas fa-lock" style="padding-left: 20px"></i></span>
                                <span style="padding-top: 7px; padding-left: 8px">Change Password</span>
                            </router-link>
                        </li>
                    </ul>





                    <li class="list-group-item" v-on:click="logout" role="button">
                        <router-link to="">

                            <span> <i class="fas fa-sign-out-alt"></i> </span>
                            <span style="padding-top: 7px; padding-left: 8px">Logout</span>



                        </router-link>
                    </li>

                </ul>
            </div>
        </b-sidebar>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: localStorage.getItem("name"),
                check: false,
            };
        },
        methods: {
            toggle() {
                this.check = this.check ? false : true;
            },
            logout() {
                if (localStorage.getItem("remember_me") == "true") {
                    localStorage.removeItem("email");
                    this.$router.push({
                        path: "/"
                    });

                } else {

                    this.$session.destroy();
                    localStorage.removeItem("email");
                    localStorage.removeItem("email1");
                    localStorage.removeItem("password");
                    localStorage.removeItem("remember_me");
                    this.$router.push({
                        path: "/"
                    });

                }

            },
        }
    };

</script>

<style scoped>
</style>
