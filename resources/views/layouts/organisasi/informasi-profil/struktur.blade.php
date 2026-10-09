@extends('layouts.master')

@section('title', 'Tugas dan Fungsi BNN Kota Banjarmasin')

@section('content')
<div class="container mt-5 mb-5" style="padding-top: 15px;">
    
    @include('layouts.main.navigation-bar.main-informasi-profil')
    
    <div class="content-sejarah mt-4 text-center">
        <h2 class="fw-bold mb-4" style="color: #444;">Struktur Organisasi</h2>
        <h3 class="fw-bold mb-4" style="color: #444;">Badan Narkotika Nasional Kota Banjarmasin Tahun 2025-2026</h3>
    </div>
</div>

    <div class="background-struktur" id="kegiatanSection">
        <img src="{{ asset('images/background/gedung-bnnk.jpeg') }}" id="bgImage"></img>
        <div class="layer-background-struktur"></div>
        
        <div class="bnn-org-chart" style="position: relative; width: 100%; max-width: 1100px; height: 1000px; margin: 0 auto; padding-top: 40px;">
            <!-- CENTER VERTICAL LINE -->
            <div class="oc-line oc-line-v" style="left: 50%; top: 180px; height: 550px;"></div>

            <!-- KEPALA -->
            <div style="position: absolute; left: 50%; top: 70px; transform: translateX(-50%);">
                <div class="oc-person-card">
                    <div class="oc-person-photo">
                        <img src="{{ asset('images/Wuryantono.jpeg') }}" alt="Kepala">
                    </div>
                    <div class="oc-person-info">
                        <div class="oc-person-title">KEPALA</div>
                        <div class="oc-person-desc">
                            <p>KOMISARIS BESAR POLISI</p>
                            <p>WURYANTONO, S.I.K.,MH</p>
                            <p>NRP. 77090906</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BRANCH TO KASUBBAG -->
            <div class="oc-line oc-line-h" style="left: 550px; top: 325px; width: 210px;"></div>
            <div class="oc-arrow-right" style="left: 758px; top: 325px;"></div>

            <!-- KASUBBAG NODE -->
            <div style="position: absolute; left: 85%; top: 270px; width: 350px; transform: translateX(-50%); display: flex; flex-direction: column; align-items: center;">
                <div class="oc-person-card">
                    <div class="oc-person-photo">
                        <img src="{{ asset('images/Wuryantono.jpeg') }}" alt="Kasubbag Umum">
                    </div>
                    <div class="oc-person-info">
                        <div class="oc-person-title">KASUBBAG UMUM</div>
                        <div class="oc-person-desc">
                            <p>AHMAD TIJANI A.MD.KOM</p>
                            <p>NRP. 77090906</p>
                        </div>
                    </div>
                </div>

                <div class="oc-simple-card" style="margin-top: 50px; width: 340px;">PELAKSANA</div>
                
                <div class="oc-fungsional-card" style="margin-top: 50px; width: 340px; height: auto;">
                    <div class="oc-fungsional-title">FUNGSIONAL</div>
                    <div class="oc-fungsional-desc">
                        <p>1. PERENCANA AHLI PERTAMA</p>
                        <p>2. ARSIPARIS TERAMPIL</p>
                    </div>
                </div>

                <!-- SIDE LINE FOR KASUBBAG -->
                <div class="oc-line oc-line-h" style="left: 340px; top: 55px; width: 30px;"></div>
                <div class="oc-line oc-line-v" style="left: 370px; top: 55px; height: 250px;"></div>
                <div class="oc-line oc-line-h" style="left: 340px; top: 184px; width: 30px;"></div>
                <div class="oc-line oc-line-h" style="left: 340px; top: 305px; width: 30px;"></div>
            </div>


            <!-- MAIN HORIZONTAL FOR KATIMS -->
            <div class="oc-line oc-line-h" style="left: 15%; top: 690px; width: 70%;"></div>

            <!-- LEFT KATIM (P2M) -->
            <div style="position: absolute; left: 15%; top: 730px; transform: translateX(-50%); width: 350px; display: flex; flex-direction: column; align-items: center;">
                <!-- Small vertical line down -->
                <div class="oc-line oc-line-v" style="left: 50%; top: -41px; height: 65px;"></div>
                <div class="oc-arrow-down" style="left: 50%; top: 23px;"></div>
                
                <div class="oc-person-card" style="margin-top: 30px;">
                    <div class="oc-person-photo">
                        <img src="{{ asset('images/Wuryantono.jpeg') }}" alt="Katim P2M">
                    </div>
                    <div class="oc-person-info">
                        <div class="oc-person-title">KATIM P2M</div>
                        <div class="oc-person-desc">
                            <p>FARIDA APRIANA, SKM.</p>
                            <p>NIP. 19780409 200701 2 016</p>
                        </div>
                    </div>
                </div>
                
                <div class="oc-simple-card" style="margin-top: 50px; width: 340px">PELAKSANA</div>
                
                <div class="oc-fungsional-card" style="margin-top: 50px; width: 340px; height: auto;">
                    <div class="oc-fungsional-title">FUNGSIONAL</div>
                    <div class="oc-fungsional-desc">
                        <p>1. PENYULUH NARKOBA AHLI MUDA</p>
                        <p>2. PENYULUH NARKOBA AHLI PERTAMA</p>
                        <p>3. PENGGERAK SWADAYA MASYARAKAT</p>
                    </div>
                </div>

                <!-- SIDE LINE LEFT -->
                <div class="oc-line oc-line-h" style="left: -20px; top: 90px; width: 150px;"></div>
                <div class="oc-line oc-line-v" style="left: -20px; top: 90px; height: 250px;"></div>
                <div class="oc-line oc-line-h" style="left: -20px; top: 214px; width: 150px;"></div>
                <div class="oc-line oc-line-h" style="left: -20px; top: 339px; width: 150px;"></div>
            </div>

            <!-- CENTER KATIM (PEMBERANTASAN) -->
            <div style="position: absolute; left: 50%; top: 730px; transform: translateX(-50%); width: 350px; display: flex; flex-direction: column; align-items: center;">
                <!-- Small vertical line down -->
                <div class="oc-line oc-line-v" style="left: 50%; top: 0; height: 25px;"></div>
                <div class="oc-arrow-down" style="left: 50%; top: 23px;"></div>

                <div class="oc-person-card" style="margin-top: 30px;">
                    <div class="oc-person-photo">
                        <img src="{{ asset('images/Wuryantono.jpeg') }}" alt="Katim Pemberantasan">
                    </div>
                    <div class="oc-person-info">
                        <div class="oc-person-title">KATIM PEMBERANTASAN</div>
                        <div class="oc-person-desc">
                            <p>HERU COKRO GATI S.</p>
                            <p>NRP. 75050790</p>
                        </div>
                    </div>
                </div>

                <!-- Vertical line to Pelaksana -->
                <div class="oc-line oc-line-v" style="left: 50%; top: 140px; height: 55px;"></div>
                <div class="oc-simple-card" style="margin-top: 50px; width: 340px">PELAKSANA</div>
            </div>

            <!-- RIGHT KATIM (REHABILITAS) -->
            <div style="position: absolute; left: 85%; top: 730px; transform: translateX(-50%); width: 350px; display: flex; flex-direction: column; align-items: center;">
                <!-- Small vertical line down -->
                <div class="oc-line oc-line-v" style="left: 50%; top: -41px; height: 65px;"></div>
                <div class="oc-arrow-down" style="left: 50%; top: 23px;"></div>

                <div class="oc-person-card" style="margin-top: 30px;">
                    <div class="oc-person-photo">
                        <img src="{{ asset('images/Wuryantono.jpeg') }}" alt="Katim Rehabilitas">
                    </div>
                    <div class="oc-person-info">
                        <div class="oc-person-title">KATIM REHABILITAS</div>
                        <div class="oc-person-desc">
                            <p>EKA FITRIANA Y.S.R., S.E.</p>
                            <p>NIP. 19690620 199203 2 008</p>
                        </div>
                    </div>
                </div>

                <div class="oc-simple-card" style="margin-top: 50px; width: 340px">PELAKSANA</div>
                
                <div class="oc-fungsional-card" style="margin-top: 50px; width: 340px; height: auto;">
                    <div class="oc-fungsional-title">FUNGSIONAL</div>
                    <div class="oc-fungsional-desc">
                        <p>1. KONSELOR ADIKSI AHLI MUDA</p>
                        <p>2. KONSELOR ADIKSI AHLI PERTAMA</p>
                        <p>3. DOKTER</p>
                        <p>4. PSIKOLOG</p>
                    </div>
                </div>

                <!-- SIDE LINE RIGHT -->
                <div class="oc-line oc-line-h" style="left: 340px; top: 100px; width: 30px;"></div>
                <div class="oc-line oc-line-v" style="left: 370px; top: 99px; height: 253px;"></div>
                <div class="oc-line oc-line-h" style="left: 340px; top: 214px; width: 30px;"></div>
                <div class="oc-line oc-line-h" style="left: 340px; top: 350px; width: 30px;"></div>
            </div>

        </div>
    </div>

@endsection
