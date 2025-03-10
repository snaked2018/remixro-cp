
// Initialize Swiper
const swiper = new Swiper(".newsIndexSwiper", {
    slidesPerView: 1.1,
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        640: {
            slidesPerView: 1.3,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});

function openNewsModal(newsData) {
    const modal = document.getElementById('newsModal');
    const content = document.getElementById('modalContent');

    content.innerHTML = `
                        <div class="prose prose-invert max-w-none">
                            <div class="flex items-center gap-x-4 text-xs mb-4">
                                <time datetime="${newsData.created}" class="text-gray-400">
                                    ${newsData.created}
                                </time>
                                ${newsData.modified !== newsData.created ? `
                                    <span class="text-gray-400">
                                        Updated: ${newsData.modified}
                                    </span>
                                ` : ''}
                            </div>
                            <h2 class="text-2xl font-bold text-white pb-4">${newsData.title}</h2>
                            <div class="text-gray-300">${newsData.body}</div>
                            <div class="mt-8 flex items-center justify-between">
                                <p class="text-sm font-semibold text-white">${newsData.author}</p>
                                ${newsData.link ? `
                                    <a href="${newsData.link}" class="text-indigo-400 hover:text-indigo-300">
                                        External Link →
                                    </a>
                                ` : ''}
                            </div>
                        </div>
                    `;

    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeNewsModal() {
    const modal = document.getElementById('newsModal');
    modal.classList.add('hidden');
    document.body.style.overflow = '';
}

// Close modal when clicking outside
document.getElementById('newsModal').addEventListener('click', (e) => {
    if (e.target === e.currentTarget) {
        closeNewsModal();
    }
});

// Close modal on escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeNewsModal();
    }
});