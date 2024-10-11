<?php

namespace App\Http\Controllers\Backend\Projects;

use App\Models\Tag;
use App\Models\User;
use App\Models\Project;
use App\Models\Customer;
use App\Models\Tagtable;
use Illuminate\Http\Request;
use App\Models\ProjectMember;
use App\Models\ProjectSettings;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ProjectFile;
use Illuminate\Support\Facades\Auth;
use App\Models\ProjectSettingsVissiabletab;

class MainProjectController extends Controller
{

    public function index()
    {
        return view('backend.project.index');
    }


    public function create()
    {
        $data['customers'] = Customer::all();
        $data['billing_types'] = [
            '1' => 'Fixed Rate',
            '2' => 'Project Hours',
            '3' => 'Task Hours',
        ];
        $data['statuses'] = [
            '1' => 'Not Started',
            '2' => 'In Progress',
            '3' => 'On Hold',
            '5' => 'Cancelled',
            '4' => 'Finished',
        ];
        $data['users'] = User::all();
        $data['tags'] = Tag::all();
        $data['projectvissiabletabs'] = ProjectSettingsVissiabletab::all();



        return view('backend.project.create', $data);
    }

    public function customercontactshow(Request $request)
    {
        $contacts = Contact::where('customer_id', $request->customerid)->get();

        $selectedContacts = Project::where('id', $request->projectId)->pluck('notify_contacts')->first();
        $selectedContactsArray = explode(',', $selectedContacts);

        return response()->json([
            'data' => $contacts,
            'selectedContacts' => $selectedContactsArray,
        ]);
    }


