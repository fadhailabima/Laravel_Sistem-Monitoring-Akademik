@extends('layout/aplikasi')

@section('profil')
<div class="mr-5">
    <div class="inline-block relative shrink-0 cursor-pointer rounded-[.95rem]">
    </div>
</div>
<div class="mr-2 ">
    <a href="/dashboardmahasiswa/profile/edit" class="dark:hover:text-primary hover:text-primary transition-colors duration-200 ease-in-out text-[1.075rem] font-medium dark:text-neutral-400/90 text-secondary-inverse">{{ auth()->user()->departemen->nama_department }}</a>
    <span class="text-secondary-dark dark:text-stone-500 font-medium block text-[0.85rem]">{{ auth()->user()->departemen->nip }}</span>
    <span class="text-secondary-dark dark:text-stone-500 font-medium block text-[0.85rem]">{{ auth()->user()->departemen->email }}</span>
    <span class="text-secondary-dark dark:text-stone-500 font-medium block text-[0.85rem]">Fakultas Sains dan Matematika</span>
</div> 
@endsection

@section('sidebar')
<a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white" href="/dashboarddepartment">
    <i class="fas fa-home mr-2"></i>Home
</a>
<a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white" href="/dashboarddepartment/daftarmahasiswa">
    <i class="fas fa-file-alt mr-2"></i>Data Mahasiswa
</a>
<button type="button" class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white" id="rekapDropdown">
    <i class="fas fa-users mr-2"></i>Rekap Data
    <i class="fas fa-chevron-down text-xs"></i>
</button>
<div class="hidden absolute z-5 w-40 rounded-md bg-white ring-1 ring-black ring-opacity-5 shadow-lg" id="rekapDropdownContent">
    <a href="/dashboarddepartment/rekappkl" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">PKL</a>
    <a href="/dashboarddepartment/rekapskripsi" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Skripsi</a>
    <a href="/dashboarddepartment/rekapstatus" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Status</a>
</div>
<a class="block text-gray-500 py-2.5 px-4 my-2 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white mt-auto" href="{{ route('logout') }}">
    <i class="fas fa-sign-out-alt mr-2"></i>Logout
</a>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the dropdown button and content
        var dropdownButton = document.getElementById('rekapDropdown');
        var dropdownContent = document.getElementById('rekapDropdownContent');

        // Show/hide the dropdown content when the button is clicked
        dropdownButton.addEventListener('click', function () {
            dropdownContent.classList.toggle('hidden');
        });

        // Hide the dropdown content when clicking outside of it
        document.addEventListener('click', function (event) {
            if (!dropdownButton.contains(event.target) && !dropdownContent.contains(event.target)) {
                dropdownContent.classList.add('hidden');
            }
        });
    });
</script>
@endsection


@section('konten')
<div class="mt-2 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
    <div class="flex-5 bg-white p-2 shadow rounded-lg md:w-1/3">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-h5">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Mahasiswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jmlmhs }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-6 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
    <!-- Primer contenedor -->
    <!-- Sección 1 - Gráfica de Usuarios -->
    
    <!-- Segundo contenedor -->
    <!-- Sección 2 - Gráfica de Comercios -->
    <div class="flex-1 bg-white p-2 shadow rounded-lg md:w-1/3">
        <h2 class="text-gray-500 text-lg font-semibold pb-1">IRS Mahasiswa</h2>
        <div class="my-0.5"></div> <!-- Espacio de separación -->
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-3"></div> <!-- Línea con gradiente -->
        <div class="shadow-lg rounded-lg overflow-hidden w-flex h-60">
            <canvas class="ml-4 mr-4 py-2" id="chartStatusIRS"></canvas>
        </div> 
    </div>
    <div class="flex-1 bg-white p-2 shadow rounded-lg md:w-1/3">
        <h2 class="text-gray-500 text-lg font-semibold pb-1">KHS Mahasiswa</h2>
        <div class="my-0.5"></div> <!-- Espacio de separación -->
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-3"></div> <!-- Línea con gradiente -->
        <div class="shadow-lg rounded-lg overflow-hidden w-flex h-60">
            <canvas class="ml-4 mr-4 py-2" id="chartStatusKHS"></canvas>
        </div> 
    </div>
