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
      background: #0c1c60 !important;
      color: #fff !important;
      line-height: 15px !important;
    }

    table td {
      line-height: 15px !important;
      vertical-align: middle !important;
      border: 1px solid black;
      background-color: #D3D3D3;
    }

    hr.new3 {
      border-top: 1px dotted;
    }

  </style>
</head>

<body>

  <?php 
  
  //  echo "<pre>";
  //  print_r($estimation_report);
  //  die('####');

  ?>

  <div class="container">

  <h2 style="margin-bottom: 2px;"> Assesor & Adjustors Services </h2><br>
    
    <h3 style="margin-bottom: 2px;">Estimation Job Report (εκτίμηση της έκθεσης εργασίας) </h3>
    <hr class="new3">

    <h3 style="margin-bottom: 2px;">Request Data</h3>
    <hr class="new3">

    <table style="width: 100%;" cellspacing="0" cellpadding="6">
      <tr>
        <td style="width: 30%;text-align:left;">Request Number </td>
        <td style="width: 70%;text-align:left;background-color: #fff;"><?php echo $estimation_report['request_no']; ?></td>
      </tr>

      <tr>
        <td style="width: 30%;text-align:left;">Assessor</td>
        <td style="width:70%;text-align:left;background-color: #fff;"><?php echo $estimation_report['assessor']; ?></td>
      </tr>

      <tr>
        <td style="width: 30%;text-align:left;">Requested Date</td>
        <td style="width:70%;text-align:left;background-color: #fff;"><?php echo $estimation_report['requested_date']; ?></td>
      </tr>

      <tr>
        <td style="width: 30%;text-align:left;">Requested By</td>
        <td style="width:70%;text-align:left;background-color: #fff;"><?php echo $estimation_report['requestor']; ?></td>
      </tr>

    </table>

    <h3 style="margin-bottom: 2px;">Vehicle Information</h3>
    <hr class="new3">

    <table style="width: 100%;" cellspacing="0" cellpadding="6">

      <tr>
        <td style="width: 25%;text-align:left;">Vehicle </td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['vehicle']; ?></td>
        <td style="width: 25%;text-align:left;">Claim Nnumber </td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['claim_number']; ?></td>
      </tr>

      <tr>
        <td style="width: 25%;text-align:left;">Insured Reference </td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['insured_reference']; ?></td>
        <td style="width: 25%;text-align:left;">Policy Number</td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['policy_number']; ?></td>
      </tr>

      <tr>
        <td style="width: 25%;text-align:left;">Pre Accident Condition </td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['pre_accident_condition']; ?></td>
        <td style="width: 25%;text-align:left;">Tyre Condition </td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['tyre_condition']; ?></td>
      </tr>

      <tr>
        <td style="width: 25%;text-align:left;">Speedo Reading </td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['speedo_reading']; ?></td>
        <td style="width: 25%;text-align:left;">-</td>
        <td style="width: 25%;text-align:left;background-color: #fff;">-</td>
      </tr>

    </table>

    <h3 style="margin-bottom: 2px;">Request Data 3</h3>
    <hr class="new3">

    <table style="width: 100%;" cellspacing="0" cellpadding="6">

      <tr>
        <td style="width: 25%;text-align:left;">Inspection </td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['inspection']; ?></td>
        <td style="width: 25%;text-align:left;">Liability </td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['liability']; ?></td>
      </tr>

      <tr>
        <td style="width: 25%;text-align:left;">Insured Amount</td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['insured_amount']; ?></td>
        <td style="width: 25%;text-align:left;">Exemption Amount</td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['exemption_amount']; ?></td>
      </tr>

    </table>

  </div>

</body>

</html>