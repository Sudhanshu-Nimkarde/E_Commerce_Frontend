(function () {
    document.addEventListener('DOMContentLoaded', function () {
        initMobileMenu();
        initCountdownTimers();
        initPasswordToggles();
        initRegisterForm();
    });

    function initMobileMenu() {
        const toggleButton = document.querySelector('[data-mobile-menu-toggle]');
        const mobileNav = document.querySelector('[data-mobile-menu]');

        if (!toggleButton || !mobileNav) {
            return;
        }

        const closeMenu = function () {
            mobileNav.classList.remove('is-open');
            toggleButton.classList.remove('is-active');
            toggleButton.setAttribute('aria-expanded', 'false');
        };

        toggleButton.addEventListener('click', function () {
            const isOpen = mobileNav.classList.toggle('is-open');
            toggleButton.classList.toggle('is-active', isOpen);
            toggleButton.setAttribute('aria-expanded', String(isOpen));
        });

        mobileNav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                if (window.innerWidth < 992) {
                    closeMenu();
                }
            });
        });

        window.addEventListener('resize', function () {
            if (window.innerWidth >= 992) {
                closeMenu();
            }
        });
    }

    function initCountdownTimers() {
        document.querySelectorAll('.js-countdown').forEach(function (timer) {
            const endDate = parseEndDate(timer.dataset.countdownEnd);
            if (!endDate) {
                return;
            }

            const fields = {
                days: timer.querySelector('[data-unit="days"]'),
                hours: timer.querySelector('[data-unit="hours"]'),
                minutes: timer.querySelector('[data-unit="minutes"]'),
                seconds: timer.querySelector('[data-unit="seconds"]'),
            };

            if (!fields.days || !fields.hours || !fields.minutes || !fields.seconds) {
                return;
            }

            const render = function () {
                const diff = Math.max(0, endDate.getTime() - Date.now());
                const totalSeconds = Math.floor(diff / 1000);

                const days = Math.floor(totalSeconds / 86400);
                const hours = Math.floor((totalSeconds % 86400) / 3600);
                const minutes = Math.floor((totalSeconds % 3600) / 60);
                const seconds = totalSeconds % 60;

                fields.days.textContent = padNumber(days);
                fields.hours.textContent = padNumber(hours);
                fields.minutes.textContent = padNumber(minutes);
                fields.seconds.textContent = padNumber(seconds);
            };

            render();
            const intervalId = window.setInterval(function () {
                render();

                if (endDate.getTime() - Date.now() <= 0) {
                    window.clearInterval(intervalId);
                }
            }, 1000);
        });
    }

    function parseEndDate(value) {
        if (!value) {
            return new Date(Date.now() + (8 * 24 * 60 * 60 * 1000));
        }

        const parsed = new Date(value);
        if (Number.isNaN(parsed.getTime())) {
            return new Date(Date.now() + (8 * 24 * 60 * 60 * 1000));
        }

        return parsed;
    }

    function padNumber(value) {
        return String(value).padStart(2, '0');
    }

    function initPasswordToggles() {
        document.querySelectorAll('[data-toggle-password]').forEach(function (button) {
            const targetSelector = button.dataset.target;
            const passwordInput = targetSelector
                ? document.querySelector(targetSelector)
                : button.closest('.password-group')?.querySelector('input');

            if (!passwordInput) {
                return;
            }

            const passwordIcon = button.querySelector('[data-password-icon]') || button.querySelector('i');

            button.addEventListener('click', function () {
                const isHidden = passwordInput.type === 'password';
                passwordInput.type = isHidden ? 'text' : 'password';

                if (passwordIcon) {
                    passwordIcon.classList.toggle('fa-eye', !isHidden);
                    passwordIcon.classList.toggle('fa-eye-slash', isHidden);
                }

                button.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
            });
        });
    }

    function initRegisterForm() {
        const form = document.getElementById('registerForm');
        if (!form) {
            return;
        }

        const submitButton = form.querySelector('[type="submit"]');
        const buttonLabel = submitButton ? submitButton.textContent.trim() : 'Register';
        const redirectUrl = form.dataset.successRedirect || '/login';

        if (submitButton && !submitButton.dataset.defaultLabel) {
            submitButton.dataset.defaultLabel = buttonLabel;
        }

        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            clearValidationErrors(form);
            setButtonState(submitButton, true, 'Creating account...');

            try {
                const response = await fetch(form.action || '/addUser', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': getCsrfToken(),
                    },
                    body: new FormData(form),
                });

                const data = await response.json().catch(function () {
                    return {};
                });

                if (response.ok && data.status) {
                    await showAlert({
                        icon: 'success',
                        title: 'Success',
                        text: data.message || 'Account created successfully.',
                        timer: 1800,
                        showConfirmButton: false,
                    });

                    window.location.href = data.redirect || redirectUrl;
                    return;
                }

                if (response.status === 422 && data.errors) {
                    renderValidationErrors(form, data.errors);
                    return;
                }

                await showAlert({
                    icon: 'error',
                    title: 'Oops!',
                    text: data.message || 'Something went wrong. Please try again.',
                });
            } catch (error) {
                await showAlert({
                    icon: 'error',
                    title: 'Unexpected Error',
                    text: 'Something went wrong. Please try again.',
                });
            } finally {
                setButtonState(submitButton, false, buttonLabel);
            }
        });
    }

    function clearValidationErrors(form) {
        form.querySelectorAll('.text-danger').forEach(function (node) {
            node.textContent = '';
        });
    }

    function renderValidationErrors(form, errors) {
        Object.keys(errors).forEach(function (key) {
            const node = form.querySelector('#' + key + '_error');
            if (node) {
                node.textContent = errors[key][0];
            }
        });
    }

    function setButtonState(button, isLoading, label) {
        if (!button) {
            return;
        }

        button.disabled = isLoading;
        button.textContent = isLoading ? label : button.dataset.defaultLabel || label;
        button.classList.toggle('is-loading', isLoading);
    }

    function getCsrfToken() {
        const tokenMeta = document.querySelector('meta[name="csrf-token"]');
        return tokenMeta ? tokenMeta.getAttribute('content') || '' : '';
    }

    function showAlert(options) {
        if (window.Swal && typeof window.Swal.fire === 'function') {
            return window.Swal.fire(options);
        }

        if (options && options.text) {
            window.alert(options.text);
        }

        return Promise.resolve();
    }
})();
