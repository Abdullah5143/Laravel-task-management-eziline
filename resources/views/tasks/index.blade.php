@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css" />

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">Task List</h2>

                    <!-- Add New Task Button for Users with 'create task' Permission -->
                    @can('create task')
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-2">Add New Task</a>
                    @endcan

                    <!-- Display a table with tasks based on user permissions -->
                    <table id="myTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Title</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Status</th>
                                @can('edit task')
                                    <th class="text-center">Actions</th>
                                @endcan
                                @can('view feedback') <!-- Display only to admin and manager -->
                                    <th class="text-center">View Feedback</th>
                                @endcan
                                @can('give feedback') <!-- Display only to regular users -->
                                    <th class="text-center">Give Feedback</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td class="text-center">{{ $task->title }}</td>
                                    <td class="text-center">{{ $task->description }}</td>
                                    <td class="text-center">{{ $task->status }}</td>
                                    <td class="text-center">
                                        <!-- Edit action for Users with 'edit task' Permission -->
                                        @can('edit task')
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning mb-2 bg-warning">Edit</a>
                                        @endcan

                                        <!-- Delete action for Users with 'delete task' Permission -->
                                        @can('delete task')
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="post" class="inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger mb-2 bg-danger">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                    <td class="text-center">
                                        <!-- Provide a link to view feedbacks for the specific task -->
                                        @can('view feedback')
                                            <a href="{{ route('tasks.showFeedback', $task->id) }}" class="btn btn-primary mb-2">View Feedback</a>
                                        @endcan
                                    </td>
                                    <td class="text-center">
                                        <!-- Provide a link to give feedback for the specific task -->
                                        @can('give feedback')
                                            <a href="{{ route('tasks.giveFeedback', $task->id) }}" class="btn btn-success mb-2">Give Feedback</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#myTable').DataTable({
                    "width": "100%",
                    "paging": true,
                    "searching": true,
                    "lengthMenu": [10, 25, 50],
                    "pageLength": 10
                });
            });
        </script>
    @endpush
@endsection
