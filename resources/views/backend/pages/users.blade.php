<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- component -->
                    <table class="min-w-full border-collapse block md:table">
                        <thead class="block md:table-header-group">
                            <tr
                                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                <th
                                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Name</th>
                                <th
                                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Email Address</th>
                                <th
                                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Role</th>
                                <th
                                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group">
                            @foreach ($users as $user)
                                <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        {{ $user->name }}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        {{ $user->email }}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        {{ $user->roles[0]->name }}
                                    </td>

                                    @if ($loop->iteration > 1)
                                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                            <form action="{{ route('user.changeRole', $user) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Change
                                                    Role</button>
                                            </form>

                                            <form action="{{ route('user.destroy', $user) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                                            </form>
                                        </td>

                                    @else
                                        <td></td>
                                    @endif
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
