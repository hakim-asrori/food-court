const plus = document.getElementsByClassName('plus');
const minus = document.getElementsByClassName("minus");

const uri = document.getElementById("uri").value;

for (let i = 0; i < plus.length; i++) {
    $(plus[i]).on('click', function() {
        produkId = $(this).data('id');
        $.ajax({
            url: "/beli.php?page=tambah&id="+produkId,
            type: 'get',
            success: function() {
                document.location.href = uri;
            }
        });
    });
}

for (var i = 0; i < plus.length; i++) {
    $(minus[i]).on('click', function() {
        produkId = $(this).data('id');
        produkIsi = $(this).data('isi');
        $.ajax({
            url: "/beli.php?page=kurang&id="+produkId+"&isi="+produkIsi,
            type: 'get',
            success: function() {
                document.location.href = uri;
            }
        });
    });
}