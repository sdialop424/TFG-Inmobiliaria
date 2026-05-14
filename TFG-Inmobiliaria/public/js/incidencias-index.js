document.addEventListener('DOMContentLoaded', function () {
    const typeFilter = document.getElementById('typeFilter');
    const statusFilter = document.getElementById('statusFilter');
    const dateFilter = document.getElementById('dateFilter');
    const tableRows = document.querySelectorAll('.card-body table tbody tr');

    function normalizeText(text) {
        return text.trim().replace(/\s+/g, ' ').toUpperCase();
    }

    function filterIncidencias() {
        const selectedType = normalizeText(typeFilter.value || '');
        const selectedStatus = normalizeText(statusFilter.value || '');
        const selectedDate = dateFilter.value;

        tableRows.forEach(row => {
            const columns = row.querySelectorAll('td');
            const typeText = normalizeText(columns[2]?.textContent || '');
            const statusText = normalizeText(columns[3]?.textContent || '');
            const dateText = (columns[4]?.textContent || '').trim();
            const formattedDate = dateText ? dateText.split(' ')[0].split('/').reverse().join('-') : '';

            const matchesType = !selectedType || typeText === selectedType;
            const matchesStatus = !selectedStatus || statusText === selectedStatus;
            const matchesDate = !selectedDate || formattedDate === selectedDate;

            row.style.display = (matchesType && matchesStatus && matchesDate) ? '' : 'none';
        });
    }

    if (typeFilter) typeFilter.addEventListener('change', filterIncidencias);
    if (statusFilter) statusFilter.addEventListener('change', filterIncidencias);
    if (dateFilter) dateFilter.addEventListener('change', filterIncidencias);
});

document.addEventListener('DOMContentLoaded', function () {
    const rows = document.querySelectorAll('.inc-row');

    rows.forEach(row => {
        const button = row.querySelector('.accordion-btn');
        const accordion = row.nextElementSibling;

        const toggleAccordion = () => {
            accordion.classList.toggle('active');
            button.textContent = accordion.classList.contains('active') ? '▲' : '▼';
        };

        button.addEventListener('click', toggleAccordion);
        row.addEventListener('click', (e) => {
            if (e.target !== button) toggleAccordion();
        });
    });
});
