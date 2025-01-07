<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Peringatan Senarai Semak Perkembangan Anak</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Raleway', sans-serif;
      background-color: #ecf0f1;
      color: #000000;
    }

    .email-container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      border: 15px solid #3F51B2;
      border-radius: 8px;
      overflow: hidden;
    }

    .header {
      text-align: center;
      padding: 20px 0;
    }

    .header img {
      max-width: 100%;
      height: auto;
    }

    .divider {
      border-top: 1px solid #BBBBBB;
      margin: 10px 0;
    }

    .content {
      padding: 20px 40px;
      text-align: left;
    }

    .content h4 {
      margin-bottom: 15px;
      color: #3F51B2;
    }

    .content p {
      line-height: 1.6;
      margin: 10px 0;
    }

    .footer {
      text-align: center;
      padding: 20px;
      font-size: 12px;
      color: #888888;
    }

    @media (max-width: 480px) {
      .content {
        padding: 20px 10px;
      }

      .footer {
        padding: 10px;
      }
    }
  </style>
</head>

<body>
  <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #ecf0f1;">
    <tr>
      <td align="center">
        <div class="email-container">
          <!-- Header -->
          <div class="header">
            <img src="{{ asset('assets/img/logo.png') }}" alt="PediPulse Logo" style="max-height: 60px; width: auto;>
          </div>

          <div class="divider"></div>

          <!-- Content -->
          <div class="content">
            <h4>Peringatan Senarai Semak Perkembangan Anak</h4>
            <p>Selamat Sejahtera, {{ $child->parent->name }},</p>
            <p>Ini adalah peringatan bahawa anak anda, <strong>{{ $child->child_name }}</strong>, sedang mendekati pencapaian perkembangan <strong>{{ $milestone }}</strong> bulan.</p>
            <p>Jangan lupa untuk mengemaskini perkembangan mereka dalam sistem!</p>
            <p>Terima kasih kerana menggunakan perkhidmatan kami.</p>
          </div>

          <!-- Footer -->
          <div class="footer">
            &copy; {{ now()->year }} PediPulse. Semua Hakcipta Terpelihara.
          </div>
        </div>
      </td>
    </tr>
  </table>
</body>

</html>
