@extends('layouts.layout2')

    @section('title', 'Dashboard')

    @section('role', $role)
    @if(isset(auth()->user()->bidang->name))
        @section('bidang', auth()->user()->bidang->name)
    @endif

    @section('content')
        @if($errors->any())
        <div class="alert alert-warning mb-0"
                role="alert">
            <div class="d-flex flex-wrap align-items-start">
                <div class="mr-8pt">
                    <i class="material-icons">access_time</i>
                </div>
                <div class="flex"
                        style="min-width: 180px">
                    <small class="text-black-100">
                        <strong>Warning!</strong> {{ $errors->first() }}
                    </small>
                </div>
            </div>
        </div>
        @endif
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
                        <div class="page-separator__text">Bidang {{auth()->user()->bidang->name}}</div>
                    </div>
                    @endif

                    <div class="card mb-lg-32pt">
                        <div>
                            <div class="card-header">
                            <label class="mr-sm-2 form-label">PENYERAPAN ANGGARAN</label>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <ul class="list-unstyled list-skills w-100">
                                <li class="mb-8pt">
                                    <div class="text-50 border-right"><small>Termin #1</small></div>
                                    <div class="flex">
                                        <div class="progress"
                                            style="height: 4px;">
                                            <div class="progress-bar bg-primary"
                                                role="progressbar"
                                                style="width: 61%;"
                                                aria-valuenow="61"
                                                aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="text-70"><small>61%</small></div>
                                </li>
                                <li class="mb-8pt">
                                    <div class="text-50 border-right"><small>Termin #2</small></div>
                                    <div class="flex">
                                        <div class="progress"
                                            style="height: 4px;">
                                            <div class="progress-bar bg-primary"
                                                role="progressbar"
                                                style="width: 0%;"
                                                aria-valuenow="0"
                                                aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="text-70"><small>0%</small></div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer p-8pt">
                        </div>
                    </div>

                    <div class="card mb-lg-32pt">
                        <div class="table-responsive"
                            data-toggle="lists"
                            data-lists-sort-by="js-lists-values-employee-name"
                            data-lists-values='["js-lists-values-employee-name", "js-lists-values-employer-name", "js-lists-values-projects", "js-lists-values-activity", "js-lists-values-earnings"]'>

                            <div class="card-header">
                            <label class="mr-sm-2 form-label">Pengajuan Anggaran</label>
                            <a href="{{route('ketua-bidang.new_proposal')}}" class="btn btn-primary btn-rounded">Buat Pengajuan</a>
                            </div>

                            <table class="table mb-0 thead-border-top-0 table-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 37px;">Tanggal Pengajuan</th>
                                        <th>Termin</th>
                                        <th style="width: 37px;">Jumlah Diajukan</th>
                                        <th style="width: 37px;">Jumlah Approval</th>
                                        
                                        <th style="width: 120px;">
                                            <a href="javascript:void(0)"
                                            class="sort"
                                            data-sort="js-lists-values-activity">Status</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="table_proposal">
                                    @if(count($proposal) != 0)
                                    @foreach ($proposal as $x)
                                    <tr>
                                        <td>
                                        <div class="d-flex flex-column">
                                            <p class="mb-0"><strong class="js-lists-values-employee-name">{{$x->created_at}}</strong></p>
                                            <small class="js-lists-values-employee-email text-50"></small>
                                        </div>
                                        </td>
                                        <td class="text-center js-lists-values-projects small">{{$x->termin}}</td>
                                        <td class="js-lists-values-earnings small">{{$x->jumlah_diajukan}}</td>
                                        <td class="js-lists-values-earnings small">{{$x->jumlah_approval}}</td>
                                        <td>
                                            @if($x->status)
                                            @if($x->status == 0)
                                                <div
                                                class="chip chip-outline-secondary">Diajukan</a>
                                            @elseif($x->status == 1)
                                                <div
                                                class="chip chip-outline-secondary">Proses Verifikasi Verifikator</a>
                                            @elseif($x->status == 2)
                                                <div
                                                class="chip chip-outline-secondary">Proses Verifikasi Bendahara</a>
                                            @elseif($x->status == 3)
                                                <div
                                                class="chip chip-outline-secondary">Proses Verifikasi Ketua Harian</a>
                                            @elseif($x->status == 4)
                                                <div
                                                class="chip chip-outline-danger">Ditolak Verifikator</a>
                                            @elseif($x->status == 5)
                                                <div
                                                class="chip chip-outline-secondary">Ditolak Ketua Harian</a>
                                            @elseif($x->status == 6)
                                                <div
                                                class="chip chip-outline-success">Disetujui</a>
                                            @endif
                                            @endif
                                        </td>
                                        <td class="text-right pl-0">
                                            <!-- Detail Data -->
                                            <a href="{{route('ketua-bidang.detail_proposal', ['id' => $x->id])}}"
                                            class="text-50"><i class="material-icons">more_vert</i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer p-8pt">
                        </div>
                    </div>

                    <div class="card mb-lg-32pt">
                        <div class="table-responsive"
                            data-toggle="lists"
                            data-lists-sort-by="js-lists-values-employee-name"
                            data-lists-values='["js-lists-values-employee-name", "js-lists-values-employer-name", "js-lists-values-projects", "js-lists-values-activity", "js-lists-values-earnings"]'>

                            <div class="card-header">
                            <label class="mr-sm-2 form-label">Surat Pertanggung Jawaban</label>
                            <a href="{{route('ketua-bidang.new_spj')}}" class="btn btn-primary btn-rounded">Buat SPJ</a>
                            </div>

                            <table class="table mb-0 thead-border-top-0 table-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 37px;">Tanggal Pengajuan</th>
                                        <th>Termin</th>
                                        <th style="width: 37px;">Jumlah Penggunaan</th>
                                        <th style="width: 37px;">Jumlah Approval</th>
                                        
                                        <th style="width: 120px;">
                                            <a href="javascript:void(0)"
                                            class="sort"
                                            data-sort="js-lists-values-activity">Status</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="table_spj">
                                    @if(count($spj) != 0)
                                    @foreach($spj as $x)
                                    <tr>
                                        <td>
                                        <div class="d-flex flex-column">
                                            <p class="mb-0"><strong class="js-lists-values-employee-name">{{$x->created_at}}</strong></p>
                                            <small class="js-lists-values-employee-email text-50"></small>
                                        </div>
                                        </td>
                                        <td class="text-center js-lists-values-projects small">{{$x->termin}}</td>
                                        <td class="js-lists-values-earnings small">{{$x->nominal_spj}}</td>
                                        <td class="js-lists-values-earnings small">0</td>
                                        <td>
                                            @if($x->status)
                                            @if($x->status == 0)
                                                <div
                                                class="chip chip-outline-secondary">Diajukan</a>
                                            @elseif($x->status == 1)
                                                <div
                                                class="chip chip-outline-secondary">Proses Verifikasi Verifikator</a>
                                            @elseif($x->status == 2)
                                                <div
                                                class="chip chip-outline-secondary">Proses Verifikasi Bendahara</a>
                                            @elseif($x->status == 3)
                                                <div
                                                class="chip chip-outline-secondary">Proses Verifikasi Ketua Harian</a>
                                            @elseif($x->status == 4)
                                                <div
                                                class="chip chip-outline-danger">Ditolak Verifikator</a>
                                            @elseif($x->status == 5)
                                                <div
                                                class="chip chip-outline-secondary">Ditolak Ketua Harian</a>
                                            @elseif($x->status == 6)
                                                <div
                                                class="chip chip-outline-success">Disetujui</a>
                                            @endif
                                            @endif
                                        </td>
                                        <td class="text-right pl-0">
                                            <a href="{{route('ketua-bidang.detail_spj', ['id' => $x->id])}}"
                                            class="text-50"><i class="material-icons">more_vert</i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer p-8pt">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('new-script')
        <script>
            let data = {!! $proposal !!}
            console.log(data)
        </script>
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