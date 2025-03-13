<!-- Download Modal -->
<div id="downloadModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-black bg-opacity-75 transition-opacity"></div>

        <div class="relative bg-black rounded-lg max-w-md w-full mx-auto p-6"
            style="border: 1px solid var(--geist-primary);">
            <div class="absolute right-4 top-4">
                <button onclick="closeDownloadModal()" class="text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <h3 class="text-xl text-center pb-4 font-semibold text-white">Download Client</h3>
            <div class="space-y-4">
                <!-- Direct Download -->
                <a href="#"
                    class="block w-full text-center branding-green-button flex items-center justify-center gap-2 hover:bg-opacity-90 transition-all">
                    Direct Download
                </a>

                <!-- Google Drive Mirror -->
                <a href="#"
                    class="block w-full text-center branding-green-button flex items-center justify-center gap-2 hover:bg-opacity-90 transition-all">
                    Google Drive
                </a>

                <!-- MEGA Mirror -->
                <a href="#"
                    class="block w-full text-center branding-green-button flex items-center justify-center gap-2 hover:bg-opacity-90 transition-all">
                    MEGA NZ
                </a>

                <!-- Installation Instructions -->
                <div class="mt-6 p-4 bg-gray-900 rounded-lg border border-gray-800">
                    <h4 class="text-sm font-medium text-white flex items-center gap-2 pb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-yellow-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                        </svg>
                        Important Installation Steps:
                    </h4>
                    <ol class="text-sm text-gray-400 space-y-2 list-decimal pl-4">
                        <li>Extract all files to a folder</li>
                        <li>Right-click on <span class="text-white font-mono bg-gray-800 px-1 rounded">CLIENT.exe</span>
                        </li>
                        <li>Select "Run as Administrator"</li>
                        <li>For better performance, open the setup.exe and set the graphics to <span
                                class="text-white font-mono bg-gray-800 px-1 rounded">Direct-X 9</span></li>
                    </ol>
                </div>

                <!-- System Requirements -->
                <div class="p-4 bg-gray-900 rounded-lg border border-gray-800">
                    <h4 class="text-sm font-medium text-white flex items-center gap-2 pb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
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

