<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Perhari Siswa Tanggal : <?php echo date("Y-m-d") ?></title>
    <style type="text/css">
        body {
            padding: 30px
        }

        .print-area {
            border: 1px solid red;
            padding: 1em;
            margin: 0 0 1em
        }
    </style>
</head>

<body>

    <div id="print-area-2" class="print-area">
        <div style="text-align:right;"><a class="no-print" href="javascript:printDiv('print-area-2');">Print</a></div>
        <center>
            <h3>
                <?php
                $idp = $_GET['idp'];
                $query = $conn->query("SELECT * FROM attendance_records JOIN pertemuan ON attendance_records.id_pertemuan = pertemuan.idpertemuan WHERE id_pertemuan = $idp");

                $edit = $query->fetch_assoc();

                echo "<h3>Acara: " . $edit["namapertemuan"] . "</h3>";
                ?>
            </h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th align="center">No.</th>
                        <th align="center">Nama Peserta</th>
                        <th>Status Kehadiran</th>
                        <th>Jam Kehadiran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 0;
                    $idp = $_GET['idp'];
                    $query = $conn->query("SELECT * FROM attendance_records WHERE id_pertemuan = $idp");
                    while ($data = $query->fetch_array()) {
                    ?>
                        <tr>
                            <td align="center"><?php echo ++$no ?>.</td>
                            <td><?php echo $data["namapeserta"] ?></td>
                            <td align="center"><?php echo $data['attendance_status'] ?></td>
                            <td><?php echo $data["tanggal"] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </center>
    </div>

    <textarea id="printing-css" style="display:none;">
		html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{
		margin:0;
		padding:0;
		border:0;
		font-size:100%;
		font:inherit;
		vertical-align:baseline
	}
	article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
    <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>

    <script type="text/javascript">
        function printDiv(elementId) {
            var a = document.getElementById('printing-css').value;
            var b = document.getElementById(elementId).innerHTML;
            window.frames["print_frame"].document.title = document.title;
            window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>
</body>

</html>