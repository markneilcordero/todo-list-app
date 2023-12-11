@push('scripts')
<script>
</script>
@endpush
<x-layout>
    <x-slot:title>Index</x-slot>
    <h1>My Todo List</h1>
    <div class="">
        <ul class="list-group list-group-horizontal mb-3">
            @foreach($data as $task)
            <li class="list-group-item">{{ $task->taskname }}</li>
            <li class="list-group-item"><a href="{{ route('todolist.show', ['todolist' => $task->id]) }}" class="btn btn-primary" role="button">View</a></li>
            <li class="list-group-item"><a href="{{ route('todolist.edit', ['todolist' => $task->id]) }}" class="btn btn-secondary" role="button">Edit</a></li>
            <li class="list-group-item">
                <form action="{{ route('todolist.taskcomplete', ['taskname' => $task->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="{{ $task->status == 'incomplete' ? 'complete' : 'incomplete' }}">
                    <input type="submit" class="btn btn-success" value="Done">
                </form>
            </li>
            <li class="list-group-item">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Confirm Delete Task</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete<br>Task: {{ $task->taskname }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('todolist.destroy', ['todolist' => $task->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Yes, Delete">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <a href="{{ route('todolist.create') }}" class="btn btn-secondary" role="button">Add Task</a>
</x-layout>
