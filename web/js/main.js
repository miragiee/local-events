document.addEventListener('DOMContentLoaded', function () {
    console.log("Скрипт подключен");

    // Этапы регистрации
    const userInput1 = document.getElementById('user-input-1');
    const userInput2 = document.getElementById('user-input-2');
    const continueBtn = document.getElementById('continue-btn');

    if (continueBtn && userInput1 && userInput2) {
        continueBtn.addEventListener('click', function () {
            userInput1.hidden = true;
            userInput2.hidden = false;
        });
    }

    // Обновление аватара
    const fileInput = document.getElementById('avatar-upload');
    const avatarImg = document.getElementById('profile-avatar-img');
    const deleteBtn = document.getElementById('delete-avatar-btn');
    const deleteFlag = document.getElementById('delete-avatar-flag');

    if (fileInput && avatarImg && deleteBtn && deleteFlag) {
        const defaultAvatar = avatarImg.dataset.default;

        fileInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                deleteFlag.value = '0';

                const reader = new FileReader();
                reader.onload = function (e) {
                    avatarImg.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        deleteBtn.addEventListener('click', function () {
            deleteFlag.value = '1';
            avatarImg.src = defaultAvatar;
            fileInput.value = '';
        });
    }

    // Запись на мероприятие
    const toggleBtns = document.querySelectorAll('.event-toggle-btn');

    toggleBtns.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            const eventId = this.dataset.eventId;
            const action = this.dataset.action;
            const isRegistering = action === 'register';
            const fetchUrl = isRegistering ? this.dataset.urlRegister : this.dataset.urlCancel;

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const btnElement = this;

            fetch(fetchUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-Token': csrfToken
                },
                body: 'event_id=' + encodeURIComponent(eventId)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (isRegistering) {
                            btnElement.textContent = 'Отменить';
                            btnElement.className = 'cancel accent-btn event-toggle-btn';
                            btnElement.dataset.action = 'cancel';
                        } else {
                            btnElement.textContent = btnElement.dataset.defaultText;
                            btnElement.className = 'accent-btn event-toggle-btn';
                            btnElement.dataset.action = 'register';
                        }

                        const participantsCountElement = document.querySelector(`.participants-count[data-event-id="${eventId}"]`);
                        if (participantsCountElement && data.count !== undefined) {
                            participantsCountElement.textContent = data.count;
                        }

                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Ошибка:', error);
                    alert('Произошла ошибка при отправке запроса.');
                });
        });
    });

    // Фильтры
    const filterForm = document.querySelector('.filters');

    if (filterForm) {
        const filterInputs = filterForm.querySelectorAll('select, input[type="radio"], input[type="date"]');

        filterInputs.forEach(function (input) {
            input.addEventListener('change', function () {
                filterForm.submit();
            });
        });
    }

    // Мобильное меню
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function (e) {
            e.preventDefault();
            mobileMenu.classList.toggle('active');
        });

        const menuLinks = mobileMenu.querySelectorAll('nav a');
        menuLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                mobileMenu.classList.remove('active');
            });
        });

        document.addEventListener('click', function (e) {
            if (!mobileMenu.contains(e.target) && mobileMenu.classList.contains('active')) {
                mobileMenu.classList.remove('active');
            }
        });
    }

    // Мобильное меню фильтров
    const filtersToggleBtn = document.querySelector('.filters-toggle-button');
    const filterOptions = document.querySelector('.filter-options');

    if (filtersToggleBtn && filterOptions) {
        filtersToggleBtn.addEventListener('click', function (e) {
            e.preventDefault();
            filterOptions.classList.toggle('active');
        });

        document.addEventListener('click', function (e) {
            if (!filterOptions.contains(e.target) && !filtersToggleBtn.contains(e.target)) {
                filterOptions.classList.remove('active');
            }
        });
    }
});