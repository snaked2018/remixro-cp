<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php if(Flux::config('CMSNewsOnHomepage')): ?>
<div class="pt-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0 flex flex-col justify-center md:justify-start">
            <h2 class="text-3xl font-semibold tracking-tight text-white sm:text-5xl">
                <?php echo htmlspecialchars(Flux::message('CMSNewsHeader')) ?>
            </h2>
            <p class="text-lg text-gray-400 flex flex-col justify-center md:justify-start">Stay updated with the latest announcements and updates.</p>
        </div>

        <?php if($newstype == '1' && $news): ?>
            <div class="swiper newsIndexSwiper mt-4">
                <div class="swiper-wrapper">
                    <?php foreach($news as $nrow): ?>
                        <div class="swiper-slide">
                            <article class="flex max-w-xl flex-col items-start justify-between h-full">
                                <div class="flex items-center gap-x-4 text-xs p-2 bg-gray-800 rounded">
                                    <time datetime="<?php echo date('Y-m-d', strtotime($nrow->created)) ?>" class="text-gray-400">
                                        <?php echo date(Flux::config('DateFormat'), strtotime($nrow->created)) ?>
                                    </time>
                                    <?php if($nrow->created != $nrow->modified && Flux::config('CMSDisplayModifiedBy')): ?>
                                        <span class="text-gray-400">
                                            Updated: <?php echo date('m-d-y', strtotime($nrow->modified)) ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="group relative" style="color: var(--geist-foreground) !important;">
                                    <h3 class="mt-3 text-lg font-semibold leading-6 text-white group-hover:text-indigo-400">
                                        <a href="<?php echo $this->url('news', 'view', array('id' => $nrow->id)) ?>" class="text-white">
                                            <span class="absolute inset-0 text-white"></span>
                                            <?php echo htmlspecialchars($nrow->title) ?>
                                        </a>
                                    </h3>
                                    <div class="mt-5 line-clamp-3 text-sm leading-6 text-gray-400">
                                        <?php echo strip_tags(substr($nrow->body, 0, 200)) . '...' ?>
                                    </div>
                                </div>
                                <div class="relative mt-8 flex gap-4 md:gap-0 flex-col md:flex-row items-center justify-between w-full">
                                    <div class="text-sm leading-6 flex items-center gap-x-2">
                                        <img 
                                            src="<?php echo $this->themePath('img/remix.png') ?>" 
                                            alt="Author avatar" 
                                            class="h-8 w-8 rounded-full bg-gray-800"
                                        />
                                        <p class="font-semibold text-white">
                                            <?php echo htmlspecialchars($nrow->author) ?>
                                        </p>
                                    </div>
                                    <button onclick="openNewsModal(<?php echo htmlspecialchars(json_encode([
                                        'id' => $nrow->id,
                                        'title' => $nrow->title,
                                        'body' => $nrow->body,
                                        'author' => $nrow->author,
                                        'created' => date(Flux::config('DateFormat'), strtotime($nrow->created)),
                                        'modified' => $nrow->modified ? date(Flux::config('DateFormat'), strtotime($nrow->modified)) : null,
                                        'link' => $nrow->link
                                    ])) ?>)"
                                            class="news-btn inline-flex items-center px-4 py-2 w-full md:w-auto justify-center md:w-0 branding-green-button text-sm font-medium rounded-md">
                                        <span>View Details</span>
                                        <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        <?php else: ?>
            <div class="mt-16 text-center text-gray-400">
                <?php echo htmlspecialchars(Flux::message('CMSNewsEmpty')) ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- News Modal -->
<div id="newsModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black bg-opacity-75 transition-opacity"></div>
            
            <div class="relative bg-black rounded-lg max-w-3xl w-full mx-auto p-6" style="border: 1px solid var(--geist-primary);">
                <div class="absolute right-4 top-4">
                    <button onclick="closeNewsModal()" class="text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div id="modalContent" class="mt-4"></div>
            </div>
        </div>
    </div>
<?php endif; ?>
