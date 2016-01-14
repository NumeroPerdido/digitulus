<?php
//$img=imagecreatefromjpeg('img/blur-background05.jpg');
header('Content-Disposition: attachment; filename=excelfile.xls');
//header('Content-type: application/vnd.sun.xml.calc');
//header('Content-type: application/calc; filename=export.ods' );
echo '<img src="http://goartha.com/digitulus/img/blur-background05.jpg" width="300px" height="300px" />
<table border="1" id="ReportTable" class="myClass">
    <tr bgcolor="#CCC">
      <td width="100">xxxxx</td>
      <td width="700">xxxxxx</td>
      <td width="170">xxxxxx</td>
      <td width="30">xxxxxx</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td>Zawardo</td>
      <td>ORAORA</td>
      <td></td>
      <td>oh my godo</td>
    </tr>
  </table>';
?>
