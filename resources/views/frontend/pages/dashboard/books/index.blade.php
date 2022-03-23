@section('page-title')
    All Books
@endsection


@extends('frontend.pages.dashboard.layouts.main')

@section('user-section')

    <a href="{{ route('user.book.create') }}" style="max-width: 180px"
       class="button mt-8 w-100 mr-2 mb-2 flex bg-theme-9 text-white">
        <svg class="mr-2"
             xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
             class="feather feather-plus-circle mx-auto">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="16"></line>
            <line x1="8" y1="12" x2="16" y2="12"></line>
        </svg>
        Create a Book </a>
    <table class="table table-report -mt-2" id="example">
        <thead>
        <tr>
            <th class="whitespace-no-wrap" width="10%">#</th>
            <th class="whitespace-no-wrap">Book Name</th>
            <th class="whitespace-no-wrap">Author</th>
            <th class="whitespace-no-wrap">Categories</th>
            <th class="whitespace-no-wrap">Selling Price</th>

            <th class="text-center whitespace-no-wrap">ACTIONS</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($books as $book)
            <tr class="intro-x">
                <td class="w-40">
                    <div class="flex">
                        {{$loop->index+1}}

                    </div>
                </td>
                <td>
                    <span href="" class="font-medium whitespace-no-wrap">{{ $book->book_name }}</span>
                    @if($book->is_sold)<span class="p-2 rounded-lg bg-green-500">Sold</span> @endif

                </td>
                <td>
                    <span href="" class="font-medium whitespace-no-wrap">{{ $book->author }}</span>

                </td>
                <td>

                    @foreach($book->categories as $x)
                        <span
                            class="py-0 px-2 rounded-full text-xs bg-green-200 text-gray-600 cursor-pointer ml-auto truncate">{{ $x->category_name}} </span>
                    @endforeach
                </td>
                <td>
                    <span href="" class="font-medium whitespace-no-wrap">{{ $book->sell_price }} ৳</span>

                </td>
                <td class="table-report__action w-56">
                    <div class="flex justify-center items-center">
                        <a class="flex items-center mr-3" href="{{ route('user.book.edit', $book->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg>
                            Edit </a>
                        @if(!$book->is_sold)
                        <a class="flex items-center mr-3" href="{{ route('user.book.show', $book->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg>
                            Sold </a>
                        @endif

                        <a class="flex items-center text-theme-6"
                           href="{{ route('dashboard.book.destroy', $book->id) }}"
                           onclick="event.preventDefault(); document.getElementById('delete-form-{{ $book->id }}').submit()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                            Delete </a>
                        <form id="delete-form-{{$book->id}}" action="{{ route('dashboard.book.destroy', $book->id) }}"
                              method="POST" style="display: none">
                            @method('DELETE')
                            @csrf
                        </form>

                    </div>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
