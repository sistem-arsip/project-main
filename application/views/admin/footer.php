<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="<?php echo base_url('assets/js/wow.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-price-slider.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.meanmenu.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.sticky.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.scrollUp.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/counterup/jquery.counterup.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/counterup/waypoints.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/counterup/counterup-active.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/scrollbar/mCustomScrollbar-active.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/metisMenu/metisMenu.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/metisMenu/metisMenu-active.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/morrisjs/raphael-min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/morrisjs/morris.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/morrisjs/morris-active.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/sparkline/jquery.sparkline.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/sparkline/jquery.charts-sparkline.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/sparkline/sparkline-active.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/calendar/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/calendar/fullcalendar.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/calendar/fullcalendar-active.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/pdf/jquery.media.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/pdf/pdf-active.js'); ?>"></script>


</div>
</main>

<div class="footer-copyright-area mg-t-30">
    <footer class="py-2 bs-success-text-emphasis mt-auto text-light" style="background-color: #5F6F52">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right text-center fw-semibold">
                        <p class="small">COPYRIGHT © <?php echo date('Y') ?>. ARSIP DIGITAL PONDOK PESANTREN WALI SONGO NGABAR</p>
                    </div>

                </div>
            </div>
        </div>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url("assets/js/scripts.js"); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<!-- FOR DATA-TABLES -->

<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $(document).ready(function() {
        $('#mytable').DataTable({ stateSave:true });
    });
</script>
<?php if ($this->session->flashdata('sukses')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= $this->session->flashdata('sukses') ?>',
            confirmButtonText: 'OK'
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('gagal')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '<?= $this->session->flashdata('gagal') ?>',
            confirmButtonText: 'OK'
        });
    </script>
<?php endif; ?>

<!-- scrip notif -->
 <script>
    $(document).ready(function() {
    // id_pengajuan dari query string URL
    const urlParams = new URLSearchParams(window.location.search);
    const targetId = urlParams.get('id_pengajuan');
    if (!targetId) return;

    // Inisialisasi DataTables
    const table = $('#mytable').DataTable();

    // Cari baris id pengajuan
    let targetRowIndex = null;
    table.rows().every(function(rowIdx, tableLoop, rowLoop) {
        const rowNode = this.node();
        if ($(rowNode).attr('id') === 'pengajuan-' + targetId) {
            targetRowIndex = rowIdx;
        }
    });

    if (targetRowIndex !== null) {
        // Hitung halaman yang harus ditampilkan
        const pageLength = table.page.len();
        const pageNum = Math.floor(targetRowIndex / pageLength);

        // Tampilkan halaman yang berisi baris target
        table.page(pageNum).draw(false);

        // Scroll ke baris target dengan offset agar terlihat jelas
        $('html, body').animate({
            scrollTop: $('#pengajuan-' + targetId).offset().top - 100
        }, 800);

        // Beri highlight sementara baris target (opsional)
        $('#pengajuan-' + targetId).css('background-color', '#ffff99');
        setTimeout(() => {
            $('#pengajuan-' + targetId).css('background-color', '');
        }, 3000);
    }
});
 </script>

 <!-- ajax notif -->
<script>
    $(document).on('click', '#btnTandaiSemua', function(e) {
        e.preventDefault();

        $.ajax({
            url: '<?= base_url("admin/pengajuan_kategori/baca_semua") ?>',
            method: 'POST',
            dataType: 'json',
            success: function(res) {
                if (res.status === 'success') {
                    // Hapus titik merah (jika ada)
                    $('a#notifDropdown span').remove();

                    // Hilangkan background abu dari semua notifikasi
                    $('.dropdown-item').css('background-color', '');

                    // Optional: tampilkan pesan sukses
                    console.log("Semua notifikasi dibaca");
                }
            },
            error: function() {
                alert('Gagal menandai semua notifikasi.');
            }
        });
    });
</script>


</body>

</html>