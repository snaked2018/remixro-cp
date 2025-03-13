function toggleCards() {
    const moreCards = document.getElementById('moreCards');
    const viewMoreBtn = document.getElementById('viewMoreBtn');
    const isExpanded = !moreCards.classList.contains('hidden');
    
    if (!isExpanded) {
        moreCards.classList.remove('hidden');
        moreCards.classList.add('block');
        viewMoreBtn.innerHTML = `
            <span>View Less</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 rotate-180">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        `;
        viewMoreBtn.setAttribute('data-state', 'expanded');
    } else {
        moreCards.classList.add('hidden');
        moreCards.classList.remove('block');
        viewMoreBtn.innerHTML = `
            <span>View More</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        `;
        viewMoreBtn.setAttribute('data-state', 'collapsed');
        // Smooth scroll to cards section
        moreCards.previousElementSibling.scrollIntoView({ behavior: 'smooth' });
    }
}