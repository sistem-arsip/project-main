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
            margin-top: 10px;
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
        <td>
           <?php echo $waktu_download; ?>
        </td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td>
            <?php echo 'Laporan ' . $jenis_laporan . ' - ' . $periode; ?>
        </td>
    </tr>
</table>
<br>
<p style="margin-top:10px; text-align: justify;">
    Rekapitulasi data keseluruhan Sistem Informasi Arsip Digital Pondok Pesantren Wali Songo Ngabar pada periode laporan ditampilkan pada tabel berikut.
</p>

<!-- ================= RINGKASAN ================= -->
<table>
    <tr>
        <th width="10%">No</th>
        <th width="45%">Keterangan</th>
        <th width="45%">Jumlah</th>
    </tr>
    <?php $no = 1; ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td>Petugas</td>
        <td><?php echo $ringkasan['Petugas']; ?></td>
    </tr>
    <tr>
        <td><?php echo $no++; ?></td>
        <td>Unit</td>
        <td><?php echo $ringkasan['Unit']; ?></td>
    </tr>
    <tr>
        <td><?php echo $no++; ?></td>
        <td>Kategori</td>
        <td><?php echo $ringkasan['Kategori']; ?></td>
    </tr>
    <tr>
        <td><?php echo $no++; ?></td>
        <td>Arsip</td>
        <td><?php echo $ringkasan['Arsip']; ?></td>
    </tr>
    <tr>
        <td><?php echo $no++; ?></td>
        <td>Kode QR</td>
        <td><?php echo $ringkasan['Kode QR']; ?></td>
    </tr>
</table>

<!-- ================= 1. DATA KATEGORI ================= -->
<p class="section-title">1. Detail Laporan Data Kategori</p>
<p>
    Jumlah data kategori pada <b><?php echo $periode; ?></b> sebanyak <b><?php echo count($kategori); ?> </b> katgeori.
</p>

<table>
    <tr>
        <th style="width:10%">No</th>
        <th style="width:45%">Nama Kategori</th>
        <th style="width:45%">Keterangan</th>
    </tr>

    <?php $no = 1; foreach ($kategori as $k) { ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $k['nama_kategori']; ?></td>
        <td><?php echo $k['keterangan_kategori']; ?></td>
    </tr>
    <?php } ?>
</table>

<!-- ================= 2. DATA UNIT ================= -->
<p class="section-title">2. Detail Laporan Data Unit</p>
<p>
    Jumlah data unit pada <b><?php echo $periode; ?></b> sebanyak <b><?php echo count($unit); ?></b> unit.
</p>

<table>
    <tr>
        <th style="width:10%">No</th>
        <th style="width:45%">Nama Unit</th>
        <th style="width:45%">Keterangan</th>
    </tr>

    <?php $no = 1; foreach ($unit as $u) { ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $u['nama_unit']; ?></td>
        <td><?php echo $u['keterangan_unit']; ?></td>
    </tr>
    <?php } ?>
</table>

<!-- ================= 3. DATA PETUGAS ================= -->
<p class="section-title">3. Detail Laporan Data Petugas</p>
<p>
    Jumlah data petugas pada <b><?php echo $periode; ?></b> sebanyak <b><?php echo $ringkasan['Petugas']; ?></b> orang petugas.
</p>

<table>
    <tr>
        <th style="width:10%">No</th>
        <th style="width:45%">Nama Petugas</th>
        <th style="width:45%">Unit Asal</th>
    </tr>
    <?php $no = 1; foreach ($petugas as $p) { ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $p['nama_petugas']; ?></td>
        <td><?php echo $p['nama_unit']; ?></td>
    </tr>
    <?php } ?>
</table>


<!-- ================= 4. DATA ARSIP (DETAIL) ================= -->
<p class="section-title">4. Detail Laporan Data Arsip</p>
<p>
    Jumlah seluruh data arsip pada <b><?php echo $periode; ?></b> sebanyak <b><?php echo $ringkasan['Arsip']; ?></b> arsip.
