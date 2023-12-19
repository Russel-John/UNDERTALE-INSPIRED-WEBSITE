function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var toggleIcon = document.getElementById('toggleIcon');
  
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleIcon.classList.remove('fas', 'fa-lock');
      toggleIcon.classList.add('fas', 'fa-unlock');
    } else {
      passwordInput.type = 'password';
      toggleIcon.classList.remove('fas', 'fa-unlock');
      toggleIcon.classList.add('fas', 'fa-lock');
    }
  }