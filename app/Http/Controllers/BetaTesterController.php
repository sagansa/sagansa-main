<?php

namespace App\Http\Controllers;

use App\Models\BetaTester;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BetaTesterController extends Controller
{
    /**
     * Tampilkan halaman pendaftaran beta tester.
     */
    public function create()
    {
        return view('beta');
    }

    /**
     * Simpan pendaftaran beta tester baru.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email:rfc', 'max:150'],
            'app' => ['nullable', Rule::in(['pos', 'attendance', 'both'])],
            // Honeypot: harus kosong (bot biasanya isi semua field)
            'website' => ['nullable', 'string', 'max:0'],
        ]);

        // Anti-spam: honeypot terisi → bot, tampak sukses tapi tidak simpan
        if (!empty($data['website'])) {
            return redirect()->route('beta.create')->with('success', 'Terima kasih!');
        }

        $email = strtolower(trim($data['email']));

        // Cek duplikat — jika sudah ada, tetap tampilkan sukses (jangan bocorkan)
        $existing = BetaTester::where('email', $email)->first();
        if ($existing) {
            // Jika sebelumnya unsubscribe, reaktivasi
            if ($existing->status === 'unsubscribed') {
                $existing->update(['status' => 'pending']);
            }

            return redirect()->route('beta.create')->with('success',
                'Email Anda sudah terdaftar sebagai beta tester. Kami akan mengirim undangan begitu program dibuka.'
            );
        }

        BetaTester::create([
            'email' => $email,
            'app' => $data['app'] ?? 'both',
            'status' => 'pending',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('beta.create')->with('success',
            '🎉 Berhasil! Email Anda terdaftar sebagai beta tester. Kami akan mengirim undangan download begitu program beta dibuka.'
        );
    }
}
