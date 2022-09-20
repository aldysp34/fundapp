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
                        <form action="{{route('verifikator.verifikasi_proposal', ['id' => $proposal->id])}}" method="post" enctype="multipart/form-data">
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
                                    value="{{$proposal->id_transaksi}}"
                                    name="id_transaksi">
                                </div>
                                <div class="form-group">
                                <label class="form-label">Tanggal</label>
                                <input type="text"
                                    class="form-control"
                                    id="date"
                                    disabled=""
                                    placeholder=""
                                    value="{{$proposal->created_at}}"
                                    name="tanggal">
                                </div>
                                <div class="form-group">
                                <label class="form-label">Bidang</label>
                                <input type="text"
                                    class="form-control"
                                    id="bidang"
                                    disabled=""
                                    placeholder=""
                                    value="{{$proposal->bidang->name}}"
                                    name="bidang">
                                </div>
                                <div class="form-group">
                                <label class="form-label">Deskripsi</label>
                                <input type="text"
                                    class="form-control"
                                    id="description"
                                    disabled=""
                                    placeholder=""
                                    value="{{$proposal->deskripsi}}"
                                    name="deskripsi">
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
                                        value="{{$proposal->jumlah_diajukan}}"
                                        name="jumlah_diajukan">
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
                                        name="jumlah_approval"
                                        value=""
                                        required>
                                </div>
                                <div class="form-group">
                                <label class="form-label"
                                        for="maskSample01">Lampiran</label>
                                <div class="custom-file">
                                    @if($proposal->proposal_file)
                                    <a href="{{ route('verifikator.download_proposal', ['id' => $proposal->id]) }}" class="chip chip-outline-primary">Lembar Pengajuan</a>
                                    @endif
                                    @if($proposal->lembarVerifikasi)
                                    <a href="" class="chip chip-outline-primary">Lembar Verifikasi</a>
                                    @endif
                                    @if($proposal->suratBayar)
                                    <a href="" class="chip chip-outline-primary">Lembar Surat Bayar</a>
                                    @endif
                                    @if($proposal->approvalKetua)
                                    <a href="" class="chip chip-outline-primary">Lembar Approval Ketua</a>
                                    @endif
                                    @if($proposal->lembarPembayaran)
                                    <a href="" class="chip chip-outline-primary">Lembar Pembayaran</a>
                                    @endif
                                </div>
                                </div>
                                <div class="form-group">
                                <label class="form-label">Upload berkas verifikasi</label>
                                <div class="custom-file">
                                    <input type="file"
                                            id="file"
                                            class="custom-file-input"
                                            name="lembar_verifikasi"
                                            onchange="clickme()">
                                    <label for="file"
                                            class="custom-file-label" id="filename">Pilih file</label>
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
        </div>
    @endsection

    @section('sidebar-content')
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item active">
                <a class="sidebar-menu-button"
                    href="{{route('verifikator.home')}}">
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
                let data = $('input[type=file]').val()
                data = data.split("\\");
                document.getElementById('filename').innerHTML = data[2]
            }
        </script>
    @endsection







            