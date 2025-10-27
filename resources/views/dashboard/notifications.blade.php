@extends('dashboard.layout')

@section('content')
<h1 class="text-3xl font-bold mb-6">Notifications</h1>

<div class="bg-gray-800 p-6 rounded-2xl shadow">
    <table class="w-full text-left">
        <thead class="text-gray-400 border-b border-gray-700">
            <tr>
                <th class="py-2">Type</th>
                <th class="py-2">Message</th>
                <th class="py-2">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifications as $notif)
            <tr class="border-b border-gray-700 hover:bg-gray-700/30">
                <td class="py-2">{{ $notif->type }}</td>
                <td class="py-2">{{ $notif->message }}</td>
                <td class="py-2">{{ $notif->created_at->format('M d, Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
