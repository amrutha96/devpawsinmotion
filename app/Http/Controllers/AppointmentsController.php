<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use App\Models\Dogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

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
                $dog_data = $this->getDogArray($check_user_dog_ids);
                $all_appointments = Appointments::with('dogs')->where('user_id', $user_id)->get()->toArray();
                return view('book_appointment', ['dogs' => $dog_data,'all_appointments' => $all_appointments]);
            } else {
                return view('add_dogs');
            }
        } else {
            return view('auth.login');
        }

    }

        /**
     * Store a new dog.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_appointment(Request $request)
    {
        if (Auth::check()) {
            $user_id  = Auth::user()->id;
            $appointments = Appointments::create([
                'datetime' => new DateTime($request['datetime']),
                'pickup_address' => $request['pickup_address'],
                'dog_id' => $request['dog_id'],
                'postcode' => $request['postcode'],
                'status' => 'created',
                'user_id' => $user_id,
            ]);
            return redirect()->route('book_appointment')
            ->withSuccess('Your appointment has been created');
        } else {
            return view('auth.login');
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
    public function edit($id)
    {
        $appointment = Appointments::find($id);
        $dog_ids = User::where('id', '=', $appointment['user_id'])
                ->whereNotNull('dog_ids')->first('dog_ids');
                $dog_ids = $this->getDogArray($dog_ids);
        return view('edit_appointment', ['dogs' => $dog_ids,'appointment' => $appointment]);      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update_appointment = Appointments::find($id);
        $update_appointment->update($request->all());
        return redirect()->route('book_appointment')
        ->with('success', 'Appointment updated successfully.');
    }

     /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
    public function destroy($id)
    {
        $appointments = Appointments::find($id);
        $appointments->delete();
        return redirect()->route('book_appointment')
        ->with('success', 'Appointment deleted successfully');
    }

    function getDogArray($check_user_dog_ids){
        $dog_data = [];
        if($check_user_dog_ids){
        $user_dog_ids = json_decode($check_user_dog_ids->dog_ids);
        foreach ($user_dog_ids as $key => $dog_id) {
            $dog_data[$key] = [
                'id' => $dog_id,
                'name' => Dogs::where('id', $dog_id)->pluck('name')->first(),
            ];
        }
    }
    return $dog_data;
    }
}
