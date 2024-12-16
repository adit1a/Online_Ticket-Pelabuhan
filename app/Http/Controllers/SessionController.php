<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Tiket;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Mail; // Pastikan untuk mengimpor Mail






class SessionController extends Controller
{
    function index()
    {
        return view("sesi/index");
    }
     function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Katasandi wajib diisi',
            ]
        );
    
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
    
        if (Auth::attempt($infologin)) {
            // Jika sukses
            return redirect('/');
            
            
        }else{
           return redirect('sesi')->withErrors([
            "error"=>'email dan password tidak valid'
           ]);
        }


    }
    
    function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('sukses');
    }

    function register()
    {
        return view('sesi/register');
    }


public function create(Request $request)
{
    $request->validate([
        'name' => 'required|min:2',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed'
    ], [
        'name.required' => 'Nama wajib diisi',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'email.unique' => 'Email sudah terdaftar',
        'password.required' => 'Password wajib diisi',
        'password.min' => 'Password minimal 6 karakter',
        'password.confirmed' => 'Konfirmasi password tidak sesuai'
    ]);

    // Generate OTP
    $otp = str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);
    
    try {
        // Kirim email OTP
        Mail::send("emails_otp", ['otp' => $otp], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Kode Verifikasi OTP Anda');
        });

        // Simpan data registrasi ke session dengan tambahan waktu kedaluwarsa
        Session::put('registration_data', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10) // OTP berlaku 10 menit
        ]);

        return redirect()->route('verify_otp')->with('success', 'Kode OTP telah dikirim. Silakan periksa email Anda.');
    } catch (\Exception $e) {
        \Log::error('Email OTP gagal dikirim', ['error' => $e->getMessage()]);
        return redirect()->back()->withErrors(['email' => 'Gagal mengirim OTP. Silakan coba lagi.']);
    }
}
    
    public function showReport()
    {
        $tickets = tiket::all(); // Ambil semua data tiket
        return view('tickets/report', compact('tickets')); // Ganti 'your_view_name' dengan nama view Anda
    }

    public function showVerifyOtpForm()
    {
        return view('sesi.verify_otp');
    }
   
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        // Ambil data registrasi dari session
        $registrationData = Session::get('registration_data');

        // Cek apakah data registrasi ada
        if (!$registrationData) {
            return redirect()->route('sesi.register')->withErrors(['otp' => 'Sesi registrasi telah habis. Silakan mulai ulang.']);
        }

        // Cek kedaluwarsa OTP
        if (now()->gt($registrationData['otp_expires_at'])) {
            Session::forget('registration_data');
            return redirect()->route('register')->withErrors(['otp' => 'Kode OTP telah kedaluwarsa. Silakan minta ulang.']);
        }

        // Verifikasi OTP
        if ($request->otp == $registrationData['otp']) {
            // Buat user baru
            $user = User::create([
                'name' => $registrationData['name'],
                'email' => $registrationData['email'],
                'password' => $registrationData['password']
            ]);

            // Bersihkan session
            Session::forget('registration_data');

            // Login user
            Auth::login($user);

            return redirect('sesi/home')->with('success', 'Registrasi berhasil!');
        }

        return back()->withErrors(['otp' => 'Kode OTP tidak valid.']);
    }
    public function resendOtp()
    {
        $registrationData = Session::get('registration_data');

        if (!$registrationData) {
            return redirect()->route('sesi/register')->withErrors(['otp' => 'Tidak ada data registrasi yang tersimpan.']);
        }

        // Generate OTP baru
        $newOtp = str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);

        try {
            // Kirim ulang email
            Mail::send("emails.otp", ['otp' => $newOtp], function ($message) use ($registrationData) {
                $message->to($registrationData['email']);
                $message->subject('Kode Verifikasi OTP Baru Anda');
            });

            // Update OTP di session
            $registrationData['otp'] = $newOtp;
            $registrationData['otp_expires_at'] = now()->addMinutes(10);
            Session::put('registration_data', $registrationData);

            return redirect()->route('verify.otp')->with('success', 'Kode OTP baru telah dikirim.');
        } catch (\Exception $e) {
            \Log::error('Pengiriman ulang OTP gagal', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['otp' => 'Gagal mengirim ulang OTP. Silakan coba lagi.']);
        }
    }

public function downloadPDF($id)
{
    // Fetch the ticket based on ID
    $ticket = Tiket::find($id);

    // Check if the ticket exists
    if (!$ticket) {
        return redirect()->route('ticket.index')->with('error', 'Ticket not found.');
    }

    // Generate PDF
    $pdf = PDF::loadView('pdf\ticket', ['ticket' => $ticket]);

    // Download the PDF
    return $pdf->download('ticket_' . $ticket->id . '.pdf');
}
public function downloadLaporan($id)
{
    // Ambil data yang ingin ditampilkan di PDF
    $datas = $this->getDataForReport(); // Ganti dengan metode yang sesuai untuk mendapatkan data

    // Buat PDF dari view
    $pdf = PDF::loadView('pdf.ticket', compact('data')); // Ganti 'report' dengan nama view Anda

    // Unduh file PDF
    return $pdf->download('tiket.pdf');
}
         
}      
    
       



