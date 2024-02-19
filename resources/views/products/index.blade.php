@extends('layouts/app')

@section('content')
    <div class="my-3">
        @if(isset($category))
            <h1>Products in {{ $category->name }} Category</h1>
        @else
            <h1>All Products</h1>
        @endif
        <form method="get" action="{{ url('/products') }}">


            <div class="bg-light form-control d-flex justify-content-between flex-wrap rounded-0">

                <div class="">
                    <label for="price_min">Min Price:</label>
                    <input type="number" name="price_min" value="{{ request('price_min') }}" class="form-control">
                </div>

                <div class="">
                    <label for="price_max">Max Price:</label>
                    <input type="number" name="price_max" value="{{ request('price_max') }}" class="form-control">
                </div>

                <div class="">
                    <label for="name">Product Name:</label>
                    <input type="text" name="name" value="{{ request('name') }}" class="form-control">
                </div>

                <div class="">
                    <label for="category">Category:</label>
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                        @foreach($allCategories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->naziv }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="form-control bg-light rounded-0 d-flex align-items-center">
                <label for="sort_price">Sort by Price:</label>
                <select name="sort_price" class="form-select w-auto me-4 ms-2">
                    <option value=""></option>
                    <option value="asc" {{ request('sort_price') === 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request('sort_price') === 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
                <label for="sort_name">Sort by Name:</label>
                <select name="sort_name" class="form-select w-auto me-4 ms-2">
                    <option value=""></option>
                    <option value="asc" {{ request('sort_name') === 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request('sort_name') === 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </form>
        <table class="table table-bordered">
            <tr>
                <th>Naziv</th>
                <th>Cijena</th>
                <th>Kategorija</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->naziv }}</td>
                    <td>{{ $product->cijena }} €</td>
                    <td>
                        @foreach($product->categories as $category)
                            <span class="me-1">{{ $category->naziv }},</span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $products->appends(request()->input())->links('pagination::bootstrap-5') }}
    </div>
@endsection
