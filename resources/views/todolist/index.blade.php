@push('scripts')
<script>
</script>
@endpush
<x-layout>
    <x-slot:title>Index</x-slot>
    <h1>My Todo List</h1>
    <a href="{{ route('todolist.create') }}" class="btn btn-success mb-3" role="button">Add Task</a>
    <div class="row">
        @foreach($data as $task)
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-3">
            <div class="card" style="background-color:{{ $task->status == 'complete' ? 'lightgray' : 'white' }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->taskname }}</h5>
                    <p class="card-text text-truncate">{{ $task->description }}</p>
                    <a href="{{ route('todolist.show', ['todolist' => $task->id]) }}" class="btn btn-primary d-block mb-2 {{ $task->status == 'complete' ? 'disabled' : '' }}">View</a>
                    <a href="{{ route('todolist.edit', ['todolist' => $task->id]) }}" class="btn btn-primary d-block mb-2 {{ $task->status == 'complete' ? 'disabled' : '' }}">Edit</a>
                    <form action="{{ route('todolist.taskcomplete', ['taskname' => $task->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="{{ $task->status == 'incomplete' ? 'complete' : 'incomplete' }}">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary mb-2" value="Done">{{ $task->status == 'complete' ? 'Undone' : 'Done' }}</button>
                        </div>
                    </form>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-primary mb-2 {{ $task->status == 'complete' ? 'disabled' : '' }}" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $task->id }}">Delete</button>
                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $task->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel{{ $task->id }}">Confirm Delete Task</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete task: {{ $task->taskname }}</p>
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
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</x-layout>
