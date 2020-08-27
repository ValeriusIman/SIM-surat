<!-- Modal -->
<div class="modal fade" id="detail" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Surat Masuk</h5>
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
                        <th style="width:50%">Asal</th>
                        <td><span id="detail-asal"></span></td>
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
                        <th style="width:50%">Indeks</th>
                        <td><span id="detail-indeks"></span></td>
                    </tr>
                    <tr>
                        <th style="width:50%">Tanggal Surat</th>
                        <td><span id="detail-tanggal"></span></td>
                    </tr>
                    <tr>
                        <th style="width:50%">Tanggal Terima</th>
                        <td><span id="detail-tgl-terima"></span></td>
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
        $(".btn-detail").on('click', function() {
            $('#detail-no-agenda').text($(this).data('no_agenda'));
            $('#detail-kode').text($(this).data('kode'));
            $('#detail-nama').text($(this).data('uraian'));
            $('#detail-no-surat').text($(this).data('no_surat'));
            $('#detail-isi').text($(this).data('isi'));
            $('#detail-tanggal').text($(this).data('tgl'));
            $('#detail-asal').text($(this).data('asal'));
            $('#detail-indeks').text($(this).data('indeks'));
            $('#detail-keterangan').text($(this).data('keterangan'));
            $('#detail-tgl-terima').text($(this).data('tgl_terima'));
        });
    })
</script>