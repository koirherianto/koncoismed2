<div>
    <!-- Styles -->
<style>
    #chartdiv {
      width: 100%;
      height: 500px;
    }
    </style>
  
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
        
    <!-- Chart code -->
    <script>
    am4core.ready(function() {
    
    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end
    
    // Create chart instance
    // var chart = am4core.create("chartdiv", am4charts.XYChart);
    // chart.scrollbarX = new am4core.Scrollbar();

    var chart = am4core.create("chartdiv", am4charts.XYChart);
    //chart.scrollbarX = JSON.parse(window.livewire.find('barChartRelawanDesa'));
    //chart.data = JSON.parse(window.livewire.find('3ZUWZ8azHYzVdZkOeKfz').chartkota);
    //chart.data = JSON.parse(window.livewire.first('barChartRelawanDesa').mount);
    //console.log(chart.data);
    // Create axes
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "id_wilayah";
    categoryAxis.title.text = "Semua Desa";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 30;
    categoryAxis.renderer.labels.template.horizontalCenter = "right";
    categoryAxis.renderer.labels.template.verticalCenter = "middle";
    categoryAxis.renderer.labels.template.rotation = 270;
    categoryAxis.tooltip.disabled = true;
    categoryAxis.renderer.minHeight = 110;
    
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.renderer.minWidth = 50;
    valueAxis.title.text = "Total Relawan";
    
    // Create series
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.sequencedInterpolation = true;
    series.dataFields.valueY = "total";
    series.dataFields.categoryX = "id_wilayah";
    series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
    series.columns.template.strokeWidth = 0;
    
    series.tooltip.pointerOrientation = "vertical";
    
    series.columns.template.column.cornerRadiusTopLeft = 10;
    series.columns.template.column.cornerRadiusTopRight = 10;
    series.columns.template.column.fillOpacity = 0.8;
    
    // on hover, make corner radiuses bigger
    var hoverState = series.columns.template.column.states.create("hover");
    hoverState.properties.cornerRadiusTopLeft = 0;
    hoverState.properties.cornerRadiusTopRight = 0;
    hoverState.properties.fillOpacity = 1;
    
    series.columns.template.adapter.add("fill", function(fill, target) {
      return chart.colors.getIndex(target.dataItem.index);
    });
    
    // Cursor
    chart.cursor = new am4charts.XYCursor();
    
    }); // end am4core.ready()
    </script>
    
<!-- HTML -->
<div class="content-body">
  <!-- Column Chart Relawan di setiap desa atau kelurahan-->
  <div class="row">
      <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h4 class="card-title">Relawan di Setiap Desa atau Kelurahan</h4>
                <div id="chartdiv"></div>	
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
