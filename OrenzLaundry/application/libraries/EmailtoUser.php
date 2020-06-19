<?php

class EmailtoUser {

    public function transaksiberhasil($subject, $nama_user, $pesan)
    {
        return $message = '
    <!DOCTYPE html>
      <html>
      <head>
      <title>Verifikasi Akun Orenz Laundry</title>
      <!--
      
          An email present from your friends at Litmus (@litmusapp)
      
          Email is surprisingly hard. While this has been thoroughly tested, your mileage may vary.
          Its highly recommended that you test using a service like Litmus (http://litmus.com) and your own devices.
      
          Enjoy!
      
      -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <style type="text/css">
          /* CLIENT-SPECIFIC STYLES */
          body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
          table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
          img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */
      
          /* RESET STYLES */
          img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
          table{border-collapse: collapse !important;}
          body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
      
          /* iOS BLUE LINKS */
          a[x-apple-data-detectors] {
              color: inherit !important;
              text-decoration: none !important;
              font-size: inherit !important;
              font-family: inherit !important;
              font-weight: inherit !important;
              line-height: inherit !important;
          }
      
          /* MOBILE STYLES */
          @media screen and (max-width: 525px) {
      
              /* ALLOWS FOR FLUID TABLES */
              .wrapper {
                width: 100% !important;
                  max-width: 100% !important;
              }
      
              /* ADJUSTS LAYOUT OF LOGO IMAGE */
              .logo img {
                margin: 0 auto !important;
              }
      
              /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
              .mobile-hide {
                display: none !important;
              }
      
              .img-max {
                max-width: 100% !important;
                width: 100% !important;
                height: auto !important;
              }
      
              /* FULL-WIDTH TABLES */
              .responsive-table {
                width: 100% !important;
              }
      
              /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
              .padding {
                padding: 10px 5% 15px 5% !important;
              }
      
              .padding-meta {
                padding: 30px 5% 0px 5% !important;
                text-align: center;
              }
      
              .padding-copy {
                  padding: 10px 5% 10px 5% !important;
                text-align: justify;
              }
      
              .no-padding {
                padding: 0 !important;
              }
      
              .section-padding {
                padding: 50px 15px 50px 15px !important;
              }
      
              /* ADJUST BUTTONS ON MOBILE */
              .mobile-button-container {
                  margin: 0 auto;
                  width: 100% !important;
              }
      
              .mobile-button {
                  padding: 15px !important;
                  border: 0 !important;
                  font-size: 16px !important;
                  display: block !important;
              }
      
          }
      
          /* ANDROID CENTER FIX */
          div[style*="margin: 16px 0;"] { margin: 0 !important; }
      </style>
      </head>
      <body style="margin: 0 !important; padding: 0 !important;">
      
      <!-- HIDDEN PREHEADER TEXT -->
      <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
          Aktivasi Akun anda dengan cara mengunjungi link ini...
      </div>
      
      <!-- HEADER -->
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tr>
              <td bgcolor="#F69322" align="center" style="padding: 8px; font-size:9pt; color: #fff; font-family: Helvetica, Arial, sans-serif;">Orenz Laundry</td>
          </tr>
          <tr>
              <td bgcolor="#ffffff" align="center">
                  <!--[if (gte mso 9)|(IE)]>
                  <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                  <tr>
                  <td align="center" valign="top" width="500">
                  <![endif]-->
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                      <tr>
                          <td align="center" valign="top" style="padding: 40px 0 15px;" class="logo">
                              <a href="#" target="_blank">
                                  <img alt="Logo" src="https://lh3.googleusercontent.com/m4bbELxM-oJtDJ_2kU_98kXBeHzQluLLnwgL4-DlYpWlvH1EK_XtzrvT_n42a0amMu9qweKkpSpxn7RjKA6e1rcC3Kc5n4OAnf-SQJ6LeBJus9WWDoJAM5B3SJJzv5OanjFmH2bDKshrmv39gfi6FiYE0ZHkcdpdU5iXm9Ja_f3791xFxFpckaKegmIweRjXEJJyn67igWpuIi251VEuZOPC3V9-Sa5Yvjdbu6vxsQ_YMM0qm7h3f18fdc8YCLcii4oU0BvwMp9bNjOevDX-x7oyAYGTWjJ9TPRTvdCZF8cNuEFt9jSDpS2Q4AX29SaiUDnmBGAWPqLU7Ueqfp0Lfp7K0ppaTraGVdPnUon5RBzJguo04QqCdvr0GmYeyaREbs5L94W3NoyjGxiQeGyEWaxWu4ynPMiuI7Lx9Tc3H_ANdzeVvyJFXryLBgGTpMr4I-pXLvSlu33gfMimPNy49ZO8nX46rbjQo1xhyggvsSF16qVoOBLprST1JS3fCpM3aKYpZF2Imv68ZqqRcNLwHR3sqrkfR5fK5u4gD1ofIN1egXXiWFqE28zEt_u2NOFmGsc6IG_jp9s0aDaaxQ_I_dIDKFb7wPFOonMBG0rRUrnncoUlcfMxtDD_Vrsn5niJPaDYCEHwvx9c97GeKZ8TRPcqv2CBaPFUspXIq8DIA9D7VI8FaldBIOFtxwNfa7R1ary9HmJ6uWF3iGfwAynTMgUDIBLlEfwVHMK_3faUtS8BfAqO=w599-h266-no" width="135" height="60" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                              </a>
                          </td>
                      </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
              </td>
          </tr>
          <tr>
              <td bgcolor="#ffffff" align="center" style="padding: 15px;">
                  <!--[if (gte mso 9)|(IE)]>
                  <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                  <tr>
                  <td align="center" valign="top" width="500">
                  <![endif]-->
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                      <tr>
                          <td>
                              <!-- COPY -->
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                      <td align="center" style="font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 10px;" class="padding-copy">'.$subject.'</td>
                                  </tr>
                                  <tr>
                                      <td align="justify" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Hai '.$nama_user.',<br>'.$pesan.' :</td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
              </td>
          </tr>
          <tr>
              <td bgcolor="#ffffff" align="center" style="padding: 15px;">
                  <!--[if (gte mso 9)|(IE)]>
                  <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                  <tr>
                  <td align="center" valign="top" width="500">
                  <![endif]-->
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                      <tr>
                          <td>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                      <td>
                                          <!-- COPY -->
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                  <td align="left" style="padding: 0 0 0 0; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #aaaaaa; font-style: italic;" class="padding-copy">Jika data yang tertera diatas tidak cocok dengan data yang anda daftarkan, Mohon hubungi kami melalui Telepon/WhatsApp.</td>
                                              </tr>
                                          </table>
                                      </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
              </td>
          </tr>
          <tr>
              <td bgcolor="#25A8E0" align="center" style="padding: 20px 0px;">
                  <!--[if (gte mso 9)|(IE)]>
                  <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                  <tr>
                  <td align="center" valign="top" width="500">
                  <![endif]-->
                  <!-- UNSUBSCRIBE COPY -->
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 500px;" class="responsive-table">
                      <tr>
                          <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#fff;">
                              Perumahan Mastrip Blok G-21, Sumbersai, Jember
                              <br>
                              +62 81 556 885 614 (Hp) &nbsp;&nbsp; 
                              <br>
                              <span style="color: #fff; text-decoration: none;">Orenz Laundry</span>
                              <span style="font-family: Arial, sans-serif; font-size: 12px; color:#fff;">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                              <span href="http://litmus.com" target="_blank" style="color: #fff; text-decoration: none;">&copy; 2020</span>
                          </td>
                      </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
              </td>
          </tr>
      </table>
      
      </body>
      </html>
    ';
    }

  public function verifikasiakun($subject, $nama_user, $pesan, $kode_token, $email)
  {
    return $message = '
    <!DOCTYPE html>
      <html>
      <head>
      <title>Verifikasi Akun Orenz Laundry</title>
      <!--
      
          An email present from your friends at Litmus (@litmusapp)
      
          Email is surprisingly hard. While this has been thoroughly tested, your mileage may vary.
          Its highly recommended that you test using a service like Litmus (http://litmus.com) and your own devices.
      
          Enjoy!
      
      -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <style type="text/css">
          /* CLIENT-SPECIFIC STYLES */
          body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
          table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
          img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */
      
          /* RESET STYLES */
          img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
          table{border-collapse: collapse !important;}
          body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
      
          /* iOS BLUE LINKS */
          a[x-apple-data-detectors] {
              color: inherit !important;
              text-decoration: none !important;
              font-size: inherit !important;
              font-family: inherit !important;
              font-weight: inherit !important;
              line-height: inherit !important;
          }
      
          /* MOBILE STYLES */
          @media screen and (max-width: 525px) {
      
              /* ALLOWS FOR FLUID TABLES */
              .wrapper {
                width: 100% !important;
                  max-width: 100% !important;
              }
      
              /* ADJUSTS LAYOUT OF LOGO IMAGE */
              .logo img {
                margin: 0 auto !important;
              }
      
              /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
              .mobile-hide {
                display: none !important;
              }
      
              .img-max {
                max-width: 100% !important;
                width: 100% !important;
                height: auto !important;
              }
      
              /* FULL-WIDTH TABLES */
              .responsive-table {
                width: 100% !important;
              }
      
              /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
              .padding {
                padding: 10px 5% 15px 5% !important;
              }
      
              .padding-meta {
                padding: 30px 5% 0px 5% !important;
                text-align: center;
              }
      
              .padding-copy {
                  padding: 10px 5% 10px 5% !important;
                text-align: justify;
              }
      
              .no-padding {
                padding: 0 !important;
              }
      
              .section-padding {
                padding: 50px 15px 50px 15px !important;
              }
      
              /* ADJUST BUTTONS ON MOBILE */
              .mobile-button-container {
                  margin: 0 auto;
                  width: 100% !important;
              }
      
              .mobile-button {
                  padding: 15px !important;
                  border: 0 !important;
                  font-size: 16px !important;
                  display: block !important;
              }
      
          }
      
          /* ANDROID CENTER FIX */
          div[style*="margin: 16px 0;"] { margin: 0 !important; }
      </style>
      </head>
      <body style="margin: 0 !important; padding: 0 !important;">
      
      <!-- HIDDEN PREHEADER TEXT -->
      <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
          Aktivasi Akun anda dengan cara mengunjungi link ini...
      </div>
      
      <!-- HEADER -->
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tr>
              <td bgcolor="#F69322" align="center" style="padding: 8px; font-size:9pt; color: #fff; font-family: Helvetica, Arial, sans-serif;">Orenz Laundry</td>
          </tr>
          <tr>
              <td bgcolor="#ffffff" align="center">
                  <!--[if (gte mso 9)|(IE)]>
                  <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                  <tr>
                  <td align="center" valign="top" width="500">
                  <![endif]-->
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                      <tr>
                          <td align="center" valign="top" style="padding: 40px 0 15px;" class="logo">
                              <a href="#" target="_blank">
                                  <img alt="Logo" src="https://lh3.googleusercontent.com/m4bbELxM-oJtDJ_2kU_98kXBeHzQluLLnwgL4-DlYpWlvH1EK_XtzrvT_n42a0amMu9qweKkpSpxn7RjKA6e1rcC3Kc5n4OAnf-SQJ6LeBJus9WWDoJAM5B3SJJzv5OanjFmH2bDKshrmv39gfi6FiYE0ZHkcdpdU5iXm9Ja_f3791xFxFpckaKegmIweRjXEJJyn67igWpuIi251VEuZOPC3V9-Sa5Yvjdbu6vxsQ_YMM0qm7h3f18fdc8YCLcii4oU0BvwMp9bNjOevDX-x7oyAYGTWjJ9TPRTvdCZF8cNuEFt9jSDpS2Q4AX29SaiUDnmBGAWPqLU7Ueqfp0Lfp7K0ppaTraGVdPnUon5RBzJguo04QqCdvr0GmYeyaREbs5L94W3NoyjGxiQeGyEWaxWu4ynPMiuI7Lx9Tc3H_ANdzeVvyJFXryLBgGTpMr4I-pXLvSlu33gfMimPNy49ZO8nX46rbjQo1xhyggvsSF16qVoOBLprST1JS3fCpM3aKYpZF2Imv68ZqqRcNLwHR3sqrkfR5fK5u4gD1ofIN1egXXiWFqE28zEt_u2NOFmGsc6IG_jp9s0aDaaxQ_I_dIDKFb7wPFOonMBG0rRUrnncoUlcfMxtDD_Vrsn5niJPaDYCEHwvx9c97GeKZ8TRPcqv2CBaPFUspXIq8DIA9D7VI8FaldBIOFtxwNfa7R1ary9HmJ6uWF3iGfwAynTMgUDIBLlEfwVHMK_3faUtS8BfAqO=w599-h266-no" width="135" height="60" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                              </a>
                          </td>
                      </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
              </td>
          </tr>
          <tr>
              <td bgcolor="#ffffff" align="center" style="padding: 15px;">
                  <!--[if (gte mso 9)|(IE)]>
                  <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                  <tr>
                  <td align="center" valign="top" width="500">
                  <![endif]-->
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                      <tr>
                          <td>
                              <!-- COPY -->
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                      <td align="center" style="font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 10px;" class="padding-copy">'.$subject.'</td>
                                  </tr>
                                  <tr>
                                      <td align="justify" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Hai '.$nama_user.',<br>'.$pesan.' :</td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
              </td>
          </tr>
          <tr>
              <td bgcolor="#ffffff" align="center" style="padding: 15px;" class="padding">
                  <!--[if (gte mso 9)|(IE)]>
                  <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                  <tr>
                  <td align="center" valign="top" width="500">
                  <![endif]-->
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                      <tr>
                          <td style="padding: 10px 0 0 0; border-top: 1px dashed #aaaaaa;">
                              <!-- TWO COLUMNS -->
                              <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                  <tr>
                                      <td valign="top" class="mobile-wrapper">
                                          <!-- LEFT COLUMN -->
                                          <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 30%;" align="left">
                                              <tr>
                                                  <td style="padding: 0 0 10px 0;">
                                                      <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                          <tr>
                                                              <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">Nama</td>
                                                          </tr>
                                                      </table>
                                                  </td>
                                              </tr>
                                          </table>
                                          <!-- RIGHT COLUMN -->
                                          <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 70%;" align="left">
                                              <tr>
                                                  <td style="padding: 0 0 10px 0;">
                                                      <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                          <tr>
                                                              <td align="justify" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">: '.$nama_user.'</td>
                                                          </tr>
                                                      </table>
                                                  </td>
                                              </tr>
                                          </table>
                                      </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                      <tr>
                          <td style="padding: 10px 0 0 0; border-top: 1px dashed #aaaaaa;">
                              <!-- TWO COLUMNS -->
                              <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                  <tr>
                                      <td valign="top" class="mobile-wrapper">
                                          <!-- LEFT COLUMN -->
                                          <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 30%;" align="left">
                                              <tr>
                                                  <td style="padding: 0 0 10px 0;">
                                                      <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                          <tr>
                                                              <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">Kode Verifikasi</td>
                                                          </tr>
                                                      </table>
                                                  </td>
                                              </tr>
                                          </table>
                                          <!-- RIGHT COLUMN -->
                                          <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 70%;" align="left">
                                              <tr>
                                                  <td style="padding: 0 0 10px 0;">
                                                      <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                          <tr>
                                                              <td align="justify" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">: '.$kode_token.'</td>
                                                          </tr>
                                                      </table>
                                                  </td>
                                              </tr>
                                          </table>
                                      </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
              </td>
          </tr>
          <tr>
              <td bgcolor="#ffffff" align="center" style="padding: 15px;">
                  <!--[if (gte mso 9)|(IE)]>
                  <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                  <tr>
                  <td align="center" valign="top" width="500">
                  <![endif]-->
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                      <tr>
                          <td>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                      <td>
                                          <!-- COPY -->
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                  <td align="left" style="padding: 0 0 0 0; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #aaaaaa; font-style: italic;" class="padding-copy">Jika data yang tertera diatas tidak cocok dengan data yang anda daftarkan, Mohon hubungi kami melalui Telepon/WhatsApp.</td>
                                              </tr>
                                          </table>
                                      </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
              </td>
          </tr>
          <tr>
              <td bgcolor="#25A8E0" align="center" style="padding: 20px 0px;">
                  <!--[if (gte mso 9)|(IE)]>
                  <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                  <tr>
                  <td align="center" valign="top" width="500">
                  <![endif]-->
                  <!-- UNSUBSCRIBE COPY -->
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 500px;" class="responsive-table">
                      <tr>
                          <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#fff;">
                              Perumahan Mastrip Blok G-21, Sumbersai, Jember
                              <br>
                              +62 81 556 885 614 (Hp) &nbsp;&nbsp; 
                              <br>
                              <span style="color: #fff; text-decoration: none;">Orenz Laundry</span>
                              <span style="font-family: Arial, sans-serif; font-size: 12px; color:#fff;">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                              <span href="http://litmus.com" target="_blank" style="color: #fff; text-decoration: none;">&copy; 2020</span>
                          </td>
                      </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
              </td>
          </tr>
      </table>
      
      </body>
      </html>
    ';
  }
}