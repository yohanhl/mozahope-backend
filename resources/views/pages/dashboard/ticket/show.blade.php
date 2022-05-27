<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ticket &raquo; {{ $ticket->first_name }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-lg text-gray-500 leading-tight mb-5">
                Ticket Detail
            </h2>
            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <tbody>
                            <tr>
                                <th class="border px-6 py-4 text-right">First Name</th>
                                <td class="border px-6 py-4">{{ $ticket->first_name }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Last Name</th>
                                <td class="border px-6 py-4">{{ $ticket->last_name }}</td>
                                
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Email</th>
                                <td class="border px-6 py-4">{{ $ticket->email }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Phone</th>
                                <td class="border px-6 py-4">{{ $ticket->phone }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Option</th>
                                <td class="border px-6 py-4">{{ $ticket->option }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Message</th>
                                <td class="border px-6 py-4">{{ $ticket->message }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

</x-app-layout>
