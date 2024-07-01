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
            'password' => 'required|min:3|max:255',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'postalCode' => 'required|min:5|max:255',
            'streetAddress' => 'required|min:5|max:255',
            'country' => 'required|min:5|max:255',
            'neighborhood' => 'required|min:5|max:255',
            'city' => 'required|min:5|max:255',
            'region' => 'required|min:2|max:255',
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
        $user = User::find($user->id);

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
