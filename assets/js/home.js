document.addEventListener('click', (event) => {
    const trigger = event.target.closest('.dropdown-trigger');

    if (trigger) {
        const box = document.getElementById(trigger.getAttribute('aria-controls'));

        if (box) {
            const isOpen = box.classList.toggle('show');
            trigger.classList.toggle('active', isOpen);
            trigger.setAttribute('aria-expanded', String(isOpen));
        }

        return;
    }

    const option = event.target.closest('[data-filter-type][data-filter-value]');

    if (!option) {
        return;
    }

    const type = option.dataset.filterType;
    const selectedItem = document.getElementById(`selected-${type}`);
    const box = document.getElementById(`${type}-box`);
    const filterTrigger = box ? box.previousElementSibling : null;

    if (selectedItem) {
        selectedItem.textContent = option.dataset.filterValue;
    }

    if (box) {
        box.classList.remove('show');
    }

    if (filterTrigger) {
        filterTrigger.classList.remove('active');
        filterTrigger.setAttribute('aria-expanded', 'false');
    }
});
