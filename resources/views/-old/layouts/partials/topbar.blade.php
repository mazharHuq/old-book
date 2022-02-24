
    <div class="container">
        <header class="bg-white shadow-sm py-2">
            <div class="container flex justify-between items-center">
                <!-- logo -->
                <a href="#">
                    <img src="{{asset('frontend/img/logo2.png')}}" class="w-32" alt="" />
                </a>

                <!--SearchBar-->
                <div class="w-full max-w-xl relative flex">
          <span class="absolute left-4 top-3 text-lg text-gray-400">
            <i class="fas fa-search"></i>
          </span>
                    <input
                        type="text"
                        class="
              w-full
              border border-primary
              pl-12
              py-3
              pr-3
              border-r-0
              rounded-l-md
              focus:outline-none
            "
                    />
                    <button
                        class="
              bg-primary
              border border-primary
              text-white
              rounded-r-md
              px-2
              border-l-0
              hover:bg-transparent hover:text-primary
              transition
            "
                    >
                        Search
                    </button>
                </div>

                <!--Icons-->
                <div class="items-center flex space-x-4">
                    <a
                        href="#"
                        class="
              relative
              text-center text-gray-700
              hover:text-primary
              transition
            "
                    >
                        <div class="text-2xl">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="text-xs leading-3">Wishlist</div>
                        <span
                            class="
                text-xs
                rounded-full
                right-0
                -top-1
                items-center
                justify-center
                absolute
                text-white
                bg-primary
                w-5
                h-5
              "
                        >7</span
                        >
                    </a>

                    <a
                        href="#"
                        class="
              relative
              text-center text-gray-700
              hover:text-primary
              transition
            "
                    >
                        <div class="text-2xl">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <div class="text-xs leading-3">Cart</div>
                        <span
                            class="
                text-xs
                rounded-full
                -right-3
                -top-1
                items-center
                justify-center
                absolute
                text-white
                bg-primary
                w-5
                h-5
              "
                        >7</span
                        >
                    </a>

                    <a
                        href="#"
                        class="
              relative
              text-center text-gray-700
              hover:text-primary
              transition
            "
                    >
                        <div class="text-2xl">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="text-xs leading-3">User</div>
                    </a>
                </div>
            </div>
        </header>


</div>
