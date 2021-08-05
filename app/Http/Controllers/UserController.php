<?php

namespace App\Http\Controllers;

use App\Accommodation;
use App\User;
use App\Role;
use App\Privilege;
use App\UserRole;
use App\UserPrivilege;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        $users = User::with(['role'])->get();
        return view('users', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->only('first_name', 'last_name', 'email', 'active', 'password');

        try {
            $user = User::where('email', $data["email"])->first();
            if (!empty($user)) {
                return redirect()->route('users')->with('error', 'Email inserita esiste già');
            }
            $data["password"] = Hash::make($data["password"]);
            User::create($data);
        } catch (\Exception $e) {
            return redirect()->route('users')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('users')->with('success', 'Operazione completata con successo');
    }

    public function show($user_id)
    {
        $user = User::find($user_id);

        return view("user", [
            "user" => $user
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(UserUpdateRequest $request, $user_id)
    {
        $data = $request->only('first_name', 'last_name', 'email', 'active');

        try {
            $user = User::where('id', '!=', $user_id)->where('email', $data["email"])->first();
            if (!empty($user)) {
                return redirect()->route('users')->with('error', 'Email inserita esiste già');
            }
            User::find($user_id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('users')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('users')->with('success', 'Operazione completata con successo');
    }

    public function destroy($user_id)
    {
        $user = User::find($user_id);
        if (empty($user)) {
            return redirect()->route('users')->with('error', 'L\'utente non esiste');
        }

        $accommodation = Accommodation::where('user_id', $user_id)->count();
        if ($accommodation) {
            return redirect()->route('users')->with('error', 'Non è possibile cancellare l\'utente perchè associato ad una accommodation');
        }

        try {
            $user->delete();
        } catch (\Exception $e) {
            return redirect()->route('users')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('users')->with('success', 'Operazione completata con successo');
    }

    public function show_role($user_id)
    {
        $user = User::find($user_id);

        $roles = Role::where('active', 1)->get();

        return view("user_role", [
            "user" => $user,
            "roles" => $roles,
        ]);
    }

    public function update_role(Request $request, $user_id)
    {
        $data = $request->only('role_id');

        $user = User::find($user_id);
        if (empty($user)) {
            return redirect()->route('users')->with('error', 'Utente non trovato');
        }
        try {
            UserRole::updateOrCreate([
                'user_id' => $user_id
            ], [
                'user_id' => $user_id,
                'role_id' => $data["role_id"]
            ]);
        } catch (\Exception $e) {
            return redirect()->route('users')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('users')->with('success', 'Operazione completata con successo');
    }

    public function show_privilege($user_id)
    {
        $user = User::find($user_id);

        $privileges = Privilege::where('active', 1)->get();

        return view("user_privilege", [
            "user" => $user,
            "privileges" => $privileges,
        ]);
    }

    public function update_privilege(Request $request, $user_id)
    {
        $data = $request->only('privilege_id');

        $user = User::find($user_id);
        if (empty($user)) {
            return redirect()->route('users')->with('error', 'Utente non trovato');
        }
        try {
            UserPrivilege::updateOrCreate([
                'user_id' => $user_id
            ], [
                'user_id' => $user_id,
                'privilege_id' => $data["privilege_id"]
            ]);
        } catch (\Exception $e) {
            return redirect()->route('users')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('users')->with('success', 'Operazione completata con successo');
    }

    public function login(Request $request)
    {
        $data = $request->only('email', 'password');

        try {
            $user = User::where('email', $data["email"])->first();
            if (empty($user)) {
                return redirect()->route('login/show')->with('error', 'Email non trovata');
            }

            $credentials = [
                "email" => $data["email"],
                "password" => $data["password"],
                "active" => 1,
            ];

            if (!Auth::guard('web')->attempt($credentials)){
                return redirect()->route('login/show')->with('error', 'Credenziali non valide');
            }

        } catch (\Exception $e) {
            return redirect()->route('login/show')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('users')->with('success', 'Operazione completata con successo');
    }

    public function show_login(){
        return view('login');
    }

    public function verify(Request $request)
    {
        $data = $request->only('email','email_confirmation');

        if ($data["email"] != $data["email_confirmation"]){
            return redirect()->route('users')->with('error', 'Email non valida');
        }

        try {
            $user = User::where('email', $data["email"])->first();
            if (empty($user)) {
                return redirect()->route('users')->with('error', 'Email non trovata');
            }
        } catch (\Exception $e) {
            return redirect()->route('users')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('users')->with('success', 'Link recupero password inviato alla mail inserita');
    }
}
