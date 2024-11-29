@props(['width', 'action', 'employee' => null, 'phone' => null])

@php
    $paramsForRequest = [
        'action' => $action == 'Criar' ? 'phones.store' : 'phones.update',
        'method' => $action == 'Criar' ? 'POST' : 'PUT',
    ];
@endphp

{{-- form de criação/atualização de um telefone --}}
<form style="width: {{ $width ?? '100%' }};" class="flex flex-col gap-4" method="POST" method="POST"
    action="{{ route($paramsForRequest['action'], $address) }}">
    @csrf
    @method($paramsForRequest['method'])

    <div class="relative z-0 w-full mb-5 group">
        <input type="tel" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}" name="number" id="floating_phone"
            value="{{ $phone ? $phone->number : '' }}"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />

        <label for="floating_phone"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
            Telefone (Formato: (XX) XXXXX-XXXX)
        </label>
    </div>

    <div class="hidden relative z-0 w-full mb-5 group">
        <input type="text" name="employee_id" id="floating_employee_id"
            value="{{ old('employee_id', $employee ? $employee->id : '') }}"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required readonly />

        <label for="floating_employee_id"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
            Id do usuário
        </label>
    </div>


    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ $action ?? 'Enviar' }}</button>
</form>
