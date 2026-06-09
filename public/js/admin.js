(function () {
    document.addEventListener('DOMContentLoaded', function () {
        initAdminFilters();
    });

    function initAdminFilters() {
        document.querySelectorAll('[data-admin-filter-input]').forEach(function (input) {
            var targetSelector = input.getAttribute('data-admin-filter-input');
            var target = targetSelector ? document.querySelector(targetSelector) : null;

            if (!target) {
                return;
            }

            var rows = target.querySelectorAll('[data-admin-filter-row]');

            function applyFilter() {
                var query = input.value.trim().toLowerCase();

                rows.forEach(function (row) {
                    var text = (row.getAttribute('data-filter-text') || row.textContent || '').toLowerCase();
                    row.classList.toggle('d-none', !!query && text.indexOf(query) === -1);
                });
            }

            input.addEventListener('input', applyFilter);
            input.addEventListener('change', applyFilter);
        });
    }
})();
