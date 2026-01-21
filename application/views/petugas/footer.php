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

<script src="<?php echo base_url('assets/js/DataTables/datatables.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/pdf/jquery.media.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/pdf/pdf-active.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url("assets/js/scripts.js"); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<!-- FOR DATA-TABLES -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function() {
        const bahasaID = {
        lengthMenu: "_MENU_ data per halaman",
        zeroRecords: "Data tidak ditemukan",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
        infoFiltered: "(difilter dari _MAX_ total data)",
        search: "Cari:",
        paginate: {
            first: "Pertama",
            last: "Terakhir",
            next: "›",
            previous: "‹"
        }
    };
        $('#mytable').DataTable({
        language: bahasaID
    });

    $('#mytable2').DataTable({
        language: bahasaID
    });
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

<!-- ajax notif -->
<script>
    $(document).ready(function() {

        // Tandai satu notifikasi
        $(document).on('click', '.notif-item', function(e) {
            let id = $(this).data('id');

            $.ajax({
                url: '<?= base_url("petugas/notifikasi/baca_notif/") ?>' + id,
                type: 'POST',
                dataType: 'json',
                success: function(res) {
                    if (res.status === 'success') {
                        // Ubah background item jadi kosong
                        $(`.notif-item[data-id="${id}"]`).css('background-color', '');

                        // Jika semua notif sudah dibaca, hilangkan titik merah
                        if ($('.notif-item').filter(function() {
                                return $(this).css('background-color') === 'rgb(240, 240, 240)';
                            }).length === 0) {
                            $('#notifPetugasDot').remove();
                        }
                    }
                }
            });
        });

        // Tandai semua notifikasi
        $(document).on('click', '#btnTandaiSemuaPetugas', function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url("petugas/notifikasi/baca_semua") ?>',
                type: 'POST',
                dataType: 'json',
                success: function(res) {
                    if (res.status === 'success') {
                        $('.notif-item').css('background-color', '');
                        $('#notifPetugasDot').remove();
                    }
                }
            });
        });

    });
</script>

</div>
</main>

<div class="footer-copyright-area mg-t-30">
    <footer class="py-2 bs-success-text-emphasis mt-auto text-light" style="background-color: #5F6F52">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12" style="font-size: 12px;">
                    <div class="footer-copy-right text-center fw-semibold">
                        <p class="small">COPYRIGHT © <?php echo date('Y') ?>. ARSIP DIGITAL PONDOK PESANTREN WALI SONGO NGABAR</p>
                    </div>

                </div>
            </div>
        </div>
    </footer>
</div>
</div>
</div>

<style>
    #mytable_wrapper .dt-search {
    display: flex;
    align-items: center;
    gap: 8px;
}

#mytable_wrapper .dt-search input {
    width: 240px !important;
    height: 30px !important;
    font-size: 18px !important;
    padding: 8px 12px !important;
}
#mytable_wrapper .dt-length {
    display: none !important;
}
.info-qr-table th,
.info-qr-table td {
    padding-top: 16px;
    padding-bottom: 18px;
    vertical-align: middle;
}
.info-arsip-table th,
.info-arsip-table td {
    padding-top: 14px;
    padding-bottom: 18px;
    padding-left: 20px;
    padding-right: 20px;
    vertical-align: middle;
}

</style>

</body>

</html>