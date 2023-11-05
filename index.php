<html>
  <head>
    <!-- Load plotly.js into the DOM -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  </head>
  <body>
    <?php
      $url = "http://api.nbp.pl/api/exchangerates/tables/A/last/10/?format=json";
      $client = curl_init($url);
      curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($client);
      $result = json_decode($response);
      //echo var_dump($result);
    ?>
    <div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>
    <script>
      var trace2 = {
        x: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
        y: [<?php echo $result->rates[0]->mid; ?>, <?php echo $result->rates[1]->mid; ?>, <?php echo $result->rates[2]->mid; ?>, <?php echo $result->rates[3]->mid; ?>, <?php echo $result->rates[4]->mid; ?>, <?php echo $result->rates[5]->mid; ?>, <?php echo $result->rates[6]->mid; ?>, <?php echo $result->rates[7]->mid; ?>, <?php echo $result->rates[8]->mid; ?>, <?php echo $result->rates[9]->mid; ?>],
        mode: 'lines+markers',
        name: 'spline',
        line: {shape: 'spline'},
        type: 'scatter'
      };
      var data = [trace2];
      Plotly.newPlot('myDiv', data);
    </script>
  </body>
</html>
