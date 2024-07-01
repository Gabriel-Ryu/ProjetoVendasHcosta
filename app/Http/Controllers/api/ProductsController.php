<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Products;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $products= array();
        $products = json_decode($this->showProducts());
        return view('/pedidos/create',['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showProductById(string $id)
    {
        $response = Http::get("http://host.docker.internal:8000/getItem?produto=$id");
        $produto = $response->json();
        return $response;
    }

    public function showProducts()
    {
        $response = Http::get("http://host.docker.internal:8000/getItens");
        $produtos = $response->json();
        return $response;
    }
}
