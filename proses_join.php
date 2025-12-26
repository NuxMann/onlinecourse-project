<?php
// ==========================
// LOAD LIBRARY
// ==========================
require_once __DIR__ . '/vendor/setasign/fpdf/fpdf.php';

require_once __DIR__ . '/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/phpmailer/src/SMTP.php';
require_once __DIR__ . '/vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ==========================
// AMBIL DATA FORM
// ==========================
$nama   = htmlspecialchars($_POST['fullName']);
$email  = htmlspecialchars($_POST['email']);
$alamat = htmlspecialchars($_POST['alamat']);
$nohp   = htmlspecialchars($_POST['nohp']);
$course = htmlspecialchars($_POST['course']);
$tanggal = date('d M Y');
$noReg  = 'GZC-' . date('Ymd') . '-' . rand(100,999);

// ==========================
// 1️⃣ GENERATE PDF STYLISH
// ==========================
$pdf = new FPDF();
$pdf->AddPage();

// HEADER
$pdf->SetFillColor(74,144,226);
$pdf->Rect(0, 0, 210, 35, 'F');
$pdf->SetFont('Arial','B',18);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(0,25,'GEN Z COURSE',0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,5,'Konfirmasi Pendaftaran Member',0,1,'C');

$pdf->Ln(20);

// BODY CARD
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,'DATA PENDAFTARAN',0,1);

$pdf->SetFont('Arial','',12);
$pdf->Cell(60,8,'No Registrasi',0,0);
$pdf->Cell(0,8,": $noReg",0,1);

$pdf->Cell(60,8,'Nama Lengkap',0,0);
$pdf->Cell(0,8,": $nama",0,1);

$pdf->Cell(60,8,'Email',0,0);
$pdf->Cell(0,8,": $email",0,1);

$pdf->Cell(60,8,'Alamat',0,0);
$pdf->Cell(0,8,": $alamat",0,1);

$pdf->Cell(60,8,'No HP',0,0);
$pdf->Cell(0,8,": $nohp",0,1);

$pdf->Cell(60,8,'Kursus Pilihan',0,0);
$pdf->Cell(0,8,": $course",0,1);

$pdf->Cell(60,8,'Tanggal Daftar',0,0);
$pdf->Cell(0,8,": $tanggal",0,1);

$pdf->Ln(10);

// INFO BOX
$pdf->SetFillColor(230,242,255);
$pdf->SetDrawColor(74,144,226);
$pdf->Rect(10, $pdf->GetY(), 190, 35, 'DF');

$pdf->SetXY(15, $pdf->GetY() + 5);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(180,7,
"Terima kasih telah bergabung sebagai member Gen Z Course.
Dokumen ini adalah bukti resmi pendaftaran Anda.
Silakan simpan PDF ini dengan baik untuk keperluan administrasi."
);

$pdf->Ln(30);

// FOOTER
$pdf->SetFont('Arial','I',10);
$pdf->SetTextColor(120,120,120);
$pdf->Cell(0,10,'Gen Z Course || www.genzcourse.id',0,1,'C');

$filename = "Konfirmasi_Member_$noReg.pdf";
$pdf->Output('F', $filename);

// ==========================
// 2️⃣ KIRIM EMAIL + PDF
// ==========================
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'fahryachmadwibowo43@gmail.com';       // GANTI
    $mail->Password   = 'xozh qyti cgrf snus';         // GANTI
    // $mail->SMTPSecure = 'tls';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;;
    $mail->Port       = 587;

    $mail->setFrom('fahryachmadwibowo43@gmail.com', 'Gen Z Course');
    $mail->addAddress($email, $nama);
    $mail->addAttachment($filename);

    $mail->isHTML(true);
    $mail->Subject = 'Konfirmasi Pendaftaran Member - Gen Z Course';
    $mail->Body = "
    <div style='font-family:Segoe UI,sans-serif;max-width:600px;margin:auto;background:#f4f7fb;padding:25px;border-radius:12px'>
      <h2 style='color:#4a90e2'>Halo, $nama 👋</h2>
      <p>Terima kasih telah bergabung sebagai <b>member Gen Z Course</b>.</p>

      <table style='width:100%;background:#fff;border-radius:8px;padding:15px'>
        <tr><td><b>No Registrasi</b></td><td>$noReg</td></tr>
        <tr><td><b>Kursus</b></td><td>$course</td></tr>
        <tr><td><b>Tanggal</b></td><td>$tanggal</td></tr>
      </table>

      <p style='margin-top:20px'>
        📎 File <b>PDF Konfirmasi</b> terlampir sebagai bukti pendaftaran resmi Anda.
      </p>

      <p>Salam hangat,<br><b>Gen Z Course Team</b></p>
    </div>
    ";

    $mail->send();
    unlink($filename);

    // ==========================
    // HALAMAN SUKSES
    // ==========================
    echo "
    <!DOCTYPE html>
    <html lang='id'>
    <head>
      <meta charset='UTF-8'>
      <title>Registrasi Berhasil</title>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <style>
        body{
          margin:0;min-height:100vh;
          display:flex;align-items:center;justify-content:center;
          background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
          font-family:'Segoe UI',sans-serif;color:#fff
        }
        .card{
          background:rgba(255,255,255,.1);
          backdrop-filter:blur(14px);
          padding:40px;
          border-radius:18px;
          text-align:center;
          max-width:420px;
          box-shadow:0 20px 45px rgba(0,0,0,.45)
        }
        h2{margin-bottom:10px}
        p{color:#d6eaff}
        .btn{
          display:inline-block;margin-top:25px;
          padding:12px 28px;
          background:#4a90e2;
          color:#fff;text-decoration:none;
          border-radius:10px;font-weight:600
        }
        .btn:hover{background:#357abd}
      </style>
    </head>
    <body>
      <div class='card'>
        <div style='font-size:60px'>🎉</div>
        <h2>Registrasi Berhasil</h2>
        <p>PDF konfirmasi telah dikirim ke<br><b>$email</b></p>
        <a href='index.php' class='btn'>Kembali ke Home</a>
      </div>
    </body>
    </html>
    ";

} catch (Exception $e) {

    // ==========================
    // HALAMAN GAGAL
    // ==========================
    echo "
    <!DOCTYPE html>
    <html lang='id'>
    <head>
      <meta charset='UTF-8'>
      <title>Registrasi Gagal</title>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <style>
        body{
          margin:0;min-height:100vh;
          display:flex;align-items:center;justify-content:center;
          background:linear-gradient(135deg,#2c0f0f,#3a2020,#642c2c);
          font-family:'Segoe UI',sans-serif;color:#fff
        }
        .card{
          background:rgba(255,255,255,.08);
          backdrop-filter:blur(12px);
          padding:40px;
          border-radius:18px;
          text-align:center;
          max-width:420px;
          box-shadow:0 20px 45px rgba(0,0,0,.45)
        }
        .btn{
          display:inline-block;margin-top:25px;
          padding:12px 28px;
          background:#ff4b4b;
          color:#fff;text-decoration:none;
          border-radius:10px;font-weight:600
        }
      </style>
    </head>
    <body>
      <div class='card'>
        <div style='font-size:60px'>⚠️</div>
        <h2>Registrasi Gagal</h2>
        <p>{$mail->ErrorInfo}</p>
        <a href='join-member.php' class='btn'>Coba Lagi</a>
      </div>
    </body>
    </html>
    ";
}
