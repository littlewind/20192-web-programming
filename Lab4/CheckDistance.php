<html>
  <head>
    <title>Distance an Time Calculations</title>
  </head>

  <body>
    <?php
      $cities = array ('Dallas' => 803, 
                      'Toronto' => 435,
                      'Boston' => 848,
                      'Nashville' => 406,
                      'Las Vegas' => 1526,
                      'San Francisco' => 1835,
                      'Washington, DC' => 595,
                      'Miami' => 1189,
                      'Pittsburgh' => 409);

      $destination = $_GET['destination'];
      if (count($destination) != 0) {
        print "From Chicago to:<br>";
        print '<table border=1>
        <tr>
        <th>No.</th>
        <th>Destination</th>
        <th>Distance</th>
        <th>Driving time</th>
        <th>Walking time</th>
        </tr>';
        for ($i = 0; $i < count($destination); $i++) {
          if (isset($cities[$destination[$i]])) {
            $distance = $cities[$destination[$i]];
            $time = round($distance / 60, 2);
            $walktime = round($distance / 5, 2);

            print "<tr>
            <td>".($i + 1)."</td>
            <td>$destination[$i]</td>
            <td>$distance</td>
            <td>$time</td>
            <td>$walktime</td>
            </tr>";
          } else {
            print "<tr>
            <td>".($i + 1)."</td>
            <td>$destination[$i]</td>
            <td> ? </td>
            <td> ?</td>
            <td> ? </td>
            </tr>";
          }
        }
        print '</table>';
      } else {
        print '<font size=4 color=red> No destination is chosen </font>';
      }
    ?>
  </body>
</html>