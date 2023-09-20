@extends('layouts.back_layout')

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
@endsection
