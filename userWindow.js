var buttons = document.querySelectorAll('.view-details-btn');

// Add event listener to each button
buttons.forEach(function(button) {
  button.addEventListener('click', function() {
    var book = button.parentNode;
    
    var title = book.querySelector('h2').textContent;
    var author = book.querySelector('p').textContent;
    var coverImgSrc = book.querySelector('.book-cover').src;
    var language = button.getAttribute('data-language');
    var description = button.getAttribute('data-description');
    var type = button.getAttribute('data-type');
    var udk = button.getAttribute('data-udk');
    var link_to_literature = button.getAttribute('data-link');
    var price = button.getAttribute('data-price');
    var publish_date = button.getAttribute('data-date');
    var book_id = button.getAttribute('data-book-id');

    openModal(title, author, coverImgSrc, language, description, type, udk, link_to_literature, price, publish_date, book_id);
  });
});

function openModal(title, author, cover_img, language, description, type, udk, link_to_literature, price, publish_date, book_id) {
  var modal = document.getElementById("myModal");
  var modalImg = document.getElementById("modalImg");
  var modalTitle = document.getElementById("modalTitle");
  var modalAuthor = document.getElementById("modalAuthor");
  var modalLanguage = document.getElementById("modalLanguage");
  var modalDescription = document.getElementById("modalDescription");
  var modalType = document.getElementById("modalType");
  var modalLink = document.getElementById("modalLink");
  var modalPrice = document.getElementById("modalPrice");
  var modalUdk = document.getElementById("modalUdk");
  var modalDate = document.getElementById("modalDate");
  var bookIdInput = document.getElementById("bookIdInput");

  modal.style.display = "block";
  modal.classList.add("show");

  modalImg.src = cover_img;
  modalTitle.textContent = title;
  modalAuthor.textContent = author;
  modalLanguage.textContent = language;
  modalDescription.textContent = description;
  modalType.src = type;
  modalUdk.textContent = udk;
  modalLink.textContent = link_to_literature;
  modalPrice.textContent = price;
  modalDate.textContent = publish_date;
  bookIdInput.value = book_id;
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