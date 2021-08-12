@section('page-title')
    Create New Book
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('dashboard.book.store') }}" method="POST">
                @csrf

            <div class="intro-y box p-5">
                <div>
                    <label>Product Name</label>
                    <input type="text" class="input w-full border mt-2" placeholder="Input book name" name="book_name">
                </div>
                <div class="mt-3">
                    <label>Category</label>
                    <div class="mt-2">
                        <select data-placeholder="Select Category " name="categories_id[]" class="select2 w-full" multiple>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <label>Author  Name</label>
                    <input type="text" class="input w-full border mt-2" placeholder="Input book author name" name="author">
                </div>
                <div class="mt-3">
                    <label>Book Details</label>
                    <div class="mt-2">
                        <textarea data-feature="basic" class="summernote" name="details" placeholder=""> </textarea>
                    </div>
                </div>
                <div class="mt-3">
                    <label>Used</label>
                    <div class="relative mt-2">
                        <input type="number" class="input pr-12 w-full border col-span-4" placeholder="How many days used?"  name="used_days">
                        <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">days</div>
                    </div>
                </div>
                <div class="mt-3">
                    <label>Buying Price</label>
                    <div class="relative mt-2">
                        <input type="number" class="input pr-12 w-full border col-span-4" placeholder="New price"  name="original_price">
                        <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">BDT</div>
                    </div>
                </div>
                <div class="mt-3">
                    <label>Selling Price</label>
                    <div class="relative mt-2">
                        <input type="number" class="input pr-12 w-full border col-span-4" placeholder="Selling  price"  name="resell_price">
                        <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">BDT</div>
                    </div>
                </div>


                <div class="text-right mt-5">
                    <button type="button" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                </div>
            </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>

@endsection
