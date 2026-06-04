@extends('layouts.admin')

@section('title', 'Dashboard')

@push('head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.js"></script>
@endpush

@section('content')
<h1 class="font-devcon text-3xl mb-6">Dashboard</h1>

<div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
    <div class="stat-card">
        <div class="text-ink-subtle text-xs uppercase tracking-wide font-medium">Total registrations</div>
        <div class="stat-value mt-3">{{ $total }}</div>
    </div>
    <div class="stat-card">
        <div class="text-ink-subtle text-xs uppercase tracking-wide font-medium">Checked in</div>
        <div class="stat-value mt-3" style="color: var(--color-success);">{{ $checkedIn }}</div>
    </div>
    <div class="stat-card">
        <div class="text-ink-subtle text-xs uppercase tracking-wide font-medium">Pending</div>
        <div class="stat-value mt-3">{{ $pending }}</div>
    </div>
    <div class="stat-card">
        <div class="text-ink-subtle text-xs uppercase tracking-wide font-medium">Check-in rate</div>
        <div class="stat-value mt-3">{{ $rate }}%</div>
    </div>
</div>

<div class="grid gap-6 lg:grid-cols-2">
    <div class="admin-card p-6 lg:col-span-2">
        <h2 class="font-devcon text-xl mb-4">Check-ins by day</h2>
        <div style="position: relative; height: 280px;">
            <canvas id="checkinsByDay"></canvas>
        </div>
    </div>

    <div class="admin-card p-6">
        <h2 class="font-devcon text-xl mb-4">Male vs Female</h2>
        <div style="position: relative; height: 240px;">
            <canvas id="genderChart"></canvas>
        </div>
    </div>

    <div class="admin-card p-6">
        <h2 class="font-devcon text-xl mb-4">Student vs Professional</h2>
        <div style="position: relative; height: 240px;">
            <canvas id="affiliationChart"></canvas>
        </div>
    </div>

    <div class="admin-card p-6 lg:col-span-2">
        <h2 class="font-devcon text-xl mb-4">Why attendees are coming</h2>
        <div style="position: relative; height: 260px;">
            <canvas id="reasonChart"></canvas>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function () {
        if (typeof Chart === 'undefined') {
            return;
        }

        const gold = '#D4A017';
        const violet = '#7C3AED';
        const cyan = '#06B6D4';
        const success = '#10B981';
        const gridColor = '#E5E5EC';

        Chart.defaults.font.family = "'Inter', ui-sans-serif, system-ui, sans-serif";
        Chart.defaults.color = '#4B4B5C';

        const intAxis = { beginAtZero: true, ticks: { precision: 0 }, grid: { color: gridColor } };

        new Chart(document.getElementById('checkinsByDay'), {
            type: 'bar',
            data: {
                labels: @json($checkInsByDayLabels),
                datasets: [{ label: 'Check-ins', data: @json($checkInsByDayData), backgroundColor: gold, borderRadius: 6 }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: intAxis, x: { grid: { display: false } } },
            },
        });

        new Chart(document.getElementById('genderChart'), {
            type: 'bar',
            data: {
                labels: Object.keys(@json($genderData)),
                datasets: [{ label: 'Attendees', data: Object.values(@json($genderData)), backgroundColor: [violet, cyan], borderRadius: 6 }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: intAxis, x: { grid: { display: false } } },
            },
        });

        new Chart(document.getElementById('affiliationChart'), {
            type: 'bar',
            data: {
                labels: Object.keys(@json($affiliationData)),
                datasets: [{ label: 'Attendees', data: Object.values(@json($affiliationData)), backgroundColor: [gold, success], borderRadius: 6 }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: intAxis, x: { grid: { display: false } } },
            },
        });

        new Chart(document.getElementById('reasonChart'), {
            type: 'doughnut',
            data: {
                labels: Object.keys(@json($reasonData)),
                datasets: [{ data: Object.values(@json($reasonData)), backgroundColor: [violet, gold, cyan], borderWidth: 0 }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'right' } },
            },
        });
    })();
</script>
@endpush
