<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Knowledge\KnowledgeController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
// use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\Customers\ContactController;
use App\Http\Controllers\Backend\Customers\ContractController;
use App\Http\Controllers\Backend\Customers\CustomerController;
use App\Http\Controllers\Backend\Contract\MainContractController;
use App\Http\Controllers\Backend\Customers\EstimateController;
use App\Http\Controllers\Backend\Customers\ExpenseController;
use App\Http\Controllers\Backend\Customers\FileController;
use App\Http\Controllers\Backend\Customers\InvoiceController;
use App\Http\Controllers\Backend\Customers\NoteController;

use App\Http\Controllers\Backend\Customers\ProfileController;
use App\Http\Controllers\Backend\Customers\ProjectController;
use App\Http\Controllers\Backend\Customers\ReminderController;
use App\Http\Controllers\Backend\Customers\StatementController;
use App\Http\Controllers\Backend\Customers\VaultController;
use App\Http\Controllers\Backend\Customers\SubscriptionController;
use App\Http\Controllers\Backend\Customers\MapController;
use App\Http\Controllers\Backend\Customers\PaymentController;
use App\Http\Controllers\Backend\Customers\TaskController;
use App\Http\Controllers\Backend\Customers\ProposalController;
use App\Http\Controllers\Backend\Customers\CreditnoteController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Estimate\MainEstimateController;
use App\Http\Controllers\Backend\Estimate\SideEstimateController;
use App\Http\Controllers\Backend\Knowledge\MainKnowledgeBaseController;
use App\Http\Controllers\Backend\Lead\LeadController;
use App\Http\Controllers\Backend\Projects\MainProjectController;
use App\Http\Controllers\support\MainSupportController;
use App\Http\Controllers\Backend\Setups\EstimateFormController;
use App\Http\Controllers\Backend\Setups\EstimateStatusController;
use App\Http\Controllers\Backend\Setups\SetupContractController;
use App\Http\Controllers\Backend\Setups\CurrencyController;
use App\Http\Controllers\Backend\Setups\StaffController;
use App\Http\Controllers\Backend\Setups\TaxController;

use App\Http\Controllers\Backend\Setups\CustomersController;
use App\Http\Controllers\Backend\Setups\CustomFieldsController;
use App\Http\Controllers\Backend\Setups\EmailIntegrationController;

use App\Http\Controllers\Backend\Setups\EmailTemplatesController;
use App\Http\Controllers\Backend\Setups\ExpensesCategoryController;

use App\Http\Controllers\Backend\Setups\GdprController;

use App\Http\Controllers\Backend\Setups\LeadSpamFilterController;

use App\Http\Controllers\Backend\Setups\MenuSetupController;

use App\Http\Controllers\Backend\Setups\ModulesController;

use App\Http\Controllers\Backend\Setups\PaymentModeController;
use App\Http\Controllers\Backend\Setups\RoleController;
use App\Http\Controllers\Backend\Setups\SourcesController;
use App\Http\Controllers\Backend\Setups\StatusesController;
use App\Http\Controllers\Backend\Setups\WebToLeadController;

use App\Http\Controllers\Backend\Setups\Support\DepartmentController;
use App\Http\Controllers\Backend\Setups\Support\PreReplyController;
use App\Http\Controllers\Backend\Setups\Support\TicketPriorityController;
use App\Http\Controllers\Backend\Setups\Support\TicketStatusController;
use App\Http\Controllers\Backend\Setups\Support\ServiceController;
use App\Http\Controllers\Backend\Setups\Support\SpamFilterController;

use App\Http\Controllers\Backend\Setups\WebToLeadUserController;

use App\Http\Controllers\Backend\Setups\Settings\SettingsController;
use App\Http\Controllers\Backend\Setups\Settings\CompanyInfoController;
use App\Http\Controllers\Backend\Setups\Settings\LocalizationController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsEmailController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsFinanceController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsSubscriptionController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsPaymentController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsCustomersController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsTaskController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsSupportController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsLeadsController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsCalenderController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsSmsController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsPdfController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsEsignController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsCornJobController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsTagController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsPusherController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsGoogleController;
use App\Http\Controllers\Backend\Setups\Settings\SettingsMiscController;

use App\Http\Controllers\Backend\Setups\ThemeStyle\ThemeStyleController;
use App\Http\Controllers\Backend\Tasks\MainTaskController;

use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketInformationController;
use App\Http\Livewire\Backend\Lead\LeadLivewire;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    // Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::get('forget-passsword', [ForgetPasswordController::class, 'index'])->name('forget_passsword');
    Route::get('message', [ForgetPasswordController::class, 'message'])->name('message');
    Route::get('reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('resetPassword');
    Route::post('process-reset-password', [ForgetPasswordController::class, 'processResetPassword'])->name('processResetPassword');
});

Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

