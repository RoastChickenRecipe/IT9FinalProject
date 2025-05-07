<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    
    <p style="text-align: center;">Republic of the Philippines</p>
    <p style="text-align: center;">City/Municipality of {{$mun}}</p>
    <p style="text-align: center;">BARANGAY {{$brgy}}</p><br>
    <h5 style="text-align: center; font-size:30px;">INCIDENT REPORT</h5><br>


    <div style="border: solid 1px black; padding: 5px 5px;">
        <p style="font-size:20px; font-weight:bold; margin: 0px 0px;">Type of Incident:</p>
        <p style="margin: 5px 0px 0px 0px;">{{$incType}}</p>
    </div>
    
    <div style="border: solid 1px black; padding: 5px 5px;">
        <p style="font-size:20px; font-weight:bold;  margin: 0px 0px;">Exact Location of Incident:</p>
        <p  style="margin: 5px 0px 0px 0px;">{{$location}}</p>
    </div>

    <div style="border: solid 1px black; padding: 5px 5px;">
        <p style="font-size:20px; font-weight:bold;  margin: 0px 0px;">Inclusive Dates and Time of Incident:</p>
        <p  style="margin: 5px 0px 0px 0px;">{{$dates_time}}</p>
    </div>

    <div style="border: solid 1px black; padding: 5px 5px;">
        <p style="font-size:20px; font-weight:bold;  margin: 0px 0px;">Involved Person/Specific Identification:</p>
        <p  style="margin: 5px 0px 0px 0px;">{{$involved}}</p>
    </div>

    <div style="border: solid 1px black; padding: 5px 5px;">
        <p style="font-size:20px; font-weight:bold;  margin: 0px 0px;">Narrative Details of Incident:</p>
        <p  style="margin: 5px 0px 0px 0px;">{{$description}}</p>
    </div>

    <div style="border: solid 1px black; padding: 5px 5px;">
        <p style="font-size:20px; font-weight:bold;  margin: 0px 0px;">Action Taken:</p>
        <p  style="margin: 5px 0px 0px 0px;">{{$action}}</p>
    </div><br>

    <div style="border: solid 1px black;">
        <table width="100%">
            <tr>
                <td width="50%"><p style="text-decoration: underline; margin: 5px;">Date Prepared: {{$date}}</p></td>
                <td width="50%"><p style="margin: 5px;">Date Received: ______________________________</p></td>
            </tr>
            <tr>
                <td height="50"> </td>
                <td height="50"> </td>
            </tr>
            <tr>
                <td width="50%"><p style="margin: 5px;">Prepared by:</p></td>
                <td width="50%"><p style="margin: 5px;">Received by:</p></td>
            </tr>
            <tr>
                <td width="50%"><p style="text-decoration: underline; margin: 5px;">{{$issued_by}}</p></td>
                <td width="50%"><p style="margin: 5px;">___________________________________________</p></td>
            </tr>
        </table>
    </div>
    
</body>
</html>