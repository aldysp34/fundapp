@extends('layouts.layout2')

    @section('title', 'Dashboard')

    @section('role', $role)
    @if(isset(auth()->user()->bidang->name))
        @section('bidang', auth()->user()->bidang->name)
    @endif

    @section('content')
    <div class="container-fluid page__container">
                <div class="page-section">
                @if(isset(auth()->user()->bidang))
                    <div class="page-separator">
                        <div class="page-separator__text">{{auth()->user()->bidang->name}}</div>
                    </div>
                @endif
                    
                    <div class="card mb-lg-32pt">
                        <form action="{{route('verifikator.verifikasi_spj', ['id' => $spj->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div class="card-header">
                                    <label class="mr-sm-2 form-label">VERIFIKASI PENGAJUAN TERMIN</label>
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
                                    value="{{$spj->id_transaksi}}"
                                    name="id_transaksi">
                                </div>
                                <div class="form-group">
                                <label class="form-label">Tanggal</label>
                                <input type="text"
                                    class="form-control"
                                    id="date"
                                    disabled=""
                                    placeholder=""
                                    value="{{$spj->created_at}}"
                                    name="tanggal">
                                </div>
                                <div class="form-group">
                                <label class="form-label">Bidang</label>
                                <input type="text"
                                    class="form-control"
                                    id="bidang"
                                    disabled=""
                                    placeholder=""
                                    value="{{$spj->bidang->name}}"
                                    name="bidang">
                                </div>
                                <div class="form-group">
                                <label class="form-label">Deskripsi</label>
                                <input type="text"
                                    class="form-control"
                                    id="description"
                                    disabled=""
                                    placeholder=""
                                    value="{{$spj->deskripsi}}"
                                    name="deskripsi">
                                </div>
                                <div class="form-group">
                                <label class="form-label"
                                        for="maskSample01">Jumlah Laporan</label>
                                <input id="amount"
                                        type="text"
                                        class="form-control"
                                        disabled=""
                                        placeholder="Number: 2.342"
                                        data-mask="#.##0"
                                        data-mask-reverse="true"
                                        value="{{$spj->nominal_spj}}"
                                        name="nominal_spj">
                                </div>
                                <div class="form-group">
                                <label class="form-label"
                                        for="maskSample01">Jumlah Diverifikasi</label>
                                <input id="approved_amount"
                                        type="text"
                                        class="form-control"
                                        placeholder="Number: 2.342"
                                        data-mask="#.##0"
                                        data-mask-reverse="true"
                                        name="nominal_verifikasi"
                                        value=""
                                        required>
                                </div>
                                <div class="form-group">
                                <label class="form-label"
                                        for="maskSample01">Lampiran</label>
                                <div class="custom-file">
                                    @if($spj->spj_file)
                                    <a href="{{ route('verifikator.download_spj', ['id' => $spj->id]) }}" class="chip chip-outline-primary">Lembar Pengajuan SPJ</a>
                                    @endif
                                    @if($spj->lembarVerifikasi)
                                    <a href="" class="chip chip-outline-primary">Lembar Verifikasi</a>
                                    @endif
                                    @if($spj->spj_excel)
                                    <a href="{{ route('verifikator.download_excel', ['id' => $spj->id]) }}" class="chip chip-outline-primary">Lembar Rincian SPJ</a>
                                    @endif
                                    @if($spj->approvalKetua)
                                    <a href="" class="chip chip-outline-primary">Lembar Approval Ketua</a>
                                    @endif
                                    
                                </div>
                                </div>
                                <div class="form-group">
                                <label class="form-label">Upload berkas verifikasi</label>
                                <div class="custom-file">
                                    <input type="file"
                                            id="file"
                                            class="custom-file-input"
                                            name="lembar_verifikasi">
                                    <label for="file"
                                            class="custom-file-label">Pilih file</label>
                                </div>
                                </div>
                                <div class="form-group">
                                <label class="form-label">Keterangan Verifikasi</label>
                                <input type="text"
                                    class="form-control"
                                    id="verify_information"
                                    placeholder=""
                                    value=""
                                    name="alasan_verifikator">
                                </div>
                                <div class="form-group">
                                    <div class="">
                                        <button type="submit" class="btn btn-success btn-rounded" name="action" value="1">Terima Proposal</button>
                                        <button type="submit" class="btn btn-danger btn-rounded" name="action" value="2">Tolak Proposal</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-8pt">
                            </div>
                        </form>
                    </div>

                </div>
            </div>

    @endsection