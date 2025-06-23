function toggleDropdown(id) {
  const dropdown = document.getElementById(id);
  const allDropdowns = document.querySelectorAll('.dropdown-content');
  allDropdowns.forEach(menu => {
    if (menu !== dropdown) menu.style.display = 'none';
  });
  dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
}

window.onclick = function(e) {
  if (!e.target.matches('a')) {
    document.querySelectorAll('.dropdown-content').forEach(menu => {
      menu.style.display = 'none';
    });
  }
};
