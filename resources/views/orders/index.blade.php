@extends('layouts/app')

@section('content')
    <div class="container mt-3">
        <h1>Create Order</h1>

        <form method="post" action="{{ url('/store') }}">
            @csrf

            <div class="mb-3">
                <label for="products" class="form-label">Products</label>
                <select multiple class="form-control" id="products" name="products[]" required>
                    @foreach($allProducts as $product)
                        <option value="{{ $product->id }}">{{ $product->naziv }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="ime_prezime" class="form-label">Ime Prezime</label>
                <input type="text" class="form-control" id="ime_prezime" name="ime_prezime" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="broj_telefona" class="form-label">Broj Telefona</label>
                <input type="text" class="form-control" id="broj_telefona" name="broj_telefona" required>
            </div>

            <div class="mb-3">
                <label for="adresa" class="form-label">Adresa</label>
                <input type="text" class="form-control" id="adresa" name="adresa" required>
            </div>

            <div class="mb-3">
                <label for="grad" class="form-label">Grad</label>
                <input type="text" class="form-control" id="grad" name="grad" required>
            </div>

            <div class="mb-3">
                <label for="drzava" class="form-label">Drzava</label>
                <input type="text" class="form-control" id="drzava" name="drzava" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Order</button>
        </form>
    </div>
@endsection
