@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="color: white;  text-align:center">System Users</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-dark" id="employees-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>User role</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td style="color: white;">{{ $user->name }}</td>
                        <td style="color: white;">{{ $user->user_role_name }}</td>
                        <td style="color: white;">{{ $user->email }}</td>
                        <td style="color: white;">{{ $user->phone }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> <!-- Font Awesome edit icon -->
                            </a>
                            <!-- You can add more actions if needed -->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Initialize DataTables -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <style>
        /* Custom CSS for hover color */
        .table-hover tbody tr:hover {
            background-color: #5C6875; /* Light gray background on hover */
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#employees-table').DataTable({
                responsive: true // Enable Responsive extension
            });
        });
    </script>
@endsection
