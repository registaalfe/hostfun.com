<?php

namespace App\Models;

use App\Models\User;
use App\Models\Transactions_Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transactions extends Model
{
    use HasFactory;

    const CREATED_AT = 'transaction_date';
    const UPDATED_AT = 'updated_on';

    protected $fillable = [
        'no_invoice',
        'customer_id',
        'total_amount',
        'transaction_date',
        'status',
        'snap_token',
    ];

    // Fungsi untuk membuat no_invoice
    public static function generateInvoiceNumber()
    {
        $lastTransaction = self::latest('id')->first(); //mencari transaksi terakhir pada database untuk membuat nomor invoice berikutnya.
        $nextId = $lastTransaction ? $lastTransaction->id + 1 : 1; //Jika ada transaksi sebelumnya, ID tersebut diambil lalu ditambahkan 1.

        return 'INV' . date('Ymd') . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }

    // Relationship with Product
    public function transaction_items()
    {
        return $this->hasMany(Transactions_Item::class, 'transaction_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
