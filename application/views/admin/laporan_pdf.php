<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: "Times New Roman";
            font-size: 12px;
        }
        .center {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
            vertical-align: top;
        }
        .no-border td {
            border: none;
            padding: 2px;
        }
        .section-title {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- ================= JUDUL ================= -->
<p class="center">
    <strong>
        LAPORAN ARSIP<br>
        SISTEM INFORMASI ARSIP DIGITAL<br>
        PONDOK PESANTREN WALI SONGO NGABAR
    </strong>
</p>
<br>

<!-- ================= INFO LAPORAN ================= -->
<table class="no-border">
    <tr>
        <td width="30%">Waktu Download</td>
        <td width="5%">:</td>
        <td><?php echo $waktu_download; ?></td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td>Laporan <?php echo $jenis_laporan; ?> - <?php echo $periode; ?></td>
    </tr>
</table>

<p style="margin-top:10px; text-align: justify;">
    Rekapitulasi data arsip berdasarkan aktivitas
    pengarsipan pada Sistem Informasi Arsip Digital Pondok Pesantren
    Wali Songo Ngabar sesuai dengan periode laporan.
</p>

<!-- ================= RINGKASAN (JUMLAH ARSIP) ================= -->
<table>
    <tr>
        <th style="width:10%">No</th>
        <th style="width:60%">Keterangan</th>
        <th style="width:30%">Jumlah Arsip</th>
    </tr>
    <?php $no = 1; ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td>Total Arsip Keseluruhan</td>
        <td><?php echo $ringkasan['Arsip']; ?></td>
    </tr>
    <tr>
        <td><?php echo $no++; ?></td>
        <td>Total Arsip Berdasarkan Kategori</td>
        <td><?php echo $ringkasan['ArsipKategori']; ?></td>
    </tr>
    <tr>
        <td><?php echo $no++; ?></td>
        <td>Total Arsip Berdasarkan Unit</td>
        <td><?php echo $ringkasan['ArsipUnit']; ?></td>
    </tr>
    <tr>
        <td><?php echo $no++; ?></td>
        <td>Total Arsip Berdasarkan Petugas</td>
        <td><?php echo $ringkasan['ArsipPetugas']; ?></td>
    </tr>
    <tr>
        <td><?php echo $no++; ?></td>
        <td>Total Kode QR</td>
        <td><?php echo $ringkasan['Kode QR']; ?></td>
    </tr>
</table>

<!-- ================= 1. ARSIP PER KATEGORI ================= -->
<p class="section-title">1. Arsip Berdasarkan Kategori</p>
<p>
    Total arsip berdasarkan kategori pada periode
    <b><?php echo $periode; ?></b> berjumlah
    <b><?php echo $ringkasan['ArsipKategori']; ?></b>.
</p>

<table>
    <tr>
        <th style="width:10%">No</th>
        <th style="width:60%">Nama Kategori</th>
        <th style="width:30%">Jumlah Arsip</th>
    </tr>
    <?php $no = 1; foreach ($arsip_per_kategori as $r): ?>
    <tr>
        <td class="center"><?php echo $no++; ?></td>
        <td><?php echo $r['nama_kategori']; ?></td>
        <td class="center"><?php echo $r['jumlah']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<!-- ================= 2. ARSIP PER UNIT ================= -->
<p class="section-title">2. Arsip Berdasarkan Unit</p>
<p>
    Total arsip berdasarkan unit pada periode
    <b><?php echo $periode; ?></b> berjumlah
    <b><?php echo $ringkasan['ArsipUnit']; ?></b>.
</p>

<table>
    <tr>
        <th style="width:10%">No</th>
        <th style="width:60%">Nama Unit</th>
        <th style="width:30%">Jumlah Arsip</th>
    </tr>
    <?php $no = 1; foreach ($arsip_per_unit as $r): ?>
    <tr>
        <td class="center"><?php echo $no++; ?></td>
        <td><?php echo $r['nama_unit']; ?></td>
        <td class="center"><?php echo $r['jumlah']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<!-- ================= 3. ARSIP PER PETUGAS ================= -->
<p class="section-title">3. Arsip Berdasarkan Petugas</p>
<p>
    Total arsip berdasarkan petugas pada periode
    <b><?php echo $periode; ?></b> berjumlah
    <b><?php echo $ringkasan['ArsipPetugas']; ?></b>.
</p>

<table>
    <tr>
        <th style="width:10%">No</th>
        <th style="width:60%">Nama Petugas</th>
        <th style="width:30%">Jumlah Arsip</th>
    </tr>
    <?php $no = 1; foreach ($arsip_per_petugas as $r): ?>
    <tr>
        <td class="center"><?php echo $no++; ?></td>
        <td><?php echo $r['nama_petugas']; ?></td>
        <td class="center"><?php echo $r['jumlah']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<!-- ================= 4. DETAIL ARSIP ================= -->
<p class="section-title">4. Detail Arsip</p>
<p>
    Detail keseluruhan arsip yang tercatat pada periode
    <b><?php echo $periode; ?></b> sebanyak
    <b><?php echo $ringkasan['Arsip']; ?></b> arsip.
</p>

<table>
    <tr>
        <th style="width:5%">No</th>
        <th style="width:35%">Nama Arsip</th>
        <th style="width:20%">Tanggal Upload</th>
        <th style="width:20%">Asal Unit</th>
        <th style="width:20%">Kategori</th>
    </tr>
    <?php $no = 1; foreach ($arsip_detail as $a): ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $a['keterangan_arsip']; ?></td>
        <td><?php echo format_tanggal_indo($a['waktu_upload']); ?></td>
        <td><?php echo $a['nama_unit']; ?></td>
        <td><?php echo $a['nama_kategori']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<!-- ================= 5. DATA KODE QR ================= -->
<p class="section-title">5. Data Kode QR</p>
<p>
    Total kode QR yang dihasilkan pada periode
    <b><?php echo $periode; ?></b> sebanyak
    <b><?php echo $ringkasan['Kode QR']; ?></b> kode QR.
</p>

<table>
    <tr>
        <th style="width:10%">No</th>
        <th style="width:60%">Nama Unit</th>
        <th style="width:30%">Jumlah</th>
    </tr>
    <?php $no = 1; foreach ($qr_per_unit as $q): ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $q['nama_unit']; ?></td>
        <td><?php echo $q['jumlah']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<br><br>

<!-- ================= PENGESAHAN ================= -->
<p class="center">
    Ngabar, <?php echo format_tanggal_indo(date('Y-m-d')); ?><br><br>

    <?php if (!empty($qr_base64)): ?>
        <img src="data:image/png;base64,<?php echo $qr_base64; ?>" width="90" style="margin-bottom:10px;"><br>
    <?php endif; ?>

    <strong>
        <u><?php echo $this->session->userdata('nama_admin'); ?></u>
    </strong><br>
    <span>Administrator Sistem Informasi Arsip Digital</span>
</p>

</body>
</html>
