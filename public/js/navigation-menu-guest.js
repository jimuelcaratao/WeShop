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
    productContentSmall.classList.toggle('toggleNav');
});


productPrebuildSmall.addEventListener('mouseover', () => {
    preBuildContentSmall.style.display = "block";
    peripheralsContentSmall.style.display = "none";
    componentsContentSmall.style.display = "none";
    productPrebuildSmall.style.backgroundColor = "#047857";
});

productPeripheralsSmall.addEventListener('mouseover', () => {
    preBuildContentSmall.style.display = "none";
    peripheralsContentSmall.style.display = "block";
    componentsContentSmall.style.display = "none";
    productPrebuildSmall.style.backgroundColor = "#064E3B";
});

productComponentsSmall.addEventListener('mouseover', () => {
    preBuildContentSmall.style.display = "none";
    peripheralsContentSmall.style.display = "none";
    componentsContentSmall.style.display = "block";
    productPrebuildSmall.style.backgroundColor = "#064E3B";
});