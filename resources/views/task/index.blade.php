<x-task-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-full">
                <div class="p-6 text-gray-900">
                    @forelse ($tasks as $task)
                        <div class="my-2">
                            <a href="{{ route('task.show', [$user, $task]) }}"
                                class="hover:underline hover:text-blue-400">
                                {{ $task->title }}
                            </a>
                        </div>
                    @empty
                        <div class="my-2">
                            No task yet.
                            <a href="{{ route('task.create', $user) }}" class="underline text-blue-400">
                                Click here to create new task.
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</x-task-layout>
