@props(['name', 'label' => null])

@if ($label)
    <x-my.label value="{{ $label }}" />
@endif

<div class="p-8 text-center rounded-lg border-dashed border-2 bg-gray-100 dark:bg-gray-900 border-gray-300 dark:border-gray-600 hover:border-blue-500 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-md"
    id="dropzone">
    <label for="{{ $name }}" class="cursor-pointer flex flex-col items-center space-y-2">
        <svg class="w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        <span class="text-gray-600">Arraste e solte seus arquivos aqui</span>
        <span class="text-gray-500 text-sm">(ou clique para selecionar)</span>
    </label>
    <input type="file" id="{{ $name }}" name="{{ $name }}" class="hidden" multiple>
</div>
<div class="mt-3 text-sm text-gray-600 dark:text-gray-400" id="fileList"></div>

<x-my.input-error for="{{ $name }}" class="mt-1" />

@push('scripts')
    <script>
        // Script para Drag And Drop
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('{{ $name }}');
        const fileList = document.getElementById('fileList');

        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.classList.add('border-blue-500', 'border-2');
        });

        dropzone.addEventListener('dragleave', () => {
            dropzone.classList.remove('border-blue-500', 'border-2');
        });

        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('border-blue-500', 'border-2');

            const files = e.dataTransfer.files;
            handleFiles(files);
        });

        fileInput.addEventListener('change', (e) => {
            const files = e.target.files;
            handleFiles(files);
        });

        function handleFiles(files) {
            fileList.innerHTML = '';

            for (const file of files) {
                const listItem = document.createElement('div');
                listItem.textContent = `${file.name} (${formatBytes(file.size)})`;
                fileList.appendChild(listItem);
            }
        }

        function formatBytes(bytes) {
            if (bytes === 0) return '0 Bytes';

            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));

            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
    </script>
@endpush
