
 // Get references to the buttons
 const dashboardBtn = document.getElementById("dashboardBtn");
 const userManagementBtn = document.getElementById("userManagementBtn");
 const assetsBtn = document.getElementById("assetsBtn");
 const brokenItemsBtn = document.getElementById("brokenItemsBtn");
 const scrapItemsBtn = document.getElementById("scrapItemBtn");

 // Get references to the sections
 const dashboardSection = document.getElementById("dashboardSection");
 const userManagementSection = document.getElementById("userManagementSection");
 const assetsSection = document.getElementById("assetsSection");
 const brokenItemsSection = document.getElementById("brokenItemsSection");
 const scrapItemsSection = document.getElementById("scrapItemsSection");
 let locationName = document.getElementById("location");
 

 //Get references to asset table
 const assetTypeSection = document.getElementById("assetTypeSection");
 let assetName = document.getElementById("assetName");

 
 // Function to hide all sections
 function hideAllSections() {
     dashboardSection.classList.add("hidden");
     userManagementSection.classList.add("hidden");
     assetsSection.classList.add("hidden");
     brokenItemsSection.classList.add("hidden");
     scrapItemsSection.classList.add("hidden");
     assetTypeSection.classList.add("hidden");
 }
 function removeActiveButton(){
    dashboardBtn.classList.remove("background-color");
    userManagementBtn.classList.remove("background-color");
    assetsBtn.classList.remove("background-color");
    brokenItemsBtn.classList.remove("background-color");
    scrapItemsBtn.classList.remove("background-color");
 }
 function openAssetTable(deviceName) {
    hideAllSections();
    assetTypeSection.classList.remove("hidden")
    assetName.innerHTML = deviceName;
    let locationName2 = document.getElementById("location2");
    locationName2.innerHTML =" > "+ `<span class="hover:underline" id="location2">${deviceName}</span>`;
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
     locationName.innerHTML = '<span class="hover:underline">Dashboard</span> <span id="location2"></span>';
 });

 userManagementBtn.addEventListener("click", function() {
     hideAllSections();
     removeActiveButton();
     userManagementBtn.classList.add("background-color");
     userManagementSection.classList.remove("hidden");
     locationName.innerHTML = '<span class="hover:underline">User Management</span> <span id="location2"></span>';
 });

 assetsBtn.addEventListener("click", function() {
     hideAllSections();
     removeActiveButton();
     assetsBtn.classList.add("background-color");
     assetsSection.classList.remove("hidden");
     locationName.innerHTML = '<span class="hover:underline" id="assetsBtn2" onclick="assetBtn()">Assets</span>' + '<span id="location2"></span>';
 });
 function assetBtn(){
    hideAllSections();
    removeActiveButton();
    assetsBtn.classList.add("background-color");
    assetsSection.classList.remove("hidden");
    locationName.innerHTML = '<span class="hover:underline" id="assetsBtn2" onclick="assetBtn()">Assets</span>' + '<span id="location2"></span>';
 }
 brokenItemsBtn.addEventListener("click", function() {
     hideAllSections();
     removeActiveButton();
     brokenItemsBtn.classList.add("background-color");
     brokenItemsSection.classList.remove("hidden");
     locationName.innerHTML = '<span class="hover:underline">Broken Items </span> <span id="location2"></span>';
 });

 scrapItemsBtn.addEventListener("click", function() {
     hideAllSections();
     removeActiveButton();
     scrapItemsBtn.classList.add("background-color");
     scrapItemsSection.classList.remove("hidden");
     locationName.innerHTML = '<span class="hover:underline">Scrap Items</span> <span id="location2"></span>';
 });
