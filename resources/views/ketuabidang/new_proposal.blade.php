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
                                <label class="mr-sm-2 form-label">Buat Pengajuan Termin</label>
                            </div>
                        </div>
                        <form action="{{route('ketua-bidang.upload_proposal')}}" method="post" enctype="multipart/form-data">
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
                                value="{{auth()->user()->bidang->name}}">
                            </div>
                            <div class="form-group">
                            <label class="form-label">Deskripsi</label>
                            <input type="text"
                                class="form-control"
                                id="description"
                                placeholder=""
                                name="deskripsi">
                            </div>
                            <div class="form-group">
                            <label class="form-label"
                                    for="maskSample01">Jumlah Pengajuan</label>
                            <input id="amount"
                                    type="text"
                                    class="form-control"
                                    placeholder="Number: 2.342"
                                    data-mask="#.##0"
                                    data-mask-reverse="true"
                                    name="jumlah_diajukan">
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
                            <div class="form-group">
                                <label class="form-label">Upload Berkas Pengajuan</label>
                                <div class="custom-file">
                                    <input type="file"
                                            id="file"
                                            class="custom-file-input"
                                            name="proposal_file">
                                    <label for="file"
                                            class="custom-file-label">Pilih file</label>
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