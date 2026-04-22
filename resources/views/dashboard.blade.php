<x-app-layout>

    <!-- HEADER (PROJECT NAME) -->
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                📁 Smart File Submission System
            </h2>

            <span class="text-sm text-gray-500">
                Welcome, {{ auth()->user()->name }}
            </span>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto py-8 space-y-6">

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- VALIDATION ERRORS -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 shadow-sm">
                @foreach ($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- UPLOAD SECTION -->
        <div class="bg-white p-6 rounded-xl shadow mb-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">
                Upload New File
            </h3>

            <form action="/submit" method="POST" enctype="multipart/form-data" id="form">
                @csrf

              <input type="file" name="file" id="file"
    class="border p-2 w-full rounded bg-gray-50 hover:bg-gray-100 cursor-pointer">

                <p id="fileError" class="text-blue-500 text-sm hover:underline hover:text-blue-700"></p>

               <button type="submit"
    class="bg-blue-600 text-blue px-5 py-2 rounded-lg hover:bg-blue-700 transition shadow-md">
    Upload File
</button>
            </form>
        </div>

        <!-- SUBMISSIONS LIST -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">
                Your Submissions
            </h3>

            @forelse($submissions as $sub)
                <div class="flex justify-between items-center border-b py-3">

                    <div>
                        <p class="font-medium text-gray-800">
                            {{ $sub->file_name }}
                        </p>

                        <a href="{{ asset('storage/' . $sub->file_path) }}"
                           target="_blank"
                           class="text-blue-500 text-sm hover:underline">
                            View File
                        </a>
                    </div>

                    <!-- STATUS BADGE -->
                    @if($sub->status == 'pending')
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                            Pending
                        </span>
                    @elseif($sub->status == 'approved')
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                            Approved
                        </span>
                    @else
                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                            Rejected
                        </span>
                    @endif

                </div>
            @empty
                <p class="text-gray-500">No submissions yet.</p>
            @endforelse
        </div>

    </div>

    <!-- JS VALIDATION -->
    <script>
        document.getElementById("form").addEventListener("submit", function(e) {

            let file = document.getElementById("file").files[0];
            let error = document.getElementById("fileError");

            error.innerText = "";

            if (!file) {
                error.innerText = "Please select a file.";
                e.preventDefault();
                return;
            }

            let allowed = ["image/jpeg", "image/png", "application/pdf"];

            if (!allowed.includes(file.type)) {
                error.innerText = "Only JPG, PNG, PDF allowed.";
                e.preventDefault();
            }
        });
    </script>

</x-app-layout>