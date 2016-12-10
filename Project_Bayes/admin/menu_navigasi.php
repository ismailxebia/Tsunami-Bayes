
<div class="span3">


<table class="table table-bordered">
    <thead>
        <th colspan="3"><center>Menu Navigasi</center></th>
    </thead>
    <tbody>
        <tr>
            <td colspan="3"> <left> <a href="home.php?list=gejala">Data Gejala</a></left></td>
        </tr>
        <tr>
            <td colspan="3"> <left> <a href="home.php?list=hipotesa">Data Hipotesa</a></left></td>
        </tr>
        <tr>
            <td colspan="3"> <left> <a href="home.php?list=rule">Aturan Diagnosa</a></left></td>
        </tr>
        <tr>
               <td colspan="3"><left><a href="home.php?list=admin">Data Admin</a></left></td>
         </tr>
         <tr>
         	 <td colspan="3"><left><a href="home.php?list=member">Data Member</a></left></td>
         </tr>
         <tr>
         	<td colspan="3"><left><a href="home.php?list=lap_hipotesa">Laporan Analisa</a></left></td>
         </tr>
    </tbody>
</table>
</div>

<script>
    function delete_confirm(id){
        var id_merek = id;
        var confirmModal = $('<div class="modal hide fade">'+
            '<div class="modal-header">'+
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
            '<h3>Konfirmasi</h3></div>'+
            '<div class="modal-body"><p>Anda yakin ingin menghapus?</p></div>'+
            '<div class="modal-footer"><a href="#" class="btn" data-dismiss="modal">Batal</a>'+
            '<a href="#" class="btn btn-primary" id="okButton">Hapus</a></div></div>');
        confirmModal.find("#okButton").click(function(event){
            confirmModal.modal('hide');
            window.location.href = 'mobile.php?delete_merek='+id_merek;
        });
        confirmModal.modal('show');      
            
    }
</script>
