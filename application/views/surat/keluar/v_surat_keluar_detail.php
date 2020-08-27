<!-- Modal -->
<div class="modal fade" id="detail" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Surat Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th style="width:50%">No. Agenda</th>
                        <td><span id="detail-no-agenda"></span></td>
                    </tr>
                    <tr>
                        <th style="width:50%">No. Surat</th>
                        <td><span id="detail-no-surat"></span></td>
                    </tr>
                    <tr>
                        <th style="width:50%">Tujuan</th>
                        <td><span id="detail-tujuan"></span></td>
                    </tr>
                    <tr>
                        <th style="width:50%">Kode</th>
                        <td><span id="detail-kode"></span>/<span id="detail-nama"></span></td>
                    </tr>
                    <tr>
                        <th style="width:50%">Isi</th>
                        <td><span id="detail-isi"></span></td>
                    </tr>
                    <tr>
                        <th style="width:50%">Tanggal Surat</th>
                        <td><span id="detail-tanggal"></span></td>
                    </tr>
                    <tr>
                        <th style="width:50%">Tanggal Catat</th>
                        <td><span id="detail-tgl-catat"></span></td>
                    </tr>
                    <tr>
                        <th style="width:50%">Keterangan</th>
                        <td><span id="detail-keterangan"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $(".detail").on('click', function() {
            $('#detail-no-agenda').text($(this).data('agenda'));
            $('#detail-kode').text($(this).data('kode'));
            $('#detail-nama').text($(this).data('uraian'));
            $('#detail-no-surat').text($(this).data('no_surat'));
            $('#detail-isi').text($(this).data('isi'));
            $('#detail-tanggal').text($(this).data('tgl'));
            $('#detail-tujuan').text($(this).data('tujuan'));
            $('#detail-keterangan').text($(this).data('keterangan'));
            $('#detail-tgl-catat').text($(this).data('tgl_catat'));
        });
    })
</script>