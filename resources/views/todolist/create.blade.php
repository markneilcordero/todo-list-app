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
    <h1>Create New Task</h1>
    <form action="{{ route('todolist.store') }}" method="POST">
        @csrf
        <x-forms.input type="text" name="taskname" id="taskname" label-title="taskname" label-value="Task Name:" error-value="taskname"/>
        <x-forms.textarea name="description" id="description" label-title="description" label-value="Description:" error-value="description"/>
        <input type="hidden" name="status" value="incomplete">
        <x-forms.input type="text" name="duedate" id="duedate" label-title="duedate" label-value="Due Date:" error-value="duedate"/>
        <input type="submit" class="btn btn-success" value="Save">
        <a href="{{ route('todolist.index') }}" class="btn btn-danger" role="button">Cancel</a>
    </form>
</x-layout>