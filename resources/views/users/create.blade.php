@extends('layouts.app')

@section('title', 'Create User')

@section('content')

<div class="header-spacer" style="height: 80px;"></div>

<div class="container py-5">
    <h1 class="text-center mb-4">Create New User</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <!-- Ime korisnika -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <!-- Email korisnika -->
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <!-- Lozinka korisnika -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <!-- Potvrda lozinke -->

        <!-- Role korisnika -->
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role_id" id="id" class="form-control" required>
                <option value="1">Admin</option>
                <option value="2">Editor</option>
                <option value="3">User</option>
            </select>
        </div>

        <!-- Dugme za kreiranje korisnika -->
        <button type="submit" class="btn btn-success">Create User</button>
    </form>
</div>
@endsection
