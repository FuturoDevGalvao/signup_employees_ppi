@extends('layouts.app')


@section('content')
    @if ($id !== 'null')
        <h1>Mostrar endereço de id: {{ $id }}</h1>
    @else
        <div class="flex gap-4 flex-col">
            <h1 class="flex items-center gap-1 font-bold text-3xl">
                Nenhum endereço associado
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                </svg>
            </h1>

            <a href="{{ redirect()->back() }}"
                class="w-[200px] rounded-full inline-flex items-center justify-center font-semibold text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                voltar
            </a>
        </div>
    @endif
@endsection
