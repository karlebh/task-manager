<x-task-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Details') }}
        </h2>
    </x-slot>

    {{-- @dump([request()->user, $user, $task_user]) --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-full">
                <div class="p-6 text-gray-900 space-y-4">
                    <h2>
                        Title: <span class="font-semibold">{{ $task->title }}</span>
                    </h2>
                    <p>
                        Description: <span class="font-semibold">{{ $task->description }}</span>
                    </p>
                    <p>
                        Time Created: <span class="font-semibold">{{ $task->created_at->diffForHumans() }}</span>
                    </p>
                </div>


                <div class="p-6 flex space-x-7">
                    <a href="{{ route('task.edit', [$user, $task]) }}"
                        class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow hover:bg-yellow-600 transition duration-300 ease-in-out">
                        ✏️ Edit Task
                    </a>
                    <form action="{{ route('task.destroy', [$user, $task]) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this task?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600 transition duration-300 ease-in-out">
                            🗑️ Delete Task
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</x-task-layout>
