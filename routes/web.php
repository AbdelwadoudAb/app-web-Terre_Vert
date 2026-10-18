<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\InvoiceController as AdminInvoiceController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\User\ClientController;
use App\Http\Controllers\User\InvoiceController;

use App\Models\ContactMessage;
use App\Models\Invoice;
use App\Models\Notification;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| PAGES PUBLIQUES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::view('/a-propos', 'about')
    ->name('about');


Route::view('/services', 'services')
    ->name('services');


/*
|--------------------------------------------------------------------------
| PRODUITS PUBLICS
|--------------------------------------------------------------------------
*/

Route::get('/produits', [
    ProductController::class,
    'index',
])->name('products.index');


Route::get('/produits/{product}', [
    ProductController::class,
    'show',
])->name('products.show');


/*
|--------------------------------------------------------------------------
| CONTACT PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::post('/contact', [
    ContactMessageController::class,
    'store',
])->name('contact.store');


/*
|--------------------------------------------------------------------------
| DASHBOARD GÉNÉRAL
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->get('/dashboard', function () {

        $user = auth()->user();

        if (
            $user->role &&
            $user->role->name === 'Administrateur'
        ) {
            return redirect()->route('admin.dashboard');
        }

        if (
            $user->role &&
            $user->role->name === 'Utilisateur'
        ) {
            return redirect()->route('user.dashboard');
        }

        abort(403);

    })
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| ESPACE ADMINISTRATEUR
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:Administrateur',
])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | DASHBOARD ADMIN
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', function () {

            $totalInvoices = Invoice::count();

            $pendingInvoices = Invoice::where(
                'status',
                'EN_ATTENTE'
            )->count();

            $validatedInvoices = Invoice::where(
                'status',
                'VALIDEE'
            )->count();

            $refusedInvoices = Invoice::where(
                'status',
                'REFUSEE'
            )->count();


            $latestInvoices = Invoice::with([
                'user',
                'client',
            ])
                ->latest()
                ->take(5)
                ->get();


            $notifications = Notification::with([
                'invoice',
            ])
                ->where(
                    'user_id',
                    auth()->id()
                )
                ->where(
                    'is_read',
                    false
                )
                ->latest()
                ->take(5)
                ->get();


            $unreadNotifications = Notification::where(
                'user_id',
                auth()->id()
            )
                ->where(
                    'is_read',
                    false
                )
                ->count();


            return view(
                'admin.dashboard',
                compact(
                    'totalInvoices',
                    'pendingInvoices',
                    'validatedInvoices',
                    'refusedInvoices',
                    'latestInvoices',
                    'notifications',
                    'unreadNotifications'
                )
            );

        })->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | NOTIFICATIONS ADMIN
        |--------------------------------------------------------------------------
        */

        Route::get('/notifications', function () {

            $notifications = Notification::with([
                'invoice',
            ])
                ->where(
                    'user_id',
                    auth()->id()
                )
                ->latest()
                ->get();


            return view(
                'admin.notifications.index',
                compact('notifications')
            );

        })->name('notifications.index');


        Route::get('/notifications/{notification}', function (
            Notification $notification
        ) {

            if (
                (int) $notification->user_id !==
                (int) auth()->id()
            ) {
                abort(403);
            }


            if (!$notification->is_read) {
                $notification->update([
                    'is_read' => true,
                ]);
            }


            if (!$notification->invoice) {

                return redirect()
                    ->route('admin.notifications.index')
                    ->with(
                        'error',
                        'La facture liée à cette notification est introuvable.'
                    );
            }


            return redirect()->route(
                'admin.invoices.show',
                $notification->invoice
            );

        })->name('notifications.open');


        /*
        |--------------------------------------------------------------------------
        | FACTURES ADMIN
        |--------------------------------------------------------------------------
        */

        Route::get('/invoices', [
            AdminInvoiceController::class,
            'index',
        ])->name('invoices.index');


        Route::get('/invoices/{invoice}', [
            AdminInvoiceController::class,
            'show',
        ])->name('invoices.show');


        Route::patch('/invoices/{invoice}/validate', [
            AdminInvoiceController::class,
            'validateInvoice',
        ])->name('invoices.validate');


        Route::patch('/invoices/{invoice}/refuse', [
            AdminInvoiceController::class,
            'refuseInvoice',
        ])->name('invoices.refuse');


        /*
        |--------------------------------------------------------------------------
        | CATÉGORIES
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'categories',
            CategoryController::class
        )->except([
            'show',
        ]);


        /*
        |--------------------------------------------------------------------------
        | PRODUITS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'products',
            AdminProductController::class
        )->except([
            'show',
        ]);

    });


/*
|--------------------------------------------------------------------------
| ESPACE UTILISATEUR
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:Utilisateur',
])
    ->prefix('user')
    ->name('user.')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | DASHBOARD USER
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', function () {

            $userId = auth()->id();


            $totalInvoices = Invoice::where(
                'user_id',
                $userId
            )->count();


            $pendingInvoices = Invoice::where(
                'user_id',
                $userId
            )
                ->where(
                    'status',
                    'EN_ATTENTE'
                )
                ->count();


            $validatedInvoices = Invoice::where(
                'user_id',
                $userId
            )
                ->where(
                    'status',
                    'VALIDEE'
                )
                ->count();


            $refusedInvoices = Invoice::where(
                'user_id',
                $userId
            )
                ->where(
                    'status',
                    'REFUSEE'
                )
                ->count();


            /*
            |--------------------------------------------------------------------------
            | NOTIFICATIONS USER
            |--------------------------------------------------------------------------
            */

            $notifications = Notification::with([
                'invoice',
            ])
                ->where(
                    'user_id',
                    $userId
                )
                ->where(
                    'is_read',
                    false
                )
                ->latest()
                ->take(5)
                ->get();


            $unreadNotifications = Notification::where(
                'user_id',
                $userId
            )
                ->where(
                    'is_read',
                    false
                )
                ->count();


            /*
            |--------------------------------------------------------------------------
            | MESSAGES CONTACT USER
            |--------------------------------------------------------------------------
            */

            $unreadMessagesCount = ContactMessage::where(
                'is_read',
                false
            )->count();


            $latestContactMessages = ContactMessage::latest()
                ->take(5)
                ->get();


            return view(
                'user.dashboard',
                compact(
                    'totalInvoices',
                    'pendingInvoices',
                    'validatedInvoices',
                    'refusedInvoices',
                    'notifications',
                    'unreadNotifications',
                    'unreadMessagesCount',
                    'latestContactMessages'
                )
            );

        })->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | NOTIFICATIONS USER
        |--------------------------------------------------------------------------
        */

        Route::get('/notifications', function () {

            $notifications = Notification::with([
                'invoice',
            ])
                ->where(
                    'user_id',
                    auth()->id()
                )
                ->latest()
                ->get();


            return view(
                'user.notifications.index',
                compact('notifications')
            );

        })->name('notifications.index');


        Route::get('/notifications/{notification}', function (
            Notification $notification
        ) {

            if (
                (int) $notification->user_id !==
                (int) auth()->id()
            ) {
                abort(403);
            }


            if (!$notification->is_read) {
                $notification->update([
                    'is_read' => true,
                ]);
            }


            if (!$notification->invoice) {

                return redirect()
                    ->route('user.notifications.index')
                    ->with(
                        'error',
                        'La facture liée à cette notification est introuvable.'
                    );
            }


            if (
                (int) $notification->invoice->user_id !==
                (int) auth()->id()
            ) {
                abort(403);
            }


            return redirect()->route(
                'user.invoices.show',
                $notification->invoice
            );

        })->name('notifications.open');


        /*
        |--------------------------------------------------------------------------
        | MESSAGES CONTACT USER
        |--------------------------------------------------------------------------
        */

        Route::get('/contact-messages', [
            AdminContactMessageController::class,
            'index',
        ])->name('contact-messages.index');


        Route::get('/contact-messages/{contactMessage}', [
            AdminContactMessageController::class,
            'show',
        ])->name('contact-messages.show');


        Route::patch('/contact-messages/{contactMessage}/read', [
            AdminContactMessageController::class,
            'markAsRead',
        ])->name('contact-messages.read');


        Route::patch('/contact-messages/{contactMessage}/process', [
            AdminContactMessageController::class,
            'markAsProcessed',
        ])->name('contact-messages.process');


        Route::delete('/contact-messages/{contactMessage}', [
            AdminContactMessageController::class,
            'destroy',
        ])->name('contact-messages.destroy');


        /*
        |--------------------------------------------------------------------------
        | CLIENTS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'clients',
            ClientController::class
        );


        /*
        |--------------------------------------------------------------------------
        | FACTURES USER
        |--------------------------------------------------------------------------
        */

        Route::get('/invoices', [
            InvoiceController::class,
            'index',
        ])->name('invoices.index');


        Route::get('/invoices/create', [
            InvoiceController::class,
            'create',
        ])->name('invoices.create');


        Route::post('/invoices', [
            InvoiceController::class,
            'store',
        ])->name('invoices.store');


        Route::get('/invoices/{invoice}', [
            InvoiceController::class,
            'show',
        ])->name('invoices.show');

    });


/*
|--------------------------------------------------------------------------
| PROFIL
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [
        ProfileController::class,
        'edit',
    ])->name('profile.edit');


    Route::patch('/profile', [
        ProfileController::class,
        'update',
    ])->name('profile.update');


    Route::delete('/profile', [
        ProfileController::class,
        'destroy',
    ])->name('profile.destroy');

});


require __DIR__ . '/auth.php';