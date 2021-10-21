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
      font-size: 13px;
      /* line-height: 15px !important; */
    }

    table td {
      line-height: 15px !important;
      vertical-align: middle !important;
      border: 1px solid black;
      font-size: 12px;
      background-color: #D3D3D3;
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

    <h3 style="margin-bottom: 2px;"> Assesor & Adjustors Services </h3><br>

    <h3 style="margin-bottom: 2px;">Estimation Job Report (εκτίμηση της έκθεσης εργασίας) </h3>
    <hr class="new3">

    <h3 style="margin-bottom: 2px;">Request Details</h3>
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

    <h3 style="margin-bottom: 2px;">Vehicle Details</h3>
    <hr class="new3">

    <table style="width: 100%;" cellspacing="0" cellpadding="6">

    <?php foreach ($estimation_report['vehicle'] as $vehicle_info)  { ?>

      <tr>
        <td style="width: 25%;text-align:left;">Reg No. </td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $vehicle_info['registration_plate']; ?></td>
        <td style="width: 25%;text-align:left;">Make</td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $vehicle_info['make']; ?></td>
      </tr>

      <tr>
        <td style="width: 25%;text-align:left;">Year Of Registration</td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $vehicle_info['registration_date'] ?></td>
        <td style="width: 25%;text-align:left;">Year Of Manufacture</td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $vehicle_info['manufacturing_date']; ?></td>
      </tr>

      <tr>
        <td style="width: 25%;text-align:left;">Model</td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $vehicle_info['model']; ?></td>
        <td style="width: 25%;text-align:left;">Chechis Number</td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $vehicle_info['pcode']; ?></td>
      </tr>

      <tr>
        <td style="width: 25%;text-align:left;">Color</td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $vehicle_info['main_color']; ?></td>
        <td style="width: 25%;text-align:left;">Engine Power</td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $vehicle_info['engine_power']; ?></td>
      </tr>

      <tr>
        <td style="width: 25%;text-align:left;">Engine Capacity</td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $vehicle_info['engine_capacity']; ?></td>
        <td style="width: 25%;text-align:left;">Speedo Reading </td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['speedo_reading']; ?></td>
      </tr>

    <?php } ?>

      <tr>
        <td style="width: 25%;text-align:left;">Pre Accident Condition </td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['pre_accident_condition']; ?></td>
        <td style="width: 25%;text-align:left;">Tyre Condition </td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['tyre_condition']; ?></td>
      </tr>

    </table>

    <br>

    <h3 style="margin-bottom: 2px;">Insurance Details</h3>

    <hr class="new3">

    <table style="width: 100%;" cellspacing="0" cellpadding="6">

      <tr>
        <td style="width: 25%;text-align:left;">Insured Reference </td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['insured_reference']; ?></td>
        <td style="width: 25%;text-align:left;">Policy Number</td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['policy_number']; ?></td>
      </tr>

      <tr>
        <td style="width: 25%;text-align:left;">Date Of Accident</td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['date_accident']; ?></td>
        <td style="width: 25%;text-align:left;">Claim Number</td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $estimation_report['claim_number']; ?></td>
      </tr>

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

    <h3>Description Of Damage</h3>
    <hr class="new3">

    <table style="width: 100%;" cellspacing="0" cellpadding="6">

      <tr>
        <th style="width: 25%;text-align:left;">Position </th>
        <th style="width: 25%;text-align:left;">Damage</th>
      </tr>

      <?php if(!empty($estimation_report['damage_part'])){
          foreach ($estimation_report['damage_part'] as $damages)
         { ?>

      <tr>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $damages['damage_area'] ?></td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $damages['damage_type']; ?></td>
      </tr>

      <?php } } ?>

    </table> <br>

    <h3 style="margin-bottom: 2px;">Sechedule Of Damage Details</h3>
    <hr class="new3">

    <table style="width: 100%;" cellspacing="0" cellpadding="6">

      <tr>

        <th style="width: 25%;text-align:left;">Parts & Assessors </th>
        <th style="width: 25%;text-align:left;">Damage</th>
        <th style="width: 25%;text-align:left;">Action</th>
        <th style="width: 25%;text-align:left;">Status</th>
        <th style="width: 25%;text-align:left;">Qty</th>
        <th style="width: 25%;text-align:left;">S Cost</th>
        <th style="width: 25%;text-align:left;">Dis(%)</th>
        <th style="width: 25%;text-align:left;">T Cost</th>

      </tr>

     <?php

     if(!empty($estimation_report['parts_data'])) {

     foreach ($estimation_report['parts_data'] as $parts_data) { ?>

      <tr>

        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $parts_data['part_name']; ?></td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $parts_data['damage_type']; ?></td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $parts_data['action_type']; ?></td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $parts_data['part_status']; ?></td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $parts_data['quantity']; ?></td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $parts_data['part_cost']; ?></td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $parts_data['discount']; ?></td>

        <?php
        $dis_amount = (($parts_data['part_cost'] * $parts_data['quantity']) * ($parts_data['discount']/ 100));
        $total_amount = (($parts_data['part_cost'] * $parts_data['quantity']) - $dis_amount);
        ?>
      <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $total_amount; ?></td>

    </tr>

    <?php } } ?>

    <tr>

      <td colspan="7" style="text-align:right;">Total Parts & Accessories</td>
      <td colspan="1" style="text-align:left;"><b><?php echo $parts_data['total_amount']; ?></b></td>

    </tr>

  </table> <br>


    <h3 style="margin-bottom: 2px;">Labour Description</h3>
    <hr class="new3">

    <table style="width: 100%;" cellspacing="0" cellpadding="6">

      <tr>
        <th style="width: 25%;text-align:left;">Labour</th>
        <th style="width: 25%;text-align:left;">Description</th>
        <th style="width: 25%;text-align:left;">T Cost</th>
      </tr>

      <?php

      if(!empty($estimation_report['labours_data'])) {

      foreach ($estimation_report['labours_data'] as $labours) { ?>

      <tr>

        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $labours['labour']; ?></td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $labours['description_labour']; ?></td>
        <td style="width: 25%;text-align:left;background-color: #fff;"><?php echo $labours['cost']; ?></td>

        <?php

        $total_cost = $labours['cost_total'];
        $total_vat_amount += !empty($labours['vat_cost']) ? $labours['vat_cost'] : 0;

        ?>

      </tr>

      <?php } } ?>

      <tfoot>

        <tr style="width: 50%;">
          <td colspan="2" style="text-align:right;">Total Labour</td>
          <td style="text-align:left;"><b><?php echo $total_cost; ?></b></td>
        </tr>

        <tr style="width: 50%;">
          <td colspan="2" style="text-align:right;">Total Parts & Accessories & Labours</td>
          <td style="text-align:left;"><b><?php echo ($parts_data['total_amount']+$total_cost); ?></b></td>
        </tr>

        <?php $vat_amount = $total_vat_amount - $total_cost; ?>

        <tr style="width: 50%;">
          <td colspan="2" style="text-align:right;">Vat Amount</td>
          <td style="text-align:left;"><b><?php echo $vat_amount; ?></b></td>
        </tr>

        <tr style="width: 50%;">
          <td colspan="2" style="text-align:right;">Total With Vat</td>
          <td style="text-align:left;"><b><?php echo ($vat_amount + $parts_data['total_amount'] +$total_cost); ?></b></td>
        </tr>

      </tfoot>

    </table><br>


    <h3 style="margin-bottom: 2px;">Timings</h3>
    <hr class="new3">

    <table style="width: 100%;" cellspacing="0" cellpadding="6">

      <tr>
        <th style="width: 25%;text-align:left;">Status</th>
        <th style="width: 25%;text-align:left;">Date</th>
      </tr>

      <tr>

        <td style="width: 25%;text-align:left;background-color: #fff;">Pending</td>
        <td style="width: 25%;text-align:left;background-color: #fff;">-</td>

      </tr>

      <tr>

        <td style="width: 25%;text-align:left;background-color: #fff;">In Progress</td>
        <td style="width: 25%;text-align:left;background-color: #fff;">-</td>

      </tr>

      <tr>

        <td style="width: 25%;text-align:left;background-color: #fff;">Completed</td>
        <td style="width: 25%;text-align:left;background-color: #fff;">-</td>

      </tr>

    </table> <br>

    <h3 style="margin-bottom: 2px;">Signed By:</h3>

    <hr class="new3">

  </div>

</body>

</html>