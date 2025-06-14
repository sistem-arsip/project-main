<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="<?php echo base_url('assets/js/vendor/jquery-1.12.4.min.js'); ?>"></script>
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

</div>
</main>
<div class="footer-copyright-area mg-t-30">
    <footer class="py-2 bs-success-text-emphasis mt-auto" style="background-color: #32cd40; color: hex;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right text-center">
                        <p>Copyright © <?php echo date('Y') ?>. Sistem Informasi Arsip Digital. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url("assets/js/scripts.js") ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>


<script>
    $(document).ready(function() {
        $('#table').DataTable();
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

</body>

</html>