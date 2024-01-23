@push('scripts')
<script>
$(document).ready(function() {
    $(function() {
        $('#duedate').datepicker();
    });
});
</script>
@endpush
<x-layout>
    <x-slot:title>Create</x-slot>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 py-3">
            <div class="card">
                <h5 class="card-header">Create New Task</h5>
                <div class="card-body">
                    <form action="{{ route('todolist.store') }}" method="POST">
                        @csrf
                        <x-forms.input type="text" name="taskname" id="taskname" label-title="taskname" label-value="Task Name:" error-value="taskname"/>
                        <x-forms.textarea name="description" id="description" label-title="description" label-value="Description:" error-value="description"/>
                        <input type="hidden" name="status" value="incomplete">
                        <x-forms.input type="text" name="duedate" id="duedate" label-title="duedate" label-value="Due Date:" error-value="duedate"/>
                        <input type="submit" class="btn btn-success" value="Save">
                        <a href="{{ route('todolist.index') }}" class="btn btn-danger" role="button">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
