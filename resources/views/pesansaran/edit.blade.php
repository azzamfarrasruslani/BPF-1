@section('title', 'Edit')
<x-app-layout>
    <div class="flex justify-center p-4 mt-10">
    <form method="POST" action="{{ route('pesan_saran.update', $pesanSaran->id) }}" class="bg-white shadow-lg w-1/2 p-6 rounded-md">
    @csrf
    @method('PUT')
            <div class="w-full max-w-full text-right">
                <a href="{{ route('pesan_saran.index') }}"
                    class="bg-red-500 text-white py-2 px-4 rounded-lg focus:outline-none hover:shadow-xs hover:-translate-y-px active:opacity-85">
                    Keluar
                </a>
            </div>
            <div class="mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="flex flex-wrap -mx-3">
                    <div class="flex items-center w-full max-w-full px-3">
                        <h2 class="text-xxl font-thin font-serif">Edit Pesan Saran</h2>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <x-input-label for="nama" :value="__('Nama :')" class="text-lg mb-1" />
                <input name="nama" id="nama" placeholder="Masukan nama anda"
                    class="block w-full border-gray-300 rounded-md"
                    value="{{ old('nama', $pesanSaran->nama) }}">
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email :')" class="text-lg" />
                <input type="email" name="email" id="email" placeholder="Email Anda"
                    class="block w-full border-gray-300 rounded-md" value="{{ old('email', $pesanSaran->email) }}">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="pesan" :value="__('Pesan :')" class="text-lg" />
                <textarea name="pesan" id="pesan" placeholder="Berikan saran Anda"
                    class="block w-full border-gray-300 rounded-md">{{ old('pesan', $pesanSaran->pesan) }}</textarea>
                <x-input-error :messages="$errors->get('pesan')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4">Simpan</x-primary-button>
        </form>
    </div>
</x-app-layout>
