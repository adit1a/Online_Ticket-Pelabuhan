<?php



namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Mpdf\Mpdf;
use Barryvdh\DomPDF\Facade\PDF;





use App\Models\Tiket;

class TicketController extends Controller
{
    // Menampilkan formulir pesanan
    public function create()
    {
        // Mengambil semua pengguna dari database
        $users = User::all();
        return view('tickets.create', compact('users'));
    }

    // Menyimpan pesanan
    const TUJUAN_OPTIONS = ['siwa-tobaku', 'tobaku-siwa'];

    public function store(Request $request)
{
    // Pastikan pengguna sudah login
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Anda harus login untuk membuat tiket.');
    }

    $validatedData = $request->validate([
        'date' => 'required|date',
        'jumlah' => 'required|integer|min:1',
        'asal' => 'required|string',
        'tujuan' => 'required|in:siwa-tobaku,tobaku-siwa',
        'kapal'=>'required|in:ferry,fiber'
    ]);

    // Lanjutkan dengan menyimpan data
    $ticket = Tiket::create([
        'nama' => auth()->user()->name, // Mengambil nama pengguna yang login
        'tanggal' => $validatedData['date'],
        'asal' => $validatedData['asal'],
        'tujuan' => $validatedData['tujuan'],
        'jumlah' => $validatedData['jumlah'],
        'user_id' => auth()->id(), // ID pengguna yang login
        'kapal'=>$validatedData['kapal']
    ]);

    return redirect()->route('ticket.show', $ticket->id)
        ->with('success', 'Tiket berhasil dibuat');
} 

public function show($id)
{
    // Ambil tiket berdasarkan ID
    $tickets = Tiket::find($id);

    // Periksa apakah tiket ditemukan
    if (!$tickets) {
        return redirect()->route('ticket.create')->with('error', 'Tiket tidak ditemukan.');
    }

    // Kirim data tiket ke view
    return view('tickets/show', ['ticket' => $tickets]);
}




public function downloadPDF($id)
    {
    // Fetch the ticket based on ID
    $ticket = tiket::find($id);

    // Check if the ticket exists
    if (!$ticket) {
        return redirect()->route('ticket.index')->with('error', 'Ticket not found.');
    }

    // Generate PDF
    $pdf = PDF::loadView('tickets\pdf_report', ['ticket' => $ticket]);

    // Download the PDF
    return $pdf->download('ticket_' . $ticket->id . '.pdf');
    }
   

public function downloadReport()
{
    // Ambil data yang ingin ditampilkan di PDF
    $data = $this->getDataForReport(); // Ganti dengan metode yang sesuai untuk mendapatkan data

    // Buat PDF dari view
    $pdf = PDF::loadView('tickets.pdf_report', compact('data')); // Ganti 'report' dengan nama view Anda

    // Unduh file PDF
    return $pdf->download('laporan.pdf');
}
public function getDataForReport()
{
    // Ambil semua tiket dari database
    return Tiket::all(); // Ganti dengan query yang sesuai jika perlu
}
public function downloaPDF($id)
{
    // Ambil tiket berdasarkan ID
    $ticket = Tiket::find($id);

    // Periksa apakah tiket ditemukan
    if (!$ticket) {
        return redirect()->route('ticket.index')->with('error', 'Tiket tidak ditemukan.');
    }

    // Buat PDF dari view
    $pdf = PDF::loadView('pdf.ticket', ['ticket' => $ticket]);

    // Unduh file PDF
    return $pdf->download('ticket_' . $ticket->id . '.pdf');
}
public function showKapal()
{
    return view('sesi/kapal');
}
public function laporanTiket()
{
    $tickets = tiket::all(); // Ambil semua data tiket dari database
    return view('pdf.ticket', compact('tickets')); // Kirim data ke view
}
public function index(Request $request)
{
    $query = Tiket::query();

    // Apply date range filter if start and end dates are provided
    if ($request->filled('start_date') && $request->filled('end_date')) {
        $query->whereBetween('tanggal', [
            $request->input('start_date'), 
            $request->input('end_date')
        ]);
    }

    $tickets = $query->get();

    return view('tickets.report', compact('tickets'));
}
}
?>