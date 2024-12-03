@extends('layouts.app')

@section('content')
    <div class="w-[80%] bg-slate-50 border rounded-xl p-10 max-w-2xl flex flex-col gap-4">
        <div class="flex flex-col gap-0">
            <h1 class="font-semibold text-3xl">{{ $employee->name }}</h1>
            <span class="font-normal text-gray-500">{{ $employee->email }}</span>

            <div class="relative flex flex-col lg:flex-row">
                <div
                    class="pointer-events-none absolute -bottom-10 left-12 hidden h-24 w-24 rounded-full opacity-60 lg:block">
                    <!-- prettier-ignore -->
              <svg id='patternId' width='100%' height='100%' xmlns='http://www.w3.org/2000/svg'><defs><pattern id='b' patternUnits='userSpaceOnUse' width='40' height='40' patternTransform='scale(0.5) rotate(0)'><rect x='0' y='0' width='100%' height='100%' fill='none'/><path d='M11 6a5 5 0 01-5 5 5 5 0 01-5-5 5 5 0 015-5 5 5 0 015 5'  stroke-width='1' stroke='none' fill='currentColor'/></pattern></defs><rect width='800%' height='800%' transform='translate(0,0)' fill='url(#b)'/></svg>
                </div>

                <div class="text-blue-900 mx-auto mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 md:gap-8 lg:mt-16 lg:mr-0">
                    <div class="px-6 py-10">
                        <div class="flex items-center">
                            <h3 class="relative ml-2 inline-block text-4xl font-bold leading-none">
                                <span class="absolute -top-6 -left-6 h-16 w-16 rounded-full bg-blue-200"></span>
                                <span class="relative">Idade</span>
                            </h3>
                            <span class="ml-3 text-base font-medium capitalize">{{ $employee->age }}</span>
                        </div>
                    </div>

                    <div class="px-6 py-10">
                        <div class="flex items-center">
                            <h3 class="relative ml-2 inline-block text-4xl font-bold leading-none">
                                <span class="absolute -top-6 -left-6 h-16 w-16 rounded-full bg-blue-200"></span>
                                <span class="relative">Salário</span>
                            </h3>
                            <span class="ml-3 text-base font-medium capitalize">{{ $employee->wage }}</span>
                        </div>
                    </div>

                    <div class="px-6 py-10">
                        <div class="flex items-center">
                            <h3 class="relative ml-2 inline-block text-4xl font-bold leading-none">
                                <span class="absolute -top-6 -left-6 h-16 w-16 rounded-full bg-blue-200"></span>
                                <span class="relative">Endereços</span>
                            </h3>
                            <span class="ml-3 text-base font-medium capitalize">{{ $employee->addresses->count() }}</span>
                        </div>
                    </div>

                    <div class="px-6 py-10">
                        <div class="flex items-center">
                            <h3 class="relative ml-2 inline-block text-4xl font-bold leading-none">
                                <span class="absolute -top-6 -left-6 h-16 w-16 rounded-full bg-blue-200"></span>
                                <span class="relative">Telefones</span>
                            </h3>
                            <span class="ml-3 text-base font-medium capitalize">{{ $employee->phones->count() }}</span>
                        </div>
                    </div>

                    <div class="px-6 py-10">
                        <div class="flex items-center">
                            <h3 class="relative ml-2 inline-block text-4xl font-bold leading-none">
                                <span class="absolute -top-6 -left-6 h-16 w-16 rounded-full bg-blue-200"></span>
                                <span class="relative">Imagens</span>
                            </h3>
                            <span class="ml-3 text-base font-medium capitalize">{{ $employee->images->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
