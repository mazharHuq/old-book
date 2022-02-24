@extends('frontend.main')
@section('main-section')
    @php
        $categories=\App\Models\Category::all();
        $count=0;

    @endphp
    <!-- Category Details -->
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="category-details col-10 shadow p-3 my-4" >
                <!-- category details topbar -->
                <div class="topbar-category d-flex justify-content-between" >
                    <div class="div d-flex " style="justify-content: space-between;">
                        <div class="location-details ">
                            <i class="fas fa-map-marker-alt fa-lg" style="color: #149777;"></i>&nbsp;<span>Select Location</span>
                        </div>
                        <div class="category-select  " style=" margin-left: 3rem;">
                            <i class="fas fa-tag fa-lg color-primary" ></i>&nbsp;<span>{{$category->category_name}}</span>
                        </div>
                    </div>
                    <div class="search-bar">
                        <input type="text" class="p-2" placeholder="What are you looking for?">
                        <button class="btn " >Search</button>
                    </div>
                </div>
                <!-- category details topbar End -->


                <!-- Category maiin Details -->
                <div class="row">
                    <!-- Category Details Siderbar -->
                    <div class="col-3 sidebar-category p-4">
                        <div class="sidebar-item p-2 b-b">

                            <div class="">
                                <span>
                                    Sort Result By
                                </span>
                                <select name="" id="" style="width: 100%;">
                                    <option value="">Newest </option>
                                </select>
                            </div>
                            <div class="mt-5">
                                <span>
                                    Sort Result By
                                </span>
                                <select name="" id="" style="width: 100%;">
                                    <option value="">Newest </option>
                                </select>
                            </div>
                        </div>
                        <div class=" p-2">
                            <span>
                                Category
                            </span>
                            <ul>
                                @foreach($categories as $category)
                                <li><a href="{{route('visitor.show',$category->id)}}" style="text-decoration: none;color: black"><span>{{$category->category_name}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <!-- Category Details sidebar End -->
                    <!-- Category Details main bar Start  -->
                    <div class="col-8 p-4">
                        <div class="top-main-category">
                            <h4>{{$category->category_name}} Book Sell On Bangladesh</h4>
                            <small>Showing Result of 1-25 of {{$book_count}}  Books</small>
                        </div>
                        <div class="category-main-list row">
                            @foreach($books as $book)
                            <!-- Single Book List Begin -->
                            <div class="single-category-book col-12 p-2 shadow b-b d-flex ">
                                <img src="{{ URL('storage').'/'.$book->image }}" alt="" width="40%" height="150px" style="object-fit: contain;background: rgb(233, 231, 231);">
                                <div class="p-2 relative w-full">
                                    <a href="{{route('bookDetails',$book->id)}}"> <h4>{{$book->book_name}}</h4></a>
                                    <h6>by Md. Humayun Kabir</h6>
                                    <span class="color-primary">Tk {{$book->sell_price}} </span>
                                    <span class="bottom-left"> {{$book->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                            <!-- Single Book List End -->
                            @endforeach





                        </div>
                    </div>
                    <!-- Category Details main bar End -->


                </div>

                <!-- Category maiin Details -->





            </div>
        </div>
    </div>

    <!-- Category Details -->



@endsection
