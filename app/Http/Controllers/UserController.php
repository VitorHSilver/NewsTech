<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
            'password' => 'required|min:3|max:255',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'postalCode' => 'required|min:4|max:9',
            'streetAddress' => 'required|min:5|max:255',
            'country' => 'required',
            'neighborhood' => 'required|min:5|max:255',
            'city' => 'required|min:5|max:255',
            'region' => 'required|min:2|max:255',
        ], [
            // Mensagens de erro
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O nome deve ter pelo menos 5 caracteres.',
            'name.max' => 'O nome não pode exceder 255 caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos 3 caracteres.',
            'password.max' => 'A senha não pode exceder 255 caracteres.',
            'email.required' => 'O campo de e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de e-mail válido.',
            'email.unique' => 'Este e-mail já está em uso.',
            'postalCode.required' => 'O código postal é obrigatório.',
            'postalCode.min' => 'O código postal deve ter pelo menos 4 caracteres.',
            'postalCode.max' => 'O código postal não pode exceder 9 caracteres.',
            'streetAddress.required' => 'O endereço é obrigatório.',
            'streetAddress.min' => 'O endereço deve ter pelo menos 5 caracteres.',
            'streetAddress.max' => 'O endereço não pode exceder 255 caracteres.',
            'country.required' => 'O país é obrigatório.',
            'neighborhood.required' => 'O bairro é obrigatório.',
            'neighborhood.min' => 'O bairro deve ter pelo menos 5 caracteres.',
            'neighborhood.max' => 'O bairro não pode exceder 255 caracteres.',
            'city.required' => 'A cidade é obrigatória.',
            'city.min' => 'A cidade deve ter pelo menos 5 caracteres.',
            'city.max' => 'A cidade não pode exceder 255 caracteres.',
            'region.required' => 'A região é obrigatória.',
            'region.min' => 'A região deve ter pelo menos 2 caracteres.',
            'region.max' => 'A região não pode exceder 255 caracteres.',
        ]);

        // Criação do usuário
        try {
            $user = User::create([
                'name' => strtolower($data['name']),
                'password' => bcrypt($data['password']),
                'email' => $data['email'],
                'postalCode' => $data['postalCode'],
                'streetAddress' => strtolower($data['streetAddress']),
                'country' => strtolower($data['country']),
                'neighborhood' => strtolower($data['neighborhood']),
                'city' => strtolower($data['city']),
                'region' => strtolower($data['region']),
            ]);

            $user->save();
        } catch (\Throwable $th) {
            if (env('APP_DEBUG')) {
                dd($th->getMessage());
                return redirect()->route('home')->with('error', $th->getMessage());
            }
        }
        // Redirecionamento para a página de perfil do usuário
        return redirect()->route('users.show');
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = Auth::user($user->id);

        return Inertia::render('Users/Show', [
            'user' => $user,
        ]);
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
