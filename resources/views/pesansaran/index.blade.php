@section('title', 'Home')
<x-app-layout>
    <div class="flex justify-center p-4 mt-10">
        <form method="POST" action="{{ route('pesan_saran.store') }}" class="bg-white shadow-lg w-1/2 p-6 rounded-md">
            {{-- CSRF --}}
            @csrf
            <h2 class="text-xxl font-thin font-serif mb-10 text-center">Form Pesan Saran</h2>

            <!-- Input Nama -->
            <input name="nama" id="nama" placeholder="Masukan nama anda"
                class="block w-full border-gray-300 rounded-md" value="{{ old('nama') }}" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />

            <!-- Input Email -->
            <input type="text" name="email" id="email" placeholder="Email Anda (opsional)"
                class="block w-full mt-4 border-gray-300 rounded-md" value="{{ old('email') }}" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <!-- Input Pesan -->
            <textarea name="pesan" id="pesan" placeholder="Berikan saran Anda"
                class="block w-full mt-4 border-gray-300 rounded-md">{{ old('pesan') }}</textarea>
            <x-input-error :messages="$errors->get('pesan')" class="mt-2" />

            <!-- Tombol Kirim -->
            <x-primary-button class="mt-4">Kirim Pesan</x-primary-button>
        </form>
    </div>

    <div class="mt-6 p-10">
        <!-- Looping Data Pesan dan Saran -->
        @foreach ($pesansaran as $pesan)
            <div class="p-4 mb-4 bg-white rounded shadow">
                <p><strong>Nama : </strong> {{ $pesan->nama }}</p>
                @if ($pesan->email)
                    <p><strong>Email:</strong> {{ $pesan->email }}</p>
                @endif
                @if ($pesan->pesan)
                    <p><strong>Saran:</strong> {{ $pesan->pesan }}</p>
                @endif
                <p><small>Ditulis oleh: {{ $pesan->user->name }}</small></p>

                <div class="flex gap-4 text-white">
                    <!-- Tombol Edit -->
                    <a href="{{ route('pesan_saran.edit', $pesan->id) }}"
                        class="bg-blue-500 px-4 py-1 rounded-lg hover:-translate-y-px hover:shadow-xs">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </a>

                    



                    <!-- Form untuk Menghapus Pesan Saran -->
                    <form action="{{ route('pesan_saran.destroy', $pesan->id) }}" method="POST"
                        onsubmit="return confirm('Apakah Yakin Ingin Menghapus Data?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center px-4 py-1 bg-red-500 text-white text-sm font-medium rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
                            <i class="fa-solid fa-trash mr-1"></i>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
