let userInput1 = document.getElementById('user-input-1'); 
let userInput2 = document.getElementById('user-input-2'); 

console.log("Скрипт подключен");

document.getElementById('continue-btn').addEventListener('click', function hideStep1() {
    userInput1.hidden = true; 
    userInput2.hidden = false; 
});
