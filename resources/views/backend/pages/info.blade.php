<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Info') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- component -->
                    <div class="flex items-center justify-center p-12">
                        <div class="mx-auto w-full max-w-[550px]">
                            <form action="{{ route('info.update', [$info]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="city" class="block text-base font-medium text-[#07074D]">
                                        City
                                    </label>
                                    <input type="text" name="city" id="city" value="{{old('city', $info->city)}}"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                                <div class="mb-3">
                                    <label for="adress" class="block text-base font-medium text-[#07074D]">
                                        Adress
                                    </label>
                                    <input type="text" name="adress" id="adress" value="{{old('adress', $info->adress)}}"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="block text-base font-medium text-[#07074D]">
                                        Phone
                                    </label>
                                    <input type="text" name="phone" id="phone" value="{{old('phone', $info->phone)}}"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                                <div class="mb-3">
                                    <label for="hours" class="block text-base font-medium text-[#07074D]">
                                        Hours
                                    </label>
                                    <input type="text" name="hours" id="hours" value="{{old('hours', $info->hours)}}"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="block text-base font-medium text-[#07074D]">
                                        Email Address
                                    </label>
                                    <input type="email" name="email" id="email" value="{{old('email', $info->email)}}"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                                <div>
                                    <button type="submit"
                                        class="hover:shadow-form rounded-md bg-primary_color w-100 rounded-pill py-3 px-8 text-base font-semibold text-white outline-none">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
