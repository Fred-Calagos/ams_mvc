let menuItems = document.querySelectorAll(".iocn-link");

menuItems.forEach(item => {
    item.addEventListener("click", (e) => {
        let parentLi = item.parentElement; // Get the parent <li>
        parentLi.classList.toggle("showMenu"); // Toggle the sub-menu visibility
    });
});

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");

sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});
