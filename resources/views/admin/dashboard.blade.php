<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-bold">Admin Dashboard</h2>
    </x-slot>

    <div class="p-6 max-w-5xl mx-auto">

        <h3 class="text-lg mb-4">All Submissions</h3>

        @foreach($submissions as $sub)
    <div class="border p-4 mb-3 flex justify-between items-center">

        <!-- LEFT SIDE -->
        <div>
            <p class="font-semibold">{{ $sub->file_name }}</p>

            <p class="text-sm text-gray-500">
                Status:
                <span class="font-medium">{{ $sub->status }}</span>
            </p>

            <a href="{{ asset('storage/' . $sub->file_path) }}"
               target="_blank"
               class="text-blue-500 text-sm hover:underline">
                View File
            </a>
        </div>

        <!-- RIGHT SIDE (ACTIONS) -->
        <div class="flex gap-2">

            <form action="/admin/approve/{{ $sub->id }}" method="POST">
                @csrf
                <button class="bg-green-500 text-blue px-3 py-1 rounded hover:bg-green-600">
                    Approve
                </button>
            </form>

            <form action="/admin/reject/{{ $sub->id }}" method="POST">
                @csrf
                <button class="bg-red-500 text-blue px-3 py-1 rounded hover:bg-red-600">
                    Reject
                </button>
            </form>

        </div>

    </div>
@endforeach

    </div>

</x-app-layout>