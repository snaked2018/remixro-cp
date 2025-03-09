<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="mx-auto max-w-7xl px-4 md:px-0 background-img">
    <div class="relative isolate overflow-hidden pt-[22rem] md:pt-16 shadow-2xl sm:rounded-3xl sm:px-10 md:pt-24 lg:flex lg:gap-x-20 lg:pt-0 flex-col-reverse flex lg:flex-row">
        <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-column lg:py-32 lg:text-left z-10">
            <h2 class="text-3xl font-semibold tracking-tight text-balance text-white sm:text-5xl">
                <?php echo htmlspecialchars(Flux::message('WelcomeTitleLabel')) ?>
                <span style="color: var(--geist-primary);">
                    <?php echo htmlspecialchars(Flux::message('WelcomeTitleGradient')) ?>
                </span>
            </h2>
            <p class="mt-6 text-lg/8 text-sm text-pretty">
                <?php echo htmlspecialchars(Flux::message('WelcomeSubLabel')) ?>
                <?php echo htmlspecialchars(Flux::message('WelcomeSubGradient')) ?>
            </p>
            <div class="my-10 flex items-center justify-center gap-x-6 lg:justify-start">
                <a href="#" class="branding-green-button flex items-center gap-x-2">
                    Download now
                </a>
                <a href="#" class="text-sm/6 font-semibold text-white">
                    Marketplace <span aria-hidden="true">→</span>
                </a>
            </div>
			<div class="relative group">
            <div
                class="absolute -inset-1 bg-gradient-to-r from-green-600 to-green-400 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200">
            </div>
            <div
                class="relative px-7 py-2 bg-black ring-1 ring-gray-900/5 rounded-lg leading-none flex items-top justify-start space-x-6">
                <div class="space-y-2">
                    <p class="text-slate-800">Server: <span class="text-gradient">Online</span></p>
                </div>
            </div>
        </div>
        </div>
        <div class="relative my-auto flex items-center justify-center">
            <div>
                <img 
                    src="<?php echo $this->themePath('img/logo1.png') ?>" 
                    class="relative w-[500px] xs:w-[3rem] md:w-[10rem] lg:w-[5rem] top-[-355px] md:top-0 left-[16%] md:left-0 z-0 engrave-image-img"
                    alt="RemixRO Logo"
                >
            </div>
        </div>
    </div>
</div>

<div style="background: linear-gradient(to right, var(--geist-secondary), var(--accents-1));">
	<div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
		<div>
			<h2 class="text-3xl font-bold tracking-tight sm:text-4xl text-gradient">
				Quick Introduction
			</h2>
			<p class="mt-4 text-sm text-lg/8">
				Remix Ragnarok Online is redefining high-rate private servers this 2025, setting a new gold standard for immersive gameplay and innovation. Embark on an adventure like no other, featuring custom storyline quests, a groundbreaking stamina system, a thriving RMT marketplace, and cutting-edge features that challenge the boundaries of traditional gameplay. Whether you're a seasoned adventurer or a curious newcomer, this is your chance to shape your destiny in a world where every choice matters.
			</p>

			<dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
				<div class="border-t pt-4">
					<dt class="font-medium">Server Rates</dt>
					<p class="mt-2 text-sm"> Base-Job Level: 255/120</p>
					<p class="text-sm">Rates: 250x/250x/xModified.</p>
					<p class="text-sm">Drop Rate: Normal 1%  |  MVP 0.01%</p>
					<p class="text-sm">Equipment Rate: 5% > 30%</p>
					<p class="text-sm">Misc: 100% | Usable: 100%</p>
				</div>
				<div class="border-t pt-4">
					<dt class="font-medium">Game Protection</dt>
					<p class="mt-2 text-sm">Gepard 3.0</p>
					<p class="text-sm">Time-Based Delay System</p>
					<p class="text-sm">Overspeed Penalty</p>
				</div>
				<div class="border-t pt-4">
					<dt class="font-medium">Dimensions</dt>
					<p class="mt-2 text-sm">6.25" x 3.55" x 1.15"</p>
				</div>
				<div class="border-t pt-4">
					<dt class="font-medium">Finish</dt>
					<p class="mt-2 text-sm">Hand sanded and finished with natural oil</p>
				</div>
				<div class="border-t pt-4">
					<dt class="font-medium">Includes</dt>
					<p class="mt-2 text-sm">Wood card tray and 3 refill packs</p>
				</div>
				<div class="border-t pt-4">
					<dt class="font-medium">Considerations</dt>
					<p class="mt-2 text-sm">
						Made from natural materials. Grain and color vary with each item.
					</p>
				</div>
			</dl>
		</div>
		<div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
			<img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/product-feature-03-detail-01.jpg" 
				alt="Walnut card tray with white powder coated steel divider and 3 punchout holes." 
				class="rounded-lg bg-gray-100">
			<img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/product-feature-03-detail-02.jpg" 
				alt="Top down view of walnut card tray with embedded magnets and card groove." 
				class="rounded-lg bg-gray-100">
			<img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/product-feature-03-detail-03.jpg" 
				alt="Side of walnut card tray with card groove and recessed card area." 
				class="rounded-lg bg-gray-100">
			<img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/product-feature-03-detail-04.jpg" 
				alt="Walnut card tray filled with cards and card angled in dedicated groove." 
				class="rounded-lg bg-gray-100">
		</div>
	</div>
