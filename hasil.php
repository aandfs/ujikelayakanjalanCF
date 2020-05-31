<?php
require_once "koneksi/init.php";
include'header.php';

 ?>


 <!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahkeruskan">Perhitungan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <?php
        if (isset($_POST['button']))
        {
        $tes = $_POST["ikondisi"];
        if(count($tes) == 0){
          $kelayakan = "Tidak Ada Kerusakan Yang Dipilih";
        };

        if(count($tes) == 1){
          for ($i=0; $i < count($tes); $i++)
          {
             $laland ='';
             foreach ($_POST["ikondisi"] as $laland) {
               $tampil_hasil1 = hasil1($laland);
               while($row = mysqli_fetch_assoc($tampil_hasil1)){
                 $mb = $row['mb'];
                 $namakerusakan = $row['kerusakan'];
                 $ch = $mb;
                 $ce = 1;
                 $cfhe = $ch * $ce;
                 $persenan = $cfhe * 100 ;
                 echo 'Kerusakan : ', $namakerusakan,'<br>';
                 echo "CF[H]1 : $ch", '<br>';
                 echo "CF[E]1 : $ce", '<br>';
                 echo "CF[H,E]1 = CF[H]1 * CF[E]1 = $ch * $ce = $cfhe", '<br>';
                 echo 'Jika CF[H,E]1 dipersenkan menjadi ', $cfhe, ' * 100 = ', $persenan ,' %', '<br>';
                 if($persenan > 70){
                   $kelayakan = "Bus Tidak Layak Jalan";
                 }else{
                   $kelayakan = "Bus Layak Jalan";
                 }
               }
             }
          }
        }else if(count($tes) > 1){
            $laland ='';
            $i =1;
            foreach ($_POST["ikondisi"] as $laland) {
              $tampil_hasil1 = hasil1($laland);
              while($row = mysqli_fetch_assoc($tampil_hasil1)){
                echo "<br> proses ".$i."<br/>------------------------------------<br/>";
                $jml = mysqli_num_rows($tampil_hasil1);
                $mb = $row['mb'];

                if($i == 1){
                  $chlama = $row['mb'];
                  $namakerusakan = $row['kerusakan'];
                  $ch = $mb;
                  $ce = 1;
                  $cfhe = $ch * $ce;
                  $ilama = $i;
                  echo 'Kerusakan : ', $namakerusakan,'<br>';
                  echo "CF[H]$ilama : $ch", '<br>';
                  echo "CF[E]$ilama : $ce", '<br>';
                  echo "CF[H,E]$ilama = CF[H]$ilama * CF[E]$ilama = $ch * $ce = $cfhe", '<br>';

                }else if($i == 2){
                  $chbaru = $row['mb'];
                  $namakerusakan = $row['kerusakan'];
                  $chbaru = $mb;
                  $ce = 1;
                  $cfhe = $chbaru * $ce;
                  $ibaru = $i;
                  $icombine = $ibaru;
                  echo 'Kerusakan : ', $namakerusakan,'<br>';
                  echo "CF[H]$ibaru : $ch", '<br>';
                  echo "CF[E]$ibaru : $ce", '<br>';
                  echo "CF[H,E]$ibaru = CF[H]$ibaru * CF[E]$ibaru = $ch * $ce = $cfhe", '<br>';
                  $cfcombine = $chlama + ($chbaru * (1 - $chlama));
                  echo "CFCombineCF[H,E]$ilama,$ibaru = CF[H,E]$ilama + (CF[H,E]$ibaru * (1 - CF[H,E]$ilama)) = $chlama + ($chbaru * (1 - $chlama)) = ".$cfcombine."<br/>";
                  if (count($tes) == 2)
                  {
                      $cf = $cfcombine;
                      $persenan = $cf * 100 ;
                      echo 'CF : ', $cf,' * 100 = ',$persenan ,' %','<br>';
                      if($persenan > 70){
                        $kelayakan = "Bus Tidak Layak Jalan";
                      }else{
                        $kelayakan = "Bus Layak Jalan";
                      }
                  }
                }else if(count($tes) >= 3){
                  $chlama = $cfcombine;
                  $chbaru = $row['mb'];
                  $ilama = $icombine;
                  $namakerusakan = $row['kerusakan'];
                  $chbaru = $mb;
                  $ce = 1;
                  $cfhe = $chbaru * $ce;
                  $ibaru = $i;
                  echo 'Kerusakan : ', $namakerusakan,'<br>';
                  echo "CF[H]$ibaru : $ch", '<br>';
                  echo "CF[E]$ibaru : $ce", '<br>';
                  echo "CF[H,E]$ibaru = CF[H]$ibaru * CF[E]$ibaru = $ch * $ce = $cfhe", '<br>';
                  $cfcombine = $chlama + ($chbaru * (1 - $chlama));
                  echo "CFCombineCF[H,E]$ilama,$ibaru = CF[H,E]$ilama + (CF[H,E]$ibaru * (1 - CF[H,E]$ilama)) = $chlama + ($chbaru * (1 - $chlama)) = ".$cfcombine."<br/>";

                  if (count($tes) == $i)
                  {
                      $cf = $cfcombine;
                      $persenan = $cf * 100 ;
                      echo 'CF : ', $cf,' * 100 = ',$persenan ,' %','<br>';
                      if($persenan > 70){
                        $kelayakan = "Bus Tidak Layak Jalan";
                      }else{
                        $kelayakan = "Bus Layak Jalan";
                      }
                  }
                }
              }$i++;
            }
          }
        }
         ?>
      </div>
    </div>
  </div>
</div>

<div class="size">

  <h1>Kondisi Bus</h1>

  <?php if($tes== 0): ?>
    <h3><?php echo $kelayakan; ?></h3>
  <?php elseif($tes > 0): ?>
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
       <th colspan="3">Kondisi Bus<//th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $persenan. " % "; ?></td>
        <td><?php echo $kelayakan; ?></td>
        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Perhitungan</button></td>
      </tr>
      <?php
      $tesaja = false;
      foreach ($_POST["ikondisi"] as $laland) {
        $tampil_relasicari = tampilkan_relasicari($laland);
        while($row = mysqli_fetch_assoc($tampil_relasicari)){
          $kerusakan = $row['kerusakan'];
          $penyebab = $row['penyebab'];
          $mb = $row['mb'];
          $kemungkinan = $mb *100;
          if($tesaja != $row['kerusakan']){
            echo '<tr>';
            echo'<th colspan="3">', $kerusakan, '</th>';
            echo '</tr>';
            echo '<tr>';
                    echo'<td colspan="2">', 'Penyebab', '</td>';
                    echo'<td>', 'Kemungkinan', '</td>';
            echo '</tr>';
          }
         echo '<tr>';
                 echo'<td colspan="2">', $penyebab, '</td>';
                 echo'<td>', $kemungkinan, '%', '</td>';
                 $tesaja = $row['kerusakan'];
         echo '</tr>';
        }
      }
       ?>

      </div>
      </tbody>
  </table>
 <?php endif; ?>

</div>

<?php
 include'footer.php';
 ?>
