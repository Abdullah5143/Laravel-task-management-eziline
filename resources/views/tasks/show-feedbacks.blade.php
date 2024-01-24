@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">Feedback List</h2>

                    <!-- Display feedbacks here -->
                    <ul>
                        @forelse($feedbacks as $feedback)
                            <!-- Display feedback details -->
                            <li>
                                Feedback from {{ optional($feedback->user)->name ?? 'Unknown User' }}: {{ $feedback->comment }}
                            </li>
                        @empty
                            <li>No feedbacks available.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