<div class="mt-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Download RemixRO</h1>
            <p class="mt-6 text-lg leading-8 text-gray-400">
                Get ready to experience the nostalgia of classic Ragnarok Online with modern features. Choose your
                preferred download method below.
            </p>
        </div>

        <!-- Download Options Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Direct Download -->
            <div class="relative group">
                <div class="rounded-lg border border-gray-800 p-6 hover:border-purple-500 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-white">Mediafire Download</h3>
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-400 mb-4">Download directly from our servers for the fastest speed.</p>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>Size: 5.2 GB</span>
                        <span>Speed: Singapore Based</span>
                    </div>
                    <a href="https://www.mediafire.com/file/tjp51gok2i4g9kc/client-3-6-25.rar/file"
                        class="mt-4 block w-full text-center branding-green-button">Download via Mediafire</a>
                </div>
            </div>

            <!-- Google Drive Mirror -->
            <div class="relative group">
                <div class="rounded-lg border border-gray-800 p-6 hover:border-blue-500 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-white">Google Drive</h3>
                        <img src="https://cdn-icons-png.flaticon.com/512/2913/2913963.png" class="w-6 h-6"
                            alt="Google Drive" />
                    </div>
                    <p class="text-sm text-gray-400 mb-4">Recommended method. Alternative download through Google Drive.
                        Reliable and secure.</p>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>Size: 5.2 GB</span>
                        <span>Speed: Fast</span>
                    </div>
                    <a href="https://drive.google.com/drive/folders/1VeK0XgkHoL4AniEPlVgBTdSb5Hz_FD0Z?usp=sharing"
                        class="mt-4 block w-full text-center branding-green-button">Download via Google
                        Drive</a>
                </div>
            </div>

            <!-- MEGA Mirror -->
            <div class="relative group">
                <div class="rounded-lg border border-gray-800 p-6 hover:border-red-500 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-white">MEGA</h3>
                        <img src="https://cdn.freebiesupply.com/logos/large/2x/mega-icon-logo-png-transparent.png"
                            class="w-6 h-6" alt="MEGA" />
                    </div>
                    <p class="text-sm text-gray-400 mb-4">Recommended download, secure and encrypted download through
                        MEGA.</p>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>Size: 5.2 GB</span>
                        <span>Speed: Variable</span>
                    </div>
                    <a href="https://mega.nz/file/3yxnxSCQ#73Vu-RJ2jIGDtyOne1_WX48zmES6B52MtHH7jlToaxE"
                        class="mt-4 block w-full text-center branding-green-button">Download via MEGA.nz</a>
                </div>
            </div>
        </div>

        <!-- Installation Guide -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- Installation Steps -->
            <div class="rounded-lg border border-gray-800 p-6">
                <h3 class="text-xl font-semibold text-white mb-6 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-yellow-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                    Installation Guide
                </h3>
                <ol class="space-y-4 text-gray-400">
                    <li class="flex items-start">
                        <span class="font-bold text-purple-500 mr-3">1.</span>
                        <span>Extract all files to a designated folder (Recommended: C:\Games\RemixRO)</span>
                    </li>
                    <li class="flex items-start">
                        <span class="font-bold text-purple-500 mr-3">2.</span>
                        <span>Right-click on <code class="text-white bg-gray-800 px-2 py-0.5 rounded">CLIENT.exe</code>
                            and select "Run as Administrator"</span>
                    </li>
                    <li class="flex items-start">
                        <span class="font-bold text-purple-500 mr-3">3.</span>
                        <span>Run <code class="text-white bg-gray-800 px-2 py-0.5 rounded">setup.exe</code> and
                            configure graphics settings</span>
                    </li>
                    <li class="flex items-start">
                        <span class="font-bold text-purple-500 mr-3">4.</span>
                        <span>Select DirectX 9.0c for optimal performance</span>
                    </li>
                </ol>
            </div>

            <!-- System Requirements -->
            <div class="rounded-lg border border-gray-800 p-6">
                <h3 class="text-xl font-semibold text-white mb-6 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                    </svg>
                    System Requirements
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Minimum Requirements -->
                    <div>
                        <h4 class="text-sm font-semibold text-purple-500 mb-3">Minimum Requirements</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                </svg>
                                Windows 7/8/10/11
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                </svg>
                                4GB RAM
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                </svg>
                                DirectX 9.0c Graphics
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                </svg>
                                5GB Disk Space
                            </li>
                        </ul>
                    </div>

                    <!-- Recommended -->
                    <div>
                        <h4 class="text-sm font-semibold text-purple-500 mb-3">Recommended</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-purple-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                </svg>
                                Windows 10/11
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-purple-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                </svg>
                                8GB RAM
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-purple-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                </svg>
                                Dedicated GPU
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-purple-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                </svg>
                                10GB Disk Space
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-lg border border-gray-800 p-6 mb-12">
            <h3 class="text-xl font-semibold text-white mb-6 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                </svg>
                Common Issues & Solutions
            </h3>
            <div class="space-y-2" id="troubleshooting-accordion">
                <!-- Game Won't Start -->
                <div class="border border-gray-800 rounded-lg overflow-hidden">
                    <button class="accordion-trigger w-full p-4 bg-gray-900 flex justify-between items-center"
                        data-target="panel-1">
                        <h4 class="text-white font-medium">Game Won't Start</h4>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="panel-1" class="accordion-content max-h-0 overflow-hidden transition-all duration-200">
                        <p class="p-4 text-gray-400 text-sm bg-gray-900/50">
                            Ensure you're running the game as an administrator and have installed all required
                            Visual C++ redistributables. Also, check if your antivirus is blocking the game files.
                        </p>
                    </div>
                </div>

                <!-- Graphics Issues -->
                <!-- Graphics Issues -->
                <div class="border border-gray-800 rounded-lg overflow-hidden">
                    <button class="accordion-trigger w-full p-4 bg-gray-900 flex justify-between items-center"
                        data-target="panel-2">
                        <h4 class="text-white font-medium">Graphics Issues</h4>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="panel-2" class="accordion-content max-h-0 overflow-hidden transition-all duration-200">
                        <p class="p-4 text-gray-400 text-sm bg-gray-900/50">
                            Try running <strong>setup.exe</strong> and switching between DirectX and OpenGL modes.
                            Update your graphics drivers and ensure your display settings match your screen resolution.
                        </p>
                    </div>
                </div>

                <!-- Patch Not Updating -->
                <div class="border border-gray-800 rounded-lg overflow-hidden">
                    <button class="accordion-trigger w-full p-4 bg-gray-900 flex justify-between items-center"
                        data-target="panel-3">
                        <h4 class="text-white font-medium">Patch Not Updating</h4>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="panel-3" class="accordion-content max-h-0 overflow-hidden transition-all duration-200">
                        <p class="p-4 text-gray-400 text-sm bg-gray-900/50">
                            Run the patcher as an administrator and ensure your internet connection is stable.
                            If the issue persists, manually download and apply the latest patch.
                        </p>
                    </div>
                </div>

                <!-- Missing DLL Errors -->
                <div class="border border-gray-800 rounded-lg overflow-hidden">
                    <button class="accordion-trigger w-full p-4 bg-gray-900 flex justify-between items-center"
                        data-target="panel-4">
                        <h4 class="text-white font-medium">Missing DLL Errors</h4>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="panel-4" class="accordion-content max-h-0 overflow-hidden transition-all duration-200">
                        <p class="p-4 text-gray-400 text-sm bg-gray-900/50">
                            Install the latest <strong>Visual C++ Redistributables</strong> and
                            <strong>DirectX Runtime</strong>. Ensure all game files are present by verifying the
                            installation.
                        </p>
                    </div>
                </div>

                <!-- Lag or Performance Issues -->
                <div class="border border-gray-800 rounded-lg overflow-hidden">
                    <button class="accordion-trigger w-full p-4 bg-gray-900 flex justify-between items-center"
                        data-target="panel-5">
                        <h4 class="text-white font-medium">Lag or Performance Issues</h4>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="panel-5" class="accordion-content max-h-0 overflow-hidden transition-all duration-200">
                        <p class="p-4 text-gray-400 text-sm bg-gray-900/50">
                            Lower your graphics settings in <strong>setup.exe</strong>. Close background applications
                            and ensure your system meets the game's requirements.
                        </p>
                    </div>
                </div>

                <!-- Account Login Issues -->
                <div class="border border-gray-800 rounded-lg overflow-hidden">
                    <button class="accordion-trigger w-full p-4 bg-gray-900 flex justify-between items-center"
                        data-target="panel-6">
                        <h4 class="text-white font-medium">Account Login Issues</h4>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="panel-6" class="accordion-content max-h-0 overflow-hidden transition-all duration-200">
                        <p class="p-4 text-gray-400 text-sm bg-gray-900/50">
                            Double-check your username and password. If you forgot your credentials, reset using our
                            reset password. Ensure the server is online before logging in.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo $this->themePath('js/collapse.js') ?>"></script>