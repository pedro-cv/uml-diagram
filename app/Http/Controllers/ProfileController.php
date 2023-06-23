<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('auth.reset-info', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;


        if ($request->password_actual != "") {
            if (Hash::check($request->password_actual, $user->password)) {
                if ($request->password_new == $request->password_confirm) {
                    if (strlen($request->password_new) >= 6) {
                        $user->password = Hash::make($request->password_new);
                    } else {
                        return redirect()->back()->withErrors(['passwordMenor' => 'Tu contraseña debe llevar mas de 6 caracteres']);
                    }
                } else {
                    return redirect()->back()->withErrors(['passwordConfirm' => 'Tu contraseña nueva no coincide']);
                }
            } else {
                return redirect()->back()->withErrors(['passwordActual' => 'Tu contraseña actual no coincide']);
            }
        }

        if ($request->hasFile('url')) {
            if ($user->url) {
                Storage::disk('public')->delete($user->url);
            }
            $extension = $request->url->extension();
            $nombre = round(microtime(true)) . '.' . $extension;
            Storage::disk('public')->putFileAs('usuarios', $request->url, $nombre);
            $path = 'usuarios/' . $nombre;
            $user->url = $path;
        }

        /* $path = $request->file('url')->store('imagenes','s3');
        $user->url = Storage::disk('s3')->url($path); */
        $user->update();

        return redirect()->back()->with('message', 'Actualizaste tu perfil correctamente');
    }
}
