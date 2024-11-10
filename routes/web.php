<?php

use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/terms-of-use', [MainController::class, 'terms'])->name('terms');

Route::middleware('auth')->group(function ()
{
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscription.index');
    Route::get('/subscription', [SubscriptionController::class, 'show'])->name('subscription.show');

    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/{product}/products', [ProductController::class, 'show'])->name('product.show');

    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/{product}', [CartController::class, 'store'])->name('store');
        Route::patch('/{rowId}/quantity', [CartController::class, 'quantity'])->name('quantity');
        Route::delete('/{rowId}/delete', [CartController::class, 'delete'])->name('delete');
    });

    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/{product}', [CartController::class, 'store'])->name('store');
        Route::patch('/{rowId}/quantity', [CartController::class, 'quantity'])->name('quantity');
        Route::delete('/{rowId}/delete', [CartController::class, 'delete'])->name('delete');
    });
    Route::prefix('orders')->name('order.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/{order}/show', [OrderController::class, 'show'])->name('show');
        Route::post('/', [OrderController::class, 'store'])->name('store');
    });

    Route::controller(ContactController::class)
        ->prefix('contacts')
        ->name('contact.')
        ->group(function () {
            Route::post('/', 'store')->name('store');
            Route::delete('/{contact}', 'delete')->name('delete');
        });
    Route::controller(ProfileController::class)
        ->prefix('profile')
        ->name('profile.')
        ->group(function () {
            Route::get('/', 'show')->name('show');
            Route::patch('/', 'update')->name('update');
        });

});

Route::controller(MainController::class)
    ->prefix('users')
    ->name('main.')
    ->group(function () {
        Route::get('/{user}', 'show')->name('show');
    });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::controller(UserAdminController::class)
        ->prefix('users')
        ->name('user.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::delete('/{user}', 'destroy')->name('destroy');
        });
    Route::controller(ProductAdminController::class)
        ->prefix('goods')
        ->name('product.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{product}/edit', 'edit')->name('edit');
            Route::patch('/{product}', 'update')->name('update');
            Route::delete('/{product}', 'destroy')->name('destroy');
        });
    Route::controller(OrderAdminController::class)
        ->prefix('orders')
        ->name('order.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{order}/show', 'show')->name('show');
            Route::patch('/{order}', 'update')->name('update');
        });

});

Route::controller(PaymentController::class)->prefix('payment')->name('payment.')->group(function () {
    Route::post('/period-test', 'test')->name('test');
    Route::post('/auto-renewal', 'autoRenewal')->name('auto-renewal');
    Route::post('/purchase-subscription', 'purchaseSubscription')->name('purchase-subscription');
    Route::post('/notification', 'notification')->name('notification');
});


Auth::routes();
