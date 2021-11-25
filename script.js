const notif = $('.info-data').data('infodata');
console.log(notif);

if (notif === "simpan" || notif === "hapus" || notif === "update") {
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: 'Data berhasil di' + notif,
    })
} else if (notif === "gagal disimpan" || notif === "gagal dihapus" || notif === "gagal diupdate" || notif === "gagal masuk karena duplikat") {
    Swal.fire({
        icon: 'error',
        title: 'GAGAL',
        text: 'Data ' + notif,
    })
} else if (notif === "void") {

}

$('.delete-data').on('click', function (e) {
    e.preventDefault();
    var getLink = $(this).attr('href');

    Swal.fire({
        title: 'Hapus Data?',
        text: "Data akan dihapus permanen",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.value) {
            window.location.href = getLink;
        }
    })
});