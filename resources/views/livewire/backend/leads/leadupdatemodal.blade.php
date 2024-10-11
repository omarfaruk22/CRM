   <!-- Update new lead Modal -->

   <div class="modal fade" id="editLeadModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel"
       aria-hidden="true" wire:ignore.self>
       <div class="modal-dialog modal-dialog-centered modal-lg" style="min-width: 70%!important;">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Update previous lead of:
                       <span class="text-secondary">{{ $company }}</span>
                   </h5>
                   <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal"
                       aria-label="Close"></button>
               </div>
               <div class="modal-body">

                   {{-- <form wire:submit.prevent="updateLead"> --}}

                   <div class="row">
                       <div class="col">

                           <div class="">
                               <div class="card-body">
                                   <ul class="nav nav-pills mb-3" role="tablist">
                                       <li class="nav-item" role="presentation">
                                           <a class="nav-link active" data-bs-toggle="pill" href="#profile"
                                               role="tab" aria-selected="true">
                                               <div class="d-flex align-items-center">
                                                   <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                                   </div>
                                                   <div class="tab-title">Profile</div>
                                               </div>
                                           </a>
                                       </li>
                                       <li class="nav-item" role="presentation">
                                           <a class="nav-link" data-bs-toggle="pill" href="#proposal" role="tab"
                                               aria-selected="false">
                                               <div class="d-flex align-items-center">
                                                   <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                                   </div>
                                                   <div class="tab-title">Proposals</div>
                                               </div>
                                           </a>
                                       </li>
                                       <li class="nav-item" role="presentation">
                                           <a class="nav-link" data-bs-toggle="pill" href="#task" role="tab"
                                               aria-selected="false">
                                               <div class="d-flex align-items-center">
                                                   <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                                   </div>
                                                   <div class="tab-title">Tasks </div>
                                               </div>
                                           </a>
                                       </li>

                                       <li class="nav-item" role="presentation">
                                           <a class="nav-link" data-bs-toggle="pill" href="#attachments" role="tab"
                                               aria-selected="false">
                                               <div class="d-flex align-items-center">
                                                   <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                                   </div>
                                                   <div class="tab-title">Attachments </div>
                                               </div>
                                           </a>
                                       </li>

                                       <li class="nav-item" role="presentation">
                                           <a class="nav-link" data-bs-toggle="pill" href="#reminder" role="tab"
                                               aria-selected="false">
                                               <div class="d-flex align-items-center">
                                                   <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                                   </div>
                                                   <div class="tab-title">Reminders </div>
                                               </div>
                                           </a>
                                       </li>
                                       <li class="nav-item" role="presentation">
                                           <a class="nav-link" data-bs-toggle="pill" href="#notes" role="tab"
                                               aria-selected="false">
                                               <div class="d-flex align-items-center">
                                                   <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                                   </div>
                                                   <div class="tab-title">Notes </div>
                                               </div>
                                           </a>
                                       </li>
                                       <li class="nav-item" role="presentation">
                                           <a class="nav-link" data-bs-toggle="pill" href="#activity_log" role="tab"
                                               aria-selected="false">
                                               <div class="d-flex align-items-center">
                                                   <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                                   </div>
                                                   <div class="tab-title">Activity Log </div>
                                               </div>
                                           </a>
                                       </li>
                                   </ul>
                                   <div class="tab-content" id="pills-tabContent">
                                       <div class="tab-pane fade show active" id="profile" role="tabpanel">

                                           @include('livewire.backend.leads.profileCustomerUpdate')
                                       </div>
                                       <div class="tab-pane fade" id="proposal" role="tabpanel">
                                           @include('livewire.backend.leads.proposalmodal')
                                       </div>
                                       <div class="tab-pane fade" id="task" role="tabpanel">

                                           @include('livewire.backend.leads.taskmodal')
                                       </div>

                                       <div class="tab-pane fade" id="attachments" role="tabpanel">
                                           @include('livewire.backend.leads.attachmentmodal')
                                       </div>

                                       <div class="tab-pane fade" id="reminder" role="tabpanel">
                                           @include('livewire.backend.leads.remindermodal')
                                       </div>

                                       <div class="tab-pane fade" id="notes" role="tabpanel">
                                           @include('livewire.backend.leads.notemodal')
                                       </div>

                                       <div class="tab-pane fade" id="activity_log" role="tabpanel">
                                           @include('livewire.backend.leads.activitymodal')
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

               </div>
           </div>
       </div>
   </div>


   <!-- Update Lead Status Modal -->
   <!-- Update Lead Status Modal -->
   <div class="modal fade" id="updateLeadStatusModal" tabindex="-1" aria-labelledby="updateLeadStatusLabel"
       aria-hidden="true" wire:ignore.self>
       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="updateLeadStatusLabel">Update Lead Status</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <form wire:submit.prevent="updateLeadStatus">
                       <div class="mb-3">
                           <label for="status" class="form-label">Select Status</label>
                           <select class="form-control" id="status" wire:model="selectedStatus">
                               <option value="" disabled selected> -- Select Status -- </option>
                               @foreach ($statuses as $status)
                                   <option value="{{ $status->id }}" {{ $id == $status->id ? 'selected' : '' }}>
                                       {{ $status->name }}
                                   </option>
                               @endforeach
                           </select>
                       </div>

                       <div class="text-end mt-3">
                           <button type="button" class="btn btn-secondary me-2"
                               data-bs-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Update</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
