@extends('frontend.main')
@section('searchbar')
    @include('frontend.layouts.searchbar')

@endsection
@section('main-section')
    <div class="container" style="z-index: 1!important;">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-9">
                <!-- Category Start Here  -->

                <div class=" p-4 shadow ">
                    @php
                        $categories=\App\Models\Category::all();
                        $count=0;

                    @endphp
                    <b >Browse items by category<b>
                        <div class="row mt-4 category " >
                            @foreach($categories as $category)
                            <div class="col-md-4 d-flex">
                                <div >
                                    <i class="fas fa-journal-whills fa-7x text-danger"></i>
                                </div>
                                <div class="p-3">
                                    <a href="{{route('visitor.show',$category->id)}}"><B>{{$category->category_name}}</B></a>
                                    <br>

                                    {{\App\Models\Category::countBook($category->id)}}
                                </div>
                            </div>
                            @endforeach
                        </div>


                </div>
                
                <!-- Category End Here  -->

                <!-- Extra Info  -->
                <div class="container">
                    <div class=" extra mt-4 shadow p-4 row rounded">
                        <div class="money d-flex col-6" style="border-right:1px solid black;">
                            <span><i class="fas fa-hand-holding-usd fa-7x"></i></span>
                            <div class="p-3">
                                <h4>Start making money!</h4>
                                <span>Do you have something to sell?<br>
                  Post your first ad  and start making money!</span><br>
                                <button class="btn btn-warning mt-2"><i class="fa fa-plus-circle"></i> Post Your Ad For Free!</button>

                            </div>
                        </div>
                        <div class="money d-flex col-6 " >
                            <span><i class="fas fa-hand-holding-usd fa-7x"></i></span>
                            <div class="p-3">
                                <h4>Start making money!</h4>
                                <span>Do you have something to sell?<br>
                  Post your first ad  and start making money!</span><br>
                                <button class="btn btn-warning mt-2"><i class="fa fa-plus-circle"></i> Post Your Ad For Free!</button>

                            </div>
                        </div>

                    </div>
                </div>

                <!-- Delivery Container -->
                <div class="container">
                    <div class="row shadow p-4 mt-4">
                        <div class="col-4" style="color:blueviolet;">
                            <i class="fas fa-journal-whills fa-7x"></i>

                        </div>
                        <div class="col-8 color-primary" >
                            <h3>  <div class="col-md-8">
                                    Bangladesh First Ever Book Exchanging Shop .
                                    Share Knowledge and lets make a bright future
                                </div></h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>



@endsection
