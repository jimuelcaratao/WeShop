const showMoreButton = document.getElementById('review-show-more');
const showLessButton = document.getElementById('review-show-less');
const reviewContainer = document.getElementById('review-container-show');

showMoreButton.addEventListener('click', () => {
    reviewContainer.style.display = "block";
    showMoreButton.style.display = "none";
});

showLessButton.addEventListener('click', () => {
    reviewContainer.style.display = "none";
    showMoreButton.style.display = "inline-block";
});