document.addEventListener("DOMContentLoaded", function () {
    let menuItems = document.querySelectorAll(".iocn-link");
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    let homeContent = document.querySelector(".home-content");
    let dropdownMenu = document.querySelector(".dropdown-menu");

    // Set sidebar default state to closed
    sidebar.classList.add("close");
    homeContent.style.left = "78px";
    homeContent.style.width = "calc(100% - 78px)";

    // Sidebar Toggle
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");

        // Adjust home-content dynamically
        if (sidebar.classList.contains("close")) {
            homeContent.style.left = "78px";
            homeContent.style.width = "calc(100% - 78px)";
        } else {
            homeContent.style.left = "260px";
            homeContent.style.width = "calc(100% - 260px)";
        }

        // Adjust dropdown position dynamically
        adjustDropdownPosition();
    });

    // Toggle Sub-Menus, ensuring only one is open at a time
    menuItems.forEach(item => {
        item.addEventListener("click", (e) => {
            let parentLi = item.parentElement;

            // Close other open sub-menus
            document.querySelectorAll(".nav-links li").forEach(li => {
                if (li !== parentLi) {
                    li.classList.remove("showMenu");
                }
            });

            // Toggle current sub-menu
            parentLi.classList.toggle("showMenu");
        });
    });

    // Close sidebar when clicking outside (optional)
    document.addEventListener("click", (event) => {
        if (!sidebar.contains(event.target) && !sidebarBtn.contains(event.target)) {
            sidebar.classList.add("close");
            homeContent.style.left = "78px";
            homeContent.style.width = "calc(100% - 78px)";
            adjustDropdownPosition();
        }
    });

    // Adjust dropdown position dynamically
    function adjustDropdownPosition() {
        if (sidebar.classList.contains("close")) {
            dropdownMenu.style.right = "20px"; // Shift dropdown more to the right
            dropdownMenu.style.left = "auto"; // Remove left alignment
        } else {
            dropdownMenu.style.right = "100px"; // Maintain original position when sidebar is open
            dropdownMenu.style.left = "auto";
        }
    }

    // Call function on load to ensure dropdown starts in correct position
    adjustDropdownPosition();
});
