<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Address;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userGroup = UserGroup::get();
        return view('user.create', [
            'userGroup' => $userGroup
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'cpf' => 'required|string|unique:users,cpf',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|string|in:masculino,feminino,outros',
            'phone' => 'nullable|string',
            'user_group_id' => 'required|exists:user_groups,id',
            'active' => 'required|boolean',
            'street' => 'required|string',
            'complement' => 'nullable|string',
            'zip_code' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'neighborhood' => 'required|string',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
        ]);

        // Criar o endereço
        $address = Address::create([
            'street' => $request->street,
            'complement' => $request->complement,
            'zip_code' => $request->zip_code,
            'state' => $request->state,
            'city' => $request->city,
            'neighborhood' => $request->neighborhood,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        // Criar o usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Criptografar a senha
            'cpf' => $request->cpf,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'user_group_id' => $request->user_group_id,
            'active' => $request->active,
            'address_id' => $address->id, // Associar o endereço ao usuário
        ]);

        // Redirecionar ou retornar uma resposta
        return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $userGroup = UserGroup::get();

        $user = User::findOrFail($id);
        return view('user.edit', compact('user', 'userGroup'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, 
            'cpf' => 'required|string|unique:users,cpf,' . $id, 
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|string|in:masculino,feminino,outros',
            'phone' => 'nullable|string',
            'user_group_id' => 'required|exists:user_groups,id',
            'active' => 'required|boolean',
            'street' => 'required|string',
            'complement' => 'nullable|string',
            'zip_code' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'neighborhood' => 'required|string',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
        ]);
    
        $user = User::findOrFail($id);
    
        $user->address->update([
            'street' => $request->street,
            'complement' => $request->complement,
            'zip_code' => $request->zip_code,
            'state' => $request->state,
            'city' => $request->city,
            'neighborhood' => $request->neighborhood,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'user_group_id' => $request->user_group_id,
            'active' => $request->active,
        ]);
    
        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }
    
        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
