@extends('admin.admin_dashboard')
@section('admin')

<head>
    <meta charset="utf-8" />
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<div class="container mx-auto p-6">
    <!-- Page Title -->
    <div class="bg-white shadow rounded-lg p-4 mb-6">
        <h4 class="text-xl font-semibold">Change Password</h4>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">



        <!-- Settings Form -->
        <div class="md:col-span-2 bg-white shadow rounded-lg p-6">

            <form method="POST" action="{{ route('update.password') }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="firstname" class="block text-sm font-medium text-gray-700">Old Password</label>
                        <input type="password" name="old_password"  class="mt-1 block w-full p-2 border border-gray-300 rounded-lg @error('old_password') is-invalid @enderror" id="old_password" >
                        @error('old_password')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                    <div>
                        <label for="firstname" class="block text-sm font-medium text-gray-700">New Password</label>
                        <input type="password" name="new_password"  class="mt-1 block w-full p-2 border border-gray-300 rounded-lg @error('new_password') is-invalid @enderror" id="new_password" >
                        @error('new_password')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                    <div>
                        <label for="firstname" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation"  class="mt-1 block w-full p-2 border border-gray-300 rounded-lg" id="new_password_confirmation" >

                    </div>

                </div>

                <div class="text-right mt-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

