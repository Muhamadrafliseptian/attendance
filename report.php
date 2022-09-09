<html>

<head>
    <title>Laporan Tanggal : <?php echo date("Y-m-d"); ?> </title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .box {
            padding: 50px;
        }
    </style>
</head>

<body>

    <div class="box">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th>Nama</th>
                    <th class="text-center">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $no = 0;
                $query = $conn->query("SELECT * FROM attendance_records  WHERE attendance_records.attendance_status = 'Hadir' ");
                while ($data = $query->fetch_array()) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo ++$no ?>.</td>
                        <td><?php echo $data["namapeserta"] ?></td>
                        <td class="text-center"><?php echo $data["tanggal"]; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <?php
                    $idp = $_GET['idp'];
                    $que = $conn->query("SELECT * FROM pertemuan WHERE idpertemuan = $idp");
                    $q = $que->fetch_assoc();
                    ?>
                    <td colspan="3">
                        Acara :
                        <b>
                            <?php echo $q["namapertemuan"] ?>
                        </b>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

</html>