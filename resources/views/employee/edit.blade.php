@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4 w-[30%]">
        <div>
            <h1 class="font-bold text-3xl">Atualizar Informações</h1>
            <p class="text-gray-600 text-sm">usuário em questão: {{ $id }}</p>
        </div>

        <x-form action='Editar'></x-form>
    </div>
@endsection
