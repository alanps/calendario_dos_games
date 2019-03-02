<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
</head>
<body style="background-color: #5B5E6B; padding-top:30px; padding-bottom:30px">

<div>
<style>body{ background-color: #5B5E6B; padding-top:30px; padding-bottom:30px}</style>
</div>


<table width="600" align="center" cellpadding="0" cellspacing="0" border="0" style="font-family: 'Arial', Arial;color:#000; text-align:center; background-color: #FFF !important;">
        <tbody>
        <tr>
            <td>
            <br><br><br>
                <img src="{{ $apiurl }}public/images/logo_positivo.png" alt="" style="margin-top: 3px; width: 115px; height: 130px; display: block; margin: 0 auto;">
            </td>
        </tr>
        <tr>
            <td style="padding-bottom:50px">

                <!-- Código da formatação do texto  !-->
                <br><br>
                <center><div style="color: #757575; font-size: 12px; width: 380px; line-height: 19px;">Seu PDF foi gerado com sucesso, segue o link de acesso: {{ $pdf }}</div></center>
                <br>
                <hr style="width: 200px; border-top: 1px; ">
                <br>
                <div style="font-size: 12px; font-weight: bold; color: #5B5E6B">{{ $projeto }}</div>

                <a href="{{ $site }}" target="_blank" style="font-weight: bold; font-size: 12px; color: #00AEEF; text-decoration:none;">{{ $site }}</a>
                <!-- Fim do código da formatação do texto   !-->

            </td>
        </tr>
    </tbody>
</table>


</body>
</html>