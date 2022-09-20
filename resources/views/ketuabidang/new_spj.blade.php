@extends('layouts.layout2')

    @section('title', 'Dashboard')

    @section('role', $role)
    @if(isset(auth()->user()->bidang->name))
        @section('bidang', auth()->user()->bidang->name)
    @endif

    @section('content')
    <div class="mdk-drawer-layout__content page-content">

            <div class="border-bottom-2 py-32pt position-relative z-1">
                <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                    <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

                        <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                            <h2 class="mb-0">Dashboard</h2>

                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                                <li class="breadcrumb-item active">
                                    Dashboard
                                </li>

                            </ol>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid page__container">
                <div class="page-section">
                @if(isset(auth()->user()->bidang))
                    <div class="page-separator">
                        <div class="page-separator__text">{{auth()->user()->bidang->name}}</div>
                    </div>
                    @endif


                    <div class="card mb-lg-32pt">
                        <div>
                            <div class="card-header">
                                <label class="mr-sm-2 form-label">Buat Pengajuan SPJ</label>
                            </div>
                        </div>
                        <form action="{{ route('ketua-bidang.upload_spj') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body d-flex flex-column">
                            <div class="form-group">
                            <label class="form-label">ID Transaksi</label>
                            <input type="text"
                                class="form-control"
                                disabled=""
                                id="transation_id"
                                placeholder=""
                                value="{{$variable}}"
                                name="id_transaksi">
                            </div>
                            <div class="form-group">
                            <label class="form-label">Tanggal</label>
                            <input type="text"
                                class="form-control"
                                id="date"
                                disabled=""
                                placeholder=""
                                >
                            </div>
                            <div class="form-group">
                            <label class="form-label">Bidang</label>
                            <input type="text"
                                class="form-control"
                                id="bidang"
                                disabled=""
                                placeholder=""
                                value="{{auth()->user()->bidang->name}}"
                                name="bidang">
                            </div>
                            <div class="form-group">
                            <label class="form-label">Deskripsi</label>
                            <input type="text"
                                class="form-control"
                                id="description"
                                placeholder=""
                                name="deskripsi"
                                required>
                            </div>
                            <div class="form-group">
                            <label class="form-label"
                                    for="maskSample01">Nominal SPJ</label>
                            <input id="amount"
                                    type="text"
                                    class="form-control"
                                    placeholder="Number: 2.342"
                                    data-mask="#.##0"
                                    data-mask-reverse="true"
                                    name="nominal_spj"
                                    required>
                            </div>
                            <div class="form-group">
                            <label class="form-label">Termin</label>
                            <input type="text"
                                class="form-control"
                                id="description"
                                placeholder=""
                                name="termin">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Upload Berkas SPJ</label>
                                <div class="custom-file">
                                    <input type="file"
                                            class="custom-file-input"
                                            name="spj_file"
                                            required
                                            onchange="clickme()"
                                            id="file1">
                                    <label for="file"
                                            class="custom-file-label" id="filename">Pilih file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Upload Rincian SPJ - Format Excel</label>
                                <div class="custom-file">
                                    <input type="file"
                                            id="file"
                                            class="custom-file-input"
                                            name="spj_excel"
                                            required
                                            onchange="clickme2()">
                                    <label for="file"
                                            class="custom-file-label" id="filename2">Pilih file</label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="">
                                    <button type="submit" class="btn btn-success btn-rounded">Kirim</button>
                                </div>
                            </div>
                            
                        
                        </div>
                        </form>
                        <div class="card-footer p-8pt">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('sidebar-content')
        <ul class="sidebar-menu">
                <li class="sidebar-menu-item active">
                    <a class="sidebar-menu-button"
                        href="{{route('ketua-bidang.home')}}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                        <span class="sidebar-menu-text">Dashboard</span>
                    </a>
                </li>
            </ul>
    @endsection

    @section('new-script')
        <script> 
            const filename = document.getElementById('filename')
            function clickme(){
                let data = $('input[type=file][id=file1]').val()
                data = data.split("\\");
                document.getElementById('filename').innerHTML = data[2]
            }

            const filename2 = document.getElementById('filename2')

            function clickme2(){
                let data2 = $('input[type=file][id=file]').val()
                data2 = data2.split("\\")
                filename2.innerHTML = data2[2]
            }
        </script>
    @endsection