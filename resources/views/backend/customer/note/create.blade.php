
<form action="{{ route('customers.profile.notes.store')}}" method="POST">
    @csrf
    <div class="collapse" id="addNote">
        <div class="mb-3">
            <label for="ticket_description" class="form-label">Note Description</label>
            <textarea name="ticket_description" class="form-control" id="input11" placeholder="Note Description." rows="4"></textarea>
        </div>
        <div class="mb-3 text-end">
            <button class="btn btn-primary">Save</button>
        </div>
    </div>
</form>



