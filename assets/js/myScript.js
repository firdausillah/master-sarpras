const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: flashData,
    });
}


// tombol hapus
$('.tombol-hapus').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});


// datatables
$(document).ready(function () {
    $('#myTable').DataTable();
});