</div>

<?php if(Flux::config('CMSNewsOnHomepage')): ?>
    <h2><?php echo htmlspecialchars(sprintf(Flux::message('MainPageWelcome'), Flux::config('SiteTitle'))) ?></h2>

    <?php if($newstype == '1'): ?>
        <?php if($news): ?>
            <div class="newsDiv">
                <?php foreach($news as $nrow): ?>
                    <h4><?php echo $nrow->title ?></h4>
                    <div class="newsCont">
                        <span class="newsDate">
                            <small>by <?php echo $nrow->author ?> on 
                                <?php echo date(Flux::config('DateFormat'), strtotime($nrow->created)) ?>
                            </small>
                        </span>
                        <p><?php echo $nrow->body ?></p>
                        <?php if($nrow->created != $nrow->modified && Flux::config('CMSDisplayModifiedBy')): ?>
                            <small>
                                <?php echo htmlspecialchars(Flux::message('CMSModifiedLabel')) ?> : 
                                <?php echo date(Flux::config('DateFormat'), strtotime($nrow->modified)) ?>
                            </small>
                        <?php endif; ?>
                        <?php if($nrow->link): ?>
                            <a class="news_link" href="<?php echo $nrow->link ?>">
                                <small><?php echo htmlspecialchars(Flux::message('CMSNewsLink')) ?></small>
                            </a>
                            <div class="clear"></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?> 
            </div>
        <?php else: ?>
            <p><?php echo htmlspecialchars(Flux::message('CMSNewsEmpty')) ?></p>
        <?php endif ?>

    <?php elseif($newstype == '2'): ?>
        <?php if(isset($xml) && isset($xml->channel)): ?>
            <div class="newsDiv">
                <?php foreach($xml->channel->item as $rssItem): ?>
                    <?php $i++; if($i <= $newslimit): ?>
                        <h2><?php echo $rssItem->title ?></h2>
                        <div class="newsCont">
                            <span class="newsDate">
                                <small>Posted on 
                                    <?php echo date(Flux::config('DateFormat'), strtotime($rssItem->pubDate)) ?>
                                </small>
                            </span>
                            <p><?php echo $rssItem->description ?></p>
                            <a class="news_link" href="<?php echo $rssItem->link ?>">
                                <small><?php echo htmlspecialchars(Flux::message('CMSNewsLink')) ?></small>
                            </a>
                            <div class="clear"></div>
                        </div>
                    <?php endif ?>
                <?php endforeach; ?> 
            </div>
        <?php else: ?>
            <p><?php echo htmlspecialchars(Flux::message('CMSNewsRSSNotFound')) ?><br/><br/></p>
        <?php endif ?>
    <?php endif ?>

<?php else: ?>
    <h2><?php echo htmlspecialchars(Flux::message('MainPageHeading')) ?></h2>
    <p><strong><?php echo htmlspecialchars(Flux::message('MainPageInfo')) ?></strong></p>
    <p><?php echo htmlspecialchars(Flux::message('MainPageInfo2')) ?></p>
    <ol>
        <li><p class="green">
            <?php echo htmlspecialchars(sprintf(Flux::message('MainPageStep1'), __FILE__)) ?>
        </p></li>
        <li><p class="green">
            <?php echo htmlspecialchars(Flux::message('MainPageStep2')) ?>
        </p></li>
    </ol>
    <p style="text-align: right">
        <strong><em><?php echo htmlspecialchars(Flux::message('MainPageThanks')) ?></em></strong>
    </p>
<?php endif ?>
