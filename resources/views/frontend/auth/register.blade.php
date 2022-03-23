@extends('backend.auth.main')

@section('auth-title')
   Register
@endsection

@section('auth-content')
    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
        <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                Register New Account
            </h2>
            <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. </div>
            @include('backend.layouts.partials.alerts')
            <form method="POST" action="{{ route('user.register.submit') }}">
                @csrf
                <div class="intro-x mt-8 space-y-2">
                    <input type="text" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Name" id="name" name="name" :value="old('name')" required  />

                    <input type="email" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Email" id="email" name="email" :value="old('email')" required  />
                    <input type="tel" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Phone" id="phone" name="phone" :value="old('phone')" required  />

                    <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password" id="password" name="password"
                           required autocomplete="current-password" />
                    <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="confirm Password" id="password" name="password_confirmation"
                           required autocomplete="current-password" />

                </div>
                <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">


                </div>
                <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                    <button class="button button--lg w-full xl:w-32 text-white bg-green-500 xl:mr-3">Sign Up</button>
                </div>
            </form>

        </div>
    </div>
@endsection
