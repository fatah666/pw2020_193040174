const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const container_produk = document.querySelector('.container-produk');

// hidden tombol cari
tombolCari.style.display = 'none';

// event ketika menuliskan di keyboard
keyword.addEventListener('keyup', function () {
  // ajax
  // fetch
  fetch('ajax/ajax_cari.php?keyword=' + keyword.value)
    .then((response) => response.text())
    .then((response) => (container_produk.innerHTML = response))

});

// preview image untuk tambah dan ubah
function previewImage() {
  const gambar = document.querySelector('.gambar');
  const imgPreview = document.querySelector('.img-preview');

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function (OFREvent) {
    imgPreview.src = OFREvent.target.result;
  }
}


// back-on-top
$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $('#back-to-top').fadeIn();
    } else {
      $('#back-to-top').fadeOut();
    }
  });
  // scroll body to 0px on click
  $('#back-to-top').click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 400);
    return false;
  });
});