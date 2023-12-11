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
    <x-slot:title>Edit</x-slot>
    <h1>Edit Task</h1>
    <form action="{{ route('todolist.update', ['todolist' => $id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" name="taskname" class="form-control @error('taskname') is-invalid @enderror" value="{{ $taskname }}" id="taskname" autocomplete="off">
              <label for="taskname">Task Name:</label>
            </div>
            <div class="invalid-feedback">
                @error('taskname')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <textarea style="height:400px;" name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{ $description }}</textarea>
              <label for="description">Description:</label>
            </div>
            <div class="invalid-feedback">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" name="duedate" class="form-control @error('duedate') is-invalid @enderror" value="{{ $duedate }}" id="duedate" autocomplete="off">
              <label for="duedate">Due Date:</label>
            </div>
            <div class="invalid-feedback">
                @error('duedate')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <input type="submit" class="btn btn-success" value="Update">
        <a href="{{ route('todolist.index') }}" class="btn btn-danger" role="button">Cancel</a>
    </form>
</x-layout>