    public function store(Request $request)
    {


        $request->validate(
            [
                'name' => 'required|string|max:255',
                'customer_id' => 'required',
                'billing_type' => 'required',
                'contact_notification' => 'required',
                'notify_contacts' => 'required_if:contact_notification,2',
            ],
            [
                'notify_contacts.required_if' => 'The notify contacts field is required',
            ]
        );

        try {
            $projects = Project::create([
                'name' => $request['name'],
                'customer_id' => $request['customer_id'],
                'progress_from_tasks' => $request['progress_from_tasks'] ? 1 : 0,
                'progress' => $request['progress'] ?? 0,
                'billing_type' =>  $request['billing_type'],
                'status' =>  $request['status'],
                'project_cost' =>  $request['project_cost'],
                'project_rate_per_hour' => $request['rate_per_hour'],
                'estimated_hours' => $request['estimated_hours'],
                'start_date' => $request['start_date'],
                'deadline' => $request['deadline'],
                'description' => $request['description'],
                'contact_notification' => $request['contact_notification'],
                'notify_contacts' => implode(',', (array) $request['notify_contacts']),
                'created_by' => Auth::user()->id,

            ]);

            Tagtable::create([
                'rel_id' => $projects->id,
                'rel_type' => 'project',
                'tag_id' => isset($request['tags']) ? implode(',', (array) $request['tags']) : '',
                'created_by' => Auth::user()->id,
            ]);
            $members = ProjectMember::create([
                'staff_id' => implode(',', (array) $request['project_members']),
                'project_id' => $projects->id,
            ]);
            try {
                $projectsettings = $request->except('_token', '_method', 'name', 'customer_id', 'progress', 'billing_type', 'status', 'rate_per_hour', 'estimated_hours', 'project_members', 'start_date', 'deadline', 'tags', 'description', 'progress_from_tasks', 'contact_notification', 'send_created_email', 'notify_contacts');
                foreach ($projectsettings as $key => $projectsetting) {
                    if (is_array($projectsetting)) {
                        $projectsetting = implode(',', $projectsetting);
                    }

                    ProjectSettings::create([
                        'project_id' => $projects->id,
                        'name' => $key,
                        'value' => $projectsetting
                    ]);
                }
            } catch (\Throwable $th) {

                return redirect()->back()->with('error', $th->getMessage());
            }
            return redirect()->route('projects.inedx')->with('success', 'Project Created successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('projects.inedx')->with('error', $th->getMessage());
        }
    }

    public function show($id)
    {
        $data['projects'] = Project::with('tagables', 'customer')->where('id', $id)->first();
        return view('backend.project.show', $data);
    }

    public function edit($id)
    {

        $data['customers'] = Customer::all();
        $data['billing_types'] = [
            '1' => 'Fixed Rate',
            '2' => 'Project Hours',
            '3' => 'Task Hours',
        ];
        $data['statuses'] = [
            '1' => 'Not Started',
            '2' => 'In Progress',
            '3' => 'On Hold',
            '5' => 'Cancelled',
            '4' => 'Finished',
        ];
        $data['users'] = User::all();
        $data['tags'] = Tag::all();
        $data['projectvissiabletabs'] = ProjectSettingsVissiabletab::all();
        $data['projects'] = Project::find($id);

        $members = ProjectMember::where('project_id', $id)->first();
        $data['projectmembers'] = $members ? explode(',', $members->staff_id) : [];

        $tagtables = Tagtable::where('rel_id', $id)->where('rel_type', 'project')->first();
        $data['taggs'] = explode(',', $tagtables->tag_id);

        // project settings
        $data['available_features'] = ProjectSettings::where('project_id', $id)->where('name', 'available_features')->first() ?? null;
        $data['view_tasks'] = ProjectSettings::where('project_id', $id)->where('name', 'view_tasks')->first() ?? null;
        $data['create_tasks'] = ProjectSettings::where('project_id', $id)->where('name', 'create_tasks')->first() ?? null;
        $data['edit_tasks'] = ProjectSettings::where('project_id', $id)->where('name', 'edit_tasks')->first() ?? null;
        $data['comment_on_tasks'] = ProjectSettings::where('project_id', $id)->where('name', 'comment_on_tasks')->first() ?? null;
        $data['view_task_comments'] = ProjectSettings::where('project_id', $id)->where('name', 'view_task_comments')->first() ?? null;
        $data['view_task_attachments'] = ProjectSettings::where('project_id', $id)->where('name', 'view_task_attachments')->first() ?? null;
        $data['view_task_checklist_items'] = ProjectSettings::where('project_id', $id)->where('name', 'view_task_checklist_items')->first() ?? null;
        $data['upload_on_tasks'] = ProjectSettings::where('project_id', $id)->where('name', 'upload_on_tasks')->first() ?? null;
        $data['view_task_total_logged_time'] = ProjectSettings::where('project_id', $id)->where('name', 'view_task_total_logged_time')->first() ?? null;
        $data['view_finance_overview'] = ProjectSettings::where('project_id', $id)->where('name', 'view_finance_overview')->first() ?? null;
        $data['upload_files'] = ProjectSettings::where('project_id', $id)->where('name', 'upload_files')->first() ?? null;
        $data['open_discussions'] = ProjectSettings::where('project_id', $id)->where('name', 'open_discussions')->first() ?? null;
        $data['view_milestones'] = ProjectSettings::where('project_id', $id)->where('name', 'view_milestones')->first() ?? null;
        $data['view_gantt'] = ProjectSettings::where('project_id', $id)->where('name', 'view_gantt')->first() ?? null;
        $data['view_timesheets'] = ProjectSettings::where('project_id', $id)->where('name', 'view_timesheets')->first() ?? null;
        $data['view_activity_log'] = ProjectSettings::where('project_id', $id)->where('name', 'view_activity_log')->first() ?? null;
        $data['view_team_members'] = ProjectSettings::where('project_id', $id)->where('name', 'view_team_members')->first() ?? null;
        $data['hide_tasks_on_main_tasks_table'] = ProjectSettings::where('project_id', $id)->where('name', 'hide_tasks_on_main_tasks_table')->first() ?? null;

        return view('backend.project.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'customer_id' => 'required',
                'billing_type' => 'required',
                'contact_notification' => 'required',
                'notify_contacts' => 'required_if:contact_notification,2',
            ],
            [
                'notify_contacts.required_if' => 'The notify contacts field is required',
            ]
        );
        try {
            if ($request['contact_notification'] == 2) {
                $notifyContacts = implode(',', (array) $request['notify_contacts']);
            } else {
                $notifyContacts = null;
            }
            $projects = Project::find($id)->update([
                'name' => $request['name'],
                'customer_id' => $request['customer_id'],
                'progress_from_tasks' => $request['progress_from_tasks'] ? 1 : 0,
                'progress' => $request['progress'] ?? 0,
                'billing_type' =>  $request['billing_type'],
                'status' =>  $request['status'],
                'project_cost' =>  $request['project_cost'],
                'project_rate_per_hour' => $request['rate_per_hour'],
                'estimated_hours' => $request['estimated_hours'],
                'start_date' => $request['start_date'],
                'deadline' => $request['deadline'],
                'description' => $request['description'],
                'contact_notification' => $request['contact_notification'],
                'notify_contacts' => $notifyContacts,
                'updated_by' => Auth::user()->id,

            ]);

            Tagtable::where('rel_id', $id)->where('rel_type', 'rel_type')->update([
                'tag_id' => isset($request['tags']) ? implode(',', (array) $request['tags']) : '',
                'updated_by' => Auth::user()->id,
            ]);
            $members = ProjectMember::where('project_id', $id)->update([
                'staff_id' => implode(',', (array) $request['project_members']),
            ]);
            try {
                $projectsettings = $request->except('_token', '_method', 'name', 'customer_id', 'progress', 'billing_type', 'status', 'rate_per_hour', 'estimated_hours', 'project_members', 'start_date', 'deadline', 'tags', 'description', 'progress_from_tasks', 'contact_notification', 'send_created_email', 'notify_contacts');
                // dd($projectsettings);
                $deleteold = ProjectSettings::where('project_id', $id)->delete();
                foreach ($projectsettings as $key => $projectsetting) {
                    if (is_array($projectsetting)) {
                        $projectsetting = implode(',', $projectsetting);
                    }

                    ProjectSettings::updateOrCreate(
                        [
                            'project_id' => $id,
                            'name' => $key
                        ],
                        [
                            'value' => $projectsetting
                        ]
                    );
                }
            } catch (\Throwable $th) {

                return redirect()->back()->with('error', $th->getMessage());
            }
            return redirect()->route('projects.inedx')->with('success', 'Project Updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('projects.inedx')->with('error', $th->getMessage());
        }
    }
    public function filter()
    {
        return view('backend.project.filter');
    }
    public function project_task($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.task.project_task_index', $data);
    }

    public function project_timesheets($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.timesheets.project_timesheets', $data);
    }

    public function project_milestones($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.milestone.project_milestones', $data);
    }

    public function project_files($id)
    {
        $data['projectfiles'] = ProjectFile::where('project_id', $id)->get();
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.File.project_files', $data);
    }

    public function project_files_store(Request $request)
    {
        $files = $request->file('project_file');

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
                $file->move(public_path('upload/project'), $filename);

                $filenames[] = $filename;
                $extensions[] = $extension;
                $originalNames[] = $originalName;
            }

            if ($filenames) {

                $filenames = implode(', ', $filenames);
            }

            if ($extensions) {
                $extensions = implode(', ', $extensions);
            }
            if ($originalNames) {
                $originalNames = implode(', ', $originalNames);
            }
        } else {
            $filenames = null;
            $extensions = null;
            $originalNames = null;
        }
        if ($request->file('project_file')) {
            ProjectFile::create([
                'project_id' => $request->project_id,
                'file_name' => $filenames,
                'original_file_name' => $originalNames,
                'filetype' => $extensions,
                'visible_to_customer' => $request->visible_to_customer,
                'created_by' => Auth::user()->id,
            ]);
            return redirect()->back()->with('success', 'File Upload successfully');
        } else {
            return redirect()->back()->with('error', 'File dosen,t Uploaded');
        }
    }


    public function project_discussions($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.discussion.project_discussions', $data);
    }

    public function project_gantt($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.gantt.project_gantt', $data);
    }

    public function project_tickets($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.tickets.project_tickets', $data);
    }

    public function project_contracts($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.contracts.project_contracts', $data);
    }

    public function project_proposals($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.proposals.project_proposals', $data);
    }

    public function project_estimates($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.estimate.project_estimates', $data);
    }

    public function project_invoices($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.invoices.project_invoices', $data);
    }

    public function project_subscriptions($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.subscriptions.project_subscriptions', $data);
    }

    public function project_expenses($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.expenses.project_expenses', $data);
    }

    public function project_credit_notes($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.creditnote.project_credit_notes', $data);
    }

    public function project_notes($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.notes.project_notes', $data);
    }

    public function project_activity($id)
    {
        $data['projects'] = Project::where('id', $id)->first();
        return view('backend.project.activity.project_activity', $data);
    }
}
