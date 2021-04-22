const overlay = document.getElementById('overlay');
const productDropdown = document.getElementById('product-dropdown');
const productContent = document.getElementById('product-content');

// Navbar products content
const productPrebuild = document.getElementById('product-prebuild');
const productPeripherals = document.getElementById('product-peripherals');
const productComponents = document.getElementById('product-components');

// Navbar product items content
const preBuildContent = document.getElementById('prebuild-content');
const peripheralsContent = document.getElementById('peripherals-content');
const componentsContent = document.getElementById('components-content');

overlay.addEventListener('click', () => {
    overlay.classList.toggle('toggleNav');
    productContent.classList.toggle('toggleNav');
});

productDropdown.addEventListener('click', () => {
    overlay.classList.toggle('toggleNav');
    productContent.classList.toggle('toggleNav');
});

productPrebuild.addEventListener('mouseover', () => {
    preBuildContent.style.display = "block";
    peripheralsContent.style.display = "none";
    componentsContent.style.display = "none";
});

productPeripherals.addEventListener('mouseover', () => {
    preBuildContent.style.display = "none";
    peripheralsContent.style.display = "block";
    componentsContent.style.display = "none";
});

productComponents.addEventListener('mouseover', () => {
    preBuildContent.style.display = "none";
    peripheralsContent.style.display = "none";
    componentsContent.style.display = "block";
});


// For mobile users

const productDropdownSmall = document.getElementById('product-dropdown-small');
const productContentSmall = document.getElementById('product-content-small');

// Navbar products content
const productPrebuildSmall = document.getElementById('product-prebuild-small');
const productPeripheralsSmall = document.getElementById('product-peripherals-small');
const productComponentsSmall = document.getElementById('product-components-small');

// Navbar product items content
const preBuildContentSmall = document.getElementById('prebuild-content-small');
const peripheralsContentSmall = document.getElementById('peripherals-content-small');
const componentsContentSmall = document.getElementById('components-content-small');

productDropdownSmall.addEventListener('click', () => {
    const arrowDown = document.getElementById('arrow-down-med');
    arrowDown.classList.toggle('toggleRotate');
    productContentSmall.classList.toggle('toggleNav');
});


productPrebuildSmall.addEventListener('mouseover', () => {
    preBuildContentSmall.style.display = "block";
    peripheralsContentSmall.style.display = "none";
    componentsContentSmall.style.display = "none";
    productPrebuildSmall.style.backgroundColor = "#307672";
    productPeripheralsSmall.style.backgroundColor = "#1A3C40";
    productComponentsSmall.style.backgroundColor = "#1A3C40";
});

productPeripheralsSmall.addEventListener('mouseover', () => {
    preBuildContentSmall.style.display = "none";
    peripheralsContentSmall.style.display = "block";
    componentsContentSmall.style.display = "none";
    productPrebuildSmall.style.backgroundColor = "#1A3C40";
    productPeripheralsSmall.style.backgroundColor = "#307672";
    productComponentsSmall.style.backgroundColor = "#1A3C40";
});

productComponentsSmall.addEventListener('mouseover', () => {
    preBuildContentSmall.style.display = "none";
    peripheralsContentSmall.style.display = "none";
    componentsContentSmall.style.display = "block";
    productPrebuildSmall.style.backgroundColor = "#1A3C40";
    productPeripheralsSmall.style.backgroundColor = "#1A3C40";
    productComponentsSmall.style.backgroundColor = "#307672";
});

// Search for medium devices
const searchButton = document.getElementById('search-button');
const searchClose = document.getElementById('search-close');
const searchContainer = document.getElementById('search-container');
const searchOverlay = document.getElementById('search-overlay');

searchButton.addEventListener('click', () => {
    searchContainer.style.display = "block";
    searchOverlay.style.display = "block";
    document.body.style.overflowY = "hidden";
});

searchClose.addEventListener('click', () => {
    searchContainer.style.display = "none";
    searchOverlay.style.display = "none";
    document.body.style.overflowY = "auto";
});

searchOverlay.addEventListener('click', () => {
    searchContainer.style.display = "none";
    searchOverlay.style.display = "none";
    document.body.style.overflowY = "auto";
});

// Search for small devices
const searchButtonSmall = document.getElementById('search-button-small');

searchButtonSmall.addEventListener('click', () => {
    searchContainer.style.display = "block";
    searchOverlay.style.display = "block";
    document.body.style.overflowY = "hidden";
});
