document.addEventListener('DOMContentLoaded', function() {
    const accordionTriggers = document.querySelectorAll('.accordion-trigger');
    
    accordionTriggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            const targetId = trigger.getAttribute('data-target');
            const content = document.getElementById(targetId);
            const icon = trigger.querySelector('svg');
            
            // Close all other panels
            document.querySelectorAll('.accordion-content').forEach(panel => {
                if (panel.id !== targetId) {
                    panel.style.maxHeight = '0';
                    const otherIcon = panel.previousElementSibling.querySelector('svg');
                    otherIcon.style.transform = 'rotate(0deg)';
                }
            });
            
            // Toggle current panel
            if (content.style.maxHeight === '0px' || !content.style.maxHeight) {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            } else {
                content.style.maxHeight = '0';
                icon.style.transform = 'rotate(0deg)';
            }
        });
    });
});