<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mailbox') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white container p-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">
                    <table class="min-w-full border-collapse block md:table">
                        <thead class="block md:table-header-group">
                            <tr
                                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                <th
                                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Name</th>
                                <th
                                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Subject</th>
                                <th
                                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Email Address</th>
                                <th
                                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group">

                            @foreach ($mails->reverse() as $mailbox)
                                <tr class="border border-grey-500 md:border-none block md:table-row {{$mailbox->read ? 'bg-green-400' : 'bg-gray-300'}}">
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        {{ $mailbox->name }}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        {{ $mailbox->subject }}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        {{ $mailbox->email }}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <form action="{{ route('mailbox.destroy', [$mailbox]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                                        </form>
                                        @include("backend.partials.mailbox.mailShow")
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>x

{{-- @extends('layouts.back_layout')

@section('content')
<!-- component -->
<div class="container">
        <h1>Mailbox </h1>
        <table class="min-w-full border-collapse block md:table">
            <thead class="block md:table-header-group">
                <tr
                    class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Name</th>
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Subject</th>
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Email Address</th>
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="block md:table-row-group">

                @foreach ($mails->reverse() as $mail)
                    <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $mail->name }}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $mail->subject }}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $mail->email }}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Show</button>
                            <button
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}
