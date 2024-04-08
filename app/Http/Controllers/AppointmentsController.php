<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use App\Models\Dogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{

    /**
     * Display a form to register dogs.
     *
     * @return \Illuminate\Http\Response
     */
    public function book_appointment()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $check_user_dog_ids = User::where('id', '=', $user_id)
                ->whereNotNull('dog_ids')
                ->first('dog_ids');
            if ($check_user_dog_ids) {
                $user_dog_ids = json_decode($check_user_dog_ids->dog_ids);
                $dog_data = [];
                foreach ($user_dog_ids as $key => $dog_id) {
                    $dog_data[$key] = [
                        'id' => $dog_id,
                        'name' => Dogs::where('id', $dog_id)->pluck('name')->first(),
                    ];
                }
                return view('book_appointment', ['dogs' => $dog_data]);
            } else {
                return view('register');
            }
        } else {
            return view('login');
        }

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointments $appointments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointments $appointments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointments $appointments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointments $appointments)
    {
        //
    }
}
