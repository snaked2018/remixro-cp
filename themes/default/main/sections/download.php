<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="pt-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0 mb-8">
            <h2 class="text-3xl font-semibold tracking-tight text-white sm:text-5xl">
                Download Now
            </h2>
            <p class="text-lg text-gray-400">
                Choose your platform and start your adventure!
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Desktop Client -->
            <div class="relative group rounded-lg p-6" style="border: 1px solid var(--geist-primary)">
                <div class="flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-white">Desktop Client</h3>
                        <p class="text-sm text-gray-400">Windows Desktop Client</p>
                    </div>
                </div>
                <div class="mt-4">
                    <button onclick="openDownloadModal()" class="w-full branding-green-button">
                        Download Now
                    </button>
                </div>
            </div>

            <!-- Mobile Client -->
            <div class="relative group rounded-lg p-6" style="border: 1px solid var(--geist-primary)">
                <div class="absolute -top-2 -right-2">
                    <span class="inline-flex items-center rounded-full bg-blue-400/10 px-2 py-1 text-xs font-medium text-blue-400 bg-black ring-1 ring-inset ring-blue-400/30">
                        Coming Soon
                    </span>
                </div>
                <div class="flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-white">Mobile Client</h3>
                        <p class="text-sm text-gray-400">Android APK | Release: June 15, 2025</p>
                    </div>
                </div>
                <div class="mt-4">
                    <button disabled class="w-full cursor-not-allowed opacity-10 branding-green-button">
                        Coming Soon
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Download Modal -->
<div id="downloadModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-black bg-opacity-75 transition-opacity"></div>
        
        <div class="relative bg-black rounded-lg max-w-md w-full mx-auto p-6" style="border: 1px solid var(--geist-primary);">
            <div class="absolute right-4 top-4">
                <button onclick="closeDownloadModal()" class="text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <h3 class="text-xl text-center pb-4 font-semibold text-white">Download Client</h3>
            <div class="space-y-4">
                <!-- Direct Download -->
                <a href="#" class="block w-full text-center branding-green-button flex items-center justify-center gap-2 hover:bg-opacity-90 transition-all">
                    Direct Download
                </a>

                <!-- Google Drive Mirror -->
                <a href="#" class="block w-full text-center branding-green-button flex items-center justify-center gap-2 hover:bg-opacity-90 transition-all">
                    Google Drive
                </a>

                <!-- MEGA Mirror -->
                <a href="#" class="block w-full text-center branding-green-button flex items-center justify-center gap-2 hover:bg-opacity-90 transition-all">
                    MEGA NZ
                </a>

                <!-- Installation Instructions -->
                <div class="mt-6 p-4 bg-gray-900 rounded-lg border border-gray-800">
                    <h4 class="text-sm font-medium text-white flex items-center gap-2 pb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                        </svg>
                        Important Installation Steps:
                    </h4>
                    <ol class="text-sm text-gray-400 space-y-2 list-decimal pl-4">
                        <li>Extract all files to a folder</li>
                        <li>Right-click on <span class="text-white font-mono bg-gray-800 px-1 rounded">CLIENT.exe</span></li>
                        <li>Select "Run as Administrator"</li>
                        <li>For better performance, open the setup.exe and set the graphics to <span class="text-white font-mono bg-gray-800 px-1 rounded">Direct-X 9</span></li>
                    </ol>
                </div>

                <!-- System Requirements -->
                <div class="p-4 bg-gray-900 rounded-lg border border-gray-800">
                    <h4 class="text-sm font-medium text-white flex items-center gap-2 pb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                        </svg>
                        Minimum Requirements:
                    </h4>
                    <ul class="text-sm text-gray-400 space-y-1">
                        <li>• Windows 7/8/10/11</li>
                        <li>• 4GB RAM</li>
                        <li>• DirectX 9.0c compatible graphics</li>
                        <li>• 5GB free disk space</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openDownloadModal() {
    document.getElementById('downloadModal').classList.remove('hidden');
}

function closeDownloadModal() {
    document.getElementById('downloadModal').classList.add('hidden');
}
</script>
