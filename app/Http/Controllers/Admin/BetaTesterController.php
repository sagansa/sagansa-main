<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BetaTester;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BetaTesterController extends Controller
{
    /**
     * Daftar beta tester dengan filter & search.
     */
    public function index(Request $request)
    {
        $query = BetaTester::query();

        if ($status = $request->get('status')) {
            $query->where('status', $status);
        }
        if ($app = $request->get('app')) {
            $query->where('app', $app);
        }
        if ($search = $request->get('q')) {
            $query->where('email', 'like', "%{$search}%");
        }

        $testers = $query->latest()->paginate(50)->withQueryString();

        // Statistik ringkas
        $stats = [
            'total' => BetaTester::count(),
            'pending' => BetaTester::pending()->count(),
            'invited' => BetaTester::invited()->count(),
            'active' => BetaTester::active()->count(),
            'unsubscribed' => BetaTester::where('status', 'unsubscribed')->count(),
        ];

        return view('admin.beta.index', compact('testers', 'stats'));
    }

    /**
     * Export CSV daftar email (format siap paste ke Google Play Console).
     */
    public function export(Request $request): StreamedResponse
    {
        $query = BetaTester::query();

        // Filter sama dengan index (export filter-aware)
        if ($status = $request->get('status')) {
            $query->where('status', $status);
        }
        if ($app = $request->get('app')) {
            $query->where('app', $app);
        }
        if ($search = $request->get('q')) {
            $query->where('email', 'like', "%{$search}%");
        }

        // Default: exclude unsubscribed kecuali diminta
        if (!$request->filled('status')) {
            $query->where('status', '!=', 'unsubscribed');
        }

        $testers = $query->orderBy('email')->get();

        $dateStamp = now()->format('Y-m-d_His');
        $filename = "beta-testers-{$dateStamp}.csv";

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        return response()->stream(function () use ($testers) {
            $handle = fopen('php://output', 'w');
            // BOM agar Excel baca UTF-8 dengan benar
            fwrite($handle, "\xEF\xBB\xBF");
            // Header row
            fputcsv($handle, ['email', 'app', 'status', 'registered_at']);
            foreach ($testers as $t) {
                fputcsv($handle, [$t->email, $t->app_label, $t->status, $t->created_at?->format('Y-m-d H:i:s')]);
            }
            fclose($handle);
        }, Response::HTTP_OK, $headers);
    }

    /**
     * Update status tester (mis. tandai invited setelah add di Play Console).
     */
    public function updateStatus(Request $request, BetaTester $tester)
    {
        $data = $request->validate([
            'status' => ['required', Rule::in(['pending', 'invited', 'active', 'unsubscribed'])],
        ]);

        $tester->status = $data['status'];
        $tester->invited_at = $data['status'] === 'invited' ? now() : null;
        $tester->save();

        return back()->with('success', "Status tester diubah menjadi: {$data['status']}.");
    }

    /**
     * Hapus tester.
     */
    public function destroy(BetaTester $tester)
    {
        $tester->delete();

        return back()->with('success', 'Tester dihapus.');
    }
}
