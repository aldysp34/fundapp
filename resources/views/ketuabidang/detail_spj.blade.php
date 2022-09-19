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
                            @if($spj)
                            <div class="card-header">
                                <label class="mr-sm-2 form-label">DETAIL PENGAJUAN TERMIN</label>
                                @if(!empty($spj->status))
                                    @if($spj->status == 6)
                                    <button type="button" class="btn btn-success btn-rounded disabled">Disetujui</button>
                                    @elseif($spj->status == 0)
                                    <button type="button" class="btn btn-secondary btn-rounded disabled">Diajukan</button>
                                    @elseif($spj->status == 1)
                                    <button type="button" class="btn btn-secondary btn-rounded disabled">Proses Verifikasi Verifikator</button>
                                    @elseif($spj->status == 2)
                                    <button type="button" class="btn btn-secondary btn-rounded disabled">Proses Verifikasi bendahara</button>
                                    @elseif($spj->status == 3)
                                    <button type="button" class="btn btn-secondary btn-rounded disabled">Proses Verifikasi Ketua Harian</button>
                                    @elseif($spj->status == 4)
                                    <button type="button" class="btn btn-danger btn-rounded disabled">Ditolak Verifikator</button>
                                    @elseif($spj->status == 4)
                                    <button type="button" class="btn btn-danger btn-rounded disabled">Ditolak Ketua Harian</button>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="form-group">
                            <label class="form-label">ID Transaksi</label>
                            <input type="text"
                                class="form-control"
                                disabled=""
                                id="transation_id"
                                placeholder=""
                                value="{{$spj->id_transaksi}}">
                            </div>
                            <div class="form-group">
                            <label class="form-label">Tanggal</label>
                            <input type="text"
                                class="form-control"
                                id="date"
                                disabled=""
                                placeholder=""
                                value="{{$spj->created_at}}">
                            </div>
                            <div class="form-group">
                            <label class="form-label">Bidang</label>
                            <input type="text"
                                class="form-control"
                                id="bidang"
                                disabled=""
                                placeholder=""
                                value="{{$spj->bidang->name}}">
                            </div>
                            <div class="form-group">
                            <label class="form-label">Deskripsi</label>
                            <input type="text"
                                class="form-control"
                                id="description"
                                disabled=""
                                placeholder=""
                                value="{{$spj->deskripsi}}">
                            </div>
                            <div class="form-group">
                            <label class="form-label"
                                    for="maskSample01">Jumlah Pengajuan</label>
                            <input id="amount"
                                    type="text"
                                    class="form-control"
                                    disabled=""
                                    placeholder="Number: 2.342"
                                    data-mask="#.##0"
                                    data-mask-reverse="true"
                                    value="{{$spj->jumlah_diajukan}}">
                            </div>
                            <div class="form-group">
                            <label class="form-label"
                                    for="maskSample01">Jumlah Disetujui</label>
                            <input id="approved_amount"
                                    type="text"
                                    class="form-control"
                                    placeholder="Number: 2.342"
                                    data-mask="#.##0"
                                    data-mask-reverse="true"
                                    disabled="" 
                                    value="{{$spj->jumlah_approval}}">
                            </div>
                            <div class="form-group">
                            <label class="form-label">Keterangan Verifikasi</label>
                            <input type="text"
                                class="form-control"
                                id="verify_information"
                                placeholder=""
                                disabled="" 
                                value="{{$spj->alasan_verifikator}}">
                            </div>
                            <div class="form-group">
                            <label class="form-label">Keterangan Approval</label>
                            <input type="text"
                                class="form-control"
                                id="verify_information"
                                placeholder=""
                                disabled="" 
                                value="{{$spj->alasan_ketuaharian}}">
                            </div>
                            <div class="form-group">
                            <label class="form-label">Keterangan Pembayaran</label>
                            <input type="text"
                                class="form-control"
                                id="verify_information"
                                placeholder=""
                                disabled="" 
                                value="">
                            </div>
                            <div class="form-group">
                            <label class="form-label"
                                    for="maskSample01">Lampiran</label>
                            <div class="custom-file">
                                @if($spj->spj_file)
                                <a href="{{ route('ketua-bidang.download_spj', ['id' => $spj->id]) }}" class="chip chip-outline-primary">Lembar Pengajuan</a>
                                @endif
                                @if($spj->lembarVerifikasi)
                                <a href="{{ route('ketua-bidang.download_verifikasi', ['id' => $spj->id]) }}" class="chip chip-outline-primary">Lembar Verifikasi</a>
                                @endif
                                @if($spj->spj_excel)
                                <a href="{{ route('ketua-bidang.download_excel', ['id' => $spj->id]) }}" class="chip chip-outline-primary">Lembar Rincian SPJ</a>
                                
                                @endif
                            </div>
                            </div>
                        </div>
                        @endif
                        <div class="card-footer p-8pt">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection