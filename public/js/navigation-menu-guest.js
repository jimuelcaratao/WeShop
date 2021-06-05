const overlay = document.getElementById("overlay");
const productDropdown = document.getElementById("product-dropdown");
const productContent = document.getElementById("product-content");

// Navbar products content
const productPrebuild = document.getElementById("product-prebuild");
const productPeripherals = document.getElementById("product-peripherals");
const productComponents = document.getElementById("product-components");
const productMobileDevices = document.getElementById("product-mobiledevices");

// Navbar product items content
const preBuildContent = document.getElementById("prebuild-content");
const peripheralsContent = document.getElementById("peripherals-content");
const componentsContent = document.getElementById("components-content");
const mobileDevicesContent = document.getElementById("mobiledevices-content");

overlay.addEventListener("click", () => {
    overlay.classList.toggle("toggleNav");
    productContent.classList.toggle("toggleNav");
    document.body.style.overflowY = "auto";
});

productDropdown.addEventListener("click", () => {
    overlay.classList.toggle("toggleNav");
    productContent.classList.toggle("toggleNav");
    document.body.style.overflowY = "hidden";
});

productPrebuild.addEventListener("mouseover", () => {
    preBuildContent.style.display = "block";
    peripheralsContent.style.display = "none";
    componentsContent.style.display = "none";
    mobileDevicesContent.style.display = "none";
    // productPrebuild.style.backgroundColor = "#307672";
    // productPeripherals.style.backgroundColor = "#1A3C40";
    // productComponents.style.backgroundColor = "#1A3C40";
});

productPeripherals.addEventListener("mouseover", () => {
    preBuildContent.style.display = "none";
    peripheralsContent.style.display = "block";
    componentsContent.style.display = "none";
    mobileDevicesContent.style.display = "none";

    // productPrebuild.style.backgroundColor = "#1A3C40";
    // productPeripherals.style.backgroundColor = "#307672";
    // productComponents.style.backgroundColor = "#1A3C40";
});

productMobileDevices.addEventListener("mouseover", () => {
    preBuildContent.style.display = "none";
    peripheralsContent.style.display = "none";
    componentsContent.style.display = "none";
    mobileDevicesContent.style.display = "block";
    // productPrebuild.style.backgroundColor = "#1A3C40";
    // productPeripherals.style.backgroundColor = "#1A3C40";
    // productComponents.style.backgroundColor = "#307672";
});

productComponents.addEventListener("mouseover", () => {
    preBuildContent.style.display = "none";
    peripheralsContent.style.display = "none";
    componentsContent.style.display = "block";
    mobileDevicesContent.style.display = "none";
    // productPrebuild.style.backgroundColor = "#1A3C40";
    // productPeripherals.style.backgroundColor = "#1A3C40";
    // productComponents.style.backgroundColor = "#307672";
});

// For mobile users

const productDropdownSmall = document.getElementById("product-dropdown-small");
const productContentSmall = document.getElementById("product-content-small");

// Navbar products content
const productPrebuildSmall = document.getElementById("product-prebuild-small");
const productPeripheralsSmall = document.getElementById(
    "product-peripherals-small"
);
const productComponentsSmall = document.getElementById(
    "product-components-small"
);
const productMobileDevicesSmall = document.getElementById(
    "product-mobiledevices-small"
);

// Navbar product items content
const preBuildContentSmall = document.getElementById("prebuild-content-small");
const peripheralsContentSmall = document.getElementById(
    "peripherals-content-small"
);
const componentsContentSmall = document.getElementById(
    "components-content-small"
);
const mobileDevicesContentSmall = document.getElementById(
    "mobiledevices-content-small"
);

productDropdownSmall.addEventListener("click", () => {
    const arrowDown = document.getElementById("arrow-down-med");
    arrowDown.classList.toggle("toggleRotate");
    productContentSmall.classList.toggle("toggleNav");
});

productPrebuildSmall.addEventListener("mouseover", () => {
    preBuildContentSmall.style.display = "block";
    peripheralsContentSmall.style.display = "none";
    componentsContentSmall.style.display = "none";
    mobileDevicesContentSmall.style.display = "none";

    productPrebuildSmall.style.backgroundColor = "#307672";
    productPeripheralsSmall.style.backgroundColor = "#1A3C40";
    productComponentsSmall.style.backgroundColor = "#1A3C40";
    productMobileDevicesSmall.style.backgroundColor = "#1A3C40";
});

productPeripheralsSmall.addEventListener("mouseover", () => {
    preBuildContentSmall.style.display = "none";
    peripheralsContentSmall.style.display = "block";
    componentsContentSmall.style.display = "none";
    mobileDevicesContentSmall.style.display = "none";

    productPrebuildSmall.style.backgroundColor = "#1A3C40";
    productPeripheralsSmall.style.backgroundColor = "#307672";
    productComponentsSmall.style.backgroundColor = "#1A3C40";
    productMobileDevicesSmall.style.backgroundColor = "#1A3C40";
});

productComponentsSmall.addEventListener("mouseover", () => {
    preBuildContentSmall.style.display = "none";
    peripheralsContentSmall.style.display = "none";
    componentsContentSmall.style.display = "block";
    mobileDevicesContentSmall.style.display = "none";

    productPrebuildSmall.style.backgroundColor = "#1A3C40";
    productPeripheralsSmall.style.backgroundColor = "#1A3C40";
    productComponentsSmall.style.backgroundColor = "#307672";
    productMobileDevicesSmall.style.backgroundColor = "#1A3C40";
});

productMobileDevicesSmall.addEventListener("mouseover", () => {
    preBuildContentSmall.style.display = "none";
    peripheralsContentSmall.style.display = "none";
    componentsContentSmall.style.display = "none";
    mobileDevicesContentSmall.style.display = "block";

    productPrebuildSmall.style.backgroundColor = "#1A3C40";
    productPeripheralsSmall.style.backgroundColor = "#1A3C40";
    productComponentsSmall.style.backgroundColor = "#1A3C40";
    productMobileDevicesSmall.style.backgroundColor = "#307672";
});

// Search for medium devices
const searchButton = document.getElementById("search-button");
const searchClose = document.getElementById("search-close");
const searchContainer = document.getElementById("search-container");
const searchOverlay = document.getElementById("search-overlay");

searchButton.addEventListener("click", () => {
    searchContainer.style.display = "block";
    searchOverlay.style.display = "block";
    document.body.style.overflowY = "hidden";
});

searchClose.addEventListener("click", () => {
    searchContainer.style.display = "none";
    searchOverlay.style.display = "none";
    document.body.style.overflowY = "auto";
});

searchOverlay.addEventListener("click", () => {
    searchContainer.style.display = "none";
    searchOverlay.style.display = "none";
    document.body.style.overflowY = "auto";
});

// Search for small devices
const searchButtonSmall = document.getElementById("search-button-small");

searchButtonSmall.addEventListener("click", () => {
    searchContainer.style.display = "block";
    searchOverlay.style.display = "block";
    document.body.style.overflowY = "hidden";
});
