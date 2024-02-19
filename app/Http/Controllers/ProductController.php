<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, Categories $category = null)
    {
        $productsQuery = Products::with('categories');

        // if ($category) {
        //     $productsQuery->whereHas('categories', function ($query) use ($category) {
        //         $query->where('categories.id', $category->id);
        //     });
        // }

        if ($request->filled('price_min') && $request->filled('price_max')) {
            $productsQuery->whereBetween('cijena', [$request->input('price_min'), $request->input('price_max')]);
        } elseif ($request->filled('price_min')) {
            $productsQuery->where('cijena', '>=', $request->input('price_min'));
        } elseif ($request->filled('price_max')) {
            $productsQuery->where('cijena', '<=', $request->input('price_max'));
        }

        if ($request->filled('name')) {
            $productsQuery->where('naziv', 'like', '%'.$request->input('name').'%');
        }

        if ($request->filled('category')) {
            $productsQuery->whereHas('categories', function ($query) use ($request) {
                $query->where('categories.id', $request->input('category'));
            });
        }

        if ($request->filled('sort_price')) {
            $sortOrder = $request->input('sort_price') === 'asc' ? 'asc' : 'desc';
            $productsQuery->orderBy('cijena', $sortOrder);
        }

        if ($request->filled('sort_name')) {
            $sortOrder = $request->input('sort_name') === 'asc' ? 'asc' : 'desc';
            $productsQuery->orderBy('naziv', $sortOrder);
        }

        $products = $productsQuery->paginate(10);

        $allCategories = Categories::all();

        return view('products.index', compact('products', 'category', 'allCategories'));
    }

    public function show(Products $product)
    {
        return view('products.show', compact('product'));
    }
}
