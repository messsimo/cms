// Выборка элементов
const btnAddUserOpen = document.getElementById("openForm-btn");
const btnAddUserClose = document.getElementById("closeForm-btn");
const formAddUser = document.querySelector(".create-user--form");
const dashboardOverlay = document.querySelector(".overlay");

// Открытие окна
btnAddUserOpen.addEventListener("click", function() {
    formAddUser.classList.toggle("active");
    dashboardOverlay.classList.toggle("active");
});

// Закрытие окна
btnAddUserClose.addEventListener("click", function() {
    formAddUser.classList.toggle("active");
    dashboardOverlay.classList.toggle("active");
});