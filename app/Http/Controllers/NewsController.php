<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $brTech = Http::get('https://newsapi.org/v2/top-headlines?country=us&category=technology&apiKey=91741c87c30748579e5c1760d57dbfd4')->json()['articles'];
        // $cripto = Http::get('https://newsapi.org/v2/everything?q=bitcoin&apiKey=91741c87c30748579e5c1760d57dbfd4')->json()['articles'];
        $data = Http::get('https://newsapi.org/v2/everything?q=keyword&apiKey=91741c87c30748579e5c1760d57dbfd4')->json()['articles'];

        $filteredArticles = array_filter($data, function ($article) {
            return !empty($article['urlToImage']);
            // Adicione aqui mais condições de filtragem se necessário
        });
        // adicionando outros props na index
        return Inertia::render(
            'News/Home',
            [
                'user' => Auth::user() ?? null,
                'articles' => array_values($filteredArticles),
                // 'brTech' => $brTech
            ]

        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('create new news');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd('show news');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
