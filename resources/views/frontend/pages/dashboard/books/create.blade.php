@section('page-title')

    @isset($book)
        Update
    @else
    Create
    @endisset

    New Book
@endsection


@extends('frontend.pages.dashboard.layouts.main')

@section('user-section')
    @include('backend.layouts.partials.alerts')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form @isset($book) action="{{ route('user.book.update',$book->id) }} action="{{ route('user.book.store') }}  @else action="{{ route('user.book.store') }}   @endif"  method="POST" enctype="multipart/form-data">
                @csrf
                @isset($book)
                    @method('PUT')

                    @endisset

            <div class="intro-y box p-5">
                <div>
                    <label>Product Name</label>
                    <input type="text" class="input w-full border mt-2" placeholder="Input book name" @isset($book) value="{{$book->book_name}}" @else value="{{old('book_name')}}" @endisset name="book_name">
                </div>
                @if(isset($book))


                    @php
                        $category_arr=[];

                        foreach ($book->categories as $cat )
                        {
                            array_push($category_arr,$cat->id);
                        }

                    @endphp
                @endif
                <div class="mt-3">
                    <label>Category</label>
                    <div class="mt-2">
                        <select data-placeholder="Select Category " name="categories_id[]" class="select2 w-full" multiple>

                            @foreach ($categories as $category)
                                <option  @if(isset($books) && in_array($category->id,$category_arr)) selected @endif value="{{ $category->id }}" >{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <label>Author  Name</label>
                    <input required  @isset($book) value="{{$book->author}}" @else value="{{old('book_name')}}" @endisset type="text" class="input w-full border mt-2" placeholder="Input book author name" name="author">
                </div>
                <div class="mt-3">
                    <label>Book Details</label>
                    <div class="mt-2">
                        <textarea data-feature="basic" class="summernote" name="details" placeholder="" required> @isset($book) {{$book->details}}" @else {{old('details')}} @endisset </textarea>
                    </div>
                </div>

                <div class="intro-y col-span-12 lg:col-span-6">
                    <div>
                        <label>Main Image</label>
                        @isset($book)
                        <img src="{{ URL('storage').'/'.$book->image }}" alt="" style="height: 200px!important;">

                        @endisset
                        <input type="file" name="main_image" class="input w-full border mt-2" placeholder="Main Challenge Image">
                    </div>
                </div>
                <div class="mt-3">
                    <label>Used</label>
                    <div class="relative mt-2">
                        <input value="@isset($book){{$book->used}}@else{{old('used')}} @endisset"  type="number" class="input pr-12 w-full border col-span-4" placeholder="How many days used?"  name="used">
                        <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">days</div>
                    </div>
                </div>
                <div class="mt-3">
                    <label>Buying Price</label>
                    <div class="relative mt-2">
                        <input value="@isset($book){{$book->buy_price}}@else{{old('buy_price')}}@endisset" type="number" class="input pr-12 w-full border col-span-4" placeholder="New price"  name="buy_price">
                        <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">BDT</div>
                    </div>
                </div>
                <div class="mt-3">
                    <label>Selling Price</label>
                    <div class="relative mt-2">
                        <input type="number" class="input pr-12 w-full border col-span-4" placeholder="Selling  price" value="@isset($book){{$book->sell_price}}@else{{old('sell_price')}} @endisset"  name="sell_price">
                        <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">BDT</div>
                    </div>
                </div>


                <div class="text-right mt-5">
                    <button type="button" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-24 bg-theme-3 text-white">
                        @isset($book) Update @else Save @endisset
                       </button>
                </div>
            </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>

@endsection
