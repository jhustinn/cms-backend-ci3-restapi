<div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">

                <span class="text-white text-lg ml-3"> Project<span class="font-medium"> Akhir</span> </span>
            </a>
            <div class="my-auto">
                <!-- <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">-->
                <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/6 -mt-16 w-6"
                    src="<?= base_url('assets/') ?>images/smkn2kra-removebg-preview.png">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    Admin
                    <br>
                    CMS
                </div>
                <div class="-intro-x mt-5 text-lg text-white">Sign in</div>
            </div>
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div
                class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <form id="login">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Sign In
                    </h2>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="intro-x mt-8">
                        <input required type="email"
                            class="intro-x login__input input input--lg border border-gray-300 block" name="email"
                            placeholder="Email">
                        <input required type="password"
                            class="intro-x login__input input input--lg border border-gray-300 block mt-4"
                            name="password" placeholder="Password">
                    </div>
                    <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">

                        <a class="cursor-pointer" id="forgotPasswordModalBtn">Forgot Password?</a>
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button type="submit"
                            class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Login</button>
                    </div>
            </div>
            </form>
        </div>
        <!-- END: Login Form -->
    </div>
</div>

<div class="modal" id="verifyModal">
    <div class="modal__content relative"><a data-dismiss="modal" href="javascript:;"
            class="absolute right-0 top-0 mt-3 mr-3 btn-close"> <i data-feather="x" class="w-8 h-8 text-gray-500"></i>
        </a>

        <div class="p-5 text-center">
            <div class="text-2xl mt-5">Your email has not been activated.</div>
            <div class="text-gray-600 mt-2">
            </div>
            <form id="verifyEmail">
                <input type="hidden" name="emailVerify" id="emailVerify">
                <button id="verifEmailBtn" type="submit"
                    class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Activate
                    Email</button>
        </div>
        </form>

        <!-- <div class="flex items-center text-gray-700 mt-2"> </div> -->

    </div>
</div>
<div class="modal" id="loadingModal">
    <div class="modal__content relative">
        <div class="flex justify-center items-center p-10">

            <svg width="25" viewBox="-2 -2 42 42" xmlns="http://www.w3.org/2000/svg" stroke="rgb(45, 55, 72)"
                class="w-8 h-8">
                <g fill="none" fill-rule="evenodd">
                    <g transform="translate(1 1)" stroke-width="4">
                        <circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
                        <path d="M36 18c0-9.94-8.06-18-18-18">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18"
                                dur="1s" repeatCount="indefinite"></animateTransform>
                        </path>
                    </g>
                </g>
            </svg>

        </div>
    </div>

    <!-- <div class="flex items-center text-gray-700 mt-2"> </div> -->

</div>
</div>

=


<div class="modal" id="forgotPasswordModal">
    <div class="modal__content relative"> <a data-dismiss="modal"
            class="cursor-pointer absolute right-0 top-0 mt-2 mr-3">
            <i data-feather="x" class="w-8 h-8 text-gray-500"></i>
        </a>
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">Forgot your password?</h2>
        </div>
        <form id="forgotPassword">
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12 sm:col-span-12">
                    <input type="email" class="input w-full border mt-2 flex-1" id="emailForgot"
                        placeholder="Enter Your Email">
                </div>
                <button type="submit" id="forgotPasswordBtn"
                    class="button w-24 mr-1 mb-2 bg-theme-1 text-white inline-flex items-center">
                    Send Email
                </button>
                <!-- <button type="submit" class="button w- bg-theme-1 text-white">Send Email</button> -->
            </div>
        </form>
    </div>