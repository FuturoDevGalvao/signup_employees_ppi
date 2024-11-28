@extends('layouts.app')

@section('content')
    <div class="w-[80%] bg-slate-50 border rounded-xl p-10 max-w-2xl overflow-hidden  flex flex-col gap-4">
        <div class="flex flex-col gap-0">
            <h1 class="font-semibold text-3xl">{{ $employee->name }}</h1>
            <span class="font-normal text-gray-500">{{ $employee->email }}</span>
        </div>
    </div>
@endsection
