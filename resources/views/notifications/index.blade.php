<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notifications</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="max-w-3xl mx-auto mt-10 bg-white shadow rounded-lg p-6">

    <h1 class="text-2xl font-bold mb-6">🔔 Your Notifications</h1>

    @forelse(Auth::user()->notifications as $notification)
    <div class="p-4 mb-3 border rounded-lg flex justify-between items-center 
        {{ $notification->read_at ? 'bg-gray-50' : 'bg-blue-50' }}">

        <div>
            <p class="text-gray-800 font-medium">
    {{ data_get($notification->data, 'message', 'No message provided') }}
</p>

            <small class="text-gray-500">
                {{ $notification->created_at->diffForHumans() }}
            </small>
        </div>

        @if(!$notification->read_at)
            <span class="text-xs bg-blue-500 text-white px-2 py-1 rounded">
                New
            </span>
        @endif

    </div>
@empty
    <p class="text-gray-500">No notifications yet.</p>
@endforelse

</div>

</body>
</html>