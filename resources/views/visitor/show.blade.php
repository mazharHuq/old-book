@section('page-title')
{{$category->category_name}}
@endsection

@extends('frontend.layouts.main')
@section('front-content')


        @foreach($books as $book)

        @endforeach
        <!--Shop Product-->
            <div class="container pb-16">
                <div class=" bg-gray-200 flex justify-center item-center my-2">
                    <h1 class="text-4xl font-semibold uppercase my-4"> {{$category->category_name}}</h1>
                </div>

                <!--Product Wrapper-->
                <div class="grid grid-cols-4 gap-3">

                 @foreach($books as $book)
                    <!--single Product-->
                    <div class="bg-white overflow-hidden rounded-sm">
                        <!--      Product Image-->
                        <div class="relative group">
                            <img src="{{ URL('storage').'/'.$book->image }}"  style="object-fit: fill;height: 300px ;width: 100%;padding-right: 2px;padding-left: 2px" alt="">
                            <div class="icon absolute bg-black bg-opacity-40  inset-0 flex justify-center items-center space-x-2 opacity-0 group-hover:opacity-100 ">
                                <a class=" text-lg h-9 w-9 bg-primary hover:bg-gray-800 rounded-full text-white flex items-center justify-center " href="">
                                    <i class="fa fa-search"></i>
                                </a>
                                <a class=" text-lg h-9 w-9 bg-primary hover:bg-gray-800 rounded-full text-white flex items-center justify-center " href="">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <!--      Product Image-->

                        <!--Product Price &Info-->
                        <div class="product-info">
                            <div class="pt-4 pb-2 px-4">
                                <a href="{{route('bookDetails',$book->id)}}">
                                    <h4 class="text-primary hover:text-gray-800 font-semibold  text-xl">{{$book->book_name}}</h4>
                                </a>
                                <div class="flex items-baseline space-x-2 font-roboto mb-2 ">
                                    <p class="text-md font-semibold text-gray-800 "> By {{$book->author}}</p>

                                </div>
                                <div class="flex items-baseline space-x-2 font-roboto mb-2 ">
                                    <p class="text-xl font-semibold text-gray-800 ">{{$book->sell_price}}</p>
                                    <p class="text-sm text-gray-600 line-through">{{$book->buy_price}}</p>
                                </div>

                            </div>
                        </div>
                        <button class=" px-0 border rounded-md text-white bg-primary p-2 w-full border-primary hover:bg-white hover:text-primary group  flex justify-center items-center }">
                            <span class="font-semibold">Add to Cart</span>
                            <span class=" h-6 w-6 border border-primary rounded-full  flex items-center justify-center ml-4 group-hover:border-white ">
                <i class="fa fa-plus"></i>
              </span>
                        </button>
                        <!--Product Price &Info-->

                    </div>
                    <!--single Product End-->
                  @endforeach

                </div>
                <!--Product Wrapper End-->

            </div>
            <!--Shop Product End-->
@endsection

