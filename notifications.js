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
    var email = button.getAttribute('data-email');
    var title = button.getAttribute('data-title');
    var author = button.getAttribute('data-author');
    var status = button.getAttribute('data-status');
    var unit = button.getAttribute('data-unit');

    openNotifModal(name, book_id, email, title, author, status, unit);
  });
});

function openNotifModal(name, book_id, email, title, author, status, unit) {
  var modal = document.getElementById("notifModal");
  var modalName = document.getElementById("modalName");
  var modalAuthor = document.getElementById("modalAuthor");
  var modalBookID = document.getElementById("modalBookID");
  var modalEmail = document.getElementById("modalEmail");
  var modalTitle = document.getElementById("modalTitle");
  var modalStatus = document.getElementById("modalStatus");
  var modalUnit = document.getElementById("modalUnit");

  modal.style.display = "block";
  modal.classList.add("show");
  
  modalTitle.textContent = title;
  modalAuthor.textContent = author;
  modalName.textContent = name;
  modalBookID.textContent = book_id;
  modalEmail.textContent = email;
  modalStatus.textContent = status;
  modalUnit.textContent = unit;
}
function closeNotifModal() {
    var modal = document.getElementById("notifModal");
    modal.style.display = "none";
    modal.classList.remove("show");
  }