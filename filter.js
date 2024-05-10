function resetFilter() {
    window.location.href = window.location.pathname;
  }
  
  //Language filter submission
  document.getElementById('languageFilter').addEventListener('change', function() {
    var selectedLanguage = this.value;
    if (selectedLanguage === 'all') {
      resetFilter();
    } else {
      window.location.href = window.location.pathname + '?language=' + encodeURIComponent(selectedLanguage);
    }
  });
  
  //Author filter submission
  document.getElementById('authorFilter').addEventListener('change', function() {
    var selectedAuthor = this.value;
    if (selectedAuthor === 'all') {
      resetFilter();
    } else {
      window.location.href = window.location.pathname + '?author=' + encodeURIComponent(selectedAuthor);
    }
  });

  //UDK filter submission
  document.getElementById('udkFilter').addEventListener('change', function() {
    var selectedUDK = this.value;
    if (selectedUDK === 'all') {
      resetFilter();
    } else {
      window.location.href = window.location.pathname + '?udk=' + encodeURIComponent(selectedUDK);
    }
  });
  
  //Price filter submission
  document.getElementById('priceFilter').addEventListener('change', function() {
    var selectedPrice = this.value;
    if (selectedPrice === 'all') {
      resetFilter();
    } else {
      window.location.href = window.location.pathname + '?price=' + encodeURIComponent(selectedPrice);
    }
  });