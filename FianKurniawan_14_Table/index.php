<!DOCTYPE html>
<html>
    <head>
    <title>Tugas PWPB</title>
    <meta name="description" content="Tugas PWPB">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta chatset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-size=1">
    <meta name="theme-color" content=#ffe135>
    </head>
    <body>
        <center>
            <h1>Tugas PWPB</h1>
            <hr color="white">
            <form method="POST" action="absensi.php">
                <input type="text" name="nama" placeholder="Masukkan Nama Siswa" required/>
                <hr width="0%" height="0%" color="white">
                <input type="number" name="nisn" placeholder="Masukkan NISN Siswa" required/>
                <hr color="white">
                <input type="number" name="absen" placeholder="Absensi Siswa" required/>
                <hr color="white">
                <input type="checkbox" name="hadir">Hadir</input>
                <input type="checkbox" name="sakit">Sakit</input>
                <input type="checkbox" name="izin">Izin</input>
                <hr color="white">
                <button type="submit" name="Submit" value="Submit">Submit</button>
            </form>
        </center>
        <hr color="red">
        <center>
            <table border="1" cellpadding="5" cellspacing="0" style="border-color: blue; background-color: cyan; width: 30%; text-align: center;">
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">NISN</th>
                    <th rowspan="2">Nama</th>
                    <th colspan="3">Absensi</th>
                    </tr>
                    <tr>
                        <th>Hadir</th>
                        <th>Izin</th>
                        <th>Sakit</th>
                    </tr>
                    <?php
                    include "mysql.php";
                    $no = 1;
                    $query = mysqli_query($kon, 'SELECT * FROM table WHERE absen ORDER BY absen ASC');
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <tbody>
                            <td><?php echo $data['absen']?></td>
                            <td><?php echo $data['nisn'] ?></td>
                            <td><?php echo $data['nama']?></td>
                            <td><?php echo $data['hadir']?></td>
                            <td><?php echo $data['izin']?></td>
                            <td><?php echo $data['sakit'] ?></td>
                            </tr>
                                <?php } ?>
                            </tbody>
                </table>
            </center>
    </body>
</html>
