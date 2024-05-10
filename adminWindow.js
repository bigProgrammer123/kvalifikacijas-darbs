// Edit modal
function openEditModal(bookId) {
  var modal = document.getElementById("editModal");
  modal.style.display = "block";

  fetch("edit.php?book_id=" + bookId)
      .then(response => response.text())
      .then(data => {
      document.getElementById("editModalContent").innerHTML = data;
      })
      .catch(error => console.error('Error:', error));
}

function closeEditModal() {
  var modal = document.getElementById("editModal");
  modal.style.display = "none";
}


function openModal() {
  document.getElementById("addModal").style.display = "block";
}

function submitModal() {
  document.getElementById("addModal").style.display = "none";
  document.querySelector('form').addEventListener('submit', function(event) {
      event.preventDefault();
      this.submit();
  });
}
function closeModal() {
  document.getElementById("addModal").style.display = "none";
}
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}