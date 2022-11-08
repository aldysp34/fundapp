<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use PDF;

class InvoiceController extends Controller
{
    public function generateInvoice($id){
        $data = Proposal::findOrFail($id);
        if($data->lembarPembayaran){
            $id_transaksi = $data->id_transaksi;
            $nama = $data->lembarPembayaran->nama_penerima;
            $npwp = $data->lembarPembayaran->npwp_penerima;
            $alamat = $data->lembarPembayaran->alamat_penerima;
            $bank =  $data->lembarPembayaran->bank;
            $rekening =  $data->lembarPembayaran->rekening_penerima;
            $keterangan = $data->lembarPembayaran->keterangan;
            $termin = $data->termin;
            $nominal = $data->lembarPembayaran->nominal;
            $tanggal = $data->lembarPembayaran->date_of_transaction;
            $file_path =  $data->lembarPembayaran->folder_path;

            $pdf = PDF::loadView('invoice', [
                'id' => $id_transaksi,
                'nama' => $nama,
                'npwp' => $npwp,
                'alamat' => $alamat,
                'bank' => $bank,
                'rekening' => $rekening,
                'keterangan' => $keterangan,
                'termin' => $termin,
                'nominal' => $nominal,
                'tanggal' => $tanggal,
                'file_path' => $file_path
            ]);

            return $pdf->download('invoice.pdf');
        }
    }
}
