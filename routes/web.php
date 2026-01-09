<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\DisposalController;
use App\Http\Controllers\WorkflowstepController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| All routes are protected by permission middleware.
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');


// ======================= Supplier Routes =======================
Route::middleware(['auth', 'permission:suppliers'])->group(function () {
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create')->middleware('permission:suppliers,create');
    Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store')->middleware('permission:suppliers,store');
    Route::get('/suppliers/{supplier}', [SupplierController::class, 'show'])->name('suppliers.show')->middleware('permission:suppliers,show');
    Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit')->middleware('permission:suppliers,edit');
    Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update')->middleware('permission:suppliers,update');
    Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy')->middleware('permission:suppliers,destroy');
});

// ======================= Invoice Routes =======================
Route::middleware(['auth', 'permission:invoices'])->group(function () {
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create')->middleware('permission:invoices,create');
    Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store')->middleware('permission:invoices,store');
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show')->middleware('permission:invoices,show');
    Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit')->middleware('permission:invoices,edit');
    Route::put('/invoices/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update')->middleware('permission:invoices,update');
    Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy')->middleware('permission:invoices,destroy');
});

// ======================= Contract Routes =======================
Route::middleware(['auth', 'permission:contracts'])->group(function () {
    Route::get('/contracts', [ContractController::class, 'index'])->name('contracts.index');
    Route::get('/contracts/info', [ContractController::class, 'info'])->name('contracts.info');
    Route::get('/contracts/create', [ContractController::class, 'create'])->name('contracts.create')->middleware('permission:contracts,create');
    Route::post('/contracts', [ContractController::class, 'store'])->name('contracts.store')->middleware('permission:contracts,store');
    Route::get('/contracts/{contract}', [ContractController::class, 'show'])->name('contracts.show')->middleware('permission:contracts,show');
    Route::get('/contracts/{contract}/edit', [ContractController::class, 'edit'])->name('contracts.edit')->middleware('permission:contracts,edit');
    Route::put('/contracts/{contract}', [ContractController::class, 'update'])->name('contracts.update')->middleware('permission:contracts,update');
    Route::delete('/contracts/{contract}', [ContractController::class, 'destroy'])->name('contracts.destroy')->middleware('permission:contracts,destroy');

    // Workflow approve/reject
    Route::post('/contracts/{contract}/approve', [ContractController::class, 'approveWorkflowStep'])->name('contracts.approve')->middleware('permission:contracts,approve');
    Route::post('/contracts/{contract}/reject', [ContractController::class, 'rejectWorkflowStep'])->name('contracts.reject')->middleware('permission:contracts,reject');
});

// ======================= Item Routes =======================
Route::middleware(['auth', 'permission:items'])->group(function () {
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create')->middleware('permission:items,create');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store')->middleware('permission:items,store');
    Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show')->middleware('permission:items,show');
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit')->middleware('permission:items,edit');
    Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update')->middleware('permission:items,update');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy')->middleware('permission:items,destroy');
});

// ======================= Disposal Routes =======================
Route::middleware(['auth', 'permission:disposals'])->group(function () {
    Route::get('/disposals', [DisposalController::class, 'index'])->name('disposals.index');
    Route::get('/disposals/indexs', [DisposalController::class, 'indexs'])->name('disposals.indexs');
    Route::get('/disposals/create', [DisposalController::class, 'create'])->name('disposals.create')->middleware('permission:disposals,create');
    Route::post('/disposals', [DisposalController::class, 'store'])->name('disposals.store')->middleware('permission:disposals,store');
    Route::get('/disposals/{disposal}', [DisposalController::class, 'show'])->name('disposals.show')->middleware('permission:disposals,show');
    Route::get('/disposals/{disposal}/edit', [DisposalController::class, 'edit'])->name('disposals.edit')->middleware('permission:disposals,edit');
    Route::put('/disposals/{disposal}', [DisposalController::class, 'update'])->name('disposals.update')->middleware('permission:disposals,update');
    Route::delete('/disposals/{disposal}', [DisposalController::class, 'destroy'])->name('disposals.destroy')->middleware('permission:disposals,destroy');
});

// ======================= Services Routes =======================
Route::middleware(['auth', 'permission:services'])->group(function () {
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/indexs', [ServiceController::class, 'indexs'])->name('services.indexs');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create')->middleware('permission:services,create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store')->middleware('permission:services,store');
    Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show')->middleware('permission:services,show');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit')->middleware('permission:services,edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update')->middleware('permission:services,update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy')->middleware('permission:services,destroy');

    Route::post('/services/{service}/approve', [ServiceController::class, 'approveWorkflowStep'])->name('services.approve')->middleware('permission:services,approve');
    Route::post('/services/{service}/reject', [ServiceController::class, 'rejectWorkflowStep'])->name('services.reject')->middleware('permission:services,reject');
});

