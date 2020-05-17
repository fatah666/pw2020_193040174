const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const container_admin = document.querySelector('.container-admin');


keyword.addEventListener('keyup', function () {
  // ajax
  // fetch
  fetch('admin_ajax.php?keyword=' + keyword.value)
    .then((response) => response.text())
    .then((response) => (container_admin.innerHTML = response))

});