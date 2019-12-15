var no_fasilitas = 0;
function addFasilitas(e) {
    no_fasilitas++;
    e.preventDefault();
    $("#total_fasilitas").val(no_fasilitas);
    $("#list_fasilitas").append('<input name="fasilitas_'+no_fasilitas+'" class="form-control" style="margin-top: 5px" placeholder="Nama Fasilitas" value="" type="text">');
}