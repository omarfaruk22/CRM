<?php

namespace App\Http\Controllers\Backend\Tasks;

use DateTime;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
use App\Models\Staff;
use App\Models\Ticket;
use App\Models\Expense;
use App\Models\Invoice;
use App\Models\Project;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Estimate;
use App\Models\MainLead;
use App\Models\Priority;
use App\Models\Proposal;
use App\Models\Reminder;
use App\Models\Tagtable;
use App\Models\Milestone;
use App\Models\Taskstimer;
use App\Models\TaskAssigne;
use App\Models\TaskFollower;
use Illuminate\Http\Request;
use App\Models\TaskAttechment;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\TaskChecklistItem;
use App\Models\TaskComment;
use Illuminate\Support\Facades\Auth;

class MainTaskController extends Controller
{
    public function index()
    {

        return view('backend.task.index');
    }


    public function create($id = '', $rel_type = '')
    {


        $data['priorities'] = Priority::all();
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

        $data['releted_to'] = [
            'id' => $id,
            'rel_type' => $rel_type,
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

        return view('backend.task.create', $data);
    }


    public function createTag(Request $request)
    {
        $validatedData = $request->validate([
            'tags' => 'required|unique:tags,tags',
        ]);
        $tag = new Tag();
        $tag->tags = $validatedData['tags'];
        $tag->save();
        return response()->json(['success' => 'Tag created successfully']);
    }

    public function store(Request $request)
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
            $tasks = Task::create([
                'is_public' => $request['is_public'] ? 1 : 0,
                'billable' => $request['billable'] ? 1 : 0,
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

            ]);

            $assignee = TaskAssigne::create([
                'staffid' => isset($request['assignees']) ? implode(',', (array) $request['assignees']) : '',
                'taskid' => isset($tasks) ? $tasks->id : '',
                'assigned_from' => Auth::user()->id,
                'is_assigned_from_contact' => '1',
            ]);

            $followers = TaskFollower::create([
                'staffid' => isset($request['followers']) ? implode(',', (array) $request['followers']) : '',
                'taskid' => isset($tasks) ? $tasks->id : '',
            ]);

            $relationType = 'task';

            Tagtable::create([
                'rel_id' => $tasks->id,
                'rel_type' => $relationType,
                'tag_id' => isset($request['tags']) ? implode(',', (array) $request['tags']) : '',
                'created_by' => Auth::user()->id,
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
            File::create([
                'rel_id' => isset($tasks) ? $tasks->id : '',
                'rel_type' => 'task',
                'file_name' => $filenames,
                'filetype' => $extensions,
                'created_by' => Auth::user()->id,
                'staffid' => Auth::user()->id,
            ]);



            return redirect()->route('tasks.inedx')->with('success', 'Task Created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('tasks.inedx')->with('error', $e->getMessage());
        }
    }


    public function edit($id)
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
        return view('backend.task.edit', $data);
    }

    public function update(Request $request, $id)
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



            return redirect()->route('tasks.inedx')->with('success', 'Task Updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('tasks.inedx')->with('error', $e->getMessage());
        }
    }

    public function overview()
    {
        $data['tasks'] = Task::all();
        return view('backend.task.overview', $data);
    }


    public function taskview($id)
    {
        $tags = Tag::all();
        $staffs = User::all();
        $reminders = Reminder::where('rel_id', $id)->where('rel_type', 'task')->with('users')->get();
        $tasks = Task::with('projects', 'invoices', 'customers', 'estimates', 'contracts', 'expences', 'leads', 'tickets', 'proposals')->where('id', $id)->first() ?? '';


        $tagtable = Tagtable::where('rel_id', $id)->where('rel_type', 'task')->first();
        $taggs = explode(',', $tagtable->tag_id);

        $assign = TaskAssigne::where('taskid', $id)->first();
        $assignee = explode(',', $assign->staffid);
        $assignees = User::whereIn('id', $assignee)->get();

        $follow = TaskFollower::where('taskid', $id)->first();
        $follower = explode(',', $follow->staffid);
        $followers = User::whereIn('id', $follower)->get();

        $tasktimers = Taskstimer::where('task_id', $id)->with('timerstaff')->get();
        $tasktimes = Taskstimer::where('task_id', $id)->whereNull('end_time')->first();

        $files = File::where('rel_id', $id)->where('rel_type', 'task')->get();

        $commentss = TaskComment::where('taskid', $id)->get();
        // $files = File::all();
        // dd($commentss);
        return view('backend.task.taskview', compact('tasks', 'tags', 'tagtable', 'taggs', 'staffs', 'reminders', 'assignee', 'assignees', 'follower', 'followers', 'tasktimers', 'tasktimes', 'files', 'commentss'));
    }




