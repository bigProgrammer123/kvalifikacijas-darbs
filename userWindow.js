var buttons = document.querySelectorAll('.view-details-btn');

// Add event listener to each button
buttons.forEach(function(button) {
  button.addEventListener('click', function() {
    // Get the parent book element
    var book = button.parentNode;
    
    var title = book.querySelector('h2').textContent;
    var author = book.querySelector('p').textContent;
    var coverImgSrc = book.querySelector('.book-cover').src;
    var language = button.getAttribute('data-language');
    var description = button.getAttribute('data-description');

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
  modal.classList.add("show");

  modalImg.src = cover_img;
  modalTitle.textContent = title;
  modalAuthor.textContent = author;
  modalLanguage.textContent = language;
  modalDescription.textContent = description;
}

// Function to toggle the visibility of the form
function toggleForm() {
  var form = document.getElementById("orderForm");
  var orderButton = document.getElementById("orderButton");
  if (form.style.display === "none") {
    form.style.display = "block";
    orderButton.style.display = "none";
  } else {
    form.style.display = "none";
    orderButton.style.display = "block";
  }
}

function closeModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
  modal.classList.remove("show");
  var form = document.getElementById("orderForm");
  form.style.display = "none";
  orderButton.style.display = "block";
}