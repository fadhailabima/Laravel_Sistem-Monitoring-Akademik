<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siap Undip</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>


<body style="background-color:#bfdeeb">

    <!-- header-->  
    
            <nav class=" navbar navbar-expand-lg navbar-light text-light" style="background-color:#083c7859; box-shadow: 2px 0px rgb(69, 67, 67);">
    <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> -->
        <svg xmlns="http://www.w3.org/2000/svg" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" width="40" height="40" fill="currentColor" class="bi bi-list ml-3" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
    </a>
    <ul class="dropdown-menu text-light" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>

    </ul>

    <div class="container">
        <img src="{{ asset('images/logo.png') }}" alt="logo" width="40" height="40">
        <div class="container justify-content-left text-left text-light">
            <h4>Sistem Monitoring Mahasiswa</h4>
            <h4>UNDIP</h4>
        </div>
    </div>
    <div class="me-4 align-items-center flex justify-center text-light" style="text-align:center">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 256 256">
            <path fill="currentColor" d="m226.53 56.41l-96-32a8 8 0 0 0-5.06 0l-96 32A8 8 0 0 0 24 64v80a8 8 0 0 0 16 0V75.1l33.59 11.19a64 64 0 0 0 20.65 88.05c-18 7.06-33.56 19.83-44.94 37.29a8 8 0 1 0 13.4 8.74C77.77 197.25 101.57 184 128 184s50.23 13.25 65.3 36.37a8 8 0 0 0 13.4-8.74c-11.38-17.46-27-30.23-44.94-37.29a64 64 0 0 0 20.65-88l44.12-14.7a8 8 0 0 0 0-15.18ZM176 120a48 48 0 1 1-86.65-28.45l36.12 12a8 8 0 0 0 5.06 0l36.12-12A47.89 47.89 0 0 1 176 120Zm-48-32.43L57.3 64L128 40.43L198.7 64Z"/>
        </svg>
        <!-- <li class="nav-item"><a href="profil-mahasiswa.php" class="nav-pills-link justify-content-center text-light"><h5>Mahasiswa</h5></a></li> -->
        <h5>{{ auth()->user()->name }}</h5>
    </div>
    </nav>

    <!--form-->
    <div class="me-5 ms-5">
        
        <br>
        <ul class="nav nav-pills justify-content-center text-dark">
            <li class="nav-item"><a href="/dashboardmahasiswa" class="nav-link text-dark"><b>Home</b></a></li>
            <li class="nav-item"><a href="#" class="nav-link active" aria-current="page" style="background-color:#101E31"><b>Edit Profil</b></a></li>
            <li class="nav-item"><a href="/dashboardmahasiswa/IsiIRSMahasiswa" class="nav-link text-dark"><b>Data IRS</b></a></li>
            <li class="nav-item"><a href="/dashboardmahasiswa/IsiKHSMahasiswa" class="nav-link text-dark"><b>Data KHS</b></a></li>
            <li class="nav-item"><a href="/dashboardmahasiswa/IsiPKLMahasiswa" class="nav-link text-dark"><b>Data PKL</b></a></li>
            <li class="nav-item"><a href="/dashboardmahasiswa/IsiSkripsiMahasiswa" class="nav-link text-dark"><b>Data Skripsi</b></a></li>
        </ul>
        <div class="container mt-4 flex justify-center items-center">
            <h2 class="text-4xl text-center">Profile Mahasiswa</h2>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="container mx-auto px-4 mt-4 bg-white rounded-2xl max-w-screen-md">
            <div class="flex justify-center">
                <div class="row">    
                    <div class="col-md-4 col-lg-2 col-sm-4 w-1/4 mt-4 text-center">
                        <img src="{{ asset('storage/photo/'.auth()->user()->photo) }}" class="rounded-circle img-thumbnail" style="height: 130px; width: 130px; position: absolute; margin: auto auto; left: 0; right: 475px">

                        {{-- <br>
                        <form method="POST"  action="/dashboardmahasiswa/profile/edit" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <input type="hidden" name="id_mhs" value="">
                            <div>
                                <label for="photo" class="block text-sm font-medium text-gray-700">Input Foto Profil :</label>
                                <input type="file" name="photo" id="photo" class="form-control @error('photo')
                                is-invalid    
                                @enderror  mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    value="{{ old('photo', auth()->user()->photo) }}">
                                @error('nomortlp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="bg-black text-white text-center py-2 px-4 mt-2 rounded" name="submit" value="submit">Simpan</button>
                        </form> --}}
                    </div>
                    <div class="col-md-8 col-lg-10 col-sm-8 w-3/4">
                        <form class="user" method="POST" action="/dashboardmahasiswa/profile/edit" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3 row mt-4">
                                <label for="name"  class="col-sm-4 col-form-label">Nama :</label>
                                <div class="form-group col-sm-6">
                                    <input type="text"
                                        class="form-control 
                                        @error('name')
                                    is-invalid    
                                    @enderror"
                                        id="name" name="name" 
                                        value="{{ old('name', auth()->user()->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nim" class="col-sm-4 col-form-label">NIM :</label>
                                <div class="form-group col-sm-6">
                                    <input type="text"
                                        class="form-control 
                                    @error('nim')
                                    is-invalid    
                                    @enderror"
                                        id="nim" name="nim"
                                        value="{{ old('nim', auth()->user()->nim) }}" disabled>
                                    @error('nim')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jurusan" class="col-sm-4 col-form-label">Jurusan :</label>
                                <div class="form-group col-sm-6">
                                    <input type="text"
                                        class="form-control 
                                    @error('jurusan')
                                    is-invalid    
                                    @enderror"
                                        id="jurusan" name="jurusan" 
                                        value="{{ old('jurusan', auth()->user()->jurusan) }}">
                                    @error('jurusan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="angkatan" class="col-sm-4 col-form-label">Angkatan :</label>
                                <div class="form-group col-sm-6">
                                    <input type="text"
                                        class="form-control 
                                        @error('angkatan')
                                    is-invalid    
                                    @enderror"
                                        id="angkatan" name="angkatan"
                                        value="{{ old('angkatan', auth()->user()->angkatan) }}" disabled>
                                    @error('angkatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat :</label>
                                <div class="form-group col-sm-6">
                                    <input type="text"
                                        class="form-control 
                                        @error('alamat')
                                    is-invalid    
                                    @enderror"
                                        id="alamat" name="alamat" 
                                        value="{{ old('alamat', auth()->user()->alamat) }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nomortlp" class="col-sm-4 col-form-label">Nomor Telepon :</label>
                                <div class="form-group col-sm-6">
                                    <input type="text"
                                        class="form-control 
                                        @error('nomortlp')
                                    is-invalid    
                                    @enderror"
                                        id="nomortlp" name="nomortlp" 
                                        value="{{ old('nomortlp', auth()->user()->nomortlp) }}">
                                    @error('nomortlp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-4 col-form-label">Password :</label>
                                <div class="form-group col-sm-6">
                                    <input type="password"
                                        class="form-control 
                                        @error('password')
                                    is-invalid    
                                    @enderror"
                                        id="password" name="password" 
                                        value="{{ old('password', auth()->user()->password) }}">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="photo" class="col-sm-4 col-form-label">Input Foto Profil :</label>
                                <div class="form-group col-sm-6">
                                    <input type="file" name="photo" id="photo" class="form-control @error('photo')
                                    is-invalid    
                                    @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ old('photo', auth()->user()->photo) }}">
                                    @error('photo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                                <div class="mt-4">
                                    <div class="inline-block">
                                        <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                    </div>
                                    <div class="inline-block ml-4">
                                        <a href="/dashboardmahasiswa" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">Cancel</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>


</html>