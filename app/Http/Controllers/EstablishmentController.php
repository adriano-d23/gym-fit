<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Establishment;
use App\Models\User;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $establishments = Establishment::with(['address', 'user'])->get();
        return view("establishment.index", compact("establishments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $users = User::getAdminsAndProprietarios()->get();
    return view('establishment.create', compact('users'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'user_id' => 'required|exists:users,id',
        'street' => 'required|string',
        'complement' => 'nullable|string',
        'zip_code' => 'required|string',
        'neighborhood' => 'required|string',
        'city' => 'required|string',
        'state' => 'required|string',
        'longitude' => 'nullable|numeric',
        'latitude' => 'nullable|numeric',
        'active' => 'required|boolean',
    ]);

    $address = Address::create([
        'street' => $request->street,
        'complement' => $request->complement,
        'zip_code' => $request->zip_code,
        'neighborhood' => $request->neighborhood,
        'city' => $request->city,
        'state' => $request->state,
        'longitude' => $request->longitude,
        'latitude' => $request->latitude,
    ]);

    Establishment::create([
        'name' => $request->name,
        'address_id' => $address->id,
        'user_id' => $request->user_id, 
        'active' => $request->active,
    ]);

    return redirect()->route('establishment.index')->with('success', 'Estabelecimento cadastrado com sucesso!');
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
    public function edit(string $id)
    {
        $establishment = Establishment::with(['address', 'user'])->findOrFail($id);
    
        $users = User::getAdminsAndProprietarios()->get();
    
        return view('establishment.edit', compact('establishment', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $establishment = Establishment::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'street' => 'required|string',
            'complement' => 'nullable|string',
            'zip_code' => 'required|string',
            'neighborhood' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'active' => 'required|boolean',
        ]);
    
        $establishment->address->update([
            'street' => $request->street,
            'complement' => $request->complement,
            'zip_code' => $request->zip_code,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'state' => $request->state,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);
    
        $establishment->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'active' => $request->active,
        ]);
    
        return redirect()->route('establishment.index')->with('success', 'Estabelecimento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
