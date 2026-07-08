@extends('admin.layouts.app', ['title' => 'Beta Tester'])

@section('content')
    {{-- Statistik ringkas --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">👥 Total Pendaftar</div>
            <div class="stat-value">{{ $stats['total'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">⏳ Pending</div>
            <div class="stat-value">{{ $stats['pending'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">📨 Invited</div>
            <div class="stat-value">{{ $stats['invited'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">✅ Active</div>
            <div class="stat-value">{{ $stats['active'] }}</div>
        </div>
    </div>

    {{-- Filter & Export --}}
    <div class="panel">
        <div class="panel-header">
            <h2>📋 Daftar Beta Tester</h2>
            <a href="{{ route('admin.beta.export', request()->query()) }}" class="btn btn-primary btn-sm">📥 Export CSV</a>
        </div>
        <div style="padding: 16px 24px; border-bottom: 1px solid var(--gray-200); background: var(--gray-50);">
            <form method="GET" action="{{ route('admin.beta.index') }}" style="display:flex; gap:12px; flex-wrap:wrap; align-items:center;">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="🔍 Cari email..."
                       class="form-control" style="flex:1; min-width:200px;">
                <select name="status" class="form-control" style="width:auto;">
                    <option value="">Semua Status</option>
                    <option value="pending" @selected(request('status') === 'pending')>⏳ Pending</option>
                    <option value="invited" @selected(request('status') === 'invited')>📨 Invited</option>
                    <option value="active" @selected(request('status') === 'active')>✅ Active</option>
                    <option value="unsubscribed" @selected(request('status') === 'unsubscribed')>🚫 Unsubscribed</option>
                </select>
                <select name="app" class="form-control" style="width:auto;">
                    <option value="">Semua App</option>
                    <option value="both" @selected(request('app') === 'both')>Keduanya</option>
                    <option value="pos" @selected(request('app') === 'pos')>POS</option>
                    <option value="attendance" @selected(request('app') === 'attendance')>Attendance</option>
                </select>
                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                <a href="{{ route('admin.beta.index') }}" class="btn btn-secondary btn-sm">Reset</a>
            </form>
        </div>

        @if($testers->isEmpty())
            <div style="padding:48px; text-align:center; color:#6b7280;">
                <p style="font-size:2rem; margin-bottom:8px;">📭</p>
                <p style="font-size:0.95rem;">Belum ada pendaftar beta tester. Pengumuman &amp; form ada di <a href="/beta" target="_blank">/beta</a>.</p>
            </div>
        @else
        <table>
            <thead>
                <tr>
                    <th style="width:50px;">#</th>
                    <th>Email</th>
                    <th style="width:130px;">App</th>
                    <th style="width:110px;">Status</th>
                    <th>Tanggal Daftar</th>
                    <th style="width:160px; text-align:right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testers as $tester)
                    <tr>
                        <td style="color:#9ca3af;">{{ $tester->id }}</td>
                        <td>
                            <strong>{{ $tester->email }}</strong>
                            @if($tester->invited_at)
                                <br><small style="color:#9ca3af;">Diundang: {{ $tester->invited_at->format('d M Y') }}</small>
                            @endif
                        </td>
                        <td><span class="badge" style="background:#f3f4f6; color:#374151;">{{ $tester->app_label }}</span></td>
                        <td>
                            @php
                                $badgeColors = ['pending'=>'gray','invited'=>'blue','active'=>'green','unsubscribed'=>'gray'];
                            @endphp
                            <span class="badge {{ $badgeColors[$tester->status] ?? 'gray' }}">{{ ucfirst($tester->status) }}</span>
                        </td>
                        <td style="color:#6b7280; font-size:0.85rem;">{{ $tester->created_at->format('d M Y H:i') }}</td>
                        <td style="text-align:right;">
                            @if($tester->status !== 'invited')
                                <form method="POST" action="{{ route('admin.beta.status', $tester) }}" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="invited">
                                    <button type="submit" class="btn btn-secondary btn-sm" title="Tandai sudah diundang di Play Console">📨 Invited</button>
                                </form>
                            @endif
                            @if($tester->status !== 'active')
                                <form method="POST" action="{{ route('admin.beta.status', $tester) }}" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="active">
                                    <button type="submit" class="btn btn-secondary btn-sm" title="Tandai tester aktif">✅ Active</button>
                                </form>
                            @endif
                            <form method="POST" action="{{ route('admin.beta.destroy', $tester) }}" style="display:inline;" onsubmit="return confirm('Hapus {{ $tester->email }}?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <div style="margin-top:24px;">
        {{ $testers->links() }}
    </div>

    {{-- Petunjuk Google Play Console --}}
    <div class="panel" style="background:#fff7ed; border-color:#fed7aa;">
        <div style="padding:20px 24px; font-size:0.85rem; color:#9a3412; line-height:1.6;">
            <strong>📌 Cara pakai CSV untuk Google Play Console:</strong><br>
            1. Klik <strong>Export CSV</strong> (filter aktif akan ikut di-export, default exclude unsubscribed)<br>
            2. Buka Google Play Console → app → <strong>Testing → Closed testing</strong><br>
            3. Buat/kelola email list → <strong>paste email</strong> dari file CSV<br>
            4. Kembali ke sini → tandai tester sebagai <strong>📨 Invited</strong> (lalu ✅ Active setelah benar-benar mencoba)<br>
            <em style="color:#c2410c;">Catatan: Google butuh min. 20 tester aktif selama 14 hari berturut-turut untuk ajukan ke produksi.</em>
        </div>
    </div>
@endsection
