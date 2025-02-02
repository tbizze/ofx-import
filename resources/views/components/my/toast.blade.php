<div class="fixed right-5 top-5 max-w-96 z-50">

    {{-- Notification: info --}}
    @if (session('info'))
        <div id="notification-info"
            class="rounded-md bg-blue-500 px-4 py-2 pr-2 mb-5 text-white transition hover:bg-blue-600">
            <div class="flex items-start space-x-2">
                <span class="text-2xl"><i class='bx bxs-info-circle'></i></span>
                <p class="font-bold">
                    {{ session('info') }}
                </p>
                <button class="px-1 font-bold text-white hover:text-blue-800"
                    onclick="document.getElementById('notification-info').style.display='none'">X
                </button>
            </div>
        </div>
    @endif

    {{-- Notification: success --}}
    @if (session('success'))
        <div id="notification-success"
            class="rounded-md bg-green-500 px-4 py-2 pr-2 mb-5 text-white transition hover:bg-green-600">
            <div class="flex items-start space-x-2">
                <span class="text-2xl"><i class='bx bxs-message-square-check'></i></span>
                <p class="font-bold">
                    {{ session('success') }}
                </p>
                <button class="px-1 font-bold text-white hover:text-green-800"
                    onclick="document.getElementById('notification-success').style.display='none'">X
                </button>
            </div>
        </div>
    @endif

    {{-- Notification: warning --}}
    @if (session('warning'))
        <div id="notification-warning"
            class="rounded-md bg-yellow-500 px-4 py-2 pr-2 mb-5 text-white transition hover:bg-yellow-600">
            <div class="flex items-start space-x-2">
                <span class="text-2xl"><i class='bx bxs-message-square-error'></i></span>
                <p class="font-bold">
                    {{ session('warning') }}
                </p>
                <button class="px-1 font-bold text-white hover:text-yellow-800"
                    onclick="document.getElementById('notification-warning').style.display='none'">X
                </button>
            </div>
        </div>
    @endif

    {{-- Notification: error --}}
    @if (session('error'))
        <div id="notification-error"
            class="rounded-md bg-red-500 px-4 py-2 pr-2 mb-5 text-white transition hover:bg-red-600">
            <div class="flex items-start space-x-2">
                {{-- <span class="text-2xl"><i class='bx bxs-error'></i><i class='bx bxs-message-square-x'></i></span> --}}
                <span class="text-2xl"></i><i class='bx bxs-message-square-x'></i></span>
                <p class="font-bold">
                    {{ session('error') }}
                </p>
                <button class="px-1 font-bold text-white hover:text-red-800"
                    onclick="document.getElementById('notification-error').style.display='none'">X
                </button>
            </div>
        </div>
    @endif
</div>

@push('scripts')
    <script>
        // Script para remover a notificação após alguns segundos
        setTimeout(() => {
            const notification_info = document.getElementById('notification-info');
            if (notification_info) {
                notification_info.style.display = 'none';
            }
            const notification_success = document.getElementById('notification-success');
            if (notification_success) {
                notification_success.style.display = 'none';
            }
            const notification_warning = document.getElementById('notification-warning');
            if (notification_warning) {
                notification_warning.style.display = 'none';
            }
            const notification_error = document.getElementById('notification-error');
            if (notification_error) {
                notification_error.style.display = 'none';
            }
        }, 7000); // 7 segundos
    </script>
@endpush
