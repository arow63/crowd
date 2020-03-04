<div class="js-form-bounces js-cache-load-admin-chart-bounces-form">
  <div class="accordion-group">
   <div class="accordion-heading bootstro" data-bootstro-step="1" data-bootstro-content="<?php echo __l("Bounces represents the percentage of visitors who enter the site and 'bounce' (leave the site) rather than continue viewing other pages within the site. Bounce rates can be used to help determine the effectiveness or performance of an entry page. An entry page with a low bounce rate means that the page effectively causes visitors to view more pages and continue on deeper into the web site. A pageview is an instance of a page being loaded by a browser. The Pageviews metric is the total number of pages viewed; repeated views of a single page are also counted. Visitors is the number of user visit your site. Bounces represents the percentage of visitors who enter the site and 'bounce' (leave the site) rather than continue viewing other pages within the site. The graph is use to trace step wise completion of user's project post/fund so it helps admin to find in which step user interrupt without complete their posting/funding. This analysis helps admin to improve the clarity of project post steps thereby increase the project post/fund.");?>" data-bootstro-placement='bottom' data-bootstro-width="600px" data-bootstro-title="Bounces">
      <div class="no-bor clearfix box-head">
        <h5> <span class="pull-left"> <i class="fa fa-bar-chart"></i> <?php echo __l('Bounces'); ?> </span> <a class="accordion-toggle js-toggle-icon js-no-pjax clearfix pull-right" href="#form-bounces" data-parent="#accordion-admin-dashboard" data-toggle="collapse"> <i class="fa fa-chevron-down pull-right"></i> </a>
          <div class="dropdown pull-right"> <a class="dropdown-toggle js-no-pjax js-overview" data-toggle="dropdown" href="#"> <i class="fa fa-wrench"></i> </a>
            <ul class="dropdown-menu pull-right">
              <li<?php echo (!empty($this->request->params['named']['select_range_id']) && $this->request->params['named']['select_range_id'] == 'lastDays') ? ' class="active"' : ''; ?>><a class='js-link {"data_load":"js-form-bounces"}' title="<?php echo __l('Last 7 days'); ?>"  href="<?php echo Router::url('/', true)."admin/google_analytics/form_bounce_chart/select_range_id:lastDays";?>"><?php echo __l('Last 7 days'); ?></a> </li>
              <li<?php echo (!empty($this->request->params['named']['select_range_id']) && $this->request->params['named']['select_range_id'] == 'lastWeeks') ? ' class="active"' : ''; ?>><a class='js-link {"data_load":"js-form-bounces"}' title="<?php echo __l('Last 4 weeks'); ?>" href="<?php echo Router::url('/', true)."admin/google_analytics/form_bounce_chart/select_range_id:lastWeeks";?>"><?php echo __l('Last 4 weeks'); ?></a> </li>
              <li<?php echo (!empty($this->request->params['named']['select_range_id']) && $this->request->params['named']['select_range_id'] == 'lastMonths') ? ' class="active"' : ''; ?>><a class='js-link {"data_load":"js-form-bounces"}' title="<?php echo __l('Last 3 months'); ?>" href="<?php echo Router::url('/', true)."admin/google_analytics/form_bounce_chart/select_range_id:lastMonths";?>"><?php echo __l('Last 3 months'); ?></a> </li>
              <li<?php echo (!empty($this->request->params['named']['select_range_id']) && $this->request->params['named']['select_range_id'] == 'lastYears') ? ' class="active"' : ''; ?>><a class='js-link {"data_load":"js-form-bounces"}' title="<?php echo __l('Last 3 years'); ?>"  href="<?php echo Router::url('/', true)."admin/google_analytics/form_bounce_chart/select_range_id:lastYears";?>"><?php echo __l('Last 3 years'); ?></a> </li>
            </ul>
          </div>
        </h5>
      </div>
    </div>
    <div id="form-bounces" class="accordion-body in collapse over-hide">
      <div class="accordion-inner">
        <div class="row">
          <div class="clearfix col-md-12">
            <section class="col-md-10 center-box js-cache-load-admin-chart-bounces">
                <?php
                    $select_range_id = (!empty($this->request->params['named']['select_range_id']))?$this->request->params['named']['select_range_id']:'lastDays';
                    echo $this->element('chart-admin_chart_bounces', array('select_range_id' => $select_range_id, 'from_section' => 'bounces','cache' => array('config' => 'site_element_cache_15_min')));
                ?>
            </section>
          </div>
          <div class="col-md-12">
			<?php
				$i = 0;
				foreach($projectTypes as $type) {
				$i++;
				$type_name = $type['ProjectType']['name'];
			?>

				<section class="col-md-6 text-center <?php if(($i % 2) == 0) { echo 'sep'; } ?>">
				<h3><?php echo __l($type_name . ' Project Post Form Bounces'); ?></h3>
				  <script type="text/javascript">
					  <?php if(empty($this->request->params['isAjax'])) { ?>
					  google.setOnLoadCallback(drawChart);
					  function drawChart() {
					  <?php } ?>
						var data = google.visualization.arrayToDataTable([
						  <?php echo ${$type_name.'project_add_form_bounces'}; ?>
						]);
						var chart = new google.visualization.BarChart(document.getElementById('form_bounces_chart_project_post_<?php echo $this->Html->cText($type_name, false); ?>'));
						chart.draw(data);
					  <?php if(empty($this->request->params['isAjax'])) { ?>
					  }
					  <?php } ?>
					</script>
				  <div class="text-center" id="form_bounces_chart_project_post_<?php echo $this->Html->cText($type_name, false); ?>" style="width: 450px; height: 400px;"></div>
				</section>
			<?php } ?>

            <section class="col-md-6 text-center">
			  <h3><?php echo __l('Project Fund Form Bounces'); ?></h3>
              <script type="text/javascript">
                  <?php if(empty($this->request->params['isAjax'])) { ?>
				  google.setOnLoadCallback(drawChart);
                  function drawChart() {
				  <?php } ?>
                    var data = google.visualization.arrayToDataTable([
					  <?php echo ${$type_name.'project_fund_form_bounces'}; ?>
                    ]);
                    var chart = new google.visualization.BarChart(document.getElementById('form_bounces_chart_project_fund'));
                    chart.draw(data);
                  <?php if(empty($this->request->params['isAjax'])) { ?>
                  }
				  <?php } ?>
                </script>
              <div class="text-center" id="form_bounces_chart_project_fund" style="width: 450px; height: 400px;"></div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

