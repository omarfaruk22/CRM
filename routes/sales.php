<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Sales\SalesProposalController;
use App\Http\Controllers\Backend\Sales\SalesEstimateController;
use App\Http\Controllers\Backend\Sales\SalesInvoiceController;
use App\Http\Controllers\Backend\Sales\SalesPaymentController;
use App\Http\Controllers\Backend\Sales\SalesCreditNoteController;
use App\Http\Controllers\Backend\Sales\SalesItemsController;






Route::middleware(['auth'])->group(function () {


    //SALES ROUTES
    Route::prefix('sales')->group(function () {
        Route::get('/proposals', [SalesProposalController::class, 'index'])->name('sales.proposals');
        Route::get('/proposals/switch-to-profile', [SalesProposalController::class, 'switch_to_profile'])->name('sales.proposals.switch_to_profile');
        Route::get('/proposals/create', [SalesProposalController::class, 'create'])->name('sales.proposals.create');
        Route::get('/proposals/details', [SalesProposalController::class, 'details'])->name('sales.proposals.details');
        Route::post('/proposals/newItem', [SalesProposalController::class, 'newItem'])->name('sales.proposals.newItem');
        Route::post('/proposals/store', [SalesProposalController::class, 'store'])->name('sales.proposals.store');
        Route::get('/proposals/Show/{id}', [SalesProposalController::class, 'show'])->name('sales.proposals.show');
        Route::Post('item/sales/proposal/create', [SalesProposalController::class, 'itemcreate'])->name('sales.proposals.item.create');
        Route::get('/fetch/item/data/proposal', [SalesProposalController::class, 'fetchItemData'])->name('fetch-item-data-proposal');
        Route::get('/customer-fetch-data', [SalesProposalController::class, 'fetchCustomerData'])->name('fetch-customer-data');
        Route::get('/lead-fetch-data', [SalesProposalController::class, 'fetchLeadData'])->name('fetch-lead-data');
        // Route::get('/contact-fetch-data', [SalesProposalController::class, 'fetchContactData'])->name('fetch-contact-data');



        Route::get('/estimates', [SalesEstimateController::class, 'index'])->name('sales.estimates');
        Route::get('create/sales/estimates', [SalesEstimateController::class, 'create'])->name('create.sales.estimates');
        Route::post('store/sales/estimates', [SalesEstimateController::class, 'store'])->name('sales.estimate.store');
        Route::Post('estimate/sales/iteam/create', [SalesEstimateController::class, 'itemcreate'])->name('sales.estimate.item.create');
        Route::get('/fetch/item/data/estimate', [SalesEstimateController::class, 'fetchItemDataEstimate'])->name('fetch-item-data-estimate');


        Route::get('/invoice', [SalesInvoiceController::class, 'index'])->name('sales.invoice');
        Route::get('create/invoice/', [SalesInvoiceController::class, 'createInvoice'])->name('create.invoice');
        Route::get('create/recurringinvoice/sales/', [SalesInvoiceController::class, 'recurringInvoice'])->name('create.recurringInvoice');
        Route::get('edit/invoice/sales/{id}', [SalesInvoiceController::class, 'editInvoice'])->name('edit.invoice.sales');
        Route::post('delete/iv/sales/{id}', [SalesInvoiceController::class, 'deleteInvoice'])->name('delete.invoice.sales');




        Route::get('/payment', [SalesPaymentController::class, 'index'])->name('sales.payment');


        Route::get('/credit-note', [SalesCreditNoteController::class, 'index'])->name('sales.credit.note');
        Route::get('/create/creditnote/sales', [SalesCreditNoteController::class, 'createCN'])->name('sales.credit.note.create');
        Route::get('/edit/creditnote/sales/{id}', [SalesCreditNoteController::class, 'editCN'])->name('sales.credit.note.edit');
        Route::post('delete/cn/sales/{id}', [SalesCreditNoteController::class, 'deleteCreditnote'])->name('delete.credit.note.sales');


        Route::get('/items', [SalesItemsController::class, 'index'])->name('sales.items');
        Route::get('/importsalesitem/items', [SalesItemsController::class, 'importsalesitem'])->name('sales.importsalesitem');
        Route::Post('main/sales/iteam/create', [SalesItemsController::class, 'itemcreate'])->name('main.estimate.item.create');
    });
});
