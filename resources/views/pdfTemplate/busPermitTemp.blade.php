<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #font {
        font-size: 20px;
    }
</style>
<body>
    <p style="text-align: center;">Republic of the Philippines</p>
    <p style="text-align: center;">City/Municipality of {{$mun}}</p>
    <p style="text-align: center; font-size:15px;">OFFICE OF THE MUNICIPAL MAYOR</p>
    <hr>
    <p  style="text-align: center; font-size:30px;">BUSINESS PERMIT NO. {{$get_id}}</p>
    
    <p id="font">
        Is hereby granted to <strong style="text-decoration: underline;">{{$name}}</strong> of <strong style="text-decoration: underline;">{{$address}}</strong>
        , Davao del sur, to operate the business of {{$busType}}, upon payment of the required licence fee (s) (Quarterly / Semi-Annually / Annualy),
        revoked or cancelled for cause.
    </p><br>

    <p id="font">
        This PERMIT, together with the official receipt/s shall be displayed in a conspicuous place of business.
    </p><br>

    <p id="font">
        Issued this <strong style="text-decoration: underline;">{{$date}}</strong> Municipal Hall, {{$mun}} Davao del sur, Philippines.
    </p><br>

    <table width="100%">

        <tr>
            <td width="30%"><p id="font" style="margin: 5px;">PAID UNDER O.R #</p></td>
            <td><p id="font" style="margin: 5px;">____________________</p></td>
        </tr>
        <tr>
            <td width="30%"><p id="font" style="margin: 5px;">DATE ISSUED:</p></td>
            <td><strong style="text-decoration: underline; margin: 5px; font-size:20px;">{{$date}}</strong></td>
        </tr>
        <tr>
            <td width="30%"><p style="color: red; font-size:20px; margin: 5px;">EXPIRY DATE:</p></td>
            <td><p style="color: red; font-size:20px; margin: 5px;">____________________</p></td>
        </tr>

    </table>

    
</body>
</html>