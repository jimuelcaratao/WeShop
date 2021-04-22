// Product Categories
const productCategories = document.getElementById('product-categories');
const productCategoriesContent = document.getElementById('product-categories-content');
const productCategoriesSvg = document.getElementById('product-categories-svg');

productCategories.addEventListener('click', () => {
    productCategoriesSvg.classList.toggle('toggleRotate');
    productCategoriesContent.classList.toggle('toggleSort');
});

// Filter by Brands
const filterByBrands = document.getElementById('filter-by-brands');
const filterByBrandsContent = document.getElementById('filter-by-brands-content');
const filterByBrandsSvg = document.getElementById('filter-by-brands-svg');

filterByBrands.addEventListener('click', () => {
    filterByBrandsSvg.classList.toggle('toggleRotate');
    filterByBrandsContent.classList.toggle('toggleSort');
});