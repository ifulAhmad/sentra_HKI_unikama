@extends('admins.partials.main')

@section('admin-content')
    <div class="container mx-auto p-6">
        {{-- Statistik Data --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-3">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="font-semibold text-gray-600">Total Pemohon</h2>
                <p class="text-3xl font-bold text-blue-500">{{ $totalApplicants }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="font-semibold text-gray-600">Total Pengajuan</h2>
                <p class="text-3xl font-bold text-green-500">{{ $totalSubmissions }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="font-semibold text-gray-600">Pemohon Tahun Ini</h2>
                <p class="text-3xl font-bold text-purple-500">{{ $applicantsThisYear }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="font-semibold text-gray-600">Pengajuan Tahun Ini</h2>
                <p class="text-3xl font-bold text-yellow-500">{{ $submissionsThisYear }}</p>
            </div>
        </div>

        {{-- Grafik Perkembangan --}}
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-600 mb-4">Perkembangan Data</h2>
            <canvas id="growthChart" class="w-full"></canvas>
        </div>
    </div>

    {{-- Chart.js Script --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('growthChart').getContext('2d');
        const growthChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($years) !!},
                datasets: [{
                        label: 'Applicants',
                        data: {!! json_encode($applicantsPerYear) !!},
                        borderColor: 'rgba(59, 130, 246, 0.8)',
                        backgroundColor: 'rgba(59, 130, 246, 0.3)',
                        fill: true,
                        tension: 0.3
                    },
                    {
                        label: 'Submissions',
                        data: {!! json_encode($submissionsPerYear) !!},
                        borderColor: 'rgba(34, 197, 94, 0.8)',
                        backgroundColor: 'rgba(34, 197, 94, 0.3)',
                        fill: true,
                        tension: 0.3
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Year'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Count'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
