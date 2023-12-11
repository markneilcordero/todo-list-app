<x-layout>
    <x-slot:title>Show</x-slot>
    <h1>Task Description</h1>
    <p>Task Name: {{ $taskname }}</p>
    <p>Description: {{ $description }}</p>
    <p>Due Date: {{ $duedate }}</p>
    <a href="{{ route('todolist.index') }}" class="btn btn-danger" role="button">Close</a>
</x-layout>