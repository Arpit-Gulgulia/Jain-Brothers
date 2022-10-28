@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        @if(Session::has('message'))
            <p class="alert alert-info text-center">{{ Session::get('message') }}</p>
        @endif

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Categories List</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a href="{{ route('admin.category.index', ['consumer' => 'men']) }}"  class="active btn btn-sm btn-outline-secondary">Men</a>
                        <a href="{{ route('admin.category.index', ['consumer' => 'women']) }}"  class="btn btn-sm btn-outline-secondary">Women</a>
                        <a href="{{ route('admin.category.index', ['consumer' => 'kids']) }}"  class="btn btn-sm btn-outline-secondary">Kids</a>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Add New Category
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('admin.category.create', ['consumer' => 'men']) }}">Men</a>
                        <a class="dropdown-item" href="{{ route('admin.category.create', ['consumer' => 'women']) }}">Women</a>
                        <a class="dropdown-item" href="{{ route('admin.category.create', ['consumer' => 'kids']) }}">Kids</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
            @if(count($categories) > 0)
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Category Id</th>
                        <th>Category Name</th>
                        <th>Category Level</th>
{{--                        <th>Consumer Type</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->category_id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->parent_id }}</td>
{{--                            <td>{{ $category->person->name }}</td>--}}
                            <td>
                                <a href="{{ route('admin.category.edit', ['id' => $category->category_id]) }}">
                                    <span data-feather="edit"></span>
                                </a>
                                <a href="{{ route('admin.category.destroy', ['id' => $category->category_id]) }}"
                                   onclick="event.preventDefault(); document.getElementById('category-destroy-{{ $category->category_id }}').submit();">
                                    <span data-feather="delete"></span>
                                    <form id="category-destroy-{{ $category->category_id }}"
                                          action="{{  route('admin.category.destroy', ['id' => $category->category_id]) }}"
                                          method="POST"
                                          style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <div class="w-25 mx-auto text-dark pl-lg-5">
                {{ $categories->links() }}
            </div>
            @else
                <p class="alert alert-info text-center mx-auto w-50">
                    No Category found in database!
                </p>
            @endif
        </div>
    </div>
@endsection
