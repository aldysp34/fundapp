<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .centered{
        margin-left: auto;
        margin-right: auto;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Invoice</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">{{$id}}</span></p>
    </div>
    
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-50 mt-10 centered">
        <tr>
            <th class="w-50">To</th>
        </tr>
        <tr>
            <td >
                <div class="box-text">
                    <p>{{$nama}}</p>
                    <p>{{$npwp}}</p>
                    <p>{{$alamat}}</p>
                    <p>{{$bank}}</p>
                    <p>{{$rekening}}</p>
                    <p>{{$keterangan}}</p>
                </div>
            </td>
            
        </tr>
    </table>
</div>

<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-50 mt-10 centered">
        <tr>
            <th class="w-50">Termin</th>
            <th class="w-50">Jumlah</th>
            <th class="w-50">Tanggal Transaksi</th>
        </tr>
        <tr align="center">
            <td>{{$termin}}</td>
            <td>{{$nominal}}</td>
            <td>{{$tanggal}}</td>
        </tr>
        
    </table>
</div>
<br>
<br>
<img src="{{$file_path}}" style="max-width:100%;height:auto;">
</html>