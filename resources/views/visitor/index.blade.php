@section('page-title')
    Category Control
@endsection

@extends('-old.layouts.main')
@section('front-content')


    <div class="bg-cover bg-no-repeat bg-center py-36 " style="background-image: url({{asset('frontend/img/book2.jpg')}}); ">
        <div class="container">
            <h1 class=" font-medium text-6xl text-gray-800 mb-4 capitalize">Best Fruits Shop</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis dolorembr <br>
                reiciendis temporibus explicabo nobis.</p>
            <button class="p-3 bg-primary border rounded-md mt-4 text-white border-primary hover:bg-white hover:text-primary transition delay-300">Start Buying</button>
        </div>
    </div>
    <div class="feature-wrapper grid grid-cols-3 gap-6 mx-auto w-10/12 justify-center py-16  ">
        <div class="single-wrapper flex items-center justify-center  py-6 bg-gray-50  border-red-200 border-4 shadow-xl rounded-xl gap-5">
            <img src="{{asset('frontend/img/sell-product-svgrepo-com (1).svg')}}" class="w-24 h-24  text-primary">
            <div>
                <h4 class="font-bold text-center">Post An Ad </h4>
                <p>Sell Your Old Books</p>
            </div>
        </div>
        <div class="single-wrapper flex items-center justify-center  py-6 bg-gray-50 border-red-200 border-4 shadow-xl rounded-xl gap-5">
            <img src="{{asset('frontend/img/exchange.png')}}" class="w-24 h-24 object-cover text-primary">
            <div>
                <h3 class="font-bold text-center">SELL BOOKS </h3>
                <p>To Customer</p>
            </div>
        </div>
        <div class="single-wrapper flex items-center justify-center  py-6 bg-gray-50 border-red-200 border-4 shadow-xl rounded-xl gap-5">
            <img src="{{asset('frontend/img/money-svgrepo-com.svg')}}" class="w-24 h-24  text-primary">
            <div>
                <h3 class="font-bold text-center">SELL BOOKS </h3>
                <p>To Customer</p>
            </div>
        </div>

    </div>
    <img  >
@endsection

