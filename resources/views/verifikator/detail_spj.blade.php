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
                                            name="verifikasi_spj"
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

                    <div class="card mb-lg-32pt">
                        <div class="table-responsive"
                                data-toggle="lists"
                                data-lists-sort-by="js-lists-values-employee-name"
                                data-lists-values='["js-lists-values-employee-name", "js-lists-values-employer-name", "js-lists-values-projects", "js-lists-values-activity", "js-lists-values-earnings"]'>

                            <div class="card-header">
                                <label class="mr-sm-2 form-label">Rincian Penggunaan Anggaran</label>
                            </div>

                            <table class="table mb-0 thead-border-top-0 table-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 37px;">Uraian</th>
                                        <th>Vol</th>
                                        <th>Sat</th>
                                        <th>Vol</th>
                                        <th>Sat</th>
                                        <th>Vol</th>
                                        <th>Sat</th>
                                        <th style="width: 37px;">Harga Satuan</th>
                                        <th style="width: 37px;">Jumlah</th>
                                    </tr>
                                </thead>
                                
                                <tbody class="list" id="table_spj">
                                @if(isset($excelData))
                                @foreach($excelData as $x)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <p class="mb-0"><strong class="">{{$x->uraian}}</strong></p>
                                                <small class="js-lists-values-employee-email text-50"></small>
                                            </div>
                                        </td>
                                        <td class="text-center js-lists-values-projects small">{{$x->volume_1}}</td>
                                        <td class="js-lists-values-earnings small">{{$x->satuan_1}}</td>
                                        <td class="text-center js-lists-values-projects small">{{$x->volume_2}}</td>
                                        <td class="js-lists-values-earnings small">{{$x->satuan_2}}</td>
                                        <td class="text-center js-lists-values-projects small">{{$x->volume_3}}</td>
                                        <td class="js-lists-values-earnings small">{{$x->satuan_3}}</td>
                                        <td class="text-center js-lists-values-projects small" data-mask="#.##0"
                                            data-mask-reverse="true">{{$x->harga_satuan}}</td>
                                        <td class="text-center js-lists-values-projects small" data-mask="#.##0"
                                            data-mask-reverse="true">{{$x->jumlah}}</td>
                                    </tr>
                                    
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
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