</div>

<div class="mt-6 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
    <div class="flex-1 bg-white p-2 shadow rounded-lg md:w-1/3">
        <h2 class="text-gray-500 text-lg font-semibold pb-1">PKL Mahasiswa</h2>
        <div class="my-0.5"></div> <!-- Espacio de separación -->
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-3"></div> <!-- Línea con gradiente -->
        <div class="shadow-lg rounded-lg overflow-hidden w-flex h-60">
            <canvas class="ml-4 mr-4 py-2" id="chartStatusPKL"></canvas>
        </div>
    </div>
    <div class="flex-1 bg-white p-2 shadow rounded-lg md:w-1/3">
        <h2 class="text-gray-500 text-lg font-semibold pb-1">Skripsi Mahasiswa</h2>
        <div class="my-0.5"></div> <!-- Espacio de separación -->
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-3"></div> <!-- Línea con gradiente -->
        <div class="shadow-lg rounded-lg overflow-hidden w-flex h-60">
            <canvas class="ml-4 mr-4 py-2" id="chartStatusSkripsi"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Chart pie -->
<script>

// Pie Chart IRS
const dataChartIRS = {
    labels: ["Belum Disetujui", "Sudah Disetujui", "Belum Mengisi"],
    datasets: [
    {
        label: "Status IRS",
        data: [{{ $irsCountNotVerified }}, {{ $irsCountVerified }}, {{ max(0, $irsbelum) }}],
        backgroundColor: [
        "#FFEC21",
        "#378AFF",
        "#F54F52",
        ],
        hoverOffset: 4,
    },
    ],
};

const configDataIRS = {
    type: "pie",
    data: dataChartIRS,
    options: {},
};

var chartBar = new Chart(document.getElementById("chartStatusIRS"), configDataIRS);


// Pie Chart KHS
const dataChartKHS = {
    labels: ["Belum Disetujui", "Sudah Disetujui", "Belum Mengisi"],
    datasets: [
    {
        label: "Status KHS",
        data: [{{ $khsCountNotVerified }}, {{ $khsCountVerified }}, {{ $khsbelum }}],
        backgroundColor: [
        "#FFEC21",
        "#378AFF",
        "#F54F52",
        ],
        hoverOffset: 4,
    },
    ],
};

const configDataKHS = {
    type: "pie",
    data: dataChartKHS,
    options: {},
};

var chartBar = new Chart(document.getElementById("chartStatusKHS"), configDataKHS);


// Pie Chart PKL
const dataChartPKL = {
    labels: ["Belum Disetujui", "Sudah Disetujui", "Belum Mengisi"],
    datasets: [
    {
        label: "Status PKL",
        data: [{{ $pklCountNotVerified }}, {{ $pklCountVerified }}, {{ $pklbelum }}],
        backgroundColor: [
        "#FFEC21",
        "#378AFF",
        "#F54F52",
        ],
        hoverOffset: 4,
    },
    ],
};

const configDataPKL = {
    type: "pie",
    data: dataChartPKL,
    options: {},
};

var chartBar = new Chart(document.getElementById("chartStatusPKL"), configDataPKL);

// Pie Chart Skripsi
const dataChartSkripsi = {
    labels: ["Belum Disetujui", "Sudah Disetujui", "Belum Mengisi"],
    datasets: [
    {
        label: "Status Skripsi",
        data: [{{ $skripsicountnotverified }}, {{ $skripsicountverified }}, {{ $skripsibelum }}],
        backgroundColor: [
        "#FFEC21",
        "#378AFF",
        "#F54F52",
        ],
        hoverOffset: 4,
    },
    ],
};

const configDataSkripsi = {
    type: "pie",
    data: dataChartSkripsi,
    options: {},
};

var chartBar = new Chart(document.getElementById("chartStatusSkripsi"), configDataSkripsi);
</script>

@endsection