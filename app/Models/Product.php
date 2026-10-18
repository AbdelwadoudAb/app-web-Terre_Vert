<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /*
    |--------------------------------------------------------------------------
    | DISPONIBILITÉ
    |--------------------------------------------------------------------------
    */

    public const EN_STOCK = 'EN_STOCK';

    public const RUPTURE = 'RUPTURE';


    /*
    |--------------------------------------------------------------------------
    | CHAMPS MODIFIABLES
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'availability',
        'image',
    ];


    /*
    |--------------------------------------------------------------------------
    | CASTS
    |--------------------------------------------------------------------------
    */

    protected $casts = [
        'category_id' => 'integer',
        'price' => 'decimal:2',
    ];


    /*
    |--------------------------------------------------------------------------
    | RELATION : CATÉGORIE
    |--------------------------------------------------------------------------
    |
    | Un produit appartient à une catégorie.
    |
    */

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            Category::class,
            'category_id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | RELATION : LIGNES DE FACTURE
    |--------------------------------------------------------------------------
    |
    | Cette relation reste disponible si invoice_items
    | possède encore une colonne product_id.
    |
    */

    public function invoiceItems(): HasMany
    {
        return $this->hasMany(
            InvoiceItem::class,
            'product_id'
        );
    }
}