<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('profile', compact('user'));
    }

    public function privacy()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('privacy', compact('user'));
    }

    public function personalDataUpdate(Request $request)
    {
        $request->validate([
            'birth_date' => 'nullable|date',
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);

        $update = $user->update($request->all());

        if ($update) {
            $status = 'success';
            $message = 'Data berhasil diupdate!';
        } else {
            $status = 'error';
            $message = 'Data gagal diupdate!';
        }

        return back()->with($status, $message);
    }

    public function anotherUpdate(Request $request)
    {
        $request->validate([
            'id_type' => 'nullable',
            'id_expiration_date' => 'nullable|date',
            'postal_code' => 'nullable|max:5',
            'id_number' => 'nullable|numeric',
            'address' => 'nullable|max:100',
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);

        $update = $user->update($request->all());

        if ($update) {
            $status = 'success';
            $message = 'Data berhasil diupdate!';
        } else {
            $status = 'error';
            $message = 'Data gagal diupdate!';
        }

        return back()->with($status, $message);
    }

    public function photoProfileUpdate(Request $request)
    {
        $validate = $request->validate([
            'photo' => 'image|file|max:5000'
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);

        $check = $user->photo;

        if ($check != null && Storage::exists($check)) {
            Storage::delete($check);
        }

        $validate['photo'] = $request->file('photo')->store('profile');
        $update = $user->update($validate);

        if ($update) {
            $status = 'success';
            $message = 'Foto berhasil diupload!';
        } else {
            $status = 'error';
            $message = 'Foto gagal diupload!';
        }

        return back()->with($status, $message);
    }

    public function photoProfileDelete($id)
    {
        $user = User::find($id);

        $check = $user->photo;

        if ($check != null && Storage::exists($check)) {
            $delete = Storage::delete($check);
        }

        $user->update([
            'photo' => null,
        ]);

        if ($delete) {
            $status = 'success';
            $message = 'Foto berhasil dihapus!';
        } else {
            $status = 'error';
            $message = 'Foto gagal dihapus!';
        }

        return back()->with($status, $message);
    }
}
