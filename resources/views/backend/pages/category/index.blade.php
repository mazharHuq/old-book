@section('page-title')
    Roles Control
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <a href="{{ route('dashboard.category.create') }}" style="max-width: 180px"
       class="button mt-8 w-100 mr-2 mb-2 flex bg-theme-1 text-white"> <svg class="mr-2"
                                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Create a New Role </a>
    <table class="table table-report -mt-2">
        <thead>
        <tr>
            <th class="whitespace-no-wrap" width="10%"></th>
            <th class="whitespace-no-wrap">Category Name</th>

            <th class="text-center whitespace-no-wrap">ACTIONS</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($categories as $category)
            <tr class="intro-x">
                <td class="w-40">
                    <div class="flex">
                        {{$category->id}}

                    </div>
                </td>
                <td>
                    <span href="" class="font-medium whitespace-no-wrap">{{ $category->category_name }}</span>

                </td>
                <td class="table-report__action w-56">
                    <div class="flex justify-center items-center">
                        <a class="flex items-center mr-3" href="{{ route('dashboard.category.edit', $category->id) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit </a>

                        <a class="flex items-center text-theme-6" href="{{ route('dashboard.category.destroy', $category->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit()"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>
                        <form id="delete-form-{{$category->id}}" action="{{ route('dashboard.category.destroy', $category->id) }}" method="POST" style="display: none">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
