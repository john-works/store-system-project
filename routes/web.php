<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\ServiceController;
Route::get('/', function () {
    return view('welcome');
});



//supplier
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{supplier}', [SupplierController::class, 'show'])->name('suppliers.show');
Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');


//invoices
Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
Route::put('/invoices/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');

//contracts
Route::get('/contracts', [ContractController::class, 'index'])->name('contracts.index');
Route::get('/contracts/create', [ContractController::class, 'create'])->name('contracts.create');
Route::post('/contracts', [ContractController::class, 'store'])->name('contracts.store');
Route::get('/contracts/{contract}', [ContractController::class, 'show'])->name('contracts.show');
Route::get('/contracts/{contract}/edit', [ContractController::class, 'edit'])->name('contracts.edit');
Route::put('/contracts/{contract}', [ContractController::class, 'update'])->name('contracts.update');
Route::delete('/contracts/{contract}', [ContractController::class, 'destroy'])->name('contracts.destroy');



//items in store
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

//services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

//goods
Route::get('/goods', [GoodController::class, 'index'])->name('goods.index');
Route::get('/goods/create', [GoodController::class, 'create'])->name('goods.create');
Route::post('/goods', [GoodController::class, 'store'])->name('goods.store');
Route::get('/goods/{good}', [GoodController::class, 'show'])->name('goods.show');
Route::get('/goods/{good}/edit', [GoodController::class, 'edit'])->name('goods.edit');
Route::put('/goods/{good}', [GoodController::class, 'update'])->name('goods.update');
Route::delete('/goods/{good}', [GoodController::class, 'destroy'])->name('goods.destroy');


//borrowings
Route::get('/borrowings', [GoodController::class, 'index'])->name('borrowings.index');
Route::get('/borrowings/create', [GoodController::class, 'create'])->name('borrowings.create');
Route::post('/borrowings', [GoodController::class, 'store'])->name('borrowings.store');
Route::get('/borrowings/{borrowing}', [GoodController::class, 'show'])->name('borrowings.show');
Route::get('/borrowings/{borrowing}/edit', [GoodController::class, 'edit'])->name('borrowings.edit');
Route::put('/borrowings/{borrowing}', [GoodController::class, 'update'])->name('borrowings.update');
Route::delete('/borrowings/{borrowing}', [GoodController::class, 'destroy'])->name('borrowings.destroy');


//moverments
Route::get('/moverments', [GoodController::class, 'index'])->name('moverments.index');
Route::get('/moverments/create', [GoodController::class, 'create'])->name('moverments.create');
Route::post('/moverments', [GoodController::class, 'store'])->name('moverments.store');
Route::get('/moverments/{moverment}', [GoodController::class, 'show'])->name('moverments.show');
Route::get('/moverments/{moverment}/edit', [GoodController::class, 'edit'])->name('moverments.edit');
Route::put('/moverments/{moverment}', [GoodController::class, 'update'])->name('moverments.update');
Route::delete('/moverments/{moverment}', [GoodController::class, 'destroy'])->name('moverments.destroy');


//requisitions
Route::get('/requisitions', [GoodController::class, 'index'])->name('requisitions.index');
Route::get('/requisitions/create', [GoodController::class, 'create'])->name('requisitions.create');
Route::post('/requisitions', [GoodController::class, 'store'])->name('requisitions.store');
Route::get('/requisitions/{requisition}', [GoodController::class, 'show'])->name('requisitions.show');
Route::get('/requisitions/{requisition}/edit', [GoodController::class, 'edit'])->name('requisitions.edit');
Route::put('/requisitions/{requisition}', [GoodController::class, 'update'])->name('requisitions.update');
Route::delete('/requisitions/{requisition}', [GoodController::class, 'destroy'])->name('requisitions.destroy');
