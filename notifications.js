function openNotif() {
    document.getElementById("userNotif").style.display = "block";
  }

function closeNotif() {
    document.getElementById("userNotif").style.display = "none";
}

var buttons = document.querySelectorAll('.view-order-btn');

buttons.forEach(function(button) {
  button.addEventListener('click', function() {
    var user = button.parentNode;
    
    var name = button.getAttribute('data-name');
    var book_id = button.getAttribute('data-book-id');
    var cover_img = button.getAttribute('data-img');
    var email = button.getAttribute('data-email');
    var title = button.getAttribute('data-title');
    var author = button.getAttribute('data-author');
    var status = button.getAttribute('data-status');
    var udk = button.getAttribute('data-udk');
    var unit = button.getAttribute('data-unit');

    openNotifModal(name, book_id, cover_img, email, title, author, status, udk, unit);
  });
});

function openNotifModal(name, book_id, cover_img, email, title, author, status, udk, unit) {
  var modal = document.getElementById("notifModal");
  var modalImg = document.getElementById("modalImg");
  var modalName = document.getElementById("modalName");
  var modalAuthor = document.getElementById("modalAuthor");
  var modalBookID = document.getElementById("modalBookID");
  var modalEmail = document.getElementById("modalEmail");
  var modalTitle = document.getElementById("modalTitle");
  var modalStatus = document.getElementById("modalStatus");
  var modalUdk = document.getElementById("modalUdk");
  var modalUnit = document.getElementById("modalUnit");

  modal.style.display = "block";
  modal.classList.add("show");

  modalImg.src = cover_img;
  modalTitle.textContent = title;
  modalAuthor.textContent = author;
  modalName.textContent = name;
  modalBookID.textContent = book_id;
  modalEmail.textContent = email;
  modalUdk.textContent = udk;
  modalStatus.textContent = status;
  modalUnit.textContent = unit;
}
function closeNotifModal() {
    var modal = document.getElementById("notifModal");
    modal.style.display = "none";
    modal.classList.remove("show");
  }