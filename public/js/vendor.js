(function ($) {
    'use strict';

    function closeSidebar() {
        $('body').removeClass('vendor-sidebar-open');
    }

    function closeDropdowns(except) {
        $('[data-vendor-dropdown]').not(except).removeClass('is-open');
    }

    function applyFilters() {
        $('[data-vendor-filter-input]').each(function () {
            var $input = $(this);
            var targetSelector = $input.attr('data-vendor-filter-input');
            var query = ($input.val() || '').toString().trim().toLowerCase();
            var $target = $(targetSelector);

            if (!$target.length) {
                return;
            }

            $target.find('[data-vendor-filter-row]').each(function () {
                var $row = $(this);
                var text = ($row.attr('data-filter-text') || $row.text() || '').toLowerCase();
                $row.toggle(!query || text.indexOf(query) !== -1);
            });
        });
    }

    $(function () {
        var $body = $('body');

        $('[data-vendor-sidebar-toggle]').on('click', function () {
            $body.toggleClass('vendor-sidebar-open');
        });

        $('[data-vendor-sidebar-close], [data-vendor-backdrop]').on('click', function () {
            closeSidebar();
        });

        $('[data-vendor-sidebar-collapse]').on('click', function () {
            if (window.matchMedia('(min-width: 992px)').matches) {
                $body.toggleClass('vendor-sidebar-collapsed');
            } else {
                $body.addClass('vendor-sidebar-open');
            }
        });

        $('[data-vendor-dropdown-toggle]').on('click', function (event) {
            event.preventDefault();
            var $dropdown = $(this).closest('[data-vendor-dropdown]');
            var isOpen = $dropdown.hasClass('is-open');
            closeDropdowns($dropdown);
            $dropdown.toggleClass('is-open', !isOpen);
        });

        $(document).on('click', function (event) {
            if (!$(event.target).closest('[data-vendor-dropdown]').length) {
                closeDropdowns();
            }
        });

        $(document).on('keydown', function (event) {
            if (event.key === 'Escape') {
                closeSidebar();
                closeDropdowns();
            }
        });

        $('[data-vendor-filter-input]').on('input change', applyFilters);

        $(window).on('resize', function () {
            if (window.matchMedia('(min-width: 992px)').matches) {
                $body.removeClass('vendor-sidebar-open');
            } else {
                $body.removeClass('vendor-sidebar-collapsed');
            }
        });
    });
})(jQuery);
