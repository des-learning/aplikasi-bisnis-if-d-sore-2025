<?php

namespace App\Filament\Resources\TransaksiStockResource\Pages;

use App\Filament\Resources\TransaksiStockResource;
use App\JenisTransaksi;
use App\Models\Stock;
use App\Models\TransaksiStock;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateTransaksiStock extends CreateRecord
{
    protected static string $resource = TransaksiStockResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(
            function () use ($data) {
                // cari data stock sesuai dengan pilihan barang & gudang
                $stock = Stock::firstOrCreate(
                    [
                        'barang_id' => $data['barang'],
                        'gudang_id' => $data['gudang']
                    ],
                    [
                        'barang_id' => $data['barang'],
                        'gudang_id' => $data['gudang'],
                        'balance' => 0,
                    ]
                );

                // kunci stock supaya hanya bisa diupdate oleh 1 proses saja
                $stock = Stock::lockForUpdate()->find($stock->id);

                // catat transaksi stock
                $trx = TransaksiStock::create([
                    'tanggal' => $data['tanggal'],
                    'stock_id' => $stock->id,
                    'keterangan' => $data['keterangan'],
                    'jenis_transaksi' => $data['jenis_transaksi'],
                    'jumlah' => $data['jumlah'],
                ]);

                // tambahkan atau kurangkan balance stock sesuai jumlah
                if ($data['jenis_transaksi'] === JenisTransaksi::Debit->value) {
                    $stock->balance += $data['jumlah'];
                    $stock->save();

                    return $trx;
                }
            }
        );
    }
}
