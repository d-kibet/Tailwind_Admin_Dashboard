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
        <h4 class="text-xl font-semibold">Admin Profile</h4>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Profile Card -->
        <div class="bg-white shadow rounded-lg p-6 text-center">
            <img src="{{ (!empty($adminData->photo)) ? url('upload/admin_image/'.$adminData->photo) : url('upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
            <h4 class="mb-0">{{ $adminData->name }}</h4>
                <p class="text-muted">{{ $adminData->email }}</p>

            <div class="mt-4">
                <button class="bg-green-500 text-white px-4 py-2 rounded text-sm">Follow</button>
                <button class="bg-red-500 text-white px-4 py-2 rounded text-sm">Message</button>
            </div>
            <div class="text-left mt-4">
                <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{ $adminData->name }}</span></p>
                <p class="text-muted mb-2 font-13"><strong>Phone :</strong><span class="ms-2">{{ $adminData->phone }}</span>
                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{ $adminData->email }}</span></p>

            </div>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="#" class="text-blue-600 text-xl"><i class="mdi mdi-facebook"></i></a>
                <a href="#" class="text-red-600 text-xl"><i class="mdi mdi-google"></i></a>
                <a href="#" class="text-blue-400 text-xl"><i class="mdi mdi-twitter"></i></a>
                <a href="#" class="text-gray-600 text-xl"><i class="mdi mdi-github"></i></a>
            </div>
        </div>

        <!-- Settings Form -->
        <div class="md:col-span-2 bg-white shadow rounded-lg p-6">
            <h5 class="text-lg font-semibold mb-4">Personal Info</h5>
            <form method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" name="name"  class="mt-1 block w-full p-2 border border-gray-300 rounded-lg" id="firstname" value="{{ $adminData->name }}" >
                    </div>

                    <div>
                        <label for="lastname" class="form-label">Email</label>
                        <input type="email" name="email" id="lastname" placeholder="Enter Your email"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-lg" value="{{ $adminData->email }}">
                    </div>

                    <div>
                        <label for="lastname" class="form-label">Phone</label>
                        <input type="text" name="phone" id="lastname" placeholder="Enter Your email"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-lg" value="{{ $adminData->phone }}">
                    </div>


                    <div class="col-md-12">
                        <div class="mb-3">
                                <label for="example-fileinput" class="form-label">Admin Profile Image</label>
                                <input type="file" name="photo" id="image" class="form-control">
                            </div>
                         </div> <!-- end col -->

                         <div class="col-md-12">
                            <div class="mb-3">
                                    <label for="example-fileinput" class="form-label"> </label>
                                    <img id="showImage" src="{{ (!empty($adminData->photo)) ? url('upload/admin_image/'.$adminData->photo) : url('upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail"
                                     alt="profile-image">
                                </div>
                             </div> <!-- end col -->

                </div>
                <div class="text-right mt-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload =  function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

@endsection

