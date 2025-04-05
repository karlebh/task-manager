<x-task-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="px-4 py-5 my-3 mx-auto md:w-[75%] lg:w-[50%]">
        <form method="POST" action="{{ route('task.update', [$user, $task]) }}" class="">
            @csrf
            @method('PATCH')

            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$task->title"
                    required autofocus autocomplete="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mt-7">
                <x-input-label for="description" :value="__('Description')" />
                <textarea name="description" required
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    cols="7" rows="4">  {{ $task->description }} </textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-7">
                <x-primary-button class="">
                    {{ __('Update Task') }}
                </x-primary-button>
            </div>
        </form>
    </div>


</x-task-layout>
