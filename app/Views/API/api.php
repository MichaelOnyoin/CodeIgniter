<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Api Stiff</title>
</head>
<body>
  <script>
    let apiResponse;
    let requestObject=new XMLHttpRequest();
    requestObject.open("GET","https://api.nationalize.io/?name=Nathaniel");
    requestObject.send();
    requestObject.onload=function(){
      apiResponse=JSON.parse(requestObject.responseText);
      document.write('<table cellspacing=Opx cellpadding=30px>');
      document.write('<tr style="background-color:#DEEFAF6;"><td>Country_id</td><td>Probability</td></tr>');
      apiResponse.country.forEach(displayRow);
      function displayRow(row){
        document.write('<tr><td>'+row.country_id+'</td><td>'+row.probability+'</td></tr>');
      }
      document.write('</table>');

    }
  </script>
</body>
</html>