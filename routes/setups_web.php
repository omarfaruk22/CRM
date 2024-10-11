<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Utility\UtilityCOntroller;
use App\Http\Controllers\Backend\Report\ReportController;

use App\Http\Controllers\Backend\Estimate\SideEstimateController;
use App\Http\Controllers\Backend\Setups\Theme\ThemeStyleController;



Route::middleware(['auth'])->group(function () {

    Route::prefix('/utility')->group(function () {
        Route::get('/utilities/media', [UtilityCOntroller::class, 'media'])->name('utilities.media');
        Route::get('/utilities/bulkpdf', [UtilityCOntroller::class, 'bulkpdf'])->name('utilities.bulkpdf');
        Route::get('/utilities/csvexport', [UtilityCOntroller::class, 'csvexport'])->name('utilities.csvexport');
        Route::get('/utilities/calender', [UtilityCOntroller::class, 'calender'])->name('utilities.calender');
        Route::get('/utilities/announcements', [UtilityCOntroller::class, 'announcements'])->name('utilities.announcements');
        Route::get('/utilities/activity', [UtilityCOntroller::class, 'activity'])->name('utilities.activity');
        Route::get('/utilities/database', [UtilityCOntroller::class, 'database'])->name('utilities.database');
        Route::get('/utilities/ticketpipe', [UtilityCOntroller::class, 'ticketpipe'])->name('utilities.ticketpipe');
    });


    Route::prefix('/report')->group(function () {
        Route::get('/reports/sales', [ReportController::class, 'sales'])->name('reports.sales');
        Route::get('/reports/expenses', [ReportController::class, 'expenses'])->name('reports.expenses');
        Route::get('/reports/expenses-vs-income', [ReportController::class, 'expensesVsIncome'])->name('reports.expensesVsIncome');
        Route::get('/reports/leads', [ReportController::class, 'leads'])->name('reports.leads');
        Route::get('/reports/timesheet', [ReportController::class, 'timesheet'])->name('reports.timesheet');
        Route::get('/reports/kbarticles', [ReportController::class, 'kbarticles'])->name('reports.kbarticles');
    });


    // THEME STYLE ROUTES
    Route::prefix('theme')->group(function () {
        Route::get('/', [ThemeStyleController::class, 'index'])->name('setup.theme.index');
        Route::get('/CustomersArea', [ThemeStyleController::class, 'customersArea'])->name('setup.theme.customersArea');
        Route::get('/buttons', [ThemeStyleController::class, 'buttons'])->name('setup.theme.buttons');
        Route::get('/tabs', [ThemeStyleController::class, 'tabs'])->name('setup.theme.tabs');
        Route::get('/modals', [ThemeStyleController::class, 'modals'])->name('setup.theme.modals');
        Route::get('/general', [ThemeStyleController::class, 'general'])->name('setup.theme.general');
        Route::get('/custom', [ThemeStyleController::class, 'custom'])->name('setup.theme.custom');

        Route::post('/sidebar/color', [ThemeStyleController::class, 'sidebarcolorupdate'])->name('sidebar.color.update');
        Route::post('/customer/color', [ThemeStyleController::class, 'customerolorupdate'])->name('customer.color.update');
        Route::post('/button/color', [ThemeStyleController::class, 'buttoncolorupdate'])->name('button.color.update');
        Route::post('/tab/color', [ThemeStyleController::class, 'tabcolorupdate'])->name('tab.color.update');
        Route::post('/modal/color', [ThemeStyleController::class, 'modalcolorupdate'])->name('modal.color.update');
    });
});
