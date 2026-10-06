<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Verifikasi Email</title>
    <script>
        if (sessionStorage.getItem('is_internal_nav') === 'true') {
            document.documentElement.classList.add('internal-nav');
        }
    </script>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: 'Segoe UI', Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="420" cellpadding="0" cellspacing="0" style="background: #ffffff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); overflow: hidden;">

                    <tr>
                        <td style="background: linear-gradient(to right, #03376e, #246ebd); padding: 25px 30px; text-align: center;">
                            <h1 style="color: #ffffff; font-size: 18px; margin: 0; font-weight: 700;">
                                BNN Kota Banjarmasin
                            </h1>
                            <p style="color: rgba(255,255,255,0.85); font-size: 12px; margin: 5px 0 0;">
                                Badan Narkotika Nasional Republik Indonesia
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 35px 30px; text-align: center;">
                            <p style="color: #333333; font-size: 14px; margin: 0 0 8px; font-weight: 600;">
                                Kode Verifikasi Email Anda
                            </p>
                            <p style="color: #666666; font-size: 12px; margin: 0 0 25px; line-height: 1.5;">
                                Masukkan kode berikut untuk memverifikasi alamat email Anda.
                            </p>

                            <div style="background: #f0f6ff; border: 2px dashed #246ebd; border-radius: 10px; padding: 18px 20px; display: inline-block;">
                                <span style="font-size: 36px; font-weight: 800; letter-spacing: 12px; color: #03376e;">
                                    {{ $code }}
                                </span>
                            </div>

                            <p style="color: #e53935; font-size: 12px; margin: 20px 0 0; font-weight: 600;">
                                Kode ini berlaku selama 2 menit.
                            </p>
                            <p style="color: #888888; font-size: 11px; margin: 10px 0 0; line-height: 1.5;">
                                Jika Anda tidak melakukan pendaftaran, abaikan email ini.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="background: #f8f8f8; padding: 15px 30px; text-align: center; border-top: 1px solid #eeeeee;">
                            <p style="color: #999999; font-size: 10px; margin: 0;">
                                &copy; {{ date('Y') }} BNN Kota Banjarmasin. Seluruh hak dilindungi.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
