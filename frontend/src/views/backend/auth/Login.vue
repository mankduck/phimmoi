<script>
import axios from '@/config/axios.js';
import { BACKEND_API } from '@/config/constant';

export default {
    data() {        //Khai báo giá trị mặc định cho các trường dữ liệu
        return {
            email: '',     //Khi set giá trị cho email, nó tự động connect với v-model cùng tên
            password: '',
            emailErrorMessage: '',
            passwordErrorMessage: ''
        }
    },
    methods: {         //Khi mình submit form sẽ gọi đến phương thức
        async login() {
            try {

                let object = {
                    email: this.email,
                    password: this.password
                }

                const response = await axios.post(BACKEND_API + 'auth/login', object)           //# tham số nhận vào(url, data, config)
                console.log(response)

                if (response.status == 401) {
                    //401 là trạng thái được trả về từ bên Controller
                    // console.log(response.data.data.email);
                    this.emailErrorMessage = response.data.email
                    this.passwordErrorMessage = response.data.password
                }

            } catch (error) {
                console.log(error);
            }
        }
    }

}

</script>

<template>
    <div class="auth-page-wrapper pt-5">

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">


                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to Velzon.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="" @submit.prevent="login">
                                        <!-- Submit form dùng @submit, vì @dùng để gọi event. Và .prevent để chặn hành vi mặc định của trang web -->

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input type="text" v-model="email" class="form-control" name="email"
                                                id="email" placeholder="Enter username">
                                            <span v-if="emailErrorMessage" class="text-danger">{{ emailErrorMessage[0]
                                                }}</span>
                                        </div>
                                        <!-- Xử lý input không dùng name, dùng v-model -->



                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="auth-pass-reset-basic.html" class="text-muted">Forgot
                                                    password?</a>
                                            </div>
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input v-model="password" type="password" name="password"
                                                    class="form-control pe-5 password-input"
                                                    placeholder="Enter password" id="password-input">
                                                <!-- <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                    type="button" id="password-addon"><i
                                                        class="ri-eye-fill align-middle"></i></button> -->
                                                <span v-if="passwordErrorMessage" class="text-danger">{{
                                                    passwordErrorMessage[0] }}</span>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember
                                                me</label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100">Sign
                                                In</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title">Sign In with</h5>
                                            </div>
                                            <div>
                                                <button type="button"
                                                    class="btn btn-primary btn-icon waves-effect waves-light"><i
                                                        class="ri-facebook-fill fs-16"></i></button>
                                                <button type="button"
                                                    class="btn btn-danger btn-icon waves-effect waves-light"><i
                                                        class="ri-google-fill fs-16"></i></button>
                                                <button type="button"
                                                    class="btn btn-dark btn-icon waves-effect waves-light"><i
                                                        class="ri-github-fill fs-16"></i></button>
                                                <button type="button"
                                                    class="btn btn-info btn-icon waves-effect waves-light"><i
                                                        class="ri-twitter-fill fs-16"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Don't have an account ? <a href="auth-signup-basic.html"
                                    class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->
    </div>
</template>

<style scoped></style>