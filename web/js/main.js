document.addEventListener('DOMContentLoaded', function () {
    console.log("Скрипт подключен");

    const userInput1 = document.getElementById('user-input-1');
    const userInput2 = document.getElementById('user-input-2');
    const continueBtn = document.getElementById('continue-btn');

    if (continueBtn && userInput1 && userInput2) {
        continueBtn.addEventListener('click', function () {
            userInput1.hidden = true;
            userInput2.hidden = false;
        });
    }

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
                            btnElement.className = 'cancel event-toggle-btn';
                            btnElement.dataset.action = 'cancel';
                        } else {
                            btnElement.textContent = 'Записаться';
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
});