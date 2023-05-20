var letters = document.querySelectorAll('.letter');

letters.forEach(function(letter) {
  letter.addEventListener('mouseover', function() {
    letter.classList.add('animate');
  });

  letter.addEventListener('mouseout', function() {
    letter.classList.remove('animate');
  });
});
