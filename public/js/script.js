document.addEventListener("DOMContentLoaded", function() {
    let sidebar = document.querySelector(".sidebar");
    let toggleBtn = document.createElement("button");
    toggleBtn.innerText = "☰";
    toggleBtn.style.position = "absolute";
    toggleBtn.style.top = "10px";
    toggleBtn.style.left = "10px";
    toggleBtn.style.background = "#333";
    toggleBtn.style.color = "#fff";
    toggleBtn.style.border = "none";
    toggleBtn.style.padding = "10px";
    
    document.body.appendChild(toggleBtn);

    toggleBtn.addEventListener("click", function() {
        sidebar.style.display = (sidebar.style.display === "none") ? "block" : "none";
    });
});


function toggleDisabilityOptions() {
    var disabilitySelect = document.getElementById("learnerDisability").value;
    var disabilityOptions = document.getElementById("disabilityOptions");

    if (disabilitySelect === "yes") {
      disabilityOptions.style.display = "block";  // Show disability options
    } else {
      disabilityOptions.style.display = "none";   // Hide disability options
    }
  }
  function toggleSublist(parentCheckboxId, sublistId) {
    var parentCheckbox = document.getElementById(parentCheckboxId);
    var sublist = document.getElementById(sublistId);

    // Show sublist only if parent checkbox is checked
    sublist.style.display = parentCheckbox.checked ? "block" : "none";
}