<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> SmartAdmin </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

	</head>
	
<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Dashboard</li>
				</ol>
				
			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Dashboard <span>> My Dashboard</span></h1>
					</div>
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
						<ul id="sparks" class="">
							<li class="sparks-info">
							<?php 
							     $income1 = $this->my_model->get_income_metercustomer();
							     extract($income1);
								 $income2 = $this->my_model->get_income_monthlycustomer();
								 extract($income2);
								 $intotal = $total1 + $total2;
							?>
								<h5> My Income <span class="txt-color-blue">$<?php print_r($intotal);?></span></h5>
								<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
									
								</div>
							</li>
							<?php
							     $expense1 = $this->my_model->get_outcome_expenses();
							     extract($expense1);
								 $expense2 = $this->my_model->get_outcome_payroll();
								 extract($expense2);
								 $extotal = $extotal1 + $extotal2;
							?>
							<li class="sparks-info">
								<h5> My Expense <span class="txt-color-purple">$<?php print_r($extotal);?></span></h5>
								<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
									
								</div>
							</li>
							<?php 
							     $total_customer = $this->my_model->total_customer();
							     extract($total_customer); 
							?>
							<li class="sparks-info">
								<h5> Total Customer <span class="txt-color-greenDark">&nbsp;<?php print_r($count_id);?></span></h5>
								<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
									
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- widget grid -->
				<section id="widget-grid" class="">

					<!-- row -->
					<div class="row">
				
						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
								
								<header>
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h6>&nbsp;List of Customers Problems ( <?php echo count(array_filter($customer)) ?> )</h6>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body no-padding">
				                       <?php if(count(array_filter($customer)) > 0){?>
										<table id="firstpagei" class="table table-striped table-bordered table-hover" width="100%">
										
											<thead>			                
												<tr>
													<th data-hide="phone">S No</th>
													<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Customer id</th>
													<th data-hide="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Customer Name </th>
													<th data-hide="expand">Pay Time</th>
													
												</tr>
											</thead>
											<tbody>
											  <?php foreach($customer as $key => $value){?>
												<tr>
													<td><?php echo $key+1;?></td>
													<td><?php echo stripslashes(str_replace('\n','',$value['customer_id']));?></td>
													<td><?php echo stripslashes($value['first_name']);?></td>
													<td><?php 
															   if($value['customer_type']=='metercustomer'){ echo 'Meter'; }
															   if($value['customer_type']=='monthlycustomer'){ echo 'Monthly'; }
								                        ?>
													</td>
												</tr>
											  <?php } ?>	
											</tbody>
										</table>
										 <?php }else{?>
											 <div class="clearfix" style="height:250px; text-align:center; font-size:16px; color:#F00; vertical-align:middle; font-weight:bold;margin-top:40px;">
												No Results Found...
											 </div>
										<?php }?>

									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false">
								
								<header>
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h6>&nbsp;Expenses Reports ( <?php echo count($expenses);?> )</h6>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				                    </div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body no-padding">
				                       <?php if(count(array_filter($customer)) > 0){?>
										<table id="expensesmore" class="table table-striped table-bordered table-hover" width="100%">
										    <thead>			                
												<tr>
													<th data-hide="phone">S No</th>
													<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> ID</th>
													<th data-hide="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Type </th>
													<th data-hide="expand">Total</th>
												</tr>
											</thead>
											<tbody>
											  <?php foreach($expenses as $key => $value){?>
												<tr>
													<td><?php echo $key+1;?></td>
													<td><?php echo stripslashes(str_replace('\n','',$value['expenses_id']));?></td>
													<td><?php echo stripslashes($value['expenses_type']);?></td>
													<td><?php echo stripslashes($value['total']);?></td>
												</tr>
											  <?php } ?>	
											</tbody>
										</table>
										 <?php }else{?>
											 <div class="clearfix" style="height:250px; text-align:center; font-size:16px; color:#F00; vertical-align:middle; font-weight:bold;margin-top:40px;">
												No Results Found...
											 </div>
										<?php }?>

									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-darken" id="wid-id-2" data-widget-editbutton="false">
								
								<header>
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h6>&nbsp;This Month Expenses ( <?php echo count($this_expenses);?> )</h6>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				                    </div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body no-padding">
				                       <?php if(count(array_filter($this_expenses)) > 0){?>
										<table id= "monthexp" class="table table-striped table-bordered table-hover" width="100%">
										    <thead>			                
												<tr>
													<th data-hide="phone">S No</th>
													<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> ID</th>
													<th data-hide="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Type </th>
													<th data-hide="expand">Total</th>
												</tr>
											</thead>
											<tbody>
											   <?php foreach($this_expenses as $key => $value){?>
												<tr>
													<td><?php echo $key+1;?></td>
													<td><?php echo stripslashes(str_replace('\n','',$value['expenses_id']));?></td>
													<td><?php echo stripslashes($value['expenses_type']);?></td>
													<td><?php echo stripslashes($value['total']);?></td>
												</tr>
											  <?php } ?>	
											</tbody>
										</table>
										 <?php }else{?>
											 <div class="clearfix" style="height:250px; text-align:center; font-size:16px; color:#F00; vertical-align:middle; font-weight:bold;margin-top:40px;">
												No Results Found...
											 </div>
										<?php }?>

									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-darken" id="wid-id-2" data-widget-editbutton="false">
								
								<header>
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h6>&nbsp;This Month Income ( <?php echo  count($meter_income)+count($monthly_income);?> )</h6>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				                    </div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body no-padding">
				                       <?php if(count(array_filter($meter_income)) > 0 || count(array_filter($monthly_income)) > 0){?>
										<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
										    <thead>			                
												<tr>
													<th data-hide="phone">S No</th>
													<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>Customer ID</th>
													<th data-hide="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Name </th>
													<th data-hide="expand">Amount</th>
												</tr>
											</thead>
											<tbody>
											   <?php foreach($meter_income as $key => $value){?>
												<tr>
													<td><?php echo $key+1;?></td>
													<td><?php echo stripslashes(str_replace('\n','',$value['customer_id']));?></td>
													<td><?php echo stripslashes($value['name']);?></td>
													<td><?php echo stripslashes($value['total']);?></td>
												</tr>
											   <?php } ?>
											   
											   <?php if(count(array_filter($meter_income)) > 0){ $i=count(($meter_income)); }else{ $i=1;} ?> 
											   
												   <?php foreach($monthly_income as $key => $value){?>
													<tr>
														<td><?php echo $key+$i;?></td>
														<td><?php echo stripslashes(str_replace('\n','',$value['customer_id']));?></td>
														<td><?php echo stripslashes($value['name']);?></td>
														<td><?php echo stripslashes($value['amount']);?></td>
													</tr>
												   <?php } ?>
											</tbody>
										</table>
											 <?php }else{?>
											 <div class="clearfix" style="height:250px; text-align:center; font-size:16px; color:#F00; vertical-align:middle; font-weight:bold;margin-top:40px;">
												No Results Found...
											 </div>
										<?php }?>

									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->
				
						</article>
						<!-- WIDGET END -->
				
					</div>
				
					<!-- end row -->

					

				</section>
				<!-- end widget grid -->

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->
		

		<?php include('footer.php');?>

	</body>

