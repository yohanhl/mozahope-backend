<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homepage') }}
        </h2>
    </x-slot>
    <x-slot name="script">
        <script>
            // AJAX Datatables

            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}'
                },
                columns: [
                    { data : 'id', name: 'id', width: '5%'},
                    { data : 'title', name: 'title'},
                    { data : 'description', name: 'description'},
                    { data : 'image_description', name: 'image_description'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '20%'
                    }
                    
                ]
                    
                
            })
        </script>

    </x-slot>
    {{-- <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden sm-rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table class="table-fixed">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border"><img src="https://i.picsum.photos/id/290/200/300.jpg?grayscale&hmac=j8tIiDKS2NorF20qzLg4oDpwCJDNhr9MSiirIeg8sUI" class="" style="max-width: 150px;" alt=""></td>
                                <td class="border"><button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"><a href="">Edit</a></button></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden sm-rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Gambar Description</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
