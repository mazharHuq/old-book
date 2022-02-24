@section('page-title')
    Category Control
@endsection

@extends('-old.layouts.main')
@section('front-content')
        @php
        $categories=\App\Models\Category::all();


        @endphp


            <nav class="bg-gray-800 text-white">
        <div class="container flex">
            <!--All Categories-->
            <div class="items-center bg-primary flex cursor-pointer px-8 py-4 relative group">
          <span class="text-white">
            <i class="fas fa-bars"></i>
          </span>
                <span class="capitalize ml-2 text-white"> All Categories</span>
                <!--Dropsdown-->
                <div class="absolute top-full left-0 w-full  text-red-500 bg-white shadow-md   py-3 divide-y divide-dashed divide-gray-200 opacity-0 group-hover:opacity-100 transition delay-300 invisible group-hover:visible">
                   @foreach($categories as $category)
                        <a href="{{route('') }}" class="flex items-center py-3 px-3 text-gray-800 hover:bg-gray-800 hover:text-blue-50">
                            <i class="fas fa-book mx-4 "></i>
                            <span class="  hover:text-blue-50">{{$category->category_name}} </span>
                        </a>
                    @endforeach


                </div>
                <!--Dropdown-end-->
            </div>
            <!--All Categories End-->

            <!--Link -->
            <div class="flex justify-between flex-grow pl-12 items-center">
                <div class=" flex  items-center text-white  space-x-6 ">
                    <a href="" class=" ">Home</a>
                    <a href="">About Us</a>
                    <a href="">Contact</a>
                </div>
                <a href="#" class=" text-white ">Login/Register</a>
            </div>
        </div>
    </nav>


@endsection
