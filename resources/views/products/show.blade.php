


@extends('layouts/app')

@section('content')
    <div class="my-3">
            <div class="d-flex justify-content-between align-items-end">
                <h1>Product: {{ $product->naziv }}</h1>
                <span>{{ $product->SKU }}</span>
            </div>
            
            <hr>

            <p>Cijena: {{ $product->cijena }} €</p>

            <div class="d-flex mb-3">
                <p class="me-1">Kategorija: </p>
                <div class="flex-grow-1">
                    @foreach($product->categories as $category)
                        <p class="m-0">{{ $category->naziv }}</p>
                    @endforeach
                </div>
            </div>

            <p>Objavljeno: {{ date("d.m.Y.", strtotime($product->published)) }}</p>

            <p>Opis: {{ $product->opis }}</p>



        
       
               
     
        </table>

      
    </div>
@endsection
