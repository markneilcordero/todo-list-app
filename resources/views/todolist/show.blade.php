<x-layout>
    <x-slot:title>Show</x-slot>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 py-3">
            <div class="card">
                <h2 class="card-header">Task Description</h2>
                <div class="card-body">
                    <h5 class="card-title">Task Name: {{ $taskname }}</h5>
                    <p class="card-text">{{ $description }}</p>
                    <p>Due Date: {{ $duedate }}</p>
                    <a href="{{ route('todolist.index') }}" class="btn btn-danger" role="button">Close</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
