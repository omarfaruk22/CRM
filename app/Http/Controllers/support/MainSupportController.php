<?php

namespace App\Http\Controllers\support;

use App\Http\Controllers\Controller;
use App\Livewire\Backend\Setups\Supports\Departments;
use App\Models\Contact;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Estimate;
use App\Models\Expense;
use App\Models\File;
use App\Models\Invoice;
use App\Models\Knowledge_base;
use App\Models\MainLead;
use App\Models\Milestone;
use App\Models\Note;
use App\Models\Priority;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\Reminder;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Tag;
use App\Models\Tagtable;
use App\Models\Task;
use App\Models\TaskAssigne;
use App\Models\TaskFollower;
use App\Models\Ticket;
use App\Models\Ticket_attachment;
use App\Models\TicketPriority;
use App\Models\TicketReplay;
use App\Models\Tickets_predefined_replies;
use App\Models\TicketStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MainSupportController extends Controller
{

    public function index()
    {
        return view('backend.support.index', []);
    }


    public function create()
    {
        $contacts = Contact::all();
        $departments = Department::all();

        $tagNames = Tag::all();
        $staffs = Staff::all();
        $authUserEmail = Auth::user()->email;
        $priorities = TicketPriority::all();
        $services = Service::all();
        $predefinedReplies = Tickets_predefined_replies::all();
        $knowledgeBaseLinks = Knowledge_base::where('staff_article', 0)->get();


        return view('backend.support.create', [
            'contacts' => $contacts,
            'departments' => $departments,
            'tagNames' => $tagNames,
            'staffs' => $staffs,
            'authUserEmail' => $authUserEmail,
            'priorities' => $priorities,
            'services' => $services,
            'predefinedReplies' => $predefinedReplies,
            'knowledgeBaseLinks' => $knowledgeBaseLinks,
        ]);
    }


    public function create_tag_from_ticket_information(Request $request)
    {
        Tag::create([
            'tags' => $request->tags,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('support.create')->with('tags', 'Tag created successfully!');
    }


    public function create_tag_from_bulk_action(Request $request)
    {
        Tag::create([
            'tags' => $request->tags,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('support.index')->with('success', 'Tag created successfully!');
    }


    public function ticket_to_contact_store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'departmentid' => 'required|string|max:255',
            'priorityId' => 'required',
            'file' => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);


        if ($request->message1 == null && $request->message2 == null) {
            $message = null;
        } elseif ($request->message1 != null && $request->message2 == null) {
            $message = $request->message1;
        } elseif ($request->message2 != null && $request->message1 == null) {
            $message = $request->message2;
        } else {
            $message = null;
        }


        $tags = '';

        if ($request->has('tags')) {
            if (is_array($request->tags)) {
                $tags = implode(', ', $request->tags);
            } else {
                $tags = $request->tags;
            }
        }

        $status = '1';

        $lastRecord = Ticket::create([
            'subject' => $request->subject,
            'name' => $request->name,
            'email' => $request->email,
            'departmentid' => $request->departmentid,
            'cc' => $request->cc,
            'assigned' => $request->assigned,
            'priorityId' => $request->priorityId,
            'statusId' => $status,
            'serviceId' => $request->serviceId,
            'tags' => $tags,
            'message' => $message,
            'created_by' => Auth::user()->id,
        ]);


        $relationType = 'ticket';

        Tagtable::create([
            'rel_type' => $relationType,
            'tag_id' => $tags,
            'created_by' => Auth::user()->id,
        ]);


        // Get the uploaded files
        $files = $request->file('file_name');

        if ($files != null) {
            // Loop through each file
            foreach ($files as $file) {

                // Get file name with extention
                $originalName = $file->getClientOriginalName();

                // Get file extension without name
                $extension = $file->getClientOriginalExtension();

                // Create new file name 
                $filename = time() . '_' . $originalName;

                // Store in project folder
                $file->move(public_path('uploads'), $filename);

                $filenames[] = $filename;
                $extensions[] = $extension;
            }

            if ($filenames) {
                $filenames = implode(', ', $filenames);
            }

            if ($extensions) {
                $extensions = implode(', ', $extensions);
            }
        } else {
            $filenames = null;
            $extensions = null;
        }

        Ticket_attachment::create([
            'ticketid' => $lastRecord->id,
            // 'replyid' => ,
            'file_name' => $filenames,
            'filetype' => $extensions,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('support.index')->with('success', 'Ticket created successfully!');
    }


    public function ticket_without_contact_store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'departmentid' => 'required|string|max:255',
            'contactid' => 'required',
            'priorityId' => 'required'
        ]);


        if ($request->message1 == null && $request->message2 == null) {
            $message = null;
        } elseif ($request->message1 != null && $request->message2 == null) {
            $message = $request->message1;
        } elseif ($request->message2 != null && $request->message1 == null) {
            $message = $request->message2;
        } else {
            $message = null;
        }

        $tags = '';

        if ($request->has('tags')) {
            if (is_array($request->tags)) {
                $tags = implode(', ', $request->tags);
            } else {
                $tags = $request->tags;
            }
        }

        $status = '1';

        $lastRecord = Ticket::create([
            'subject' => $request->subject,
            'departmentid' => $request->departmentid,
            'cc' => $request->cc,
            'assigned' => $request->assigned,
            'contactid' => $request->contactid,
            'priorityId' => $request->priorityId,
            'statusId' => $status,
            'serviceId' => $request->serviceId,
            'tags' => $tags,
            'message' => $message,
            'created_by' => Auth::user()->id,
        ]);


        $relationType = 'ticket';

        Tagtable::create([
            'rel_type' => $relationType,
            'tag_id' => $tags,
            'created_by' => Auth::user()->id,
        ]);


        // Get the uploaded files
        $files = $request->file('file_name');

        if ($files != null) {
            // Loop through each file
            foreach ($files as $file) {

                // Get file name with extention
                $originalName = $file->getClientOriginalName();

                // Get file extension without name
                $extension = $file->getClientOriginalExtension();

                // Create new file name 
                $filename = time() . '_' . $originalName;

                // Store in project folder
                $file->move(public_path('uploads'), $filename);

                $filenames[] = $filename;
                $extensions[] = $extension;
            }

            if ($filenames) {
                $filenames = implode(', ', $filenames);
            }

            if ($extensions) {
                $extensions = implode(', ', $extensions);
            }
        } else {
            $filenames = null;
            $extensions = null;
        }


        Ticket_attachment::create([
            'ticketid' => $lastRecord->id,
            // 'replyid' => ,
            'file_name' => $filenames,
            'filetype' => $extensions,
            'created_by' => Auth::user()->id,
        ]);


        return redirect()->route('support.index')->with('success', 'Ticket created successfully!');
    }


    public function show($id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            abort(404, 'Ticket not found');
        }

        $ticketStatuses = TicketStatus::all();
        $predefinedReplies = Tickets_predefined_replies::all();
        $knowledgeBaseLinks = Knowledge_base::where('staff_article', 0)->get();
        $ticketStatuses = TicketStatus::all();
        $ticketPriorities = TicketPriority::all();
        $tickets = Ticket::all();
        $users = User::all();
        $tagslist = Tag::all();
        $ticketReplies = TicketReplay::all();
        $staffs = Staff::all();
        $contacts = Contact::all();
        $departments = Department::all();
        $tagNames = Tag::all();
        $authUserEmail = Auth::user()->email;
        $allStaff = Staff::all();
        $allPriority = Priority::all();
        $allService = Service::all();
        $allContact = Contact::all();
        $allDepartment = Department::all();
        $allProject = Project::all();
        $notes = Note::where('rel_id', $id)->where('rel_type', 'ticket')->get();

        return view('backend.support.show', compact(
            'ticket',
            'ticketStatuses',
            'predefinedReplies',
            'knowledgeBaseLinks',
            'ticketStatuses',
            'ticketPriorities',
            'tickets',
            'users',
            'tagslist',
            'ticketReplies',
            'staffs',
            'contacts',
            'departments',
            'tagNames',
            'authUserEmail',
            'allStaff',
            'allPriority',
            'allService',
            'allContact',
            'allDepartment',
            'allProject',
            'notes',
        ));
    }

    public function updateTicketStatus(Request $request, $id)
    {
        $statusId = $request->input('status_id');

        $ticket = Ticket::find($id);

        if ($ticket) {
            $ticket->statusId = $statusId;
            $ticket->save();

            return response()->json(['message' => 'Status updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Ticket not found'], 404);
        }
    }



    public function view_public_form($id)
    {
        return view('backend.support.view-public-form');
    }


    public function edit()
    {
        return view('backend.support.edit');
    }


    public function delete_ticket($id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return back()->with('error', 'Data not found');
        }

        $ticket->delete();

        return redirect()->route('support.index')->with('success', 'Ticket Deleted successfully!');
    }


    public function delete_replay($id)
    {
        $replay = TicketReplay::find($id);

        if (!$replay) {
            return back()->with('error', 'Data not found');
        }

        $ticket_attachment = Ticket_attachment::where('replyid', $replay->id)->first();

        $attachment = $ticket_attachment->file_name;

        // @dd($attachment);

        if ($attachment != null) {
            if (file_exists(public_path('uploads/' . $attachment))) {
                unlink(public_path('uploads/' . $attachment));
            }
        }

        $replay->delete();

        return redirect()->route('support.show', $replay->ticketid)->with('success', 'Replay Deleted successfully!');
    }


    public function print_message($id)
    {
        $ticket = Ticket::find($id);
        $currentDate = date('Y-m-d');

        $fileName = 'message.pdf';

        view('backend.support.print-message');

        $html = view('backend.support.print-message', compact('ticket', 'currentDate'))->render();

        $mpdf = new \Mpdf\Mpdf();

        $footer = '<div style="text-align: right; font-size: 12px;">Page {PAGENO} of {nb}</div>';
        $mpdf->SetFooter($footer);


        $mpdf->WriteHTML($html);

        $mpdf->Output($fileName, 'I');
    }


    public function print_replay_message($id)
    {
        $ticket_replay = TicketReplay::find($id);

        $currentDate = date('Y-m-d');

        $fileName = 'replay-message.pdf';

        view('backend.support.print-message');

        $html = view('backend.support.reply-print-message', compact('ticket_replay', 'currentDate'))->render();

        $mpdf = new \Mpdf\Mpdf();

        $footer = '<div style="text-align: right; font-size: 12px;">Page {PAGENO} of {nb}</div>';
        $mpdf->SetFooter($footer);


        $mpdf->WriteHTML($html);

        $mpdf->Output($fileName, 'I');
    }


    public function delete_attachment($id)
    {
        $ticket_attachment = Ticket_attachment::find($id);

        $attachment = $ticket_attachment->file_name;

        if ($attachment != null) {
            if (file_exists(public_path('uploads/' . $attachment))) {
                unlink(public_path('uploads/' . $attachment));
            }
        }

        // set file name as null 
        $ticket_attachment->file_name = null;
        $ticket_attachment->filetype = null;

        $ticket_attachment->save();

        return redirect()->route('support.show', $id)->with('success', 'Attachment deleted successfully!');
    }


    public function delete_replay_attachment($id)
    {
        $ticket_attachment = Ticket_attachment::find($id);

        $attachment = $ticket_attachment->file_name;

        if ($attachment != null) {
            if (file_exists(public_path('uploads/' . $attachment))) {
                unlink(public_path('uploads/' . $attachment));
            }
        }

        // set file name as null 
        $ticket_attachment->file_name = null;
        $ticket_attachment->filetype = null;

        $ticket_attachment->save();

        $ticketId = $ticket_attachment->ticketid;

        return redirect()->route('support.show', $ticketId)->with('success', 'Attachment deleted successfully!');
    }


    public function add_replay(Request $request, $id)
    {

        $ticketid = $id;

        if ($request->message1 == null && $request->message2 == null) {
            $message = null;
        } elseif ($request->message1 != null && $request->message2 == null) {
            $message = $request->message1;
        } elseif ($request->message2 != null && $request->message1 == null) {
            $message = $request->message2;
        } else {
            $message = null;
        }

        $lastRecord = TicketReplay::create([
            'ticketid' => $ticketid,
            'message' => $message,
            'created_by' => Auth::user()->id,
        ]);

        // Get the uploaded files
        $files = $request->file('file_name');

        if ($files != null) {
            // Loop through each file
            foreach ($files as $file) {

                // Get file name with extention
                $originalName = $file->getClientOriginalName();

                // Get file extension without name
                $extension = $file->getClientOriginalExtension();

                // Create new file name 
                $filename = time() . '_' . $originalName;

                // Store in project folder
                $file->move(public_path('uploads'), $filename);

                $filenames[] = $filename;
                $extensions[] = $extension;
            }

            if ($filenames) {
                $filenames = implode(', ', $filenames);
            }

            if ($extensions) {
                $extensions = implode(', ', $extensions);
            }
        } else {
            $filenames = null;
            $extensions = null;
        }

        Ticket_attachment::create([
            'ticketid' => $ticketid,
            'replyid' => $lastRecord->id,
            'file_name' => $filenames,
            'filetype' => $extensions,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('support.show', $ticketid)->with('success', 'Replay added successfully');
    }



    public function add_note(Request $request, $id)
    {
        $ticketId = $id;
        $relType = 'ticket';

        Note::create([
            'rel_id' => $ticketId,
            'rel_type' => $relType,
            'description' => $request->description,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('support.show', $id)->with('success', 'Note added successfully!');
    }


    public function updateMessage(Request $request, $id)
    {
        $ticket = Ticket::find($id);

        if ($ticket) {
            $ticket->update([
                'message' => $request->message,
            ]);
            return redirect()->route('support.show', $id)->with('success', 'Message updated successfully!');
        } else {
            return redirect()->route('support.show', $id)->with('error', 'Message not found');
        }
    }


    public function updateReplayMessage(Request $request, $id)
    {
        $ticket_replay = TicketReplay::find($id);

        if ($ticket_replay) {
            $ticket_replay->update([
                'message' => $request->message,
            ]);
            return redirect()->route('support.show', $ticket_replay->ticketid)->with('success', 'Replay Message updated successfully!');
        } else {
            return redirect()->route('support.show', $ticket_replay->ticketid)->with('error', 'Replay Message not found');
        }
    }


    public function update_ticket(Request $request, $id)
    {
        $ticket = Ticket::find($id);

        $tags = '';

        if ($request->has('tags')) {
            if (is_array($request->tags)) {
                $tags = implode(', ', $request->tags);
            } else {
                $tags = $request->tags;
            }
        }

        $ticket->update([
            'subject' => $request->subject,
            'contactid' => $request->contactid,
            'departmentid' => $request->departmentid,
            'tags' => $tags,
            'assigned' => $request->assigned,
            'priorityId' => $request->priorityId,
            'serviceId' => $request->serviceId,
            'projectId' => $request->projectId,
            'updated_by' => Auth::user()->id,
        ]);

        return redirect()->route('support.index')->with('success', 'Ticket updated successfully!');
    }


    public function update_others_ticket(Request $request, $id)
    {
        $ticket = Ticket::find($id);

        $tags = '';

        if ($request->has('tags')) {
            if (is_array($request->tags)) {
                $tags = implode(', ', $request->tags);
            } else {
                $tags = $request->tags;
            }
        }

        $ticket->update([
            'subject' => $request->subject,
            'contactid' => $request->contactid,
            'departmentid' => $request->departmentid,
            'tags' => $tags,
            'assigned' => $request->assigned,
            'priorityId' => $request->priorityId,
            'serviceId' => $request->serviceId,
            'projectId' => $request->projectId,
            'updated_by' => Auth::user()->id,
        ]);

        return redirect()->route('support.index')->with('success', 'Ticket updated successfully!');
    }


    public function filter()
    {
        return view('backend.support.filter');
    }


    public function task_store_from_support(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'startdate' => 'required|date',
            'rel_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $repeat_every = $request->input('repeat_every');

        if ($repeat_every !== 'custom') {
            $time = explode('-', $repeat_every);
            $first = $time[0] ?? null;
            $second = $time[1] ?? null;
        } else {
            $first = $request->input('repeat_every_custom');
            $second = $request->input('repeat_type_custom');
        }

        try {
            $task = Task::create([
                'is_public' => $request->has('is_public') ? 1 : 0,
                'billable' => $request->has('billable') ? 1 : 0,
                'name' => $request->input('name'),
                'startdate' => $request->input('startdate'),
                'duedate' => $request->input('duedate'),
                'priority' => $request->input('priority', 2),
                'repeat_every' => $first,
                'recurring_type' => $second,
                'custom_recurring' => $repeat_every === 'custom' ? 1 : 0,
                'recurring' => !empty($repeat_every) ? 1 : 0,
                'cycles' => $request->input('cycles', 0),
                'rel_id' => $request->input('rel_id'),
                'rel_type' => $request->input('rel_type', 'ticket'),
                'milestone' => $request->input('milestone', 0),
                'hourly_rate' => $request->input('hourly_rate', 0.00),
                'description' => $request->input('description'),
            ]);

            if ($request->has('assignees')) {
                TaskAssigne::create([
                    'staffid' => implode(',', $request->input('assignees')),
                    'taskid' => $task->id,
                    'assigned_from' => Auth::id(),
                    'is_assigned_from_contact' => 1,
                ]);
            }

            if ($request->has('followers')) {
                TaskFollower::create([
                    'staffid' => implode(',', $request->input('followers')),
                    'taskid' => $task->id,
                ]);
            }

            if ($request->has('tags')) {
                TagTable::create([
                    'rel_id' => $task->id,
                    'rel_type' => 'task',
                    'tag_id' => implode(',', $request->input('tags')),
                    'created_by' => Auth::user()->id,
                ]);
            }

            if ($request->hasFile('file_name')) {
                $filenames = [];
                $extensions = [];
                foreach ($request->file('file_name') as $file) {
                    $originalName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . $originalName;
                    $file->move(public_path('upload/task'), $filename);
                    $filenames[] = $filename;
                    $extensions[] = $extension;
                }
                File::create([
                    'rel_id' => $task->id,
                    'rel_type' => 'task',
                    'file_name' => implode(', ', $filenames),
                    'filetype' => implode(', ', $extensions),
                    'created_by' => Auth::user()->id,
                    'staffid' => Auth::id(),
                ]);
            }

            return redirect()->back()->with('success', 'Task created successfully!');
        } catch (\Exception $ths) {
            return redirect()->back()->with('error', $ths->getMessage());
        }
    }


    public function task_store_from_support_replay(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'startdate' => 'required|date',
            'rel_id' => 'required|integer',
        ]);


        $repeat_every = $request->input('repeat_every');

        if ($repeat_every !== 'custom') {
            $time = explode('-', $repeat_every);
            $first = $time[0] ?? null;
            $second = $time[1] ?? null;
        } else {
            $first = $request->input('repeat_every_custom');
            $second = $request->input('repeat_type_custom');
        }

        try {
            $task = Task::create([
                'is_public' => $request->has('is_public') ? 1 : 0,
                'billable' => $request->has('billable') ? 1 : 0,
                'name' => $request->input('name'),
                'startdate' => $request->input('startdate'),
                'duedate' => $request->input('duedate'),
                'priority' => $request->input('priority', 2),
                'repeat_every' => $first,
                'recurring_type' => $second,
                'custom_recurring' => $repeat_every === 'custom' ? 1 : 0,
                'recurring' => !empty($repeat_every) ? 1 : 0,
                'cycles' => $request->input('cycles', 0),
                'rel_id' => $request->input('rel_id'),
                'rel_type' => $request->input('rel_type', 'ticket'),
                'milestone' => $request->input('milestone', 0),
                'hourly_rate' => $request->input('hourly_rate', 0.00),
                'description' => $request->input('description'),
            ]);

            if ($request->has('assignees')) {
                TaskAssigne::create([
                    'staffid' => implode(',', $request->input('assignees')),
                    'taskid' => $task->id,
                    'assigned_from' => Auth::id(),
                    'is_assigned_from_contact' => 1,
                ]);
            }

            if ($request->has('followers')) {
                TaskFollower::create([
                    'staffid' => implode(',', $request->input('followers')),
                    'taskid' => $task->id,
                ]);
            }

            if ($request->has('tags')) {
                TagTable::create([
                    'rel_id' => $task->id,
                    'rel_type' => 'task',
                    'tag_id' => implode(',', $request->input('tags')),
                    'created_by' => Auth::user()->id,
                ]);
            }

            if ($request->hasFile('file_name')) {
                $filenames = [];
                $extensions = [];
                foreach ($request->file('file_name') as $file) {
                    $originalName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . $originalName;
                    $file->move(public_path('upload/task'), $filename);
                    $filenames[] = $filename;
                    $extensions[] = $extension;
                }
                File::create([
                    'rel_id' => $task->id,
                    'rel_type' => 'task',
                    'file_name' => implode(', ', $filenames),
                    'filetype' => implode(', ', $extensions),
                    'created_by' => Auth::user()->id,
                    'staffid' => Auth::id(),
                ]);
            }

            return redirect()->back()->with('success', 'Task created successfully!');
        } catch (\Exception $ths) {
            return redirect()->back()->with('error', $ths->getMessage());
        }
    }



    public function task_edit_from_support($id, $ticketId)
    {
        $data['Priorities'] = Priority::all();
        $data['customers'] = Customer::all();
        $data['milestones'] = Milestone::all();
        $data['tags'] = Tag::all();

        $data['releatedtos'] = [
            'project'    => 'Project',
            'invoices'   => 'Invoice',
            'customer'   => 'Customer',
            'estimate'   => 'Estimate',
            'contract'   => 'Contract',
            'ticket'     => 'Ticket',
            'expense'    => 'Expense',
            'leads'      => 'Lead',
            'proposal'   => 'Proposal',
        ];

        $data['projects'] = Project::with('customer')->get();
        $data['invoices'] = Invoice::all();
        $data['estimates'] = Estimate::all();
        $data['contracts'] = Contract::all();
        $data['tickets'] = Ticket::all();
        $data['leads'] = MainLead::all();
        $data['proposals'] = Proposal::all();
        $data['users'] = User::all();
        $data['expenses'] = Expense::with('categories')->get();
        $data['tasks'] = Task::find($id);

        $assign = TaskAssigne::where('taskid', $id)->first();
        $data['assignee'] = explode(',', $assign->staffid);

        $follower = TaskFollower::where('taskid', $id)->first();
        $data['followers'] = explode(',', $follower->staffid);

        $tagtables = Tagtable::where('rel_id', $id)->where('rel_type', 'task')->first();
        $data['taggs'] = explode(',', $tagtables->tag_id);


        $data['ticketId'] = $ticketId;

        return view('backend.support.edit-task', $data);
    }


    public function task_update_from_support(Request $request, $id, $ticketId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $string = $request['repeat_every'];

        if ($string != 'custom') {

            $time = explode('-', $string);

            if (count($time) == 2) {
                $first = $time[0];
                $second = $time[1];
            } else {
                $first = null;
                $second = null;
            }
        } else {
            $first = $request['repeat_every_custom'];
            $second = $request['repeat_type_custom'];
        }

        try {
            $tasks = Task::findOrFail($id)->update([
                'is_public' => $request['is_public'] ? 1 : 0,
                'billable' => $request['billable'] ? 1 : 0,
                'visible_to_client' => $request['visible_to_client'] ? 1 : 0,
                'name' => $request['name'],
                'startdate' => $request['startdate'],
                'duedate' => $request['duedate'],
                'priority' => $request['priority'] ?? 2,
                'repeat_every' => $first,
                'recurring_type' => $second,
                'custom_recurring' =>  $request['repeat_every'] == 'custom' ? 1 : 0,
                'recurring' =>  $request['repeat_every'] ? 1 : 0,
                'cycles' => $request['cycles'] ?? 0,
                'rel_id' => $request['rel_id'],
                'rel_type' => $request['rel_type'],
                'milestone' => $request['milestone'] ?? 0,
                'hourly_rate' => $request['hourly_rate'] ?? 0.00,
                'description' => $request['description'],
                'datefinished' => $request['datefinished'],

            ]);


            $assignee = TaskAssigne::where('taskid', $id)->update([
                'staffid' => isset($request['assignees']) ? implode(',', (array) $request['assignees']) : '',
                'is_assigned_from_contact' => '1',
            ]);


            $followers = TaskFollower::where('taskid', $id)->update([
                'staffid' => isset($request['followers']) ? implode(',', (array) $request['followers']) : '',

            ]);


            $relationType = 'task';


            Tagtable::where('rel_id', $id)->where('rel_type', 'task')->update([
                'tag_id' => isset($request['tags']) ? implode(',', (array) $request['tags']) : '',
                'updated_by' => Auth::user()->id,
            ]);


            $files = $request->file('file_name');


            if ($files != null) {
                // Loop through each file
                foreach ($files as $file) {

                    // Get file name with extention
                    $originalName = $file->getClientOriginalName();

                    // Get file extension without name
                    $extension = $file->getClientOriginalExtension();

                    // Create new file name 
                    $filename = time() . '_' . $originalName;

                    // Store in project folder
                    $file->move(public_path('upload/task'), $filename);

                    $filenames[] = $filename;
                    $extensions[] = $extension;
                }

                if ($filenames) {

                    $filenames = implode(', ', $filenames);
                }

                if ($extensions) {
                    $extensions = implode(', ', $extensions);
                }
            } else {
                $filenames = null;
                $extensions = null;
            }


            File::where('rel_id', $id)->where('rel_type', 'task')->update([
                'file_name' => $filenames,
                'filetype' => $extensions,
                'updated_by' => Auth::user()->id,
            ]);


            return redirect()->route('support.show', $ticketId)->with('success', 'Task Updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('support.show', $ticketId)->with('error', $e->getMessage());
        }
    }


    public function task_delete_from_support($id, $ticketId)
    {
        try {
            $task = Task::findOrFail($id);

            $task->delete();

            return redirect()->route('support.show', $ticketId)->with('success', 'Task deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('support.show', $ticketId)->with('error', 'Task not found.');
        } catch (\Exception $e) {
            return redirect()->route('support.show', $ticketId)->with('error', 'An error occurred while deleting the task.');
        }
    }
}
