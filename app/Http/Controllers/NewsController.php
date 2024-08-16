<?php

namespace App\Http\Controllers;

use App\Models\News;
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
        return Inertia::render('News/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validação
        $newsPost = $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|max:255',
            'author' => 'required|min:3|max:255',
            'source_url' => 'required|min:3|max:255|url',
            'publish_date' => 'required|date',
            'terms_accepted' => 'required',


        ], [
            // Mensagens de erro
            'title.required' => 'O título é obrigatório.',
            'title.min' => 'O título deve ter pelo menos 5 caracteres.',
            'title.max' => 'O título deve ter no máximo 255 caracteres.',
            'content.required' => 'O conteúdo é obrigatório.',
            'content.max' => 'O conteúdo deve ter no máximo 255 caracteres.',
            'author.required' => 'O autor é obrigatório.',
            'author.min' => 'O autor deve ter pelo menos 3 caracteres.',
            'author.max' => 'O autor deve ter no máximo 255 caracteres.',
            'source.required' => 'A fonte é obrigatória.',
            'source.min' => 'A fonte deve ter pelo menos 3 caracteres.',
            'source.max' => 'A fonte deve ter no máximo 255 caracteres.',
            'source.url' => 'A fonte deve ser uma URL válida.',
            'date.required' => 'A data é obrigatória.',
            'date.date' => 'A data deve ser uma data válida.',
        ]);

        dd('passou');
        try {
            $news = News::create([
                'title' => strtolower($newsPost['title']),
                'content' => strtolower($newsPost['content']),
                'author_alias' => strtolower($newsPost['author']),
                'source_url' => $newsPost['source_url'],
                'publish_date' => $newsPost['date'],
                'publish_time' => $newsPost['date'],
                'location' => $newsPost['date'],
                'terms_accepted' => $newsPost['terms_accepted'],
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao salvar a notícia.' . $e->getMessage());
        }
        // Redirecionamento para a página de perfil do usuário
        return Inertia::render('Users/Show', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

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