    public function status_update(Request $request)
    {
        $status = $request->input('status');
        $taskId = $request->input('task_id');

        $task = Task::find($taskId);
        if (!$task) {
            return response()->json(['success' => false, 'error' => 'Task not found']);
        }
        if (!$status == 4) {
            $finished = null;
        } else {
            $finished = date("Y-m-d H:i:s");
        }

        $task->status = $status;
        $task->datefinished = $finished;
        $task->save();

        return response()->json(['success' => true, 'status' => $status]);
    }


    public function priority_update(Request $request)
    {
        $priority = $request->input('priority');
        $taskId = $request->input('task_id');

        $task = Task::find($taskId);
        if (!$task) {
            return response()->json(['success' => false, 'error' => 'Task not found']);
        }

        $task->priority = $priority;
        $task->save();

        return response()->json(['success' => true, 'priority' => $priority]);
    }


    public function update_ispublic(Request $request)
    {
        $taskId = $request->input('task_id');
        $tasks = Task::find($taskId);
        if ($tasks) {
            $tasks->is_public = 1;
            $tasks->save();

            return response()->json(['is_public' => 'success']);
        }

        return response()->json(['is_public' => 'error', 'message' => 'Task not found']);
    }
    public function updatetickstatus(Request $request)
    {
        $taskId = $request->input('task_id');
        $tasks = Task::find($taskId);
        if ($tasks) {
            $tasks->status = $request->status;
            $tasks->save();

            return response()->json(['status' => 'success']);
        }

        return response()->json(['is_public' => 'error', 'message' => 'ststus not found']);
    }

    public function updateStartDate(Request $request)
    {
        $taskId = $request->input('task_id');
        $tasksttime = Task::find($taskId);
        if ($tasksttime) {
            $tasksttime->startdate = $request->input('date');
            $tasksttime->save();
        }

        return response()->json(['success' => 'Date submitted successfully.']);
    }
    public function updateDueDate(Request $request)
    {
        $taskId = $request->input('task_id');
        $taskDutime = Task::find($taskId);
        if ($taskDutime) {
            $taskDutime->duedate = $request->input('date');
            $taskDutime->save();
        }

        return response()->json(['success' => 'Date submitted successfully.']);
    }

    public function updatetaggs(Request $request)
    {
        $taskId = $request->input('task_id');
        $taggs = Tagtable::where('rel_id', $taskId)->where('rel_type', 'task')->first();
        if ($taggs) {
            $taggs->tag_id = implode(',', (array) $request->input('tag'));
            $taggs->save();
        }

        return response()->json(['success' => 'Tag submitted successfully.']);
    }

