document.addEventListener('DOMContentLoaded', function () {
    console.log("Скрипт подключен");

    // Регистрация
    const userInput1 = document.getElementById('user-input-1');
    const userInput2 = document.getElementById('user-input-2');
    const continueBtn = document.getElementById('continue-btn')

    if (continueBtn && userInput1 && userInput2) {
        continueBtn.addEventListener('click', function () {
            userInput1.hidden = true;
            userInput2.hidden = false;
        })
    }

    // Работа с аватаром на странице профиля
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

});