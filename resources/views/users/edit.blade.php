@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card m-3 p-4">
            <h2 style="color:white; text-align:center">Edit user account details</h2>

            <!-- Form for editing employee details -->
            <form method="POST" action="{{ route('users.update', $users->id) }}" class="container" onsubmit="return validatePassword()">
                @csrf
                @method('PUT')

                @if(session('success'))
                    <div id="success-alert2" class="alert alert-success fade-out">{{ session('success') }}</div>
                    <script>
                        setTimeout(function() {
                            document.getElementById('success-alert2').style.display = 'none';
                        }, 5000); // 5000 milliseconds = 5 seconds
                    </script>
                @endif

                <div class="row mb-3" style='margin-top:15px;'>
                    <div class="col-md-4">
                        <label for="name" class="form-label" style="color:darkgrey">Name</label>
                        <input type="text" id="name" name="name" class="form-control" required value="{{ $users->name }}">
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label" style="color:darkgrey">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required value="{{ $users->email }}">
                    </div>
                    <div class="col-md-4">
                        <label for="user_role_name" class="form-label" style="color:darkgrey">User role name</label>
                        <input type="text" id="user_role_name" name="user_role_name" class="form-control" required value="{{ $users->user_role_name }}">
                    </div>
                </div>


                <div class="row mb-3" style='margin-top:15px;'>
                    <div class="col-md-4">
                        <label for="phone" class="form-label" style="color:darkgrey">Phone number (e.g. +2658899887766)</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $users->phone }}">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="form-label" style="color:darkgrey">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="password_confirmation" class="form-label" style="color:darkgrey ">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        <div id="password-error" class="text-danger" style="display: none;">Passwords do not match.</div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirmation").value;

            if (password !== confirmPassword) {
                document.getElementById("password-error").style.display = "block";
                return false;
            } else {
                document.getElementById("password-error").style.display = "none";
                return true;
            }
        }

        $(document).ready(function() {
            $('#super_admin').change(function() {
                var isChecked = $(this).is(':checked');

                // If 'super admin' checkbox is checked, make other checkboxes read-only
                if (isChecked) {
                    $('input[type="checkbox"]').not(this).prop('disabled', true);
                } else {
                    // If 'super admin' checkbox is unchecked, enable other checkboxes
                    $('input[type="checkbox"]').not(this).prop('disabled', false);
                }
            });
        });
    </script>
@endsection
