@extends('backend.layouts.main')
@section('title', 'Email Templates')
@section('content')

<div>
    <h4 class="tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700">Email Templates</h4>
</div>

<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Tickets</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Ticket Opened (Opened by Staff, Sent to Customer)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Ticket Reply (Sent to Customer)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Ticket Opened - Autoresponse</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Ticket Created (Opened by Customer, Sent to Staff Members)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Ticket Reply (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Auto Close Ticket</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Ticket Assigned (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Estimates</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Send Estimate to Customer</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Estimate Already Sent to Customer</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Estimate Declined (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Estimate Accepted (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Thank You Email (Sent to Customer After Accept)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Estimate Expiration Reminder</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Contracts</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Contract Expiration Reminder (Sent to Customer Contacts)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Send Contract to Customer</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Comment Â (Sent to Customer Contacts)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Comment (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Contract Expiration Reminder (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Contract Signed (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Contract Sign Reminder (Sent to Customer)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Invoices</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Send Invoice to Customer</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Invoice Payment Recorded (Sent to Customer)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Invoice Overdue Notice</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Invoice Already Sent to Customer</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Invoice Payment Recorded (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Invoice Due Notice</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Invoices Payments Recorded in Batch (Sent to Customer)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Subscriptions</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Send Invoice to Customer</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Send Subscription to Customer</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Subscription Payment Failed</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Subscription Canceled (Sent to customer primary contact)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Subscription Payment Succeeded (Sent to customer primary contact)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Customer Subscribed to a Subscription (Sent to administrators and subscription creator)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Credit Card Authorization Required - SCA</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Credit Note</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Send Credit Note To Email</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Tasks</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Task Assigned (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Staff Member Added as Follower on Task (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Comment on Task (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Attachment(s) on Task (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Task Deadline Reminder - Sent to Assigned Members</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Attachment(s) on Task (Sent to Customer Contacts)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Comment on Task (Sent to Customer Contacts)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Task Status Changed (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Task Status Changed (Sent to Customer Contacts)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Customers</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Contact Added/Registered (Welcome Email)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Forgot Password</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Password Reset - Confirmation</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Set New Password</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Statement - Account Summary</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Customer Registration (Sent to admins)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Email Verification (Sent to Contact After Registration)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Customer Profile File(s) Uploaded (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Proposals</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Customer Action - Accepted (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Send Proposal to Customer</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Customer Action - Declined (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Thank You Email (Sent to Customer After Accept)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Comment Â (Sent to Customer/Lead)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Comment (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Proposal Expiration Reminder</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Projects</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Project Discussion (Sent to Project Members)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Project Discussion (Sent to Customer Contacts)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Project File(s) Uploaded (Sent to Customer Contacts)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Project File(s) Uploaded (Sent to Project Members)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Discussion Comment (Sent to Customer Contacts)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Discussion Comment (Sent to Project Members)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Staff Added as Project Member</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Project Created (Sent to Customer Contacts)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Project Marked as Finished (Sent to Customer Contacts)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Staff Members</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Staff Created (Welcome Email)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Forgot Password</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Password Reset - Confirmation</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Two Factor Authentication</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Staff Reminder Email</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Event Notification (Calendar)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Leads</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">New Lead Assigned to Staff Member</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Web to lead form submitted - Sent to lead</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>


<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Estimate Request</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Estimate Request Submitted (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Estimate Request Assigned (Sent to Staff)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Estimate Request Received (Sent to User)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>


<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Notifications</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Non-billed tasks reminder (sent to selected staff members)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">General Data Protection Regulation (GDPR)</h5>
			</div>
			<div class="font-22 ms-auto">
                <button type="button" class="btn btn-outline-primary px-5">Enable All</button>
                <button type="button" class="btn btn-outline-primary px-5">Disable All</button>
            </div>
		</div>
		<hr>
		<div class="table-responsive">
            <table class="table align-middle mb-0 border">
                <thead class="table-light">
                    <tr class="border">
                        <th colspan="7">Template Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Removal Request From Contact (Sent to administrators)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                    <tr class="border">
                        <td colspan="6"><a href="{{ route('setup.email_templates.template') }}">Removal Request From Lead (Sent to administrators)</a></td>
                        <td class="text-end"><a href="">Disable</a></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
</div>
@endsection
