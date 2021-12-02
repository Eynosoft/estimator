<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <style>
    * {
      font-family: DejaVu Sans, sans-serif;
    }
  </style>

  <title>Estimation Report</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <style>
    table th {
      background-color: #D3D3D3;
      border: 1px solid black;
      color: #000 !important;
      font-size: 15px;
      /* line-height: 15px !important; */
    }

    table td {
      line-height: 15px !important;
      vertical-align: middle !important;
      border: 1px solid black;
      font-size: 13px;
      /* background-color: #D3D3D3; */
    }

    hr.new3 {
      border-top: 1px dotted;
    }

</style>

</head>

<?php

// echo "<pre>";
// print_r($estimation_report);
// die('####');

?>

<body>

  <div class="container">

    <h3 style="margin-bottom: 2px;">Estimation Report (εκτίμηση της έκθεσης εργασίας) </h3>
    <hr class="new3">

    <?php

    if(!empty($estimation_report[0]['from_date'])){
    $originalfromDate = $estimation_report[0]['from_date'];
    $newfromDate = date("d/m/Y h:i:sa", strtotime($originalfromDate));
    }

    if(!empty($estimation_report[0]['till_date'])){
    $originaltillDate = $estimation_report[0]['till_date'];
    $newtillDate = date("d/m/Y h:i:sa", strtotime($originaltillDate));
    }

    ?>

    <h4 style="margin-bottom: 2px;"><?php echo $estimation_report[0]['customer']; ?></h4>
     <?php if(!empty($estimation_report[0]['from_date']) && !empty($estimation_report[0]['till_date'])) { ?>
    <p>( From <b><?php echo $newfromDate; ?></b> To  <b><?php echo $newtillDate; ?></b> )</p>
    <?php } ?>

    <hr class="new3">
    <table style="width: 100%;" cellspacing="0" cellpadding="6">

      <tr>
        <th style="width: 30%;text-align:left;">Requested</th>
        <th style="width: 30%;text-align:left;">Assigned</th>
        <th style="width: 30%;text-align:left;">Request</th>
        <th style="width: 30%;text-align:left;">Identifier</th>
        <th style="width: 30%;text-align:left;">Requested By</th>
        <th style="width: 30%;text-align:left;">Reserves</th>
      </tr>

    <?php if(!empty($estimation_report)) { foreach ($estimation_report as $value) {  ?>

      <tr>
        <td><?php echo $value['requested_date']; ?></td>
        <td><?php echo $value['visit_date']; ?></td>
        <td><?php echo $value['request_no']; ?></td>
        <td><?php echo $value['vehicle']; ?></td>
        <td><?php echo $value['requestor']; ?></td>
        <td><?php echo $value['reservers']; ?></td>
      </tr>

    <?php } } else { ?>

      <tr>
        <td colspan="6" style="text-align: center;">Data Not Found..!</td>
      </tr>

    <?php } ?>

    </table>

    <hr class="new3">

  </div>

</body>

</html>