@extends('layouts.mainLayout')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-4">
        <div class="content-header mb-4" style="color: black">
            <h4>Dashboard Overview</h4>
        </div>

        {{-- Statistic Cards --}}
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card shadow" style="background-color: #64B5F6; color:rgb(3, 16, 36);"> <!-- Softer blue with dark blue text -->
                    <div class="card-body">
                        <h5 class="card-title text-stroke">Total Citizens</h5>
                        <p class="card-text fs-4 text-stroke">{{ $citizenCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow" style="background-color: #81C784; color:rgb(12, 75, 16);"> <!-- Softer green with dark green text -->
                    <div class="card-body">
                        <h5 class="card-title text-stroke">Total Households</h5>
                        <p class="card-text fs-4 text-stroke">{{ $householdCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow" style="background-color: #FFEB3B; color:rgb(100, 58, 22);"> <!-- Softer yellow with dark yellow text -->
                    <div class="card-body">
                        <h5 class="card-title text-stroke">Business Permits</h5>
                        <p class="card-text fs-4 text-stroke">{{ $permitCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mx-auto">
                <div class="card shadow" style="background-color: #F28B82; color:rgb(85, 14, 14);"> <!-- Softer red with dark red text -->
                    <div class="card-body">
                        <h5 class="card-title text-stroke">Complaints</h5>
                        <p class="card-text fs-4 text-stroke">{{ $complaintCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mx-auto">
                <div class="card shadow" style="background-color: #343a40; color: #FFFFFF;"> <!-- Black remains the same with white text -->
                    <div class="card-body">
                        <h5 class="card-title text-stroke">Incidents</h5>
                        <p class="card-text fs-4 text-stroke">{{ $incidentCount }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Overview + Age Bracket Distribution --}}
        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-success text-white fw-bold">Overview Chart</div> <!-- Keep green for key sections -->
                    <div class="card-body">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-light text-success fw-bold">Age Bracket Distribution</div> <!-- Neutral header -->
                    <div class="card-body">
                        <canvas id="ageChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recently Added Citizens --}}
        <div class="card shadow mb-4">
            <div class="card-header bg-light text-success fw-bold">Recently Added Citizens</div> <!-- Neutral header -->
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Gender</th>
                            <th>Date Added</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentCitizens as $citizen)
                            <tr>
                                <td>{{ $citizen->id }}</td>
                                <td>{{ $citizen->first_name }} {{ $citizen->last_name }}</td>
                                <td>{{ $citizen->gender }}</td>
                                <td>{{ $citizen->created_at->format('M d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Distribution Chart + Sex Summary --}}
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-light fw-bold">Distribution Chart</div>
                    <div class="card-body">
                        <canvas id="doughnutChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-success text-white fw-bold">Sex Summary</div>
                    <div class="card-body">
                        <canvas id="sexChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const barChart = new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: ['Citizens', 'Households', 'Permits', 'Complaints', 'Incidents'],
                datasets: [{
                    label: 'Counts',
                    backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#343a40'],
                    data: [
                        {{ $citizenCount }},
                        {{ $householdCount }},
                        {{ $permitCount }},
                        {{ $complaintCount }},
                        {{ $incidentCount }}
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });

        const doughnutChart = new Chart(document.getElementById('doughnutChart'), {
            type: 'doughnut',
            data: {
                labels: ['Citizens', 'Households', 'Permits', 'Complaints', 'Incidents'],
                datasets: [{
                    backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#343a40'],
                    data: [
                        {{ $citizenCount }},
                        {{ $householdCount }},
                        {{ $permitCount }},
                        {{ $complaintCount }},
                        {{ $incidentCount }}
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        const ageChart = new Chart(document.getElementById('ageChart'), {
            type: 'bar',
            data: {
                labels: ['Minor (0–17)', 'Adult (18–59)', 'Senior (60+)'],
                datasets: [{
                    label: 'No. of Citizens',
                    data: [
                        {{ $ageBrackets['minor'] }},
                        {{ $ageBrackets['adult'] }},
                        {{ $ageBrackets['senior'] }}
                    ],
                    backgroundColor: ['#81C784', '#4CAF50', '#2E7D32']
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        const sexChart = new Chart(document.getElementById('sexChart'), {
            type: 'pie',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    data: [
                        {{ $sexSummary['male'] }},
                        {{ $sexSummary['female'] }}
                    ],
                    backgroundColor: ['#64B5F6', '#F48FB1']
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>

    <style>
        .row.g-4.mb-4 {
            margin-bottom: 2rem; 
        }

        .card:hover {
            transform: scale(1.02);
            transition: transform 0.2s ease-in-out;
        }

        .card-title {
            font-size: 1.2rem; 
        }
        canvas {
            border: 1px solid #ddd;
            border-radius: 5px;
}
    </style>
@endsection
