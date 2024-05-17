<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Owners;
use Illuminate\Http\Request;
use Hash;
use Session;
use Validator;


class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('\home\register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $owners = new Owners;
        $owners->firstname = $request->firstname;
        $owners->lastname  = $request->lastname;
        $owners->email  = $request->email;
        $owners->contact  = $request->contact;
        $owners->address_line1  = $request->address_line1;
        $owners->address_line2  = $request->address_line2;
        $owners->postcode  = $request->postcode;
        $owners->role_id  = 1;
        $owners->password  = Hash::make($request->password); // Hashing password
 
        $owners->save();
 
        return view('home.register');
    }

    /**
     * Display the specified resource.
     */
    public function show(Owners $owners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owners $owners)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owners $owners)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owners $owners)
    {
        //
    }
}
