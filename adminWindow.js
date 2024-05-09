var buttons = document.querySelectorAll('.view-details-btn');

// Add event listener to each button
buttons.forEach(function(button) {
  button.addEventListener('click', function() {
    var title = button.parentNode.querySelector('h2').textContent;
    var author = button.parentNode.querySelector('p:nth-of-type(1)').textContent;
    var language = button.getAttribute('data-language');
    var description = button.getAttribute('data-description');
    var coverImgSrc = button.getAttribute('data-cover');

    openModal(title, author, coverImgSrc, language, description);
  });
});

function openModal(title, author, cover_img, language, description) {
  var modal = document.getElementById("myModal");
  var modalImg = document.getElementById("modalImg");
  var modalTitle = document.getElementById("modalTitle");
  var modalAuthor = document.getElementById("modalAuthor");
  var modalLanguage = document.getElementById("modalLanguage");
  var modalDescription = document.getElementById("modalDescription");

  modal.style.display = "block";
  modalImg.src = cover_img;
  modalTitle.textContent = title;
  modalAuthor.textContent = author;
  modalLanguage.textContent = language;
  modalDescription.textContent = description;
}

function closeModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}