// ======================= Goods Routes =======================
Route::middleware(['auth', 'permission:goods'])->group(function () {
    Route::get('/goods', [GoodController::class, 'index'])->name('goods.index');
    Route::get('/goods/indexs', [GoodController::class, 'indexs'])->name('goods.indexs');
    Route::get('/goods/create', [GoodController::class, 'create'])->name('goods.create')->middleware('permission:goods,create');
    Route::post('/goods', [GoodController::class, 'store'])->name('goods.store')->middleware('permission:goods,store');
    Route::get('/goods/{good}', [GoodController::class, 'show'])->name('goods.show')->middleware('permission:goods,show');
    Route::get('/goods/{good}/edit', [GoodController::class, 'edit'])->name('goods.edit')->middleware('permission:goods,edit');
    Route::put('/goods/{good}', [GoodController::class, 'update'])->name('goods.update')->middleware('permission:goods,update');
    Route::delete('/goods/{good}', [GoodController::class, 'destroy'])->name('goods.destroy')->middleware('permission:goods,destroy');

    Route::post('/goods/{good}/approve', [GoodController::class, 'approveWorkflowStep'])->name('goods.approve')->middleware('permission:goods,approve');
    Route::post('/goods/{good}/reject', [GoodController::class, 'rejectWorkflowStep'])->name('goods.reject')->middleware('permission:goods,reject');
});

// ======================= Borrowing Routes =======================
Route::middleware(['auth', 'permission:borrowings'])->group(function () {
    Route::get('/borrowings', [BorrowingController::class, 'index'])->name('borrowings.index');
    Route::get('/borrowings/indexs', [BorrowingController::class, 'indexs'])->name('borrowings.indexs');
    Route::get('/borrowings/create', [BorrowingController::class, 'create'])->name('borrowings.create')->middleware('permission:borrowings,create');
    Route::post('/borrowings', [BorrowingController::class, 'store'])->name('borrowings.store')->middleware('permission:borrowings,store');
    Route::get('/borrowings/{borrowing}', [BorrowingController::class, 'show'])->name('borrowings.show')->middleware('permission:borrowings,show');
    Route::get('/borrowings/{borrowing}/edit', [BorrowingController::class, 'edit'])->name('borrowings.edit')->middleware('permission:borrowings,edit');
    Route::put('/borrowings/{borrowing}', [BorrowingController::class, 'update'])->name('borrowings.update')->middleware('permission:borrowings,update');
    Route::delete('/borrowings/{borrowing}', [BorrowingController::class, 'destroy'])->name('borrowings.destroy')->middleware('permission:borrowings,destroy');
});

// ======================= Movement Routes =======================
Route::middleware(['auth', 'permission:moverments'])->group(function () {
    Route::get('/moverments', [MovementController::class, 'index'])->name('moverments.index');
    Route::get('/moverments/indexs', [MovementController::class, 'indexs'])->name('moverments.indexs');
    Route::get('/moverments/create', [MovementController::class, 'create'])->name('moverments.create')->middleware('permission:moverments,create');
    Route::post('/moverments', [MovementController::class, 'store'])->name('moverments.store')->middleware('permission:moverments,store');
    Route::get('/moverments/{moverment}', [MovementController::class, 'show'])->name('moverments.show')->middleware('permission:moverments,show');
    Route::get('/moverments/{moverment}/edit', [MovementController::class, 'edit'])->name('moverments.edit')->middleware('permission:moverments,edit');
    Route::put('/moverments/{moverment}', [MovementController::class, 'update'])->name('moverments.update')->middleware('permission:moverments,update');
    Route::delete('/moverments/{moverment}', [MovementController::class, 'destroy'])->name('moverments.destroy')->middleware('permission:moverments,destroy');
});

// ======================= Requisition Routes =======================
Route::middleware(['auth', 'permission:requisitions'])->group(function () {
    Route::get('/requisitions', [RequisitionController::class, 'index'])->name('requisitions.index');
    Route::get('/requisitions/create', [RequisitionController::class, 'create'])->name('requisitions.create')->middleware('permission:requisitions,create');
    Route::post('/requisitions', [RequisitionController::class, 'store'])->name('requisitions.store')->middleware('permission:requisitions,store');
    Route::get('/requisitions/{requisition}', [RequisitionController::class, 'show'])->name('requisitions.show')->middleware('permission:requisitions,show');
    Route::get('/requisitions/{requisition}/edit', [RequisitionController::class, 'edit'])->name('requisitions.edit')->middleware('permission:requisitions,edit');
    Route::put('/requisitions/{requisition}', [RequisitionController::class, 'update'])->name('requisitions.update')->middleware('permission:requisitions,update');
    Route::delete('/requisitions/{requisition}', [RequisitionController::class, 'destroy'])->name('requisitions.destroy')->middleware('permission:requisitions,destroy');
});

// ======================= User Routes =======================
Route::middleware(['auth', 'permission:users'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('permission:users,create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('permission:users,store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show')->middleware('permission:users,show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('permission:users,edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('permission:users,update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('permission:users,destroy');
});

// ======================= Workflow Steps Routes =======================
Route::middleware(['auth', 'permission:workflow_step'])->group(function () {
    Route::get('/workflow_step', [WorkflowstepController::class, 'index'])->name('workflow_step.index');
    Route::get('/workflow_step/create', [WorkflowstepController::class, 'create'])->name('workflow_step.create')->middleware('permission:workflow_step,create');
    Route::post('/workflow_step', [WorkflowstepController::class, 'store'])->name('workflow_step.store')->middleware('permission:workflow_step,store');
});

// ======================= Permissions Routes (Admin Only) =======================
Route::middleware(['auth', 'permission:permissions'])->group(function () {
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create')->middleware('permission:permissions,create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store')->middleware('permission:permissions,store');
    Route::get('/permissions/{id}', [PermissionController::class, 'show'])->name('permissions.show')->middleware('permission:permissions,show');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit')->middleware('permission:permissions,edit');
    Route::put('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update')->middleware('permission:permissions,update');
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy')->middleware('permission:permissions,destroy');
});

Auth::routes();
