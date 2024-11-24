@extends('layouts.app')

@section('content')
    <div class="w-[90%] relative overflow-x-auto flex flex-col gap-4">

        <div class="flex full justify-between">
            <h1 class="font-bold text-3xl">Lista de Endereços</h1>
            <a type="button" href="{{ route('addresses.create') }}"
                class="flex items-center gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Adicionar
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Rua
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Número
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cep
                    </th>
                    <th>
                        Estado
                    </th>
                    <th>Complemento</th>
                    <th>Pertence</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                {{-- line --}}
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        Maria Goreth Chavier
                    </td>
                    <td class="px-6 py-4">
                        11
                    </td>
                    <td class="px-6 py-4">
                        59255000
                    </td>
                    <td class=" py-4">
                        RN
                    </td>
                    <td class="py-4">
                        Bairro São Domingos
                    </td>
                    <td class=" py-4">
                        José
                    </td>
                    <td class=" py-4">
                        <a href="{{ route('addresses.edit', ['address' => '1234']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                    </td>
                    <td class="py-4">
                        <form action="{{ route('addresses.destroy', ['address' => '1234']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="size-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                {{-- end line --}}
            </tbody>
        </table>
    </div>
@endsection