</p>
<!-- KATEGORI -->
<p class="section-title">a. Arsip Berdasarkan Kategori</p>
<p>
    Jumlah arsip berdasarkan kategori pada <b><?php echo $periode; ?></b> ditampilkan pada tabel berikut.
</p>

<table>
    <tr>
        <th style="width:10%">No</th>
        <th style="width:60%">Nama Kategori</th>
        <th style="width:30%">Jumlah Arsip</th>
    </tr>

    <?php $no = 1; foreach ($arsip_per_kategori as $apk) { ?>
    <tr>
        <td class="center"><?php echo $no++; ?></td>
        <td><?php echo $apk['nama_kategori']; ?></td>
        <td class="center"><?php echo $apk['jumlah']; ?></td>
    </tr>
    <?php } ?>
</table>
<!-- UNIT -->
 <p class="section-title">b. Arsip Berdasarkan Unit</p>
<p>
    Jumlah arsip berdasarkan unit pada <b><?php echo $periode; ?></b> ditampilkan pada tabel berikut.
</p>

<table>
    <tr>
        <th style="width:10%">No</th>
        <th style="width:60%">Nama Unit</th>
        <th style="width:30%">Jumlah Arsip</th>
    </tr>

    <?php $no = 1; foreach ($arsip_per_unit as $apu) { ?>
    <tr>
        <td class="center"><?php echo $no++; ?></td>
        <td><?php echo $apu['nama_unit']; ?></td>
        <td class="center"><?php echo $apu['jumlah']; ?></td>
    </tr>
    <?php } ?>
</table>
<!-- PETUGAS -->
 <p class="section-title">c. Arsip Berdasarkan Petugas</p>
<p>
    Jumlah arsip berdasarkan petugas pada <b><?php echo $periode; ?></b> ditampilkan pada tabel berikut.
</p>

<table>
    <tr>
        <th style="width:10%">No</th>
        <th style="width:60%">Nama Petugas</th>
        <th style="width:30%">Jumlah Arsip</th>
    </tr>

    <?php $no = 1; foreach ($arsip_per_petugas as $app) { ?>
    <tr>
        <td class="center"><?php echo $no++; ?></td>
        <td><?php echo $app['nama_petugas']; ?></td>
        <td class="center"><?php echo $app['jumlah']; ?></td>
    </tr>
    <?php } ?>
</table>
<!-- DETAIL -->
  <p class="section-title">d. Laporan Detail Arsip</p>
<p>
    Detail laporan arsip pada <b><?php echo $periode; ?></b> ditampilkan pada tabel berikut.
</p>
<table>
    <tr>
        <th style="width:5%">No</th>
        <th style="width:30%">Nama Arsip</th>
        <th style="width:20%">Tanggal Upload</th>
        <th style="width:25%">Asal Unit</th>
        <th style="width:20%">Kategori</th>
    </tr>
    <?php $no = 1; foreach ($arsip_detail as $a) { ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $a['keterangan_arsip']; ?></td>
        <td><?php echo format_tanggal_indo($a['waktu_upload']); ?></td>
        <td><?php echo $a['nama_unit']; ?></td>
        <td><?php echo $a['nama_kategori']; ?></td>
    </tr>
    <?php } ?>
</table>

<!-- ================= 5. DATA KODE QR ================= -->
<p class="section-title">5. Detail Laporan Data Kode QR</p>
<p>
    Jumlah data kode QR pada <b><?php echo $periode; ?></b> sebanyak <b><?php echo $ringkasan['Kode QR']; ?></b> Kode QR
</p>

<table>
    <tr>
        <th style="width:10%">No</th>
        <th style="width:45%">Nama Unit</th>
        <th style="width:45%">Jumlah Kode QR</th>
    </tr>
    <?php $no = 1; foreach ($qr_per_unit as $q) { ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $q['nama_unit']; ?></td>
        <td><?php echo $q['jumlah']; ?></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
