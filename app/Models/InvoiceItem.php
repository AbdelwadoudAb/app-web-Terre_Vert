<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceItem extends Model
{
    /**
     * Champs autorisés.
     */
    protected $fillable = [
        'invoice_id',
        'product_id',
        'product_name',
        'quantity',
        'price',
        'unit_price',
        'total',
    ];


    /**
     * Facture associée à cette ligne.
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(
            Invoice::class,
            'invoice_id'
        );
    }


    /**
     * Produit associé à cette ligne.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(
            Product::class,
            'product_id'
        )->withDefault();
    }
}