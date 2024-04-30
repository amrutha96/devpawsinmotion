<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except([
    //         'logout', 'dashboard'
    //     ]);
    // }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'lastname' => 'required|string|max:250',
            'contact' => 'required',
            'address_line1' => 'required',
            'address_line2' => 'required|string|max:250',
            'postcode' => 'required|string|max:12',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:3|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'contact' => $request->contact,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'postcode' => $request->postcode,
            'role_id' => 2,

        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return view('welcome')
            ->withSuccess('You have successfully registered & logged in!');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return view('welcome')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    }

    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');
    }

    /**
     * Display a form to register dogs.
     *
     * @return \Illuminate\Http\Response
     */
    public function register_dogs()
    {
        return view('add_dogs');
    }

    /**
     * Store a new dog.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_dogs(Request $request)
    {

        if (Auth::check()) {
            $user_id = $request['user_id'];
            $dogdata = [];
            $dog_ids = [];
            // Assuming all arrays in params have the same number of elements
            $count = count($request['name']);

            for ($i = 0; $i < $count; $i++) {
                if ($request->hasFile('image')) {
                    $request['image'] = $request->file('image');
                }
                $imageName = time() . '.' . $request['image'][$i]->extension();
                $request['image'][$i]->storeAs('images/' . $user_id, $imageName);
                $dogs = Dogs::create([
                    'name' => $request['name'][$i],
                    'height' => $request['height'][$i],
                    'weight' => $request['weight'][$i],
                    'age' => $request['age'][$i],
                    'image' => $imageName,
                    'notes' => $request['textarea'][$i],
                ]);
                $last_inserted_dog_id[] = $dogs->id;
            }

            $current_dog_ids = User::find($user_id)->dog_ids;
            if ($current_dog_ids != null) {
                // Find the difference between the two arrays
                $valuesToAdd = array_diff($last_inserted_dog_id, json_decode($current_dog_ids, true));

                // Append the new values to the original array
                $current_dog_ids = array_merge(json_decode($current_dog_ids, true), $valuesToAdd);
            } else {
                $current_dog_ids = $last_inserted_dog_id;
            }
            User::where('id', $user_id)
                ->update(['dog_ids' => $current_dog_ids]);
            return redirect()->route('register_dogs');
        }

    }

}
