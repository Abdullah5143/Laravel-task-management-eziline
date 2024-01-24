<@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">Create Task</h2>

                    <!-- Task creation form -->
                    <form action="{{ route('tasks.store') }}" method="post">
                        @csrf
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" required class="w-full border p-2 mb-2">

                        <label for="description">Description:</label>
                        <textarea name="description" id="description" required class="w-full border p-2 mb-2"></textarea>

                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" required class="w-full border p-2 mb-2">
                            <option value="To Do">To Do</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select>

                        <button type="submit" class="btn btn-primary mb-2 bg-primary">Create Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
