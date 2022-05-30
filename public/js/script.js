$(function() {
    $('#nama_menu').on('change', function() {
        $('input[name=jumlah]').val('');
        $('input[name=total_harga]').val('0');
    });

    $('#jumlah').on('keyup', function() {
        const jumlah = $(this).val();
        const id = $('#nama_menu').val();
        $.ajax({
            url: '/get_harga/'+id,
            method: 'get',
            success: function(harga) {
                const totalHarga = harga * jumlah;
                const totalHargaFixed = totalHarga.toLocaleString('en-US');
                $('#total_harga').val(totalHargaFixed);
            }
        });
    });
});