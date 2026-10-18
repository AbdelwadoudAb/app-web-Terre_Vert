<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Liste des produits
     * avec recherche et filtres.
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | REQUÊTE DE BASE
        |--------------------------------------------------------------------------
        */

        $query = Product::query()
            ->with('category');


        /*
        |--------------------------------------------------------------------------
        | RECHERCHE
        |--------------------------------------------------------------------------
        |
        | Recherche dans :
        | - nom du produit
        | - description
        | - nom de la catégorie
        |
        */

        if ($request->filled('search')) {

            $search = trim(
                (string) $request->input('search')
            );


            $query->where(
                function ($q) use ($search) {

                    $q->where(
                        'name',
                        'like',
                        '%' . $search . '%'
                    )
                    ->orWhere(
                        'description',
                        'like',
                        '%' . $search . '%'
                    )
                    ->orWhereHas(
                        'category',
                        function ($categoryQuery) use ($search) {

                            $categoryQuery->where(
                                'name',
                                'like',
                                '%' . $search . '%'
                            );
                        }
                    );
                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTRE CATÉGORIE
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {

            $categoryId = (int) $request->input(
                'category'
            );


            if ($categoryId > 0) {

                $query->where(
                    'category_id',
                    $categoryId
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | FILTRE DISPONIBILITÉ
        |--------------------------------------------------------------------------
        */

        if ($request->filled('availability')) {

            $availability = (string) $request->input(
                'availability'
            );


            if (
                in_array(
                    $availability,
                    [
                        'EN_STOCK',
                        'RUPTURE',
                    ],
                    true
                )
            ) {

                $query->where(
                    'availability',
                    $availability
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | PRODUITS
        |--------------------------------------------------------------------------
        */

        $products = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | CATÉGORIES
        |--------------------------------------------------------------------------
        */

        $categories = Category::query()
            ->orderBy('name')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | VUE
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.products.index',
            compact(
                'products',
                'categories'
            )
        );
    }


    /**
     * Formulaire d'ajout.
     */
    public function create()
    {
        $categories = Category::query()
            ->orderBy('name')
            ->get();


        return view(
            'admin.products.create',
            compact('categories')
        );
    }


    /**
     * Enregistrer un produit.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            [
                'category_id' => [
                    'required',
                    'integer',
                    'exists:categories,id',
                ],

                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'description' => [
                    'nullable',
                    'string',
                ],

                'price' => [
                    'required',
                    'numeric',
                    'min:0',
                ],

                'availability' => [
                    'required',
                    'in:EN_STOCK,RUPTURE',
                ],

                'image' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp',
                    'max:2048',
                ],
            ],
            [
                'category_id.required' =>
                    'Veuillez sélectionner une catégorie.',

                'category_id.exists' =>
                    'La catégorie sélectionnée est introuvable.',

                'name.required' =>
                    'Le nom du produit est obligatoire.',

                'price.required' =>
                    'Le prix du produit est obligatoire.',

                'price.numeric' =>
                    'Le prix doit être un nombre.',

                'price.min' =>
                    'Le prix ne peut pas être négatif.',

                'availability.required' =>
                    'Veuillez sélectionner la disponibilité du produit.',

                'availability.in' =>
                    'La disponibilité sélectionnée est invalide.',

                'image.image' =>
                    'Le fichier sélectionné doit être une image.',

                'image.mimes' =>
                    'L’image doit être au format JPG, JPEG, PNG ou WEBP.',

                'image.max' =>
                    'L’image ne doit pas dépasser 2 Mo.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | NETTOYAGE
        |--------------------------------------------------------------------------
        */

        $validated['name'] = trim(
            $validated['name']
        );


        if (
            isset($validated['description'])
            &&
            $validated['description'] !== null
        ) {

            $validated['description'] = trim(
                $validated['description']
            );
        }


        /*
        |--------------------------------------------------------------------------
        | IMAGE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $validated['image'] = $request
                ->file('image')
                ->store(
                    'products',
                    'public'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | CRÉATION
        |--------------------------------------------------------------------------
        */

        Product::create(
            $validated
        );


        return redirect()
            ->route(
                'admin.products.index'
            )
            ->with(
                'success',
                'Produit ajouté avec succès.'
            );
    }


    /**
     * Formulaire de modification.
     */
    public function edit(Product $product)
    {
        $categories = Category::query()
            ->orderBy('name')
            ->get();


        return view(
            'admin.products.edit',
            compact(
                'product',
                'categories'
            )
        );
    }


    /**
     * Modifier un produit.
     */
    public function update(
        Request $request,
        Product $product
    ) {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            [
                'category_id' => [
                    'required',
                    'integer',
                    'exists:categories,id',
                ],

                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'description' => [
                    'nullable',
                    'string',
                ],

                'price' => [
                    'required',
                    'numeric',
                    'min:0',
                ],

                'availability' => [
                    'required',
                    'in:EN_STOCK,RUPTURE',
                ],

                'image' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp',
                    'max:2048',
                ],
            ],
            [
                'category_id.required' =>
                    'Veuillez sélectionner une catégorie.',

                'category_id.exists' =>
                    'La catégorie sélectionnée est introuvable.',

                'name.required' =>
                    'Le nom du produit est obligatoire.',

                'price.required' =>
                    'Le prix du produit est obligatoire.',

                'price.numeric' =>
                    'Le prix doit être un nombre.',

                'price.min' =>
                    'Le prix ne peut pas être négatif.',

                'availability.required' =>
                    'Veuillez sélectionner la disponibilité du produit.',

                'availability.in' =>
                    'La disponibilité sélectionnée est invalide.',

                'image.image' =>
                    'Le fichier sélectionné doit être une image.',

                'image.mimes' =>
                    'L’image doit être au format JPG, JPEG, PNG ou WEBP.',

                'image.max' =>
                    'L’image ne doit pas dépasser 2 Mo.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | NETTOYAGE
        |--------------------------------------------------------------------------
        */

        $validated['name'] = trim(
            $validated['name']
        );


        if (
            isset($validated['description'])
            &&
            $validated['description'] !== null
        ) {

            $validated['description'] = trim(
                $validated['description']
            );
        }


        /*
        |--------------------------------------------------------------------------
        | NOUVELLE IMAGE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            /*
            | Supprimer l'ancienne image.
            */
            if (
                $product->image
                &&
                Storage::disk('public')
                    ->exists($product->image)
            ) {

                Storage::disk('public')
                    ->delete(
                        $product->image
                    );
            }


            /*
            | Enregistrer la nouvelle image.
            */
            $validated['image'] = $request
                ->file('image')
                ->store(
                    'products',
                    'public'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | MODIFICATION
        |--------------------------------------------------------------------------
        */

        $product->update(
            $validated
        );


        return redirect()
            ->route(
                'admin.products.index'
            )
            ->with(
                'success',
                'Produit modifié avec succès.'
            );
    }


    /**
     * Supprimer un produit.
     */
    public function destroy(Product $product)
    {
        /*
        |--------------------------------------------------------------------------
        | IMAGE
        |--------------------------------------------------------------------------
        */

        if (
            $product->image
            &&
            Storage::disk('public')
                ->exists($product->image)
        ) {

            Storage::disk('public')
                ->delete(
                    $product->image
                );
        }


        /*
        |--------------------------------------------------------------------------
        | PRODUIT
        |--------------------------------------------------------------------------
        */

        $product->delete();


        return redirect()
            ->route(
                'admin.products.index'
            )
            ->with(
                'success',
                'Produit supprimé avec succès.'
            );
    }
}