<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProfileController extends Controller
{
    public function show() {
        $userId = auth()->user()->id;
        $qrcode = QrCode::size(200)->style('square')->generate(route('main.show', $userId));
        if (file_exists('qrcodes/qrcode_' . $userId . '.svg')) {
            $path = 'public/qrcodes/qrcode_' . $userId . '.svg';
        } else {
            $path = public_path('qrcodes/qrcode_' . $userId . '.svg');
            \SimpleSoftwareIO\QrCode\Facades\QrCode::size(250)->style('round')->generate(route('main.show', $userId), $path);
        }

        return view('profile', compact('qrcode', 'path'));
    }

    public function update(Request $request) {
        $data = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'type' => ['required', Rule::in(['standard', 'contacts'])],
            'information' => [],
            'img' => ['file'],
        ]);
        if (isset($data['img'])) {
            $data['img'] = 'storage/' . Storage::disk('public')->put('/images', $data['img']);
        }
        auth()->user()->update($data);
        return back();
    }


}
