@section('title', 'Home')
<x-app-layout>
    <div class="flex justify-center p-4 mt-10">
        <form method="POST" action="{{ route('qna.store') }}" class="bg-white shadow-lg w-1/2 p-6 rounded-md">
            {{-- CSRF --}}
            @csrf

            <h2 class="text-xxl font-thin font-serif mb-10 text-center">Form Tanya Jawab</h2>
            <input name="question" id="question" placeholder="Masukan Pertanyaan" class="block w-full border-gray-300 rounded-md" value="{{ old('question') }}"></input>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />

            <textarea name="answer" id="answer" placeholder="Masukan Jawaban" class="block w-full mt-4 border-gray-300 rounded-md">{{ old('answer') }}</textarea>
            <x-input-error :messages="$errors->get('massage')" class="mt-2" />

            <x-primary-button class="mt-4">Kirim</x-primary-button>
        </form>
    </div>

    <div class="mt-6 p-10">
        @foreach ($qna as $item)
            <div class="p-4 mb-4 bg-white rounded shadow">
                <p><strong>Pertanyaan:</strong> {{ $item->question }}</p>
                @if ($item->answer)
                    <p><strong>Jawaban:</strong> {{ $item->answer }}</p>
                @endif

                <div class="flex gap-4 text-white">
                    {{-- <a href="{{ route('qna.edit'), $item->id }}" class="bg-blue-500 px-4 py-1 rounded-lg hover:-translate-y-px hover:shadow-xs">Edit</a> --}}

                    <a href="{{ route('qna.edit', $item->id) }}"
                        class="bg-blue-500 px-4 py-1 rounded-lg hover:-translate-y-px hover:shadow-xs">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </a>
                    {{-- <a href="" class="bg-red-500 px-4 py-1 rounded-lg hover:-translate-y-px hover:shadow-xs">
                        <i class="fa-solid fa-trash"></i> Hapus</a>
 --}}

                        <!-- Form untuk Menghapus Pesan Saran -->
                    <form action="{{ route('qna.destroy', $item->id) }}" method="POST"
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