    public function reminderStore(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'staff' => 'required',
            'description' => 'required',
        ]);
        Reminder::create([
            'date' => $request->date,
            'staff' => $request->staff,
            'description' => $request->description,
            'rel_id' => $request->rel_id,
            'rel_type' => 'task',
            'notify_by_email' => $request->notify_by_email,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back()->with('success', 'Reminder Created successfully!');
    }
    public function reminderUpdate(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'staff' => 'required',
            'description' => 'required',
        ]);
        Reminder::find($id)->update([
            'date' => $request->date,
            'staff' => $request->staff,
            'description' => $request->description,
            'notify_by_email' => $request->notify_by_email,
            'updated_by' => Auth::user()->id,
        ]);
        return redirect()->back()->with('success', 'Reminder Updated successfully!');
    }
    public function reminderdelete($id)
    {
        $delete = Reminder::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'Reminder Delete successfully!');
    }

    public function updateassignee(Request $request)
    {
        $taskId = $request->input('task_id');
        $assignee = TaskAssigne::where('taskid', $taskId)->first();
        if ($assignee) {
            $assignee->staffid = implode(',', (array) $request->input('staff_id'));
            $assignee->save();
        }

        return response()->json(['success' => 'Staff submitted successfully.']);
    }
    public function updatefollowers(Request $request)
    {
        $taskId = $request->input('task_id');
        $follower = TaskFollower::where('taskid', $taskId)->first();
        if ($follower) {
            $follower->staffid = implode(',', (array) $request->input('staff_id'));
            $follower->save();
        }

        return response()->json(['success' => 'follower submitted successfully.']);
    }
    public function tasktimerstore(Request $request)
    {
        $request->validate(
            [
                'start_time' => 'required',
                'end_time' => 'required|date|after:start_time',
            ],
            [
                'end_time.after' => 'The end time must be greater than the start time.'
            ]
        );
        $staffs = $request->staff_id;
        $hourly_rate = Staff::where('id', $staffs)->first();


        Taskstimer::create([
            'task_id' => $request->task_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'staff_id' => $request->staff_id,
            'note' => $request->note,
            'hourly_rate' =>  $hourly_rate->hourly_rate,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back()->with('success', 'Timer Created successfully!');
    }
    public function tasktimerUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'start_time' => 'required',
                'end_time' => 'required|date|after:start_time',
            ],
            [
                'end_time.after' => 'The end time must be greater than the start time.'
            ]
        );
        $staffs = $request->staff_id;
        $hourly_rate = Staff::where('id', $staffs)->first();


        Taskstimer::find($id)->update([
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'staff_id' => $request->staff_id,
            'note' => $request->note,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back()->with('success', 'Timer Updated successfully!');
    }
    public function tasktimerdelete($id)
    {
        $delete = Taskstimer::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'Timer Delete successfully!');
    }
    public function tasktimerstorebtn(Request $request)
    {
        $taskId = $request->input('task_id');
        $tasktimer = Taskstimer::whereNull('end_time')->first();
        if (!$tasktimer) {
            $tasktimer = new Taskstimer();
            $tasktimer->task_id = $taskId;
            $tasktimer->staff_id = Auth::user()->id;
            $tasktimer->start_time = Carbon::now();
            $tasktimer->created_by = Auth::user()->name;
            $tasktimer->save();
        }

        return response()->json(['success' => 'Timer submitted successfully.']);
    }
    public function tasktimerstopbtn(Request $request)
    {
        $timerId = $request->input('timer_id');
        $tasktimer = Taskstimer::find($timerId);
        if ($tasktimer) {
            $tasktimer->end_time = Carbon::now();
            $tasktimer->save();
        }
        $taskId = $request->input('task_id');
        $tasktimer = Taskstimer::whereNull('end_time')->first();
        if ($tasktimer) {
            $tasktimer = Taskstimer::find($tasktimer->id);
            $tasktimer->end_time = Carbon::now();
            $tasktimer->note = $request->input('timer_note');
            $tasktimer->save();
        }

        return response()->json(['success' => 'Timer stopped successfully.']);
    }
    public function checklistsstore(Request $request)
    {
        $check = new TaskChecklistItem();
        $check->taskid = $request->input('task_id');
        $check->description = $request->input('input_value');
        $check->save();
        return response()->json(['success' => 'check item successfully.']);
    }
    public function checklistshow(Request $request)
    {
        $checkshow = TaskChecklistItem::where('taskid', $request->task_id)->get();

        return response()->json(['success' => $checkshow]);
    }
    public function filedelete($id)
    {

        $filedelete = File::where('id', $id)->where('rel_type', 'task')->delete();

        return redirect()->back()->with('success', 'Comment Deleted');
    }


    public function commentstore(Request $request)
    {

        $request->validate([
            'content' => 'required',

        ]);
        $files = $request->file('file_names');
        if ($files) {

            if (!empty($files)) {
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
            $commentfile =  File::create([
                'rel_id' => $request->taskid,
                'rel_type' => 'task',
                'file_name' => $filenames,
                'filetype' => $extensions,
                'created_by' => Auth::user()->id,
                'staffid' => Auth::user()->id,
                // 'comment_id' => $comments->id,

            ]);
        }
        $comments = TaskComment::create([
            'content' => $request->content,
            'taskid' => $request->taskid,
            'staffid' => Auth::user()->id,
            'file_id' => $commentfile->id ?? null,
            'created_by' => Auth::user()->id,

        ]);


        return redirect()->back()->with('success', 'Comment successfully!');
    }
    public function commentupdate(Request $request, $id)
    {
        $comments = TaskComment::find($id)->update([
            'content' => $request->content,
            'updated_by' => Auth::user()->id,

        ]);
        return redirect()->back()->with('success', 'Comment Updated!');
    }
    public function commentdelete($id)
    {
        $commentdelete = TaskComment::find($id);
        $commentfiledelete = File::where('id', $commentdelete->file_id)->delete();
        $commentdelete->delete();
        return redirect()->back()->with('success', 'Comment Deleted');
    }
}
