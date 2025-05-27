@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="header-spacer" style="height: 80px;"></div>

<div class="container py-5">
    <h1 class="text-center mb-5">Dashboard</h1>

    <!-- Logout dugme -->
    <div class="text-right mb-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    @if(Auth::user()->role_id === 1)
        <h2>Manage Users</h2>
        <a href="{{ route('users.create') }}" class="btn btn-success mb-3">
            <i class="fa fa-plus-circle"></i> Dodaj korisnika
        </a>

        <table class="table table-striped" id="usersTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Da li ste sigurni da želite da obrišete ovog korisnika?')">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Chart za broj proizvoda po mesecima (samo za admina) -->
        <h2 class="mt-5">Broj proizvoda po mesecima</h2>
        <div id="proizvodiChart" style="height: 400px;"></div>

    @elseif(Auth::user()->role_id === 2)
        <h2>Manage Products</h2>
        <a href="{{ route('proizvodi.create') }}" class="btn btn-success mb-3">
            <i class="fa fa-plus-circle"></i> Dodaj proizvod
        </a>

        <table class="table table-striped" id="productsTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Featured</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proizvodi as $proizvod)
                    <tr>
                        <td>{{ $proizvod->id }}</td>
                        <td>{{ $proizvod->naziv }}</td>
                        <td>{{ number_format($proizvod->cena, 2) }} RSD</td>
                        <td>{{ $proizvod->featured ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('proizvodi.edit', $proizvod->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('proizvodi.destroy', $proizvod->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Da li ste sigurni da želite da obrišete ovaj proizvod?')">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <p>You are logged in as a regular user.</p>
    @endif
</div>
@endsection

@section('scripts')
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/sr-SP.json'
            }
        });

        $('#productsTable').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/sr-SP.json'
            }
        });
    });
</script>

@if(Auth::user()->role_id === 1)
<!-- Google Charts -->
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Mesec', 'Broj proizvoda'],
            @foreach($chartData ?? [] as $row)
                ['{{ $row['mesec'] }}', {{ $row['broj'] }}],
            @endforeach
        ]);

        var options = {
            title: 'Kreirani proizvodi po mesecima',
            curveType: 'function',
            legend: { position: 'bottom' },
            height: 400,
            colors: ['#00bba7']
            
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('proizvodiChart'));
        chart.draw(data, options);
    }
</script>
@endif
@endsection
