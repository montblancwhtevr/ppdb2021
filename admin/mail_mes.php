<?php
 error_reporting("null");
date_default_timezone_set("Asia/Jakarta");
  include ("../con_db/connection.php");
$proc_es=$_GET['proc_es'];
$enctype=$_GET['enctype'];
$u=$_GET['u'];
$e_cty=$_GET['e_cty'];

$e_mail=mysqli_fetch_row(mysqli_query($conn,"Select email from tb_pesan where id_pesan='$u'"));
$e_cof=mysqli_fetch_row(mysqli_query($conn,"Select pesan from tb_bls_pesan where id_pesan='$u'"));

include "classes/class.phpmailer.php";
$email="$e_mail[0]";
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "srv49.niagahoster.com"; 
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "admin_ppdb@rdigitalpro.com"; //user email
$mail->Password = "sakura@89"; //password email 
$mail->SetFrom("admin_ppdb@rdigitalpro.com","Admin SMP Muhammadiyah 4 Yogyakarta"); //set email pengirim
$mail->Subject = "Informasi Balasan Pesan Anda"; //subyek email
$mail->AddAddress("$email","nama email tujuan");  //tujuan email
$mail->MsgHTML("Terima kasih anda telah melakukan pengiriman pesan ke SMP Muhammadiyah 4 Yogyakarta. Berikut Adalah Isi Pesan Balasan Kami:<br /><br />

	<h3>$e_cof[0]</h3><br />

    Salam Hormat Kami,<br />
    SMP MUHAMMADIYAH 4 YOGYAKARTA<br />
    Jl. Ki Mangunsarkoro No.43, Gunungketur, Pakualaman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55166<br />
    (0274) 554623");
$mail->Send();
?>
<script type="text/javascript">
    window.location="pro_mes?proc_es=<?php echo"$proc_es";?>&enctype=<?php echo"$enctype";?>&u=<?php echo"$u";?>&e_cty=<?php echo"$e_cty";?>&st_a=ok#fc";
</script>