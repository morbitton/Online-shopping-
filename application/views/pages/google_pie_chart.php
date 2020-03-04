<script type="text/javascript">
      google.charts.load('visualization', "1", {
          packages: ['corechart']
      });
 </script>
 <div class="continer">
 <div class="row" style="height:75%;margin-top: 10%">
    <div class="col-md-12">
        <div id="year_pie" style="width: 900px; height: 500px; margin: 0 auto;" >
        </div>
    </div>
</div>  
 <div id="clickIt" >
        <?php echo form_open('Webs_controller/calcit'); ?>
    <button id="submitCalc" name="submit"> Show me how much I paid so far</button>
        </form>
</div>
     </div>
     
<div style="text-align:center;"><br><br><h3>Result</h3>
    <p>
        The program of customer retention and the desire to improve and give our boards the best, we have checked the percentages of purchases over the years since the establishment of the Violet site.<br>
The analysis was previously tracked and monitored for the amount of purchases over the years, with the aim of reviewing whether our customers are satisfied with the long-awaited shopping experience we all love, tracking drastic declines and optimizing our sites or maximizing them.<br>
You are invited to take a look at the data on our website in the new three years and see the growing growth rate.<br>
Keep buying from us again,<br> Violet team.
    </p>
</div>

<script language="JavaScript">
  google.charts.setOnLoadCallback(yearWiseChart);
  
  function yearWiseChart() {
 
        var data = google.visualization.arrayToDataTable([
            ['Year', 'bought_order Count'],
            <?php 
             foreach ($year_pie as $row){
             echo "['".$row->year."',".$row->count."],";
             }
             ?>
        ]);
        var options = {
            title: 'Statistical display of purchases by years',
            is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('year_pie'));
        chart.draw(data, options);
        }
</script>


