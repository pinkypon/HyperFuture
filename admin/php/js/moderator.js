 //DI PA NA OPTIMIZED CODE
 
 
 
 // Get references to the buttons
 const dashboardBtn = document.getElementById("dashboardBtn");
 const assetsBtn = document.getElementById("assetsBtn");
 const brokenItemsBtn = document.getElementById("brokenItemsBtn");
 const scrapItemsBtn = document.getElementById("scrapItemBtn");

 // Get references to the sections
 const dashboardSection = document.getElementById("dashboardSection");
 const assetsSection = document.getElementById("assetsSection");
 const brokenItemsSection = document.getElementById("brokenItemsSection");
 const scrapItemsSection = document.getElementById("scrapItemsSection");
 const locationName = document.getElementById("location");

 // Function to hide all sections
 function hideAllSections() {
     dashboardSection.classList.add("hidden");
     assetsSection.classList.add("hidden");
     brokenItemsSection.classList.add("hidden");
     scrapItemsSection.classList.add("hidden");
 }
 function removeActiveButton(){
    dashboardBtn.classList.remove("background-color");
    assetsBtn.classList.remove("background-color");
    brokenItemsBtn.classList.remove("background-color");
    scrapItemsBtn.classList.remove("background-color");
 }

 // Event listeners for each button
 document.addEventListener("DOMContentLoaded", function() {
    hideAllSections();  // Hide all sections
    removeActiveButton();
    dashboardBtn.classList.add("background-color");
    dashboardSection.classList.remove("hidden");  // Show the Dashboard by default
});

 dashboardBtn.addEventListener("click", function() {
     hideAllSections();
     removeActiveButton();
     dashboardBtn.classList.add("background-color");
     dashboardSection.classList.remove("hidden");
     locationName.innerHTML = "Dashboard";
 });
 assetsBtn.addEventListener("click", function() {
     hideAllSections();
     removeActiveButton();
     assetsBtn.classList.add("background-color");
     assetsSection.classList.remove("hidden");
     locationName.innerHTML = "Assets";
 });
 brokenItemsBtn.addEventListener("click", function() {
     hideAllSections();
     removeActiveButton();
     brokenItemsBtn.classList.add("background-color");
     brokenItemsSection.classList.remove("hidden");
     locationName.innerHTML = "Broken Items";
 });
 scrapItemsBtn.addEventListener("click", function() {
     hideAllSections();
     removeActiveButton();
     scrapItemsBtn.classList.add("background-color");
     scrapItemsSection.classList.remove("hidden");
     locationName.innerHTML = "Scrap Items";
 });


 