</html>

<!-- PAGE RELATED PLUGIN(S) -->
		<script src="<?php echo base_url();?>js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="<?php echo base_url();?>js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="<?php echo base_url();?>js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			
			/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
			*/	
	
			/* BASIC ;*/
				var responsiveHelper_dt_basic = undefined;
				var responsiveHelper_datatable_fixed_column = undefined;
				var responsiveHelper_datatable_col_reorder = undefined;
				var responsiveHelper_datatable_tabletools = undefined;
				
				var breakpointDefinition = {
					tablet : 1024,
					phone : 480
				};
	
				$('#dt_basic').dataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
			        "oLanguage": {
					    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
					},
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_dt_basic) {
							responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_dt_basic.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_dt_basic.respond();
					}
				});
	
			/* END BASIC */
			
			/* COLUMN FILTER  */
		    var otable = $('#datatable_fixed_column').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"oLanguage": {
					"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
				},
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_fixed_column.respond();
				}		
			
		    });
		    
		    // custom toolbar
		    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
		    	   
		    // Apply the filter
		    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
		    	
		        otable
		            .column( $(this).parent().index()+':visible' )
		            .search( this.value )
		            .draw();
		            
		    } );
		    /* END COLUMN FILTER */   
	    
			/* COLUMN SHOW - HIDE */
			$('#datatable_col_reorder').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
				"autoWidth" : true,
				"oLanguage": {
					"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
				},
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_col_reorder) {
						responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_col_reorder.respond();
				}			
			});
			
			/* END COLUMN SHOW - HIDE */
	
			/* TABLETOOLS */
			$('#datatable_tabletools').dataTable({
				
				// Tabletools options: 
				//   https://datatables.net/extensions/tabletools/button_options
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
				"oLanguage": {
					"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
				},		
		        "oTableTools": {
		        	 "aButtons": [
		             "copy",
		             "csv",
		             "xls",
		                {
		                    "sExtends": "pdf",
		                    "sTitle": "SmartAdmin_PDF",
		                    "sPdfMessage": "SmartAdmin PDF Export",
		                    "sPdfSize": "letter"
		                },
		             	{
	                    	"sExtends": "print",
	                    	"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
	                	}
		             ],
		            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
		        },
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_tabletools) {
						responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_tabletools.respond();
				}
			});
			
			/* END TABLETOOLS */
		
		})

		</script>

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
			_gaq.push(['_trackPageview']);
			
			(function() {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
			})();
		</script>
		<script>				
					$(document).ready(function() {
			$('#expensesmore').dataTable().fnDestroy();
			table = $('#expensesmore').dataTable( {
				"ajax": {
					url: "<?php echo base_url();?>index.php/master/dashboard/index/pagination",
					data: {},
					type: "POST",
				},
				"columns": [
			{ "data": "id" },
			{ "data": "expenses_id" },
			{ "data": "expenses_type" },
			{ "data": "total" },			
			],
			"language": {
            "infoEmpty": "No Indent Available.",
				sProcessing: '<i class="fa fa-spinner fa-pulse  fa-4x" ></i>'
						},
					processing : true
				});
	});	
				</script>
				
				<script>				
					$(document).ready(function() {
			$('#monthexp').dataTable().fnDestroy();
			table = $('#monthexp').dataTable( {
				"ajax": {
					url: "<?php echo base_url();?>index.php/master/dashboard/index/paginationtwo",
					data: {},
					type: "POST",
				},
				"columns": [
			{ "data": "id" },
			{ "data": "expenses_id" },
			{ "data": "expenses_type" },
			{ "data": "total" },			
			],
			"language": {
            "infoEmpty": "No Indent Available.",
				sProcessing: '<i class="fa fa-spinner fa-pulse  fa-4x" ></i>'
						},
					processing : true
				});
	});	
				</script>
				
	<script>				
					$(document).ready(function() {
					var f = 'Meter';
					var s = 'Monthly';
			$('#firstpagei').dataTable().fnDestroy();
			table = $('#firstpagei').dataTable( {
				"ajax": {
					url: "<?php echo base_url();?>index.php/master/dashboard/index/paginationfrst",
					data: {},
					type: "POST",
				},
				"columns": [
			{ "data": "id" },
			{ "data": "customer_id" },
			{ "data": "first_name" },
			{ "data": "customer_type",
				render: function ( data, type, row ) {
                        if(data == 'monthlycustomer'){ return 'monthly'; };
                        if(data == 'metercustomer'){ return 'meter'; };
				},
			},		
			],
			"language": {
            "infoEmpty": "No Indent Available.",
				sProcessing: '<i class="fa fa-spinner fa-pulse  fa-4x" ></i>'
						},
					processing : true
				});
	});	
				</script>