Route::middleware(['auth'])->group(function () {

    //DASHBOARD ROUTES
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


    //AUTH USER PROFILE
    Route::get('/admin/profile/{id}', [AdminProfileController::class, 'admin_profile'])->name('admin_profile');


    //CUSTOMER ROUTES
    Route::prefix('customers')->group(function () {

        //CUSTOMER ROUTES
        Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
        Route::post('/updatestatus/{id}', [CustomerController::class, 'updatestatus'])->name('customers.updatestatus');
        Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
        Route::post('/group-create', [CustomerController::class, 'group_create'])->name('customers.group_create');
        Route::post('/store', [CustomerController::class, 'store'])->name('customers.store');
        Route::patch('/customer-update/{id}', [CustomerController::class, 'update'])->name('customers.update');
        Route::get('/import-customer', [CustomerController::class, 'import_customer'])->name('customers.import_customer');
        Route::post('/import-customer/import', [CustomerController::class, 'import'])->name('customers.import_customer.import');
        Route::get('/export/pdf', [CustomerController::class, 'pdf'])->name('customers.export.pdf');
        Route::get('/export/excel', [CustomerController::class, 'excel'])->name('customers.export.excel');
        Route::get('/search', [CustomerController::class, 'search'])->name('customers.search');
        Route::get('/contact', [CustomerController::class, 'contact'])->name('customers.contact');
        Route::get('/pcontact/edit/{id}', [CustomerController::class, 'pcontactedit'])->name('customers.contact.p_edit');
        Route::post('/pcontact/update/{id}', [CustomerController::class, 'pcontactupdate'])->name('customers.contact.p_update');
        Route::post('/contact/update-status', [CustomerController::class, 'p_update_status'])->name('customers.profile.contact.p_updatestatus');
        Route::get('/contact/delete-contact/{id}', [CustomerController::class, 'delete_contact'])->name('customers.contact.delete_contact');
        Route::get('/contact/search', [CustomerController::class, 'contact_search'])->name('customers.contact.search');
        Route::get('/contact/export/contact-pdf', [CustomerController::class, 'contact_pdf'])->name('customers.contact.export.pdf');
        Route::get('/contact/export/contact-excel', [CustomerController::class, 'contact_excel'])->name('customers.contact.export.excel');
        Route::get('/contact/export/contact-excel-file', [CustomerController::class, 'contact_excel_file'])->name('customers.contact.export.contact_excel_file');
        Route::get('/customers/delete/{id}', [CustomerController::class, 'delete'])->name('customers.delete');


        //PROFILE ROUTES
        Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('customers.profile');
        Route::post('/profile/{id}/create-admin', [ProfileController::class, 'create_admin'])->name('customers.profile.create_admin');
        Route::delete('/profile/{adminId}/{customerId}/delete-admin', [ProfileController::class, 'delete_admin'])->name('customers.profile.delete_admin');


        // MainContractController
        Route::get('/contact/home', [MainContractController::class, 'index'])->name('maincontract.index');
        Route::get('/contact/info', [MainContractController::class, 'create'])->name('main.contract.info.create');


        //CONTACT ROUTES
        Route::get('/profile/{id}/contact', [ContactController::class, 'index'])->name('customers.profile.contact');
        Route::get('/profile/{id}/contact/export/pdf', [ContactController::class, 'pdf'])->name('customers.profile.contact.export.pdf');
        Route::get('/profile/{id}/contact/export/excel', [ContactController::class, 'excel'])->name('customers.profile.contact.export.excel');
        Route::get('/profile/contact/export/excel-file', [ContactController::class, 'excel_file'])->name('customers.profile.contact.export.excel_file');
        Route::post('/profile/{id}/contact', [ContactController::class, 'store'])->name('customers.profile.contact.store');
        Route::post('/profile/{id}/contact/update-status', [ContactController::class, 'updateStatus'])->name('customers.profile.contact.updatestatus');
        Route::get('/profile/{id}/contact/edit/{contactId}', [ContactController::class, 'edit'])->name('customers.profile.contact.edit');
        Route::any('/profile/{id}/contact/update/{contactId}', [ContactController::class, 'update'])->name('customers.profile.contact.update');
        Route::get('/profile/contact/delete/{contactId}', [ContactController::class, 'delete'])->name('customers.profile.contact.delete');


        //CONTRACT ROUTES
        Route::get('/profile/{id}/contracts', [ContractController::class, 'index'])->name('customers.profile.contracts');
        Route::get('/profile/{id}/contracts/create', [ContractController::class, 'create'])->name('customers.profile.contracts.create');
        Route::get('/profile/{id}/contracts/show', [ContractController::class, 'show'])->name('customers.profile.contracts.show');
        Route::get('/profile/{id}/contracts/edit', [ContractController::class, 'edit'])->name('customers.profile.contracts.edit');
        Route::get('/profile/{id}/contracts/edit/new-task', [ContractController::class, 'new_task'])->name('customers.profile.contracts.edit.new_task');
        Route::get('/profile/{id}/contracts/edit/send-to-email', [ContractController::class, 'send_to_email'])->name('customers.profile.contracts.edit.send_to_email');



        //ESTIMATE ROUTES
        Route::get('/profile/{id}/estimates', [EstimateController::class, 'index'])->name('customers.profile.estimates');
        Route::get('/profile/{id}/estimates/create', [EstimateController::class, 'create'])->name('customers.profile.estimates.create');
        Route::get('/profile/{id}/estimates/show', [EstimateController::class, 'show'])->name('customers.profile.estimates.show');
        Route::get('/profile/{id}/estimates/edit', [EstimateController::class, 'edit'])->name('customers.profile.estimates.edit');
        Route::get('/profile/{id}/estimates/zip-estimate', [EstimateController::class, 'zip_estimate'])->name('customers.profile.estimates.zip_estimate');
        Route::get('/profile/{id}/estimates/show/estimates-invoice', [EstimateController::class, 'estimates_invoice'])->name('customers.profile.estimates.show.estimates_invoice');
        Route::get('/profile/{id}/estimates/export', [EstimateController::class, 'zip_estimate'])->name('customers.profile.estimates.zip_estimate');
        Route::get('/profile/{id}/estimates/export/pdf', [EstimateController::class, 'pdf'])->name('customers.profile.estimates.export.pdf');
        Route::get('/profile/{id}/estimates/export/excel/', [EstimateController::class, 'excel'])->name('customers.profile.estimates.export.excel');
        Route::get('/profile/estimates/export/excel-file', [EstimateController::class, 'excel_file'])->name('customers.profile.estimates.export.excel_file');



        //EXPENSE ROUTES
        Route::get('/profile/{id}/expenses', [ExpenseController::class, 'index'])->name('customers.profile.expenses');



        //PROJECT ROUTES
        Route::get('/profile/{id}/projects', [ProjectController::class, 'index'])->name('customers.profile.projects');
        Route::get('/profile/{id}/projects/create', [ProjectController::class, 'create'])->name('customers.profile.projects.create');



        //NOTES ROUTES
        Route::get('/profile/{id}/notes', [NoteController::class, 'index'])->name('customers.profile.notes');
        Route::post('/profile/notes', [NoteController::class, 'store'])->name('customers.profile.notes.store');
        Route::get('/customer/profile/export', [NoteController::class, 'export'])->name('customers.profile.notes.export');
        Route::get('/profile/notes/show', [NoteController::class, 'show'])->name('customers.profile.notes.show');
        Route::get('/profile/{id}/notes/edit', [NoteController::class, 'edit'])->name('customers.profile.notes.edit');
        Route::put('/profile/notes/update', [NoteController::class, 'update'])->name('customers.profile.notes.update');
        Route::delete('/profile/{id}/notes/delete', [NoteController::class, 'destroy'])->name('customers.profile.notes.delete');



        //STATEMENT ROUTES
        Route::get('/profile/{id}/statements', [StatementController::class, 'index'])->name('customers.profile.statements');
        Route::get('/profile/statements/downloadpdf/{id}', [StatementController::class, 'pdfdownload'])->name('customers.profile.pdf.download');
        Route::get('/profile/statements/showdpdf/{id}', [StatementController::class, 'pdfshow'])->name('customers.profile.pdf.show');
        //FILE ROUTES
        Route::get('/profile/{id}/file', [FileController::class, 'index'])->name('customers.profile.file');


        // VAULT ROUTE
        Route::get('/profile/{id}/vaults', [VaultController::class, 'index'])->name('customers.profile.vaults');


        //REMINDER ROUTES
        Route::get('/profile/{id}/reminders', [ReminderController::class, 'index'])->name('customers.profile.reminders');


        //THIS IS SUBSCRIPTION
        Route::get('/profile/{id}/subcriptions', [SubscriptionController::class, 'index'])->name('customers.profile.subcriptions');
        Route::get('/profile/{id}/subcriptions.create', [SubscriptionController::class, 'create'])->name('customers.profile.subcriptions.create');
        Route::get('/profile/{id}/subcriptions.edit', [SubscriptionController::class, 'edit'])->name('customers.profile.subcriptions.edit');



        // THIS IS MAP SECTION
        Route::get('/profile/{id}/map', [MapController::class, 'index'])->name('customers.profile.map.index');
        Route::post('/profile/store/{id}', [MapController::class, 'locationstore'])->name('customers.profile.map.store');



        // THIS IS TASK ROUTE
        Route::get('/profile/{id}/task', [TaskController::class, 'index'])->name('customers.profile.task');
        Route::get('/profile/{id}/task.create', [TaskController::class, 'create'])->name('customers.profile.task.create');
        Route::get('/profile/{id}/task.edit', [TaskController::class, 'edit'])->name('customers.profile.task.edit');



        // THIS IS PROPOSALS ROUTE
        Route::get('/profile/{id}/proposals', [ProposalController::class, 'index'])->name('customers.profile.proposal');
        Route::get('/profile/{id}/proposals.create', [ProposalController::class, 'create'])->name('customers.profile.proposal.create');
        Route::get('/profile/{id}/proposals.edit', [ProposalController::class, 'edit'])->name('customers.profile.proposal.edit');
        Route::get('/profile/{id}/proposals.show', [ProposalController::class, 'show'])->name('customers.profile.proposal.show');



        // THIS IS CREDIT NOTE ROUTE
        Route::get('/profile/{id}/creditnote', [CreditnoteController::class, 'index'])->name('customers.profile.creditnote');
        Route::get('/profile/{id}/creditnote.create', [CreditnoteController::class, 'create'])->name('customers.profile.creditnote.create');
        Route::get('/profile/{id}/creditnote.edit', [CreditnoteController::class, 'edit'])->name('customers.profile.creditnote.edit');
        Route::get('/profile/{id}/creditnote.show', [CreditnoteController::class, 'show'])->name('customers.profile.creditnote.show');



        // THIS IS INVOICE ROUTE
        Route::get('/profile/{id}/invoice', [InvoiceController::class, 'index'])->name('customers.profile.invoice');
        Route::get('/profile/{id}/invoice/create', [InvoiceController::class, 'create'])->name('customers.profile.invoice.create');
        Route::get('/profile/{id}/invoice/show', [InvoiceController::class, 'show'])->name('customers.profile.invoice.show');
        Route::get('/profile/{id}/invoice/edit', [InvoiceController::class, 'edit'])->name('customers.profile.invoice.edit');



        // THIS IS PAYMENT ROUTE
        Route::get('/profile/{id}/payment', [PaymentController::class, 'index'])->name('customers.profile.payment');
        Route::get('/profile/payment/{id}/show', [PaymentController::class, 'show'])->name('customers.payment.show');
        Route::post('/profile/payment/store', [PaymentController::class, 'store'])->name('customer.contact.payment.store');


        // THIS IS TICKET ROUTE
        Route::get('/profile/{id}/ticket', [TicketController::class, 'index'])->name('customers.profile.tickets');


        // THIS IS TICKET INFORMATION
        Route::get('/profile/{id}/ticketInformation', [TicketController::class, 'create'])->name('customers.profile.ticketInformation');
        Route::post('/', [TicketController::class, 'store'])->name('customers.profile.ticket.store');
    });


    //PROJECTS ROUTES
    Route::prefix('/projects')->group(function () {
        Route::get('/index', [MainProjectController::class, 'index'])->name('projects.inedx');
        Route::get('/create', [MainProjectController::class, 'create'])->name('projects.create');
        Route::get('/customercontactshow', [MainProjectController::class, 'customercontactshow'])->name('projects.customercontactshow');

        Route::post('/store', [MainProjectController::class, 'store'])->name('projects.store');
        Route::get('/show/{id}', [MainProjectController::class, 'show'])->name('projects.show');
        Route::get('/edit/{id}', [MainProjectController::class, 'edit'])->name('projects.edit');
        Route::post('/update/{id}', [MainProjectController::class, 'update'])->name('projects.update');
        Route::get('/filter', [MainProjectController::class, 'filter'])->name('projects.filter');
        Route::get('/show/{id}/project_task', [MainProjectController::class, 'project_task'])->name('projects.project_task');
        Route::get('/show/{id}/project_timesheets', [MainProjectController::class, 'project_timesheets'])->name('projects.project_timesheets');
        Route::get('/show/{id}/project_milestones', [MainProjectController::class, 'project_milestones'])->name('projects.project_milestones');

        Route::get('/show/{id}/project_files', [MainProjectController::class, 'project_files'])->name('projects.project_files');
        Route::post('/show/project_files/store', [MainProjectController::class, 'project_files_store'])->name('projects.project_files.store');

        Route::get('/show/{id}/project_discussions', [MainProjectController::class, 'project_discussions'])->name('projects.project_discussions');

        Route::get('/show/{id}/project_gantt', [MainProjectController::class, 'project_gantt'])->name('projects.project_gantt');
        Route::get('/show/{id}/project_tickets', [MainProjectController::class, 'project_tickets'])->name('projects.project_tickets');
        Route::get('/show/{id}/project_contracts', [MainProjectController::class, 'project_contracts'])->name('projects.project_contracts');
        Route::get('/show/{id}/project_proposals', [MainProjectController::class, 'project_proposals'])->name('projects.project_proposals');
        Route::get('/show/{id}/project_estimates', [MainProjectController::class, 'project_estimates'])->name('projects.project_estimates');
        Route::get('/show/{id}/project_invoices', [MainProjectController::class, 'project_invoices'])->name('projects.project_invoices');
        Route::get('/show/{id}/project_subscriptions', [MainProjectController::class, 'project_subscriptions'])->name('projects.project_subscriptions');
        Route::get('/show/{id}/project_expenses', [MainProjectController::class, 'project_expenses'])->name('projects.project_expenses');
        Route::get('/show/{id}/project_credit_notes', [MainProjectController::class, 'project_credit_notes'])->name('projects.project_credit_notes');
        Route::get('/show/{id}/project_notes', [MainProjectController::class, 'project_notes'])->name('projects.project_notes');
        Route::get('/show/{id}/project_activity', [MainProjectController::class, 'project_activity'])->name('projects.project_activity');
    });


    //SUPPORT ROUTES
    Route::prefix('/support')->group(function () {
        Route::get('/index', [MainSupportController::class, 'index'])->name('support.index');
        Route::get('/create', [MainSupportController::class, 'create'])->name('support.create');
        Route::post('/ticket_to_contact_store', [MainSupportController::class, 'ticket_to_contact_store'])->name('support.ticket_to_contact_store');
        Route::post('/ticket_without_contact_store', [MainSupportController::class, 'ticket_without_contact_store'])->name('support.ticket_without_contact_store');
        Route::post('/create_tag_from_ticket_information', [MainSupportController::class, 'create_tag_from_ticket_information'])->name('support.create_tag_from_ticket_information');
        Route::post('/create_tag_from_bulk_action', [MainSupportController::class, 'create_tag_from_bulk_action'])->name('support.create_tag_from_bulk_action');

        // Store ID in session
        Route::post('/store-predefinedReplayId-in-session', function (Request $request) {
            $id = $request->input('id');
            session(['id' => $id]);
            return response()->json(['success' => true]);
        })->name('store_predefinedReplayId_in_session');

        // Retrieve message column value from database using session id
        Route::get('/get-predefined-reply-message', function (Request $request) {
            $id = $request->input('id');
            $message = DB::table('tickets_predefined_replies')->where('id', $id)->first();
            return response()->json(['message' => $message]);
        })->name('get_predefined_reply_message');

        // Store ID in session
        Route::post('/store-knowledgeBaseLinkId-in-session', function (Request $request) {
            $id = $request->input('id');
            session(['id' => $id]);
            return response()->json(['success' => true]);
        })->name('store_knowledgeBaseLinkId_in_session');

        // Retrieve description column value from database using session id
        Route::get('/get-knowledge-base-message', function (Request $request) {
            $id = $request->input('id');
            $message = DB::table('knowledge_bases')->where('id', $id)->first();
            return response()->json(['message' => $message]);
        })->name('get_knowledge_base_link');


        Route::get('/show/{id}', [MainSupportController::class, 'show'])->name('support.show');

        Route::post('/update-ticket-status/{id}', [MainSupportController::class, 'updateTicketStatus'])->name('support.updateTicketStatus');

        Route::get('/delete-ticket/{id}', [MainSupportController::class, 'delete_ticket'])->name('support.delete_ticket');

        Route::get('/delete-replay/{id}', [MainSupportController::class, 'delete_replay'])->name('support.delete_replay');
        Route::patch('/update-ticket-message/{id}', [MainSupportController::class, 'updateMessage'])->name('support.updateMessage');
        Route::patch('/update-replay-message/{id}', [MainSupportController::class, 'updateReplayMessage'])->name('support.updateReplayMessage');
        Route::patch('/update-ticket/{id}', [MainSupportController::class, 'update_ticket'])->name('support.update_ticket');

        Route::patch('/update_others_ticket/{id}', [MainSupportController::class, 'update_others_ticket'])->name('support.update_others_ticket');

        Route::get('/print-message/{id}', [MainSupportController::class, 'print_message'])->name('support.print_message');
        Route::get('/print-replay-message/{id}', [MainSupportController::class, 'print_replay_message'])->name('support.print_replay_message');

        Route::get('/delete-attachment/{id}', [MainSupportController::class, 'delete_attachment'])->name('support.delete_attachment');
        Route::get('/delete-replay-attachment/{id}', [MainSupportController::class, 'delete_replay_attachment'])->name('support.delete_replay_attachment');
        Route::post('/add-replay/{id}', [MainSupportController::class, 'add_replay'])->name('support.add_replay');
        Route::post('/add-note/{id}', [MainSupportController::class, 'add_note'])->name('support.add_note');


        Route::get('/view-public-form/{id}', [MainSupportController::class, 'view_public_form'])->name('support.view_public_form');
        Route::get('/show/settings/{id}', [MainSupportController::class, 'show'])->name('support.show.settings');
        Route::get('/edit', [MainSupportController::class, 'edit'])->name('support.edit');
        Route::get('/filter', [MainSupportController::class, 'filter'])->name('support.filter');


        Route::post('/task-store-from-support', [MainSupportController::class, 'task_store_from_support'])->name('support.task_store_from_support');
        Route::post('/task-store-from-support-replay', [MainSupportController::class, 'task_store_from_support_replay'])->name('support.task_store_from_support_replay');
        Route::get('/task-edit-from-support/{id}/{ticketId}', [MainSupportController::class, 'task_edit_from_support'])->name('support.task_edit_from_support');
        Route::patch('/task-update-from-support/{id}/{ticketId}', [MainSupportController::class, 'task_update_from_support'])->name('support.task_update_from_support');
        Route::delete('/task-delete-from-support/{id}/{ticketId}', [MainSupportController::class, 'task_delete_from_support'])->name('support.task_delete_from_support');
    });


    //TASKS ROUTES
    Route::prefix('/tasks')->group(function () {
        Route::get('/index', [MainTaskController::class, 'index'])->name('tasks.inedx');
        Route::get('/create/{id?}/{rel_type?}', [MainTaskController::class, 'create'])->name('tasks.create');
        Route::post('/create-tag', [MainTaskController::class, 'createTag'])->name('tag.create');
        Route::post('/store', [MainTaskController::class, 'store'])->name('tasks.store');
        Route::post('/update-status', [MainTaskController::class, 'status_update'])->name('tasks.status.update');
        Route::post('/update-priority', [MainTaskController::class, 'priority_update'])->name('tasks.priority.update');
        Route::get('/edit/{id}', [MainTaskController::class, 'edit'])->name('tasks.edit');
        Route::patch('/update/{id}', [MainTaskController::class, 'update'])->name('tasks.update');
        Route::get('/overview', [MainTaskController::class, 'overview'])->name('maintasks.overview');

        Route::get('/task-view/{id}', [MainTaskController::class, 'taskview'])->name('maintasks.taskview');
        Route::post('/task/updatepublic', [MainTaskController::class, 'update_ispublic'])->name('tasks.updatepublic');
        Route::post('/task/updatetickstatus', [MainTaskController::class, 'updatetickstatus'])->name('tasks.updatetickstatus');
        Route::post('/task/updateStartDate', [MainTaskController::class, 'updateStartDate'])->name('tasks.updateStartDate');
        Route::post('/task/updateDueDate', [MainTaskController::class, 'updateDueDate'])->name('tasks.updateDueDate');
        Route::post('/task/updatetaggs', [MainTaskController::class, 'updatetaggs'])->name('tasks.updatetaggs');

        Route::post('/task/reminderStore', [MainTaskController::class, 'reminderStore'])->name('tasks.reminderStore');
        Route::patch('/task/reminderUpdate/{id}', [MainTaskController::class, 'reminderUpdate'])->name('tasks.reminderUpdate');
        Route::get('/task/reminderdelete/{id}', [MainTaskController::class, 'reminderdelete'])->name('tasks.reminderdelete');

        Route::post('/task/updateassignee', [MainTaskController::class, 'updateassignee'])->name('tasks.updateassignee');
        Route::post('/task/updatefollowers', [MainTaskController::class, 'updatefollowers'])->name('tasks.updatefollowers');

        Route::post('/task/tasktimerstore', [MainTaskController::class, 'tasktimerstore'])->name('tasks.tasktimerstore');
        Route::patch('/task/tasktimerUpdate/{id}', [MainTaskController::class, 'tasktimerUpdate'])->name('tasks.tasktimerUpdate');
        Route::get('/task/tasktimerdelete/{id}', [MainTaskController::class, 'tasktimerdelete'])->name('tasks.tasktimerdelete');

        Route::post('/task/tasktimerstorebtn', [MainTaskController::class, 'tasktimerstorebtn'])->name('tasks.tasktimerstorebtn');
        Route::post('/task/tasktimerstopbtn', [MainTaskController::class, 'tasktimerstopbtn'])->name('tasks.tasktimerstopbtn');

        Route::post('/task/checklistsstore', [MainTaskController::class, 'checklistsstore'])->name('tasks.checklistsstore');
        Route::get('/task/checklistshow', [MainTaskController::class, 'checklistshow'])->name('tasks.checklistshow');

        Route::get('/task/filedelete/{id}', [MainTaskController::class, 'filedelete'])->name('tasks.filedelete');

        Route::post('/task/commentstore', [MainTaskController::class, 'commentstore'])->name('tasks.commentstore');
        Route::patch('/task/commentupdate/{id}', [MainTaskController::class, 'commentupdate'])->name('tasks.commentupdate');
        Route::get('/task/commentdelete/{id}', [MainTaskController::class, 'commentdelete'])->name('tasks.commentdelete');
    });


    //LEADS ROUTES
    Route::prefix('/leads')->group(function () {
        Route::get('/index/kanban', [LeadController::class, 'swapkanban'])->name('leads.swapkanban');
        Route::get('/index/{id?}', [LeadController::class, 'index'])->name('leads.inedx');
        Route::get('/index/pdf/{id}', [LeadController::class, 'leadpdf'])->name('lead.pdf.index');
        Route::get('/mainlead/edit/{id}', [LeadController::class, 'edit'])->name('mainlead.edit');
        Route::post('/update/lead/main/{id}', [LeadController::class, 'updatelead'])->name('lead.update.main');
        Route::post('lead/reminder/set', [LeadController::class, 'leadreminderset'])->name('lead.reminder.set');
        Route::post('/leadtocustomer/edit', [LeadController::class, 'leadtocustomer'])->name('leadtocustomer.update');

        Route::post('/reminder/lead/delete/{id}', [LeadController::class, 'destroyReminder'])->name('lead.reminder.destroy');
        Route::post('edit/reminder/lead', [LeadController::class, 'reminderupdate'])->name('lead.reminder.edit');



        // Route::post('/fetch-selected-leads', [LeadController::class, 'handleSelectedLeads'])->name('selected.lead.id');
        Route::get('/reminder-fetch-data/', [LeadController::class, 'fetchReminderData'])->name('fetch-lead-reminder-data');



        Route::get('/leads/import', [LeadController::class, 'import'])->name('leads.import');

        Route::post('/import-lead/import', [LeadController::class, 'importup'])->name('lead.importup');
    });


    //SETUP ROUTES
    Route::prefix('setup')->group(function () {

        //STAFF ROUTES
        Route::get('/staff', [StaffController::class, 'index'])->name('setup.staff.index');
        Route::get('/staff/create', [StaffController::class, 'create'])->name('setup.staff.create');
        Route::get('/staff/show/{id}', [StaffController::class, 'show'])->name('setup.staff.show');
        Route::patch('/staff/update/{id}', [StaffController::class, 'staffUpdate'])->name('setup.staff.update');
        Route::post('/updatestatus/{id}', [StaffController::class, 'updatestatus'])->name('staff.updatestatus');


        //CONTRACTS ROUTES
        Route::get('/contract', [SetupContractController::class, 'index'])->name('setup.contract.index');


        //ESTIMATE REQUEST FORMS ROUTES
        Route::get('/estimate-request/forms', [EstimateFormController::class, 'index'])->name('setup.estimate_request.forms.index');
        Route::get('/estimate-request/forms/create', [EstimateFormController::class, 'create'])->name('setup.estimate_request.forms.create');
        Route::get('/estimate-request/forms/show', [EstimateFormController::class, 'show'])->name('setup.estimate_request.forms.show');
        Route::get('/estimate-request/forms/edit', [EstimateFormController::class, 'edit'])->name('setup.estimate_request.forms.edit');


        //ESTIMATE REQUEST STATUSES ROUTES
        Route::get('/estimate-request/statuses', [EstimateStatusController::class, 'index'])->name('setup.estimate_request.statuses.index');


        //EMAIL TEMPLATE ROUTES
        Route::get('/email-templates/index', [EmailTemplatesController::class, 'index'])->name('setup.email_templates.index');
        Route::get('/email-templates/template', [EmailTemplatesController::class, 'template'])->name('setup.email_templates.template');


        //CUSTOM FIELDS ROUTES
        Route::get('/custom-fields/index', [CustomFieldsController::class, 'index'])->name('setup.custom-fields.index');
        Route::get('/custom-fields/create', [CustomFieldsController::class, 'create'])->name('setup.custom-fields.create');
        Route::post('/custom-fields/store', [CustomFieldsController::class, 'store'])->name('setup.custom-fields.store');
        Route::post('/custom-fields/updateStatus', [CustomFieldsController::class, 'updateStatus'])->name('setup.customfields.statusupdate');
        Route::get('/custom-fields/edit/{id}', [CustomFieldsController::class, 'edit'])->name('setup.custom-fields.edit');
        Route::post('/custom-fields/update/{id}', [CustomFieldsController::class, 'update'])->name('setup.custom-fields.update');


        //FINANCE ROUTES
        Route::get('/taxes', [TaxController::class, 'index'])->name('setup.taxes.index');
        //Route::get('/staff', [StaffController::class, 'index'])->name('setup.staff.index');


        //GDPR ROUTES
        Route::get('/gdpr/general', [GdprController::class, 'general'])->name('setup.gdpr.general');
        Route::get('/gdpr/right-to-data-portability', [GdprController::class, 'right_to_data_portability'])->name('setup.gdpr.right_to_data_portability');
        Route::get('/gdpr/right-to-erasure', [GdprController::class, 'right_to_erasure'])->name('setup.gdpr.right_to_erasure');
        Route::get('/gdpr/right-to-be-informed', [GdprController::class, 'right_to_be_informed'])->name('setup.gdpr.right_to_be_informed');
        Route::get('/gdpr/right-to-be-informed/terms-and-conditions', [GdprController::class, 'terms_and_Conditions'])->name('setup.gdpr.right_to_be_informed.terms_and_Conditions');
        Route::get('/gdpr/right-to-be-informed/terms-and-conditions/knowledge-base', [GdprController::class, 'knowledge_base'])->name('setup.gdpr.right_to_be_informed.terms_and_Conditions.knowledge_base');
        Route::get('/gdpr/right-to-be-informed/privacy-policy', [GdprController::class, 'privacy_policy'])->name('setup.gdpr.right_to_be_informed.privacy_policy');
        Route::get('/gdpr/right-of-access', [GdprController::class, 'right_of_access'])->name('setup.gdpr.right_of_access');
        Route::get('/gdpr/consent', [GdprController::class, 'consent'])->name('setup.gdpr.consent');


        //MENU SETUP ROUTES
        Route::get('/menu-setup/main-menu', [MenuSetupController::class, 'main_menu'])->name('setup.menu_setup.main_menu');
        Route::get('/menu-setup/setup-menu', [MenuSetupController::class, 'setup_menu'])->name('setup.menu_setup.setup_menu');


        //CUSTOMER ROUTES
        Route::get('/customer/group', [CustomersController::class, 'index'])->name('setup.customer.index');
        Route::post('/customer/store', [CustomersController::class, 'store'])->name('setup.customer.store');
        Route::delete('/customer/delete/{id}', [CustomersController::class, 'destroy'])->name('setup.customer.delete');


        //LEADS ROUTES
        Route::get('/leads/sources', [SourcesController::class, 'index'])->name('setup.leads.sources.index');
        Route::get('leads/statuses', [StatusesController::class, 'index'])->name('setup.leads.statuses.index');


        //EMAIL INTEGRATION ROUTE
        Route::get('leads/emailIntegration/index', [EmailIntegrationController::class, 'index'])->name('setup.leads.emailIntegration.index');
        Route::post('leads/emailIntegration/update/{id}', [EmailIntegrationController::class, 'update'])->name('setup.leads.emailIntegration.update');
        Route::get('leads/emailIntegration/spamfilter', [LeadSpamFilterController::class, 'index'])->name('setup.leads.emailIntegration.spamfilter');


        //WEB TO LEAD ROUTES
        Route::get('leads/webtolead/index', [WebToLeadController::class, 'index'])->name('setup.leads.webtolead.index');
        Route::get('leads/webtolead/create', [WebToLeadController::class, 'create'])->name('setup.leads.webtolead.create');
        Route::post('leads/webtolead/store', [WebToLeadController::class, 'store'])->name('setup.leads.webtolead.store');
        Route::get('leads/webtolead/edit/{id}', [WebToLeadController::class, 'edit'])->name('setup.leads.webtolead.edit');
        Route::patch('/webtolead/update/{id}', [WebToLeadController::class, 'update'])->name('setup.leads.webtolead.update');


        Route::get('/currencies', [CurrencyController::class, 'index'])->name('setup.currencies.index');


        //MODULE ROUTES
        Route::get('/Modules', [ModulesController::class, 'index'])->name('setup.modules.index');


        //SUPPORT ROUTES
        Route::prefix('support')->group(function () {

            //DEPARTMENT ROUTES
            Route::get('/department', [DepartmentController::class, 'index'])->name('support.department.index');

            //PREDIFINED REPLY ROUTES
            Route::get('/pre-reply', [PreReplyController::class, 'index'])->name('support.pre_reply.index');
            Route::get('/pre-reply/create', [PreReplyController::class, 'create'])->name('support.pre_reply.create');
            Route::post('/pre-reply/store', [PreReplyController::class, 'store'])->name('support.pre_reply.store');
            Route::get('/pre-reply/edit/{id}', [PreReplyController::class, 'edit'])->name('support.pre_reply.edit');
            Route::patch('/pre-reply/update/{id}', [PreReplyController::class, 'update'])->name('support.pre_reply.update');
            Route::get('/pre-reply/delete/{id}', [PreReplyController::class, 'destroy'])->name('support.pre_reply.delete');

            //TICKET PRIORITY ROUTES
            Route::get('/ticket-priority', [TicketPriorityController::class, 'index'])->name('support.ticket_priority.index');

            //TICKET STATUS ROUTES
            Route::get('/ticket-status', [TicketStatusController::class, 'index'])->name('support.ticket_status.index');

            //SERVICES ROUTES
            Route::get('/services', [ServiceController::class, 'index'])->name('support.services.index');

            //SPAM FILTER ROUTES
            Route::get('/spam-filter', [SpamFilterController::class, 'index'])->name('support.spam_filter.index');
        });


        Route::get('/payment-modes', [PaymentModeController::class, 'index'])->name('setup.payment.mode.index');


        // THIS IS SETTINGS ROUTE
        Route::prefix('settings')->group(function () {

            //  THIS IS SETTINGS
            Route::get('/settings-index', [SettingsController::class, 'index'])->name('settings.index');
            Route::patch('/settings-update', [SettingsController::class, 'update'])->name('settings.update');

            // THIS IS GENERAL
            // Route::get('/general', [GeneralController::class, 'index'])->name('settings.general.index');

            // THIS IS COMPANY INFO
            Route::get('/company-info', [CompanyInfoController::class, 'index'])->name('settings.companyinfo.index');
            Route::patch('/company-info-update', [CompanyInfoController::class, 'update'])->name('settings.companyinfo.update');

            // THIS IS LOCALIZATION
            Route::get('/localization', [LocalizationController::class, 'index'])->name('settings.localization.index');
            Route::patch('/localization-update', [LocalizationController::class, 'update'])->name('settings.localization.update');

            // THIS IS Email
            Route::get('/email', [SettingsEmailController::class, 'index'])->name('settings.email.index');
            Route::patch('/email-update', [SettingsEmailController::class, 'update'])->name('settings.email.update');

            // THIS IS FINANCE
            Route::get('/finance', [SettingsFinanceController::class, 'index'])->name('settings.finance.index');
            Route::patch('/finance-update', [SettingsFinanceController::class, 'update'])->name('settings.finance.update');

            // THIS IS SUBSCRIPTION
            Route::get('/subscription', [SettingsSubscriptionController::class, 'index'])->name('settings.subscription.index');
            Route::patch('/subscription-update', [SettingsSubscriptionController::class, 'update'])->name('settings.subscription.update');

            // THIS IS SETTINGS PAYMENT
            Route::get('/settings-payment', [SettingsPaymentController::class, 'index'])->name('settings.payment.index');
            Route::patch('/settings-payment-update', [SettingsPaymentController::class, 'update'])->name('settings.payment.update');

            // THIS IS CUSTOMERS
            Route::get('/settings-customers', [SettingsCustomersController::class, 'index'])->name('settings.customers.index');
            Route::patch('/settings-customers-update', [SettingsCustomersController::class, 'update'])->name('settings.customers.update');

            // THIS IS TASKS
            Route::get('/settings-task', [SettingsTaskController::class, 'index'])->name('settings.task.index');
            Route::patch('/settings-task-update', [SettingsTaskController::class, 'update'])->name('settings.task.update');

            // THIS IS SUPPORTS
            Route::get('/settings-support', [SettingsSupportController::class, 'index'])->name('settings.support.index');
            Route::patch('/settings-support-update', [SettingsSupportController::class, 'update'])->name('settings.support.update');
            Route::get('/settings-ticket-form', [SettingsSupportController::class, 'ticketform'])->name('settings.support.ticketform');

            // THIS IS LEADS
            Route::get('/settings-lead', [SettingsLeadsController::class, 'index'])->name('settings.lead.index');
            Route::patch('/settings-lead-update', [SettingsLeadsController::class, 'update'])->name('settings.lead.update');

            // THIS IS CALENDER
            Route::get('/settings-calender', [SettingsCalenderController::class, 'index'])->name('settings.calender.index');
            Route::patch('/settings-calender-update', [SettingsCalenderController::class, 'update'])->name('settings.calender.update');

            // THIS IS SMS
            Route::get('/settings-sms', [SettingsSmsController::class, 'index'])->name('settings.sms.index');
            Route::patch('/settings-sms-update', [SettingsSmsController::class, 'update'])->name('settings.sms.update');

            // THIS IS PDF
            Route::get('/settings-pdf', [SettingsPdfController::class, 'index'])->name('settings.pdf.index');
            Route::patch('/settings-pdf-update', [SettingsPdfController::class, 'update'])->name('settings.pdf.update');


            // THIS IS E-SIGN
            Route::get('/settings-e_sign', [SettingsEsignController::class, 'index'])->name('settings.e_sign.index');
            Route::patch('/settings-e_sign-update', [SettingsEsignController::class, 'update'])->name('settings.e_sign.update');

            // THIS IS CRON JOBS
            Route::get('/settings-cron_jobs', [SettingsCornJobController::class, 'index'])->name('settings.cron_jobs.index');
            Route::patch('/settings-cron_jobs-update', [SettingsCornJobController::class, 'update'])->name('settings.cron_jobs.update');

            // THIS IS TAGS
            Route::get('/settings-tag', [SettingsTagController::class, 'index'])->name('settings.tag.index');
            Route::put('/settings-tag/update', [SettingsTagController::class, 'update'])->name('settings.tag.update');
            Route::get('/settings-tag/delete/{id}', [SettingsTagController::class, 'delete'])->name('settings.tag.delete');

            // THIS IS PUSHER.COM
            Route::get('/settings-pusher', [SettingsPusherController::class, 'index'])->name('settings.pusher.index');
            Route::patch('/settings-pusher-update', [SettingsPusherController::class, 'update'])->name('settings.pusher.update');

            // THIS IS GOOGLE
            Route::get('/settings-google', [SettingsGoogleController::class, 'index'])->name('settings.google.index');
            Route::patch('/settings-google-update', [SettingsGoogleController::class, 'update'])->name('settings.google.update');

            // THIS IS MISC
            Route::get('/settings-misc', [SettingsMiscController::class, 'index'])->name('settings.misc.index');
            Route::patch('/settings-misc-update', [SettingsMiscController::class, 'update'])->name('settings.misc.update');
        });

        Route::get('/expenses/categories', [ExpensesCategoryController::class, 'index'])->name('setup.expenses.categories.index');

        Route::resource('roles', RoleController::class);
    });


    //ESTIMATE REQUEST ROUTES
    Route::prefix('/estimate')->group(function () {
        Route::get('/index', [MainEstimateController::class, 'index'])->name('estimate.index');
        Route::get('/create', [MainEstimateController::class, 'create'])->name('estimate.create');
        Route::post('/store', [MainEstimateController::class, 'store'])->name('estimate.store');
        Route::get('/show', [MainEstimateController::class, 'show'])->name('estimate.show');
        Route::get('/edit/{id}', [MainEstimateController::class, 'edit'])->name('estimate.edit');
        Route::patch('/update/{id}', [MainEstimateController::class, 'update'])->name('estimate.update');
        Route::get('/delete/{id}', [MainEstimateController::class, 'delete'])->name('estimate.delete');

        Route::patch('/form-store/{id}', [MainEstimateController::class, 'form_store'])->name('estimate.form_store');
    });


    //KNOWLEDGEBASE ROUTES
    Route::prefix('/knowledge-base')->group(function () {
        Route::get('/index', [MainKnowledgeBaseController::class, 'index'])->name('knowledge_base.index');
        Route::get('/manage-groups', [MainKnowledgeBaseController::class, 'manage_groups'])->name('knowledge_base.manage_groups');
        Route::get('/group-wise-article', [MainKnowledgeBaseController::class, 'group_wise_article'])->name('knowledge_base.group_wise_article');
        Route::get('/single-group-article', [MainKnowledgeBaseController::class, 'single_group_article'])->name('knowledge_base.single_group_article');
    });
});
