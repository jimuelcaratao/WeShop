const productDropdown = document.getElementById('product-dropdown');
const productContent = document.getElementById('product-content');
// Dropdown Items
const productAccessories = document.getElementById('product-accessories');
const productSupplies = document.getElementById('product-supplies');
const productHeadsets = document.getElementById('product-headsets');
const productKeyboards = document.getElementById('product-keyboards');
const productMice = document.getElementById('product-mice');
const productPrebuild = document.getElementById('product-prebuild');
// Dropdown Items Container
const accContainer = document.getElementById('accessory-container');
const suppContainer = document.getElementById('supply-container');
const headContainer = document.getElementById('headset-container');
const keyContainer = document.getElementById('keyboard-container');
const mouseContainer = document.getElementById('mouse-container');
const preBuildContainer = document.getElementById('prebuild-container');
// Parent sub item
const accItem = document.getElementById('accessory-item');
// Sub Items
const accSubItem = document.getElementById('accessory-sub-item');

productDropdown.addEventListener('click', () => {
    productContent.classList.toggle('toggleNav');
});

productAccessories.addEventListener('mouseover', () => {

    accContainer.style.display = "block";
    suppContainer.style.display = "none";
    headContainer.style.display = "none";
    keyContainer.style.display = "none";
    mouseContainer.style.display = "none";
    preBuildContainer.style.display = "none";
    accSubItem.style.display = "none";
});

productSupplies.addEventListener('mouseover', () => {

    accContainer.style.display = "none";
    suppContainer.style.display = "block";
    headContainer.style.display = "none";
    keyContainer.style.display = "none";
    mouseContainer.style.display = "none";
    preBuildContainer.style.display = "none";
    accSubItem.style.display = "none";

});

productHeadsets.addEventListener('mouseover', () => {

    accContainer.style.display = "none";
    suppContainer.style.display = "none";
    headContainer.style.display = "block";
    keyContainer.style.display = "none";
    mouseContainer.style.display = "none";
    preBuildContainer.style.display = "none";
    accSubItem.style.display = "none";

});

productKeyboards.addEventListener('mouseover', () => {

    accContainer.style.display = "none";
    suppContainer.style.display = "none";
    headContainer.style.display = "none";
    keyContainer.style.display = "block";
    mouseContainer.style.display = "none";
    preBuildContainer.style.display = "none";
    accSubItem.style.display = "none";

});

productMice.addEventListener('mouseover', () => {

    accContainer.style.display = "none";
    suppContainer.style.display = "none";
    headContainer.style.display = "none";
    keyContainer.style.display = "none";
    mouseContainer.style.display = "block";
    preBuildContainer.style.display = "none";
    accSubItem.style.display = "none";

});

productPrebuild.addEventListener('mouseover', () => {

    accContainer.style.display = "none";
    suppContainer.style.display = "none";
    headContainer.style.display = "none";
    keyContainer.style.display = "none";
    mouseContainer.style.display = "none";
    preBuildContainer.style.display = "block";
    accSubItem.style.display = "none";

});

accItem.addEventListener('mouseover', () => {

    accContainer.style.display = "block";
    suppContainer.style.display = "none";
    headContainer.style.display = "none";
    keyContainer.style.display = "none";
    mouseContainer.style.display = "none";
    preBuildContainer.style.display = "none";
    accSubItem.style.display = "block";
});


// For mobile users

const productDropdownSmall = document.getElementById('product-dropdown-small');
const productContentSmall = document.getElementById('product-content-small');
// Dropdown Items
const productAccessoriesSmall = document.getElementById('product-accessories-small');
const productSuppliesSmall = document.getElementById('product-supplies-small');
const productHeadsetsSmall = document.getElementById('product-headsets-small');
const productKeyboardsSmall = document.getElementById('product-keyboards-small');
const productMiceSmall = document.getElementById('product-mice-small');
const productPrebuildSmall = document.getElementById('product-prebuild-small');
// Dropdown Items Container
const accContainerSmall = document.getElementById('accessory-container-small');
const suppContainerSmall = document.getElementById('supply-container-small');
const headContainerSmall = document.getElementById('headset-container-small');
const keyContainerSmall = document.getElementById('keyboard-container-small');
const mouseContainerSmall = document.getElementById('mouse-container-small');
const preBuildContainerSmall = document.getElementById('prebuild-container-small');
// Parent Sub item
const accItemSmall = document.getElementById('accessory-item-small');
// Child item
const accSubItemSmall = document.getElementById('accessory-sub-item-small');

productDropdownSmall.addEventListener('click', () => {
    productContentSmall.classList.toggle('toggleNav');
});

productAccessoriesSmall.addEventListener('mouseover', () => {

    accContainerSmall.style.display = "block";
    suppContainerSmall.style.display = "none";
    headContainerSmall.style.display = "none";
    keyContainerSmall.style.display = "none";
    mouseContainerSmall.style.display = "none";
    preBuildContainerSmall.style.display = "none";
    accSubItemSmall.style.display = "none";

});

productSuppliesSmall.addEventListener('mouseover', () => {

    accContainerSmall.style.display = "none";
    suppContainerSmall.style.display = "block";
    headContainerSmall.style.display = "none";
    keyContainerSmall.style.display = "none";
    mouseContainerSmall.style.display = "none";
    preBuildContainerSmall.style.display = "none";
    accSubItemSmall.style.display = "none";

});

productHeadsetsSmall.addEventListener('mouseover', () => {

    accContainerSmall.style.display = "none";
    suppContainerSmall.style.display = "none";
    headContainerSmall.style.display = "block";
    keyContainerSmall.style.display = "none";
    mouseContainerSmall.style.display = "none";
    preBuildContainerSmall.style.display = "none";
    accSubItemSmall.style.display = "none";

});

productKeyboardsSmall.addEventListener('mouseover', () => {

    accContainerSmall.style.display = "none";
    suppContainerSmall.style.display = "none";
    headContainerSmall.style.display = "none";
    keyContainerSmall.style.display = "block";
    mouseContainerSmall.style.display = "none";
    preBuildContainerSmall.style.display = "none";
    accSubItemSmall.style.display = "none";

});

productMiceSmall.addEventListener('mouseover', () => {

    accContainerSmall.style.display = "none";
    suppContainerSmall.style.display = "none";
    headContainerSmall.style.display = "none";
    keyContainerSmall.style.display = "none";
    mouseContainerSmall.style.display = "block";
    preBuildContainerSmall.style.display = "none";
    accSubItemSmall.style.display = "none";

});

productPrebuildSmall.addEventListener('mouseover', () => {

    accContainerSmall.style.display = "none";
    suppContainerSmall.style.display = "none";
    headContainerSmall.style.display = "none";
    keyContainerSmall.style.display = "none";
    mouseContainerSmall.style.display = "none";
    preBuildContainerSmall.style.display = "block";
    accSubItemSmall.style.display = "none";

});

accItemSmall.addEventListener('mouseover', () => {

    accContainerSmall.style.display = "block";
    suppContainerSmall.style.display = "none";
    headContainerSmall.style.display = "none";
    keyContainerSmall.style.display = "none";
    mouseContainerSmall.style.display = "none";
    preBuildContainerSmall.style.display = "none";
    accSubItemSmall.style.display = "block";

});