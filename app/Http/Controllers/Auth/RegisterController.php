<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'role' => ['required'],
            'department' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'role' => $data['role'],
            'department' => $data['department'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // ✅ Automatically assign default permissions based on role
        $this->assignDefaultPermissions($user);

        return $user;
    }

    /**
     * Assign default permissions to newly registered user based on their role
     * ✅ Pulls from config('permissions.role_defaults')
     */
    protected function assignDefaultPermissions(User $user): void
    {
        $roleDefaults = config('permissions.role_defaults');

        // Check if role has default permissions defined
        if (isset($roleDefaults[$user->role])) {
            foreach ($roleDefaults[$user->role] as $resource => $actions) {
                foreach ($actions as $action) {
                    Permission::updateOrCreate(
                        [
                            'user_id'  => $user->id,
                            'resource' => $resource,
                            'action'   => $action,
                        ],
                        [
                            'allowed' => true,
                        ]
                    );
                }
            }
        }
    }
}
