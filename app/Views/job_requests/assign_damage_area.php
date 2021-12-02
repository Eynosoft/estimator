<!-- Content Column -->
<style>
  .svg-fill-color {
    fill: #7CFC00;
    /* Add fill here */
  }

  .svg-fill-color-double {
    fill: #FFFF00;
  }

  .svg-fill-color-triple {
    fill: #FF0000;
  }

  .car_image {
    max-width: 100%;
    display: flex;
  }
</style>

<div class="row">

<?php

if(!empty($job_request_data['damage_parts'])) {
  foreach ($job_request_data['damage_parts'] as $damages) {

    if ($damages['damage_area'] == 'Front Right') {
      switch ($damages['damage_type']) {
        case 'Light':
          $class_front_area =  "svg-fill-color";
          $front_area_value = $damages['damage_type'];
          break;

        case 'Extensive':
          $class_front_area = "svg-fill-color-double";
          $front_area_value = $damages['damage_type'];
          break;

        case 'Severe':
          $class_front_area =  "svg-fill-color-triple";
          $front_area_value = $damages['damage_type'];
          break;

        default:
          $class_front_area =  "";
          $front_area_value = '';
          break;
      }
    }

    if ($damages['damage_area'] == 'Side Right 1') {
      switch ($damages['damage_type']) {
        case 'Light':
          $class_side_right1 =  "svg-fill-color";
          $side_right_value1 = $damages['damage_type'];
          break;

        case 'Extensive':
          $class_side_right1 = "svg-fill-color-double";
          $side_right_value1 = $damages['damage_type'];
          break;

        case 'Severe':
          $class_side_right1 =  "svg-fill-color-triple";
          $side_right_value1 = $damages['damage_type'];
          break;

        default:
          $class_side_right1 =  "";
          $side_right_value1 = '';
          break;
      }
    }

    if ($damages['damage_area'] == 'Side Right 2') {
      switch ($damages['damage_type']) {
        case 'Light':
          $class_side_right2 =  "svg-fill-color";
          $side_right_value2 = $damages['damage_type'];
          break;

        case 'Extensive':
          $class_side_right2 = "svg-fill-color-double";
          $side_right_value2 = $damages['damage_type'];
          break;

        case 'Severe':
          $class_side_right2 =  "svg-fill-color-triple";
          $side_right_value2 = $damages['damage_type'];
          break;

        default:
          $class_side_right2 =  "";
          $side_right_value2 = '';
          break;
      }
    }

    if ($damages['damage_area'] == 'Rear') {
      switch ($damages['damage_type']) {
        case 'Light':
          $class_rear =  "svg-fill-color";
          $rear_value = $damages['damage_type'];
          break;

        case 'Extensive':
          $class_rear = "svg-fill-color-double";
          $rear_value = $damages['damage_type'];
          break;

        case 'Severe':
          $class_rear =  "svg-fill-color-triple";
          $rear_value = $damages['damage_type'];
          break;

        default:
          $class_rear =  "";
          $rear_value = '';
          break;
      }
    }

    if ($damages['damage_area'] == 'Front') {
      switch ($damages['damage_type']) {
        case 'Light':
          $class_front =  "svg-fill-color";
          $front_value = $damages['damage_type'];
          break;

        case 'Extensive':
          $class_front = "svg-fill-color-double";
          $front_value = $damages['damage_type'];
          break;

        case 'Severe':
          $class_front =  "svg-fill-color-triple";
          $front_value = $damages['damage_type'];
          break;

        default:
          $class_front =  "";
          $front_value = '';
          break;
      }
    }

    if ($damages['damage_area'] == 'Front Left') {
      switch ($damages['damage_type']) {
        case 'Light':
          $class_front_left =  "svg-fill-color";
          $front_left_value = $damages['damage_type'];
          break;

        case 'Extensive':
          $class_front_left = "svg-fill-color-double";
          $front_left_value = $damages['damage_type'];
          break;

        case 'Severe':
          $class_front_left =  "svg-fill-color-triple";
          $front_left_value = $damages['damage_type'];
          break;

        default:
          $class_front_left =  "";
          $front_left_value = '';
          break;
      }
    }

    if ($damages['damage_area'] == 'Side Left 1') {
      switch ($damages['damage_type']) {
        case 'Light':
          $class_side_left1 =  "svg-fill-color";
          $side_left1_value = $damages['damage_type'];
          break;

        case 'Extensive':
          $class_side_left1 = "svg-fill-color-double";
          $side_left1_value = $damages['damage_type'];
          break;

        case 'Severe':
          $class_side_left1 =  "svg-fill-color-triple";
          $side_left1_value = $damages['damage_type'];
          break;

        default:
          $class_side_left1 =  "";
          $side_left1_value = '';
          break;
      }
    }

    if ($damages['damage_area'] == 'Side Left 2') {
      switch ($damages['damage_type']) {
        case 'Light':
          $class_side_left2 =  "svg-fill-color";
          $side_left2_value = $damages['damage_type'];
          break;

        case 'Extensive':
          $class_side_left2 = "svg-fill-color-double";
          $side_left2_value = $damages['damage_type'];
          break;

        case 'Severe':
          $class_side_left2 =  "svg-fill-color-triple";
          $side_left2_value = $damages['damage_type'];
          break;

        default:
          $class_side_left2 =  "";
          $side_left2_value = '';
          break;
      }
    }

    if ($damages['damage_area'] == 'Roof') {
      switch ($damages['damage_type']) {
        case 'Light':
          $class_car_top =  "svg-fill-color";
          $car_top_value = $damages['damage_type'];
          break;

        case 'Extensive':
          $class_car_top = "svg-fill-color-double";
          $car_top_value = $damages['damage_type'];
          break;

        case 'Severe':
          $class_car_top =  "svg-fill-color-triple";
          $car_top_value = $damages['damage_type'];
          break;

        default:
          $class_car_top =  "";
          $car_top_value = '';
          break;
      }
    }
  }
}

  ?>

  <div class="col-lg-12 mb-4">

    <!-- Project Card Example -->

    <div class="card shadow">

      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Damage Area</h6>

      </div>

   <?php if(!empty($job_request_data['damage_parts'])) { ?>

      <div class="card-body">

        <div class="form-row">

          <div class="form-group col-md-12">

            <div>
              <input type="hidden" name='front_right' value='Front Right'>
              <input type="hidden" name='damage_front_right' value=<?php echo $front_area_value; ?> id='front_right'>

              <input type="hidden" name="side_right1" value="Side Right 1">
              <input type="hidden" name='damage_side_right1' value=<?php echo $side_right_value1; ?> id='damage_side_right1'>

              <input type="hidden" name="side_right2" value="Side Right 2">
              <input type="hidden" name="damage_side_right2" value=<?php echo $side_right_value2; ?> id='damage_side_right2'>

              <input type="hidden" name="rear" value="Rear">
              <input type="hidden" name="damage_rear" value=<?php echo $rear_value; ?> id="rear">

              <input type="hidden" name="car_front_main" value='Front'>
              <input type="hidden" name="damage_car_front_main" value=<?php echo $front_value; ?> id="damage_car_front_main">

              <input type="hidden" name="second_car_front" value="Front Left">
              <input type="hidden" name="damage_second_car_front" value=<?php echo $front_left_value; ?> id="damage_second_car_front">

              <input type="hidden" name='second_car_center' value="Side Left 1">
              <input type="hidden" name="damage_second_car_center" value=<?php echo $side_left1_value; ?> id='damage_second_car_center'>

              <input type="hidden" name="second_car_back" value="Side Left 2">
              <input type="hidden" name='damage_second_car_back' value=<?php echo $side_left2_value; ?> id="damage_second_car_back">

              <input type="hidden" name="car_top" value="Roof">
              <input type="hidden" name="damage_car_top" value= <?php echo $car_top_value; ?> id="damage_car_top">

            </div>

            <figure class="car_image">

              <svg width="900" height="500" viewBox="0 0 1668 1160" fill="none" xmlns="http://www.w3.org/2000/svg">

                <rect width="900" height="500" fill="#E5E5E5" />
                <g id="car-cutout 1">
                  <rect width="900" height="500" fill="white" />
                  <g id="Top-View">
                    <path id="car-front" d="M1348 437C1293.26 419.892 1174 410.333 1118 415C1092.4 416.558 1002 437.649 960 451C964 477.667 972 549.4 972 599C972 648.6 964 741 960 781C1012.67 793.667 1118 821 1118 829C1118 839 1306 817 1348 805C1381.6 795.4 1387.33 769 1386 757C1396 599 1412 457 1348 437Z" fill="#E0DCD9" stroke="black" stroke-width="4" />
                    <path id="front-bonat-line" d="M1125 415C1118.67 440.667 1106 527.2 1106 620C1106 712.8 1114.67 794.667 1119 830" stroke="black" stroke-width="4" />

                    <path id="car-top" d="M548 619C544 693.4 560.333 761.333 569 786C582.667 780.333 619.6 768 658 764C706 759 812 764 857 764C902 764 953 779 958 781C963 783 967 665 969 604C970.6 555.2 962.333 481 958 450C948 453.333 913.8 462.2 857 471C786 482 656 471 615 465C574 459 575 447 569 450C563 453 553 526 548 619Z" class="<?php echo $class_car_top; ?>" fill="#E0DCD9" stroke="black" stroke-width="4" />

                    <path id="Back-view" d="M465 420H342C333.2 420 327.667 434 326 441C325.333 552 324.4 778.6 326 797C327.6 815.4 340 817.333 346 816L465 819L570 785C562.333 753 546.8 671.2 546 600C545.2 528.8 561.667 469.667 570 449L465 420Z" fill="#DEDAD7" stroke="black" stroke-width="4" />
                    <path id="back-bonat-line" d="M465 422C456.667 452.333 440.6 533.8 443 617C445.4 700.2 458.667 784.333 465 816" stroke="black" stroke-width="4" />
                    <path id="Vector 2" d="M305 405L249.5 410.5V466C249.5 474.8 255.5 475 258.5 474L305 444.5V405Z" stroke="black" stroke-width="4" />
                    <path id="Vector 3" d="M305 829L249 822.5V775.289C249 766.616 258.473 764.014 261.5 765L305 790.5V829Z" stroke="black" stroke-width="4" />

                    <path id="car-back" d="M306 404.5H325V829H306V791C306 791 295.5 784.667 298 786L261 764.5C261 764.5 250.369 765.441 248 772.5V822H227C229.251 832.851 227.359 835.775 222 839C215 839.667 192.5 842.5 182 839C166.8 837.4 144.333 827 135 822C122.908 633.893 123.916 545.817 135 410C149.807 403.112 177.712 396.801 201 396C229.538 395.018 230 403 227 410H248C248.333 422.333 248.8 449.6 248 460C247.2 470.4 254.333 474.333 258 475L306 447V404.5Z" class="<?php echo $class_rear; ?>" fill="#E0DCD9" stroke="black" stroke-width="4" />

                    <path id="Vector 4" d="M259 474C233.077 510.695 227.08 543.933 225 616C225.483 692.661 233.556 721.666 258 763" stroke="black" stroke-width="4" />

                    <path id="car-front-main" d="M1526 411C1493.22 394.28 1473.54 388.898 1435 390V510C1435 524 1423 517 1423 517L1395 501V739C1395 739 1411 724 1423 725C1435 726 1435 739 1435 739V847C1479.93 842.527 1500.84 837.964 1526 824V411Z" fill="#E0DCD9" class="<?php echo $class_front;  ?>" stroke="black" stroke-width="4" />

                    <g id="Vector 6">
                      <path d="M1412 706C1441.18 702.917 1446.21 625.587 1444 614C1445.04 608.51 1444.06 543.149 1412.5 529.375L1412 706Z" fill="#C4C4C4" />
                      <path d="M1412 528L1412.5 529.375M1412.5 529.375C1444.06 543.149 1445.04 608.51 1444 614C1446.21 625.587 1441.18 702.917 1412 706L1412.5 529.375Z" stroke="black" stroke-width="4" />
                    </g>
                    <path id="Vector 7" d="M1488 775V462C1494.15 454.858 1497.19 455.131 1502 462V775C1497.16 780.686 1494.18 781.398 1488 775Z" fill="#C4C4C4" stroke="black" stroke-width="4" />
                    <path id="Vector 8" d="M1433 408.5L1393.5 401.5V500M1393.5 745V838.5L1433.5 832" stroke="black" stroke-width="4" />
                  </g>

                  <g id="Bottom car">

                    <circle id="Ellipse 1" cx="539.5" cy="1057.5" r="72.5" fill="white" stroke="black" stroke-width="4" />
                    <circle id="Ellipse 2" cx="539.5" cy="1057.5" r="43.5" fill="#E8E8E8" stroke="black" stroke-width="4" />
                    <circle id="Ellipse 5" cx="1207.5" cy="1056.5" r="72.5" fill="white" stroke="black" stroke-width="4" />
                    <circle id="Ellipse 6" cx="1207.5" cy="1056.5" r="43.5" fill="#E8E8E8" stroke="black" stroke-width="4" />

                    <path id="car-front-back-area" d="M576 903C576 884 602.297 817.072 618 769C597.627 774.303 586.467 778.718 567 789C526.427 812.351 505.786 827.15 472 856C462.46 865.463 454.779 868.256 439 871H340C328.011 872.435 324.015 875.094 323 884V964C306.494 976.088 301.811 986.198 300 1009C300.685 1049.11 304.881 1063.4 323 1066L458 1072C450.863 1054.87 451.7 1042.85 458 1019C472.285 993.267 481.328 983.961 499 975C534.688 961.239 555.42 959.976 595 981C623.574 1004.88 631.539 1022.72 634 1061H645C644.825 1042.68 643.657 1031.43 639 1009C628.958 988.673 622.236 979.072 609 964C595.574 954.759 588.149 949.478 576 939V903Z" class="<?php echo $class_side_right2;  ?>" fill="#E0DCD9" stroke="black" stroke-width="4" />

                    <path id="Vector 11" d="M599.5 789.5C560.608 814.259 539.002 831.092 501 869C500.529 879.952 502.756 881.553 507.5 883H565L599.5 789.5Z" fill="#DEDAD7" stroke="black" stroke-width="4" />
                    <path id="Vector 12" d="M771.5 761C714.139 760.099 681.338 760.817 620 767.5L615 783C660.508 776.649 697.401 775.422 769 776L769.644 776.001C811.124 776.08 834.578 776.124 872 783C897.692 789.479 929.5 802.5 929.5 802.5C926.983 799.796 996.795 833.603 1031 855C1053.34 868.606 1062.44 875.989 1069.5 888.5L1098.5 883L940.5 794L953.5 783C908.301 769.562 870.423 764.375 771.5 761Z" stroke="black" stroke-width="4" />

                    <path id="15" d="M572 895L613 779L831 779C854.475 778.512 866.938 780.713 888.5 787C917.741 796.814 933.586 802.794 959.5 815.5C1005.69 839.346 1028.78 851.407 1059 873.5C1071.54 889.068 1075.67 896.956 1078 906V1046C1075.96 1055.15 1073.32 1057.88 1067.5 1061H643C645.297 1045.06 640 1019 630 991C614.527 972.389 601.072 961.085 572 940C566.954 940.014 569.827 925.054 572 895Z" class="<?php echo $class_side_right1; ?>" fill="#E0DCD9" stroke="black" stroke-width="4" />

                    <path id="Vector 22" d="M795 780L815 887L814 1058" stroke="black" stroke-width="4" />
                    <path id="Vector 14" d="M783 793H625.5L600 882.5H795L783 793Z" fill="#DEDAD7" stroke="black" stroke-width="4" />
                    <path id="Vector 16" d="M835 884.5L811.5 791C814.167 789.333 826.7 787 855.5 791C891.5 796 926 813 961.5 831.5C989.9 846.3 1028.33 878 1044 892L835 884.5Z" fill="#DEDAD7" stroke="black" stroke-width="4" />

                    <path id="car-front-right" d="M1126 902.5L1097.5 883.5L1070.5 889C1075.35 897.801 1077.02 900.807 1078 902.5V1045.5C1077.47 1051.78 1075.52 1054.98 1068.5 1060H1115.5L1118 1024C1123.5 1006.33 1143.6 974.312 1175.5 965.5C1209.25 956.176 1246.96 968.105 1251.5 970.5C1255.63 971.802 1282.88 994.229 1289 1015C1295.18 1035.99 1299.67 1068.83 1298 1084H1390C1401.55 1067.93 1405.82 1057.8 1410 1038C1411.97 1019.2 1412.07 1007.78 1406 982L1349.5 978.5C1346.32 962.872 1342.49 953.984 1333.5 938L1126 902.5Z" fill="#E0DCD9" stroke="black" class="<?php echo $class_front_area; ?>" stroke-width="4" />


                    <path id="Vector 18" d="M1265.5 980H1349.5" stroke="black" stroke-width="4" />
                    <path id="Vector 19" d="M1153 882L954.5 783L940 794.5L1126 902.5L1334 938.5L1349 979L1405.5 982C1404.17 969.055 1394.5 943.5 1381.5 936C1368.5 928.5 1153 882 1153 882Z" fill="#DEDAD7" stroke="black" stroke-width="4" />
                    <path id="Vector 10" d="M366 890C348.637 887.297 337.696 887.368 323 890V938C337.413 938.446 363 938 366 933C369 928 369.522 911.019 366 890Z" fill="#DEDAD7" stroke="black" stroke-width="4" />
                    <g id="Vector 20">
                      <path d="M639 1084L634 1060H1116V1084H639Z" fill="#DEDAD7" />
                      <path d="M1336 939.5L1385.5 940.5M1091 883.5L1152 882M634 1060L639 1084H1116V1060H634Z" stroke="black" stroke-width="4" />
                    </g>
                    <path id="Ellipse 3" d="M898.029 919.338C898.029 919.338 898.028 919.34 898.027 919.343C898.028 919.34 898.029 919.338 898.029 919.338ZM896.785 918.737C897.366 919.045 897.712 919.311 897.897 919.5C897.712 919.69 897.366 919.955 896.785 920.263C895.544 920.92 893.618 921.573 891.069 922.145C886.003 923.28 878.906 924 871 924C863.094 924 855.997 923.28 850.931 922.145C848.382 921.573 846.456 920.92 845.215 920.263C844.634 919.955 844.288 919.69 844.103 919.5C844.288 919.31 844.634 919.045 845.215 918.737C846.456 918.08 848.382 917.427 850.931 916.855C855.997 915.72 863.094 915 871 915C878.906 915 886.003 915.72 891.069 916.855C893.618 917.427 895.544 918.08 896.785 918.737ZM843.971 919.338C843.971 919.338 843.972 919.34 843.973 919.343C843.972 919.34 843.971 919.338 843.971 919.338ZM843.971 919.662C843.971 919.662 843.972 919.66 843.973 919.657C843.972 919.66 843.971 919.662 843.971 919.662ZM898.027 919.657C898.028 919.66 898.029 919.662 898.029 919.662C898.029 919.662 898.028 919.66 898.027 919.657Z" fill="#C4C4C4" stroke="black" stroke-width="4" />
                    <path id="Ellipse 4" d="M657.029 919.338C657.029 919.338 657.028 919.34 657.027 919.343C657.028 919.34 657.029 919.338 657.029 919.338ZM655.785 918.737C656.366 919.045 656.712 919.311 656.897 919.5C656.712 919.69 656.366 919.955 655.785 920.263C654.544 920.92 652.618 921.573 650.069 922.145C645.003 923.28 637.906 924 630 924C622.094 924 614.997 923.28 609.931 922.145C607.382 921.573 605.456 920.92 604.215 920.263C603.634 919.955 603.288 919.69 603.103 919.5C603.288 919.31 603.634 919.045 604.215 918.737C605.456 918.08 607.382 917.427 609.931 916.855C614.997 915.72 622.094 915 630 915C637.906 915 645.003 915.72 650.069 916.855C652.618 917.427 654.544 918.08 655.785 918.737ZM602.971 919.338C602.971 919.338 602.972 919.34 602.973 919.343C602.972 919.34 602.971 919.338 602.971 919.338ZM602.971 919.662C602.971 919.662 602.972 919.66 602.973 919.657C602.972 919.66 602.971 919.662 602.971 919.662ZM657.027 919.657C657.028 919.66 657.029 919.662 657.029 919.662C657.029 919.662 657.028 919.66 657.027 919.657Z" fill="#C4C4C4" stroke="black" stroke-width="4" />
                    <path id="Vector 21" d="M325 967L501 974" stroke="black" stroke-width="4" />
                  </g>
                  <g id="Bottom car_2">
                    <circle id="Ellipse 1_2" r="72.5" transform="matrix(1 0 0 -1 539.5 176.187)" fill="white" stroke="black" stroke-width="4" />
                    <circle id="Ellipse 2_2" r="43.5" transform="matrix(1 0 0 -1 539.5 176.187)" fill="#E8E8E8" stroke="black" stroke-width="4" />
                    <circle id="Ellipse 5_2" r="72.5" transform="matrix(1 0 0 -1 1207.5 177.187)" fill="white" stroke="black" stroke-width="4" />
                    <circle id="Ellipse 6_2" r="43.5" transform="matrix(1 0 0 -1 1207.5 177.187)" fill="#E8E8E8" stroke="black" stroke-width="4" />

                    <path id="second-car-back" d="M576 330.687C576 349.687 602.297 416.615 618 464.687C597.627 459.384 586.467 454.968 567 444.687C526.427 421.336 505.786 406.536 472 377.687C462.46 368.224 454.779 365.43 439 362.687H340C328.011 361.251 324.015 358.593 323 349.687V269.687C306.494 257.599 301.811 247.489 300 224.687C300.685 184.572 304.881 170.287 323 167.687L458 161.687C450.863 178.816 451.7 190.839 458 214.687C472.285 240.419 481.328 249.726 499 258.687C534.688 272.448 555.42 273.71 595 252.687C623.574 228.802 631.539 210.969 634 172.687H645C644.825 191.006 643.657 202.259 639 224.687C628.958 245.013 622.236 254.615 609 269.687C595.574 278.928 588.149 284.208 576 294.687V330.687Z" fill="#E0DCD9" class="<?php echo $class_side_left2; ?>" stroke="black" stroke-width="4" />

                    <path id="Vector 11_2" d="M599.5 444.187C560.608 419.427 539.002 402.594 501 364.687C500.529 353.734 502.756 352.134 507.5 350.687H565L599.5 444.187Z" fill="#DEDAD7" stroke="black" stroke-width="4" />
                    <path id="Vector 12_2" d="M771.5 472.687C714.139 473.587 681.338 472.87 620 466.187L615 450.687C660.508 457.038 697.401 458.264 769 457.687L769.644 457.685C811.124 457.607 834.578 457.562 872 450.687C897.692 444.207 929.5 431.187 929.5 431.187C926.983 433.89 996.795 400.084 1031 378.687C1053.34 365.08 1062.44 357.698 1069.5 345.187L1098.5 350.687L940.5 439.687L953.5 450.687C908.301 464.125 870.423 469.311 771.5 472.687Z" stroke="black" stroke-width="4" />

                    <path id="second-car-center" d="M572 338.687L613 454.687L831 454.687C854.475 455.174 866.938 452.974 888.5 446.687C917.741 436.872 933.586 430.893 959.5 418.187C1005.69 394.341 1028.78 382.28 1059 360.187C1071.54 344.618 1075.67 336.731 1078 327.687V187.687C1075.96 178.541 1073.32 175.802 1067.5 172.687H643C645.297 188.624 640 214.687 630 242.687C614.527 261.297 601.072 272.601 572 293.687C566.954 293.672 569.827 308.633 572 338.687Z" class="<?php echo $class_side_left1; ?>" fill="#E0DCD9" stroke="black" stroke-width="4" />
                    <path id="Vector 22_2" d="M795 453.687L815 346.687L814 175.687" stroke="black" stroke-width="4" />
                    <path id="Vector 14_2" d="M783 440.687H625.5L600 351.187H795L783 440.687Z" fill="#DEDAD7" stroke="black" stroke-width="4" />
                    <path id="Vector 16_2" d="M835 349.187L811.5 442.687C814.167 444.353 826.7 446.687 855.5 442.687C891.5 437.687 926 420.687 961.5 402.187C989.9 387.387 1028.33 355.687 1044 341.687L835 349.187Z" fill="#DEDAD7" stroke="black" stroke-width="4" />

                    <path id="second-car-front" d="M1126 331.187L1097.5 350.187L1070.5 344.687C1075.35 335.886 1077.02 332.88 1078 331.187V188.187C1077.47 181.907 1075.52 178.705 1068.5 173.687H1115.5L1118 209.687C1123.5 227.353 1143.6 259.375 1175.5 268.187C1209.25 277.51 1246.96 265.582 1251.5 263.187C1255.63 261.884 1282.88 239.458 1289 218.687C1295.18 197.694 1299.67 164.853 1298 149.687H1390C1401.55 165.76 1405.82 175.887 1410 195.687C1411.97 214.491 1412.07 225.91 1406 251.687L1349.5 255.187C1346.32 270.814 1342.49 279.702 1333.5 295.687L1126 331.187Z" fill="#E0DCD9" class="<?php echo $class_front_left; ?>" stroke="black" stroke-width="4" />

                    <path id="Vector 18_2" d="M1265.5 253.687H1349.5" stroke="black" stroke-width="4" />
                    <path id="Vector 19_2" d="M1153 351.687L954.5 450.687L940 439.187L1126 331.187L1334 295.187L1349 254.687L1405.5 251.687C1404.17 264.632 1394.5 290.187 1381.5 297.687C1368.5 305.187 1153 351.687 1153 351.687Z" fill="#DEDAD7" stroke="black" stroke-width="4" />

                    <path id="Vector 10_2" d="M366 343.687C348.637 346.39 337.696 346.319 323 343.687V295.687C337.413 295.24 363 295.687 366 300.687C369 305.687 369.522 322.668 366 343.687Z" fill="#DEDAD7" stroke="black" stroke-width="4" />

                    <g id="Vector 20_2">
                      <path d="M639 149.687L634 173.687H1116V149.687H639Z" fill="#DEDAD7" />
                      <path d="M1336 294.187L1385.5 293.187M1091 350.187L1152 351.687M634 173.687L639 149.687H1116V173.687H634Z" stroke="black" stroke-width="4" />
                    </g>
                    <path id="Ellipse 3_2" d="M898.029 314.348C898.029 314.348 898.028 314.347 898.027 314.344C898.028 314.347 898.029 314.348 898.029 314.348ZM896.785 314.95C897.366 314.641 897.712 314.376 897.897 314.187C897.712 313.997 897.366 313.732 896.785 313.424C895.544 312.766 893.618 312.113 891.069 311.542C886.003 310.407 878.906 309.687 871 309.687C863.094 309.687 855.997 310.407 850.931 311.542C848.382 312.113 846.456 312.766 845.215 313.424C844.634 313.732 844.288 313.997 844.103 314.187C844.288 314.376 844.634 314.641 845.215 314.95C846.456 315.607 848.382 316.26 850.931 316.831C855.997 317.967 863.094 318.687 871 318.687C878.906 318.687 886.003 317.967 891.069 316.831C893.618 316.26 895.544 315.607 896.785 314.95ZM843.971 314.348C843.971 314.348 843.972 314.347 843.973 314.344C843.972 314.347 843.971 314.348 843.971 314.348ZM843.971 314.025C843.971 314.025 843.972 314.027 843.973 314.03C843.972 314.027 843.971 314.025 843.971 314.025ZM898.027 314.03C898.028 314.027 898.029 314.025 898.029 314.025C898.029 314.025 898.028 314.027 898.027 314.03Z" fill="#C4C4C4" stroke="black" stroke-width="4" />
                    <path id="Ellipse 4_2" d="M657.029 314.348C657.029 314.348 657.028 314.347 657.027 314.344C657.028 314.347 657.029 314.348 657.029 314.348ZM655.785 314.95C656.366 314.641 656.712 314.376 656.897 314.187C656.712 313.997 656.366 313.732 655.785 313.424C654.544 312.766 652.618 312.113 650.069 311.542C645.003 310.407 637.906 309.687 630 309.687C622.094 309.687 614.997 310.407 609.931 311.542C607.382 312.113 605.456 312.766 604.215 313.424C603.634 313.732 603.288 313.997 603.103 314.187C603.288 314.376 603.634 314.641 604.215 314.95C605.456 315.607 607.382 316.26 609.931 316.831C614.997 317.967 622.094 318.687 630 318.687C637.906 318.687 645.003 317.967 650.069 316.831C652.618 316.26 654.544 315.607 655.785 314.95ZM602.971 314.348C602.971 314.348 602.972 314.347 602.973 314.344C602.972 314.347 602.971 314.348 602.971 314.348ZM602.971 314.025C602.971 314.025 602.972 314.027 602.973 314.03C602.972 314.027 602.971 314.025 602.971 314.025ZM657.027 314.03C657.028 314.027 657.029 314.025 657.029 314.025C657.029 314.025 657.028 314.027 657.027 314.03Z" fill="#C4C4C4" stroke="black" stroke-width="4" />
                    <path id="Vector 21_2" d="M325 266.687L501 259.687" stroke="black" stroke-width="4" />
                  </g>
                </g>
              </svg>

            </figure>

          </div>

        </div>

      </div>

    <!-- Fisrt area value if not empty data base  -->

    <?php } else { ?>


    <!-- Second Area Value if data base is empty area Starts -->

      <div class="card-body">

        <div class="form-row">

          <div class="form-group col-md-12">

            <div>

              <input type="hidden" name='front_right' value='Front Right'>
              <input type="hidden" name='damage_front_right' value="" id='front_right'>

              <input type="hidden" name="side_right1" value="Side Right 1">
              <input type="hidden" name='damage_side_right1' value='' id='damage_side_right1'>

              <input type="hidden" name="side_right2" value="Side Right 2">
              <input type="hidden" name="damage_side_right2" value='' id='damage_side_right2'>

              <input type="hidden" name="rear" value="Rear">
              <input type="hidden" name="damage_rear" value='' id="rear">

              <input type="hidden" name="car_front_main" value='Front'>
              <input type="hidden" name="damage_car_front_main" value="" id="damage_car_front_main">

              <input type="hidden" name="second_car_front" value="Front Left">
              <input type="hidden" name="damage_second_car_front" value="" id="damage_second_car_front">

              <input type="hidden" name='second_car_center' value="Side Left 1">
              <input type="hidden" name="damage_second_car_center" value="" id='damage_second_car_center'>

              <input type="hidden" name="second_car_back" value="Side Left 2">
              <input type="hidden" name='damage_second_car_back' value='' id="damage_second_car_back">

              <input type="hidden" name="car_top" value="Roof">
              <input type="hidden" name="damage_car_top" value='' id="damage_car_top">

            </div>

            <figure class="car_image">

              <svg width="900" height="500" viewBox="0 0 1668 1160" fill="none" xmlns="http://www.w3.org/2000/svg">

                <rect width="900" height="500" fill="#E5E5E5" />
                <g id="car-cutout 1">
                  <rect width="900" height="500" fill="white" />
                  <g id="Top-View">
                    <path id="car-front" d="M1348 437C1293.26 419.892 1174 410.333 1118 415C1092.4 416.558 1002 437.649 960 451C964 477.667 972 549.4 972 599C972 648.6 964 741 960 781C1012.67 793.667 1118 821 1118 829C1118 839 1306 817 1348 805C1381.6 795.4 1387.33 769 1386 757C1396 599 1412 457 1348 437Z" fill="#E0DCD9" stroke="black" stroke-width="4" />
                    <path id="front-bonat-line" d="M1125 415C1118.67 440.667 1106 527.2 1106 620C1106 712.8 1114.67 794.667 1119 830" stroke="black" stroke-width="4" />

                    <path id="car-top" d="M548 619C544 693.4 560.333 761.333 569 786C582.667 780.333 619.6 768 658 764C706 759 812 764 857 764C902 764 953 779 958 781C963 783 967 665 969 604C970.6 555.2 962.333 481 958 450C948 453.333 913.8 462.2 857 471C786 482 656 471 615 465C574 459 575 447 569 450C563 453 553 526 548 619Z" fill="#E0DCD9" stroke="black" stroke-width="4" />

                    <path id="Back-view" d="M465 420H342C333.2 420 327.667 434 326 441C325.333 552 324.4 778.6 326 797C327.6 815.4 340 817.333 346 816L465 819L570 785C562.333 753 546.8 671.2 546 600C545.2 528.8 561.667 469.667 570 449L465 420Z" fill="#DEDAD7" stroke="black" stroke-width="4" />
                    <path id="back-bonat-line" d="M465 422C456.667 452.333 440.6 533.8 443 617C445.4 700.2 458.667 784.333 465 816" stroke="black" stroke-width="4" />
                    <path id="Vector 2" d="M305 405L249.5 410.5V466C249.5 474.8 255.5 475 258.5 474L305 444.5V405Z" stroke="black" stroke-width="4" />
                    <path id="Vector 3" d="M305 829L249 822.5V775.289C249 766.616 258.473 764.014 261.5 765L305 790.5V829Z" stroke="black" stroke-width="4" />

                    <path id="car-back" d="M306 404.5H325V829H306V791C306 791 295.5 784.667 298 786L261 764.5C261 764.5 250.369 765.441 248 772.5V822H227C229.251 832.851 227.359 835.775 222 839C215 839.667 192.5 842.5 182 839C166.8 837.4 144.333 827 135 822C122.908 633.893 123.916 545.817 135 410C149.807 403.112 177.712 396.801 201 396C229.538 395.018 230 403 227 410H248C248.333 422.333 248.8 449.6 248 460C247.2 470.4 254.333 474.333 258 475L306 447V404.5Z" fill="#E0DCD9" stroke="black" stroke-width="4" />

                    <path id="Vector 4" d="M259 474C233.077 510.695 227.08 543.933 225 616C225.483 692.661 233.556 721.666 258 763" stroke="black" stroke-width="4" />

                    <path id="car-front-main" d="M1526 411C1493.22 394.28 1473.54 388.898 1435 390V510C1435 524 1423 517 1423 517L1395 501V739C1395 739 1411 724 1423 725C1435 726 1435 739 1435 739V847C1479.93 842.527 1500.84 837.964 1526 824V411Z" fill="#E0DCD9" stroke="black" stroke-width="4" />

                    <g id="Vector 6">
                      <path d="M1412 706C1441.18 702.917 1446.21 625.587 1444 614C1445.04 608.51 1444.06 543.149 1412.5 529.375L1412 706Z" fill="#C4C4C4" />
                      <path d="M1412 528L1412.5 529.375M1412.5 529.375C1444.06 543.149 1445.04 608.51 1444 614C1446.21 625.587 1441.18 702.917 1412 706L1412.5 529.375Z" stroke="black" stroke-width="4" />
                    </g>
                    <path id="Vector 7" d="M1488 775V462C1494.15 454.858 1497.19 455.131 1502 462V775C1497.16 780.686 1494.18 781.398 1488 775Z" fill="#C4C4C4" stroke="black" stroke-width="4" />
                    <path id="Vector 8" d="M1433 408.5L1393.5 401.5V500M1393.5 745V838.5L1433.5 832" stroke="black" stroke-width="4" />
                  </g>

                  <g id="Bottom car">

                    <circle id="Ellipse 1" cx="539.5" cy="1057.5" r="72.5" fill="white" stroke="black" stroke-width="4" />
                    <circle id="Ellipse 2" cx="539.5" cy="1057.5" r="43.5" fill="#E8E8E8" stroke="black" stroke-width="4" />
                    <circle id="Ellipse 5" cx="1207.5" cy="1056.5" r="72.5" fill="white" stroke="black" stroke-width="4" />
                    <circle id="Ellipse 6" cx="1207.5" cy="1056.5" r="43.5" fill="#E8E8E8" stroke="black" stroke-width="4" />

                    <path id="car-front-back-area" d="M576 903C576 884 602.297 817.072 618 769C597.627 774.303 586.467 778.718 567 789C526.427 812.351 505.786 827.15 472 856C462.46 865.463 454.779 868.256 439 871H340C328.011 872.435 324.015 875.094 323 884V964C306.494 976.088 301.811 986.198 300 1009C300.685 1049.11 304.881 1063.4 323 1066L458 1072C450.863 1054.87 451.7 1042.85 458 1019C472.285 993.267 481.328 983.961 499 975C534.688 961.239 555.42 959.976 595 981C623.574 1004.88 631.539 1022.72 634 1061H645C644.825 1042.68 643.657 1031.43 639 1009C628.958 988.673 622.236 979.072 609 964C595.574 954.759 588.149 949.478 576 939V903Z" fill="#E0DCD9" stroke="black" stroke-width="4" />

                    <path id="Vector 11" d="M599.5 789.5C560.608 814.259 539.002 831.092 501 869C500.529 879.952 502.756 881.553 507.5 883H565L599.5 789.5Z" fill="#DEDAD7" stroke="black" stroke-width="4" />
                    <path id="Vector 12" d="M771.5 761C714.139 760.099 681.338 760.817 620 767.5L615 783C660.508 776.649 697.401 775.422 769 776L769.644 776.001C811.124 776.08 834.578 776.124 872 783C897.692 789.479 929.5 802.5 929.5 802.5C926.983 799.796 996.795 833.603 1031 855C1053.34 868.606 1062.44 875.989 1069.5 888.5L1098.5 883L940.5 794L953.5 783C908.301 769.562 870.423 764.375 771.5 761Z" stroke="black" stroke-width="4" />

                    <path id="15" d="M572 895L613 779L831 779C854.475 778.512 866.938 780.713 888.5 787C917.741 796.814 933.586 802.794 959.5 815.5C1005.69 839.346 1028.78 851.407 1059 873.5C1071.54 889.068 1075.67 896.956 1078 906V1046C1075.96 1055.15 1073.32 1057.88 1067.5 1061H643C645.297 1045.06 640 1019 630 991C614.527 972.389 601.072 961.085 572 940C566.954 940.014 569.827 925.054 572 895Z" fill="#E0DCD9" stroke="black" stroke-width="4" />

                    <path id="Vector 22" d="M795 780L815 887L814 1058" stroke="black" stroke-width="4" />
                    <path id="Vector 14" d="M783 793H625.5L600 882.5H795L783 793Z" fill="#DEDAD7" stroke="black" stroke-width="4" />
                    <path id="Vector 16" d="M835 884.5L811.5 791C814.167 789.333 826.7 787 855.5 791C891.5 796 926 813 961.5 831.5C989.9 846.3 1028.33 878 1044 892L835 884.5Z" fill="#DEDAD7" stroke="black" stroke-width="4" />

                    <path id="car-front-right" d="M1126 902.5L1097.5 883.5L1070.5 889C1075.35 897.801 1077.02 900.807 1078 902.5V1045.5C1077.47 1051.78 1075.52 1054.98 1068.5 1060H1115.5L1118 1024C1123.5 1006.33 1143.6 974.312 1175.5 965.5C1209.25 956.176 1246.96 968.105 1251.5 970.5C1255.63 971.802 1282.88 994.229 1289 1015C1295.18 1035.99 1299.67 1068.83 1298 1084H1390C1401.55 1067.93 1405.82 1057.8 1410 1038C1411.97 1019.2 1412.07 1007.78 1406 982L1349.5 978.5C1346.32 962.872 1342.49 953.984 1333.5 938L1126 902.5Z" fill="#E0DCD9" stroke="black" stroke-width="4" />


                    <path id="Vector 18" d="M1265.5 980H1349.5" stroke="black" stroke-width="4" />
                    <path id="Vector 19" d="M1153 882L954.5 783L940 794.5L1126 902.5L1334 938.5L1349 979L1405.5 982C1404.17 969.055 1394.5 943.5 1381.5 936C1368.5 928.5 1153 882 1153 882Z" fill="#DEDAD7" stroke="black" stroke-width="4" />
                    <path id="Vector 10" d="M366 890C348.637 887.297 337.696 887.368 323 890V938C337.413 938.446 363 938 366 933C369 928 369.522 911.019 366 890Z" fill="#DEDAD7" stroke="black" stroke-width="4" />
                    <g id="Vector 20">
                      <path d="M639 1084L634 1060H1116V1084H639Z" fill="#DEDAD7" />
                      <path d="M1336 939.5L1385.5 940.5M1091 883.5L1152 882M634 1060L639 1084H1116V1060H634Z" stroke="black" stroke-width="4" />
                    </g>
                    <path id="Ellipse 3" d="M898.029 919.338C898.029 919.338 898.028 919.34 898.027 919.343C898.028 919.34 898.029 919.338 898.029 919.338ZM896.785 918.737C897.366 919.045 897.712 919.311 897.897 919.5C897.712 919.69 897.366 919.955 896.785 920.263C895.544 920.92 893.618 921.573 891.069 922.145C886.003 923.28 878.906 924 871 924C863.094 924 855.997 923.28 850.931 922.145C848.382 921.573 846.456 920.92 845.215 920.263C844.634 919.955 844.288 919.69 844.103 919.5C844.288 919.31 844.634 919.045 845.215 918.737C846.456 918.08 848.382 917.427 850.931 916.855C855.997 915.72 863.094 915 871 915C878.906 915 886.003 915.72 891.069 916.855C893.618 917.427 895.544 918.08 896.785 918.737ZM843.971 919.338C843.971 919.338 843.972 919.34 843.973 919.343C843.972 919.34 843.971 919.338 843.971 919.338ZM843.971 919.662C843.971 919.662 843.972 919.66 843.973 919.657C843.972 919.66 843.971 919.662 843.971 919.662ZM898.027 919.657C898.028 919.66 898.029 919.662 898.029 919.662C898.029 919.662 898.028 919.66 898.027 919.657Z" fill="#C4C4C4" stroke="black" stroke-width="4" />
                    <path id="Ellipse 4" d="M657.029 919.338C657.029 919.338 657.028 919.34 657.027 919.343C657.028 919.34 657.029 919.338 657.029 919.338ZM655.785 918.737C656.366 919.045 656.712 919.311 656.897 919.5C656.712 919.69 656.366 919.955 655.785 920.263C654.544 920.92 652.618 921.573 650.069 922.145C645.003 923.28 637.906 924 630 924C622.094 924 614.997 923.28 609.931 922.145C607.382 921.573 605.456 920.92 604.215 920.263C603.634 919.955 603.288 919.69 603.103 919.5C603.288 919.31 603.634 919.045 604.215 918.737C605.456 918.08 607.382 917.427 609.931 916.855C614.997 915.72 622.094 915 630 915C637.906 915 645.003 915.72 650.069 916.855C652.618 917.427 654.544 918.08 655.785 918.737ZM602.971 919.338C602.971 919.338 602.972 919.34 602.973 919.343C602.972 919.34 602.971 919.338 602.971 919.338ZM602.971 919.662C602.971 919.662 602.972 919.66 602.973 919.657C602.972 919.66 602.971 919.662 602.971 919.662ZM657.027 919.657C657.028 919.66 657.029 919.662 657.029 919.662C657.029 919.662 657.028 919.66 657.027 919.657Z" fill="#C4C4C4" stroke="black" stroke-width="4" />
                    <path id="Vector 21" d="M325 967L501 974" stroke="black" stroke-width="4" />
                  </g>
                  <g id="Bottom car_2">
                    <circle id="Ellipse 1_2" r="72.5" transform="matrix(1 0 0 -1 539.5 176.187)" fill="white" stroke="black" stroke-width="4" />
                    <circle id="Ellipse 2_2" r="43.5" transform="matrix(1 0 0 -1 539.5 176.187)" fill="#E8E8E8" stroke="black" stroke-width="4" />
                    <circle id="Ellipse 5_2" r="72.5" transform="matrix(1 0 0 -1 1207.5 177.187)" fill="white" stroke="black" stroke-width="4" />
                    <circle id="Ellipse 6_2" r="43.5" transform="matrix(1 0 0 -1 1207.5 177.187)" fill="#E8E8E8" stroke="black" stroke-width="4" />

                    <path id="second-car-back" d="M576 330.687C576 349.687 602.297 416.615 618 464.687C597.627 459.384 586.467 454.968 567 444.687C526.427 421.336 505.786 406.536 472 377.687C462.46 368.224 454.779 365.43 439 362.687H340C328.011 361.251 324.015 358.593 323 349.687V269.687C306.494 257.599 301.811 247.489 300 224.687C300.685 184.572 304.881 170.287 323 167.687L458 161.687C450.863 178.816 451.7 190.839 458 214.687C472.285 240.419 481.328 249.726 499 258.687C534.688 272.448 555.42 273.71 595 252.687C623.574 228.802 631.539 210.969 634 172.687H645C644.825 191.006 643.657 202.259 639 224.687C628.958 245.013 622.236 254.615 609 269.687C595.574 278.928 588.149 284.208 576 294.687V330.687Z" fill="#E0DCD9" stroke="black" stroke-width="4" />

                    <path id="Vector 11_2" d="M599.5 444.187C560.608 419.427 539.002 402.594 501 364.687C500.529 353.734 502.756 352.134 507.5 350.687H565L599.5 444.187Z" fill="#DEDAD7" stroke="black" stroke-width="4" />
                    <path id="Vector 12_2" d="M771.5 472.687C714.139 473.587 681.338 472.87 620 466.187L615 450.687C660.508 457.038 697.401 458.264 769 457.687L769.644 457.685C811.124 457.607 834.578 457.562 872 450.687C897.692 444.207 929.5 431.187 929.5 431.187C926.983 433.89 996.795 400.084 1031 378.687C1053.34 365.08 1062.44 357.698 1069.5 345.187L1098.5 350.687L940.5 439.687L953.5 450.687C908.301 464.125 870.423 469.311 771.5 472.687Z" stroke="black" stroke-width="4" />

                    <path id="second-car-center" d="M572 338.687L613 454.687L831 454.687C854.475 455.174 866.938 452.974 888.5 446.687C917.741 436.872 933.586 430.893 959.5 418.187C1005.69 394.341 1028.78 382.28 1059 360.187C1071.54 344.618 1075.67 336.731 1078 327.687V187.687C1075.96 178.541 1073.32 175.802 1067.5 172.687H643C645.297 188.624 640 214.687 630 242.687C614.527 261.297 601.072 272.601 572 293.687C566.954 293.672 569.827 308.633 572 338.687Z" fill="#E0DCD9" stroke="black" stroke-width="4" />
                    <path id="Vector 22_2" d="M795 453.687L815 346.687L814 175.687" stroke="black" stroke-width="4" />
                    <path id="Vector 14_2" d="M783 440.687H625.5L600 351.187H795L783 440.687Z" fill="#DEDAD7" stroke="black" stroke-width="4" />
                    <path id="Vector 16_2" d="M835 349.187L811.5 442.687C814.167 444.353 826.7 446.687 855.5 442.687C891.5 437.687 926 420.687 961.5 402.187C989.9 387.387 1028.33 355.687 1044 341.687L835 349.187Z" fill="#DEDAD7" stroke="black" stroke-width="4" />

                    <path id="second-car-front" d="M1126 331.187L1097.5 350.187L1070.5 344.687C1075.35 335.886 1077.02 332.88 1078 331.187V188.187C1077.47 181.907 1075.52 178.705 1068.5 173.687H1115.5L1118 209.687C1123.5 227.353 1143.6 259.375 1175.5 268.187C1209.25 277.51 1246.96 265.582 1251.5 263.187C1255.63 261.884 1282.88 239.458 1289 218.687C1295.18 197.694 1299.67 164.853 1298 149.687H1390C1401.55 165.76 1405.82 175.887 1410 195.687C1411.97 214.491 1412.07 225.91 1406 251.687L1349.5 255.187C1346.32 270.814 1342.49 279.702 1333.5 295.687L1126 331.187Z" fill="#E0DCD9" stroke="black" stroke-width="4" />

                    <path id="Vector 18_2" d="M1265.5 253.687H1349.5" stroke="black" stroke-width="4" />
                    <path id="Vector 19_2" d="M1153 351.687L954.5 450.687L940 439.187L1126 331.187L1334 295.187L1349 254.687L1405.5 251.687C1404.17 264.632 1394.5 290.187 1381.5 297.687C1368.5 305.187 1153 351.687 1153 351.687Z" fill="#DEDAD7" stroke="black" stroke-width="4" />

                    <path id="Vector 10_2" d="M366 343.687C348.637 346.39 337.696 346.319 323 343.687V295.687C337.413 295.24 363 295.687 366 300.687C369 305.687 369.522 322.668 366 343.687Z" fill="#DEDAD7" stroke="black" stroke-width="4" />

                    <g id="Vector 20_2">
                      <path d="M639 149.687L634 173.687H1116V149.687H639Z" fill="#DEDAD7" />
                      <path d="M1336 294.187L1385.5 293.187M1091 350.187L1152 351.687M634 173.687L639 149.687H1116V173.687H634Z" stroke="black" stroke-width="4" />
                    </g>
                    <path id="Ellipse 3_2" d="M898.029 314.348C898.029 314.348 898.028 314.347 898.027 314.344C898.028 314.347 898.029 314.348 898.029 314.348ZM896.785 314.95C897.366 314.641 897.712 314.376 897.897 314.187C897.712 313.997 897.366 313.732 896.785 313.424C895.544 312.766 893.618 312.113 891.069 311.542C886.003 310.407 878.906 309.687 871 309.687C863.094 309.687 855.997 310.407 850.931 311.542C848.382 312.113 846.456 312.766 845.215 313.424C844.634 313.732 844.288 313.997 844.103 314.187C844.288 314.376 844.634 314.641 845.215 314.95C846.456 315.607 848.382 316.26 850.931 316.831C855.997 317.967 863.094 318.687 871 318.687C878.906 318.687 886.003 317.967 891.069 316.831C893.618 316.26 895.544 315.607 896.785 314.95ZM843.971 314.348C843.971 314.348 843.972 314.347 843.973 314.344C843.972 314.347 843.971 314.348 843.971 314.348ZM843.971 314.025C843.971 314.025 843.972 314.027 843.973 314.03C843.972 314.027 843.971 314.025 843.971 314.025ZM898.027 314.03C898.028 314.027 898.029 314.025 898.029 314.025C898.029 314.025 898.028 314.027 898.027 314.03Z" fill="#C4C4C4" stroke="black" stroke-width="4" />
                    <path id="Ellipse 4_2" d="M657.029 314.348C657.029 314.348 657.028 314.347 657.027 314.344C657.028 314.347 657.029 314.348 657.029 314.348ZM655.785 314.95C656.366 314.641 656.712 314.376 656.897 314.187C656.712 313.997 656.366 313.732 655.785 313.424C654.544 312.766 652.618 312.113 650.069 311.542C645.003 310.407 637.906 309.687 630 309.687C622.094 309.687 614.997 310.407 609.931 311.542C607.382 312.113 605.456 312.766 604.215 313.424C603.634 313.732 603.288 313.997 603.103 314.187C603.288 314.376 603.634 314.641 604.215 314.95C605.456 315.607 607.382 316.26 609.931 316.831C614.997 317.967 622.094 318.687 630 318.687C637.906 318.687 645.003 317.967 650.069 316.831C652.618 316.26 654.544 315.607 655.785 314.95ZM602.971 314.348C602.971 314.348 602.972 314.347 602.973 314.344C602.972 314.347 602.971 314.348 602.971 314.348ZM602.971 314.025C602.971 314.025 602.972 314.027 602.973 314.03C602.972 314.027 602.971 314.025 602.971 314.025ZM657.027 314.03C657.028 314.027 657.029 314.025 657.029 314.025C657.029 314.025 657.028 314.027 657.027 314.03Z" fill="#C4C4C4" stroke="black" stroke-width="4" />
                    <path id="Vector 21_2" d="M325 266.687L501 259.687" stroke="black" stroke-width="4" />
                  </g>
                </g>
              </svg>

            </figure>

          </div>

        </div>

      </div>

    <?php } ?>

    <!-- Second Area Value if database empty ends  -->

    </div>

  </div>
</div>

<script>
  // Front center area section of the car starts



  // Second Car Back Area Ends
</script>