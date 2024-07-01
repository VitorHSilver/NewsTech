<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Users/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $data = $request->validate([
            'name' => 'required|min:5|max:255',
            'password' => 'required|min:6',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'postalCode' => 'required|min:5|max:255',
            'streetAddress' => 'required|min:5|max:255',
            'country' => 'required|min:5|max:255',
            'neighborhood' => 'required|min:5|max:255',
            'city' => 'required|min:5|max:255',
            'region' => 'required|min:5|max:255',

        ]);

        // Criação do usuário
        try {
            User::create([
                'name' => $data['name'],
                'password' => bcrypt($data['password']),
                'email' => $data['email'],
                'postalCode' => $data['postalCode'],
                'streetAddress' => $data['streetAddress'],
                'country' => $data['country'],
                'neighborhood' => $data['neighborhood'],
                'city' => $data['city'],
                'region' => $data['region'],
            ]);
        } catch (\Throwable $th) {
            // quero mostrar na pagina o erro
            // if (env('APP_DEBUG')) {
            //     return redirect()->route('user.create')->with('error', $th->getMessage());
            // }
            return redirect()->route('user.create')->with('error', 'Erro ao criar usuário!');
        }
        // Redirecionamento ou retorno de resposta
        return redirect()->route('user.create')->with('success', 'Usuário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
