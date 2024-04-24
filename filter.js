function resetLanguageFilter() {
    window.location.href = window.location.pathname;
  }
  
  //Filter submission
  document.getElementById('languageFilter').addEventListener('change', function() {
    var selectedLanguage = this.value;
    if (selectedLanguage === 'all') {
      resetLanguageFilter();
    } else {
      window.location.href = window.location.pathname + '?language=' + encodeURIComponent(selectedLanguage);
    }
  });
  
//Reset author filter
function resetAuthorFilter() {
    window.location.href = window.location.pathname;
  }
  
  //Filter submission
  document.getElementById('authorFilter').addEventListener('change', function() {
    var selectedAuthor = this.value;
    if (selectedAuthor === 'all') {
      resetAuthorFilter();
    } else {
      window.location.href = window.location.pathname + '?author=' + encodeURIComponent(selectedAuthor);
    }
  });

  //Reset genre filter
function resetGenreFilter() {
    window.location.href = window.location.pathname;
  }
  
  //Filter submission
  document.getElementById('genreFilter').addEventListener('change', function() {
    var selectedGenre = this.value;
    if (selectedGenre === 'all') {
      resetAuthorFilter();
    } else {
      window.location.href = window.location.pathname + '?genre=' + encodeURIComponent(selectedGenre);
    }
  });