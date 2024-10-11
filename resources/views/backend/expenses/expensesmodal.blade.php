
<!-- Bulk Modal -->
<div class="modal fade" id="expensebulkActionsModal" tabindex="-1" aria-labelledby="expensebulkActionsModalLabel" aria-hidden="true">
    <style>
        .modal-dialog {
          min-width: 50% !important;  /* Change this to your desired width */
        }
    </style>
    <div class="modal-dialog " >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="expensebulkActionsModalLabel">Bulk Actions</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Checkbox -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="massDelete">
            <label class="form-check-label " for="massDelete">
              Mass Delete
            </label>
          </div>
          <!-- Amount input field -->
          <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount">
          </div>
          <!-- Expense Category select -->
          <div class="mb-3">
            <label for="expenseCategory" class="form-label">Expense Category</label>
            <select class="form-select" id="expenseCategory">
              <option selected>Choose...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>
          <!-- Expense Date input -->
          <div class="mb-3">
            <label for="expenseDate" class="form-label">Expense Date</label>
            <input type="date" class="form-control" id="expenseDate">
          </div>
          <!-- Payment Mode select -->
          <div class="mb-3">
            <label for="paymentMode" class="form-label">Payment Mode</label>
            <select class="form-select" id="paymentMode">
              <option selected>Choose...</option>
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
              <option value="3">Option 3</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  {{-- Add new task Modal --}}
  <div class="modal fade" id="newTaskModal" tabindex="-1" aria-labelledby="newTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newTaskModalLabel">Add new task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3 row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="publicCheck">
                                <label class="form-check-label" for="publicCheck">Public</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="billiableCheck">
                                <label class="form-check-label" for="billiableCheck">Billiable</label>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end align-items-center">
                            <a href="#">Attach file</a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="subjectInput" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subjectInput">
                    </div>
                    <div class="mb-3">
                        <label for="hourlyRateInput" class="form-label">Hourly Rate</label>
                        <input type="number" class="form-control" id="hourlyRateInput">
                    </div>
                    <div class="mb-3">
                        <label for="startDateInput" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDateInput">
                    </div>
                    <div class="mb-3">
                        <label for="dueDateInput" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="dueDateInput">
                    </div>
                    <div class="mb-3">
                        <label for="prioritySelect" class="form-label">Priority</label>
                        <select class="form-select" id="prioritySelect">
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="repeatSelect" class="form-label">Repeat Every</label>
                        <select class="form-select" id="repeatSelect">
                            <option value="1">1 month</option>
                            <option value="2">2 months</option>
                            <option value="3">3 months</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="relatedToSelect" class="form-label">Related To</label>
                        <select class="form-select" id="relatedToSelect">
                            <option value="expense">Expense</option>
                            <option value="due">Due</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="assigneesSelect" class="form-label">Assignees</label>
                        <select class="form-select" id="assigneesSelect">
                            <option value="abir">Abir</option>
                            <option value="sumon">Sumon</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="followersSelect" class="form-label">Followers</label>
                        <select class="form-select" id="followersSelect">
                            <option value="youtube">YouTube</option>
                            <option value="facebook">Facebook</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tagsSelect" class="form-label">Tags</label>
                        <select multiple class="form-select" id="tagsSelect">
                            <option value="you">You</option>
                            <option value="me">Me</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="taskDescriptionTextarea" class="form-label">Task Description</label>
                        <textarea class="form-control" id="taskDescriptionTextarea" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Task</button>
            </div>
        </div>
    </div>
  </div>

{{--
  reminder modal --}}

   <!-- The Modal -->
   <div class="modal fade" id="reminderModal" tabindex="-1" aria-labelledby="reminderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reminderModalLabel">This option allows you to never forget anything about your customers. Set Expense Reminder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="dateToBeNotified" class="form-label">Date to be notified</label>
                        <input type="date" class="form-control" id="dateToBeNotified">
                    </div>
                    <div class="mb-3">
                        <label for="timeToBeNotified" class="form-label">Time to be notified</label>
                        <input type="time" class="form-control" id="timeToBeNotified">
                    </div>
                    <div class="mb-3">
                        <label for="setReminderTo" class="form-label">Set reminder to</label>
                        <select class="form-select" id="setReminderTo">
                            <option value="abir">Abir</option>
                            <option value="sumon">Sumon</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descriptionTextarea" class="form-label">Description</label>
                        <textarea class="form-control" id="descriptionTextarea" rows="3"></textarea>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sendEmailCheck">
                        <label class="form-check-label" for="sendEmailCheck">
                            Send also an email for this reminder
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Reminder</button>
            </div>
        </div>
    </div>
</div>
