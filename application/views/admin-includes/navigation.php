<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="<?php echo base_url(); ?>/assets/avatars/avatar.png" alt="me" class="online" /> 
						<span>
							<?php echo $this->session->userdata('usertype');?>
						</span>
						<i class="fa fa-angle-down"></i>
					</a> 
					
				</span>
			</div>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive-->
			<nav>
				<!-- 
				NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional href="" links. See documentation for details.
				-->

				<ul>
				<?php if( ( array_key_exists('dashboard',$roleResponsible) && ($roleResponsible['dashboard'] == 1) ) || ( $this->session->userdata('usertype') == 'admin' )){ ?>
					<li class="<?php if($this->uri->segment(2)=='dashboard') echo 'active';?>">
						<a href="<?php echo ADMIN_URL;?>dashboard/" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
					</li>
				<?php } ?>	
					<li class="top-menu-invisible">
						<a href="#"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Customers</span></a>
						<ul>
						  
							<li class="<?php if($this->uri->segment(2)=='addcustomer'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>addcustomer" title="Adding Customer"><i class="fa fa-lg fa-fw fa-user-plus"></i> <span class="menu-item-parent">Adding Customer</span></a>
							</li>
							<li class="<?php if($this->uri->segment(2)=='add_zone'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>add_zone" title="Zone Names"><i class="fa fa-lg fa-fw fa-picture-o"></i> <span class="menu-item-parent">Zone Names</span></a>
							</li>
							
						</ul>
					</li>
					<li  class="<?php if($this->uri->segment(3)=='addmetercustomerreading' && $this->uri->segment(2)=='addcustomer'){echo 'active open';}?>
					            <?php if($this->uri->segment(3)=='metersearch' && $this->uri->segment(2)=='addcustomer'){echo 'active open';}?>
								<?php if($this->uri->segment(3)=='monthlysearch' && $this->uri->segment(2)=='addcustomer'){echo 'active open';}?>
								<?php if($this->uri->segment(3)=='generatemetercustomer_search' && $this->uri->segment(2)=='addcustomer'){echo 'active open';}?>
								<?php if($this->uri->segment(3)=='income_reportsearch' && $this->uri->segment(2)=='addcustomer'){echo 'active open';}?>
								<?php if($this->uri->segment(3)=='paidsearch' && $this->uri->segment(2)=='addcustomer'){echo 'active open';}?>
								<?php if($this->uri->segment(3)=='unpaidsearch' && $this->uri->segment(2)=='addcustomer'){echo 'active open';}?>
								<?php if($this->uri->segment(2)=='feesplaning'){echo 'active open';}?>
								<?php if($this->uri->segment(2)=='paymentmonthlycustomer'){echo 'active open';}?>
								<?php if($this->uri->segment(2)=='addpaymentcustomer'){echo 'active open';}?>
								<?php if($this->uri->segment(2)=='amountrate'){echo 'active open';}?>								   
						     ">
						<a href="#"><i class="fa fa-lg fa-fw fa-money"></i> <span class="menu-item-parent">Finance</span></a>
						<ul>
						     <li class="<?php if($this->uri->segment(2)=='addmetercustomerreading'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>addmetercustomerreading">Add Meter Customers Reading </a>
							</li>
							
						    <li class="<?php if($this->uri->segment(2)=='addpaymentcustomer'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>addpaymentcustomer">Meter Customers Bills</a>
							</li>
							
							<?php if((array_key_exists('amountrate',$roleResponsible) && ($roleResponsible['amountrate'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
								<li class="<?php if($this->uri->segment(2)=='amountrate'){echo 'active';}?>">
									<a href="<?php echo ADMIN_URL;?>amountrate">Per Unit Value</a>
								</li>
							<?php } ?>
							<?php if((array_key_exists('feesplaning',$roleResponsible) && ($roleResponsible['feesplaning'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
								<li class="<?php if($this->uri->segment(2)=='feesplaning'){echo 'active';}?>">
									<a href="<?php echo ADMIN_URL;?>feesplaning">Monthly Fees Plans</a>
								</li>
							<?php } ?>
                           
							<li class="<?php if($this->uri->segment(2)=='paymentmonthlycustomer'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>paymentmonthlycustomer">Monthly Customers Bills</a>
							</li>
																
							<li class="<?php if($this->uri->segment(3)=='metersearch' && $this->uri->segment(2)=='addcustomer'){echo 'active';}?>">
									<a href="<?php echo ADMIN_URL;?>addcustomer/metersearch"> Meter Customer Search</a>
							</li>
							
							<li class="<?php if($this->uri->segment(3)=='monthlysearch' && $this->uri->segment(2)=='addcustomer'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>addcustomer/monthlysearch">Monthly Customer Search</a>
							</li>
							
							<?php if((array_key_exists('generatemetercustomer_search',$roleResponsible) && ($roleResponsible['generatemetercustomer_search'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
								<li class="<?php if($this->uri->segment(3)=='generatemetercustomer_search' && $this->uri->segment(2)=='addcustomer') echo 'active';?>">
									<a href="<?php echo ADMIN_URL;?>addcustomer/generatemetercustomer_search/">Both Type Of Customers </a>
								</li>
							<?php } ?>
							<?php if((array_key_exists('income_reportsearch',$roleResponsible) && ($roleResponsible['income_reportsearch'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
								<li class="<?php if($this->uri->segment(3)=='income_reportsearch' && $this->uri->segment(2)=='addcustomer') echo 'active';?>">
									<a href="<?php echo ADMIN_URL;?>addcustomer/income_reportsearch/">Income Report search</a>
								</li>
							<?php } ?>
							<?php if((array_key_exists('paidsearch',$roleResponsible) && ($roleResponsible['paidsearch'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
								<li class="<?php if($this->uri->segment(3)=='paidsearch' && $this->uri->segment(2)=='addcustomer') echo 'active';?>">
									<a href="<?php echo ADMIN_URL;?>addcustomer/paidsearch/">Paid Search</a>
								</li>
							<?php } ?>
							<li class="<?php if($this->uri->segment(3)=='unpaidsearch' && $this->uri->segment(2)=='addcustomer') echo 'active';?>">
								<a href="<?php echo ADMIN_URL;?>addcustomer/unpaidsearch/">Unpaid Search</a>
							</li>
							
						</ul>
					</li>
					<?php //if((array_key_exists('addledger',$roleResponsible) && ($roleResponsible['addledger'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
					<!--	<li class="< ?php if($this->uri->segment(2)=='transaction') echo 'active';?>">
							<a href="< ?php echo ADMIN_URL;?>transaction"><i class="fa fa-lg fa-fw fa-money"></i> <span class="menu-item-parent">Transaction</span></a>
						</li>	-->
					<?php //} ?>
					<?php //if((array_key_exists('addledger',$roleResponsible) && ($roleResponsible['addledger'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
						<!--<li class="< ?php if($this->uri->segment(2)=='addjournalvoucher') echo 'active';?>">
							<a href="< ?php echo ADMIN_URL;?>addjournalvoucher"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Journal Voucher</span></a>
						</li>	-->
					<?php //} ?>
					<?php //if((array_key_exists('addledger',$roleResponsible) && ($roleResponsible['addledger'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
					<!--	<li class="< hp echo ADMIN_URL;?>trialbalance"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Trial Balance</span></a>
						</li>	-->
					<?php //} ?>
					<?php if((array_key_exists('addemployee',$roleResponsible) && ($roleResponsible['addemployee'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
					<li class="<?php if($this->uri->segment(2)=='addemployee'){echo 'active open';}?>
								   <?php if($this->uri->segment(2)=='payrols'){echo 'active open';}?>
								   <?php if($this->uri->segment(3)=='payrolssearch'){echo 'active open';}?>
								    <?php if($this->uri->segment(2)=='job_title'){echo 'active open';}?>">
						<a href="#"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Employee</span></a>
						<ul>
						    <li class="<?php if($this->uri->segment(2)=='addemployee'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>addemployee"> Add Employee</a>
							</li>
                           <li class="<?php if($this->uri->segment(2)=='job_title'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>job_title">Job Title Names</a>
							</li>
							<li class="<?php if($this->uri->segment(2)=='payrols'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>payrols">Payrols</a>
							</li>
							<li class="<?php if($this->uri->segment(3)=='/payrolssearch' && $this->uri->segment(3)=='addemployee'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>addemployee/payrolssearch">Payrols Search</a>
							</li>
						</ul>
					</li>
					<?php } ?>
					<li class="<?php if($this->uri->segment(2)=='addshareholder'){echo 'active open';}?>
								   <?php if($this->uri->segment(2)=='profitloss'){echo 'active open';}?>">
						<a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Share Holder</span></a>
						<ul>
						    <li class="<?php if($this->uri->segment(2)=='addshareholder'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>addshareholder"> Share Holder</a>
							</li>
							<li class="<?php if($this->uri->segment(3)=='profitloss') echo 'active';?>">
								<a href="<?php echo ADMIN_URL;?>addshareholder/profitloss/">profit or Lose share Holders</a>
							</li>
						</ul>
					</li>
					 <?php if((array_key_exists('addexpenses',$roleResponsible) && ($roleResponsible['addexpenses'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
					<li class="<?php if($this->uri->segment(2)=='addexpenses'){echo 'active open';}?>
								   <?php if($this->uri->segment(2)=='bsearch'){echo 'active open';}?>">
						<a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Expenses</span></a>
						<ul>
						    <li class="<?php if($this->uri->segment(2)=='addexpensestype' && $this->uri->segment(2)=='addexpensestype'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>addexpensestype"> Add Expenses Type</a>
							</li>
                            
                             <li class="<?php if($this->uri->segment(2)=='addexpenses' && $this->uri->segment(2)=='addexpenses'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>addexpenses"> Add Expenses</a>
							</li>
														
							<li class="<?php if($this->uri->segment(3)=='bsearch' && $this->uri->segment(2)=='addexpenses') echo 'active';?>">
								<a href="<?php echo ADMIN_URL;?>addexpenses/bsearch/">Balance Sheet Search</a>
							</li>
						</ul>
					</li>
                    <li class="<?php if($this->uri->segment(2)=='addaccountgroup'){echo 'active open';}?>
								   <?php if($this->uri->segment(2)=='addsubaccountgroup'){echo 'active open';}?>">
						<a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Accounting</span></a>
						<ul>
						    <li class="<?php if($this->uri->segment(2)=='addaccountgroup' && $this->uri->segment(2)=='addaccountgroup'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>addaccountgroup"> Add Account Expenses Type</a>
							</li>
                            
                             <li class="<?php if($this->uri->segment(2)=='addsubaccountgroup' && $this->uri->segment(2)=='addaccountgroup'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>addsubaccountgroup"> Add Sub Account Group</a>
							</li>
							<li class="<?php if($this->uri->segment(2)=='addjournalvoucher') echo 'active';?>">
							<a href="<?php echo ADMIN_URL;?>addjournalvoucher">Journal Voucher</a>
						</li>
						<li class="<?php if($this->uri->segment(2)=='trialbalance') echo 'active';?>">
							<a href="<?php echo ADMIN_URL;?>trialbalance">Trial Balance</a>
						</li>
						<li class="">
							<a href="<?php echo ADMIN_URL;?>addledger/reportdisplay">Journal Report</a>
						</li>
						</ul>
					</li>
					 <?php } ?>	
					<?php if((array_key_exists('adddailyreport',$roleResponsible) && ($roleResponsible['adddailyreport'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
						<li class="<?php if($this->uri->segment(2)=='adddailyreport') echo 'active';?>">
							<a href="<?php echo ADMIN_URL;?>adddailyreport"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Daily Report</span></a>
						</li>	
					<?php } ?>
                    <?php if((array_key_exists('addassets',$roleResponsible) && ($roleResponsible['addassets'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
						<li class="<?php if($this->uri->segment(2)=='addassets') echo 'active';?>">
							<a href="<?php echo ADMIN_URL;?>addassets"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Assets</span></a>
						</li>	
					<?php } ?>
					 <?php if((array_key_exists('addledger',$roleResponsible) && ($roleResponsible['addledger'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
						<li class="<?php if($this->uri->segment(2)=='addledger') echo 'active';?>">
							<a href="<?php echo ADMIN_URL;?>addledger"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Ledger</span></a>
						</li>	
					<?php } ?>
					
					<?php if((array_key_exists('technicalproblems',$roleResponsible) && ($roleResponsible['technicalproblems'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
						<li class="<?php if($this->uri->segment(2)=='technicalproblems'){echo 'active';}?>">
							<a href="<?php echo ADMIN_URL;?>technicalproblems"><i class="fa fa-lg fa-fw fa-gavel"></i> <span class="menu-item-parent">Technical Problems </span></a>
						</li>
					<?php } ?>
					<?php if((array_key_exists('technicalsearch',$roleResponsible) && ($roleResponsible['technicalsearch'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
						<li class="<?php if($this->uri->segment(3)=='technicalsearch' && $this->uri->segment(2)=='addcustomer') echo 'active';?>">
							<a href="<?php echo ADMIN_URL;?>addcustomer/technicalsearch/"><i class="glyphicon glyphicon-zoom-in"></i><span class="menu-item-parent">Technical Problems View</span></a>
						</li>	
					<?php } ?>
					<?php if((array_key_exists('web_settings',$roleResponsible) && ($roleResponsible['web_settings'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
						<li class="<?php if($this->uri->segment(2)=='web_settings') echo 'active';?>">
							<a href="<?php echo ADMIN_URL;?>web_settings"><i class="fa fa-lg fa-fw fa-location-arrow"></i> <span class="menu-item-parent">Admin Address</span></a>
						</li>
					<?php } ?>	
                    <?php if((array_key_exists('admin',$roleResponsible) && ($roleResponsible['admin'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
					<li class="<?php if($this->uri->segment(2)=='responsibilities'){echo 'active open';}?>
								   <?php if($this->uri->segment(2)=='employee_logins'){echo 'active open';}?>">
						<a href="#"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Admin</span></a>
						<ul>
						<?php if((array_key_exists('responsibilities',$roleResponsible) && ($roleResponsible['responsibilities'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
								<li class="<?php if($this->uri->segment(2)=='responsibilities' && $this->uri->segment(2)=='responsibilities'){echo 'active';}?>">
									<a href="<?php echo ADMIN_URL;?>responsibilities"> Roles & Responsibilities</a>
								</li>
							  <?php } ?>
                        	
					 					
							<?php if((array_key_exists('employee_logins',$roleResponsible) && ($roleResponsible['employee_logins'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>	
								<li class="<?php if($this->uri->segment(3)=='employee_logins' && $this->uri->segment(2)=='employee_logins') echo 'active';?>">
									<a href="<?php echo ADMIN_URL;?>employee_logins/">Employees</a>
								</li>
							 <?php } ?>	
								 
						</ul>
					</li>
					<?php } ?> 	
					<!--<?php if((array_key_exists('admin',$roleResponsible) && ($roleResponsible['admin'] == 1) ) || ($this->session->userdata('usertype') == 'admin')){ ?>
						<li class="<?php if($this->uri->segment(2)=='employee_logins'){echo 'active';} if($this->uri->segment(2)=='responsibilities'){echo 'active';}?>">
							<a href="<?php echo ADMIN_URL;?>responsibilities"><i class="fa fa-lg fa-fw fa-user txt-color-blue"></i> <span class="menu-item-parent">Admin</span></a>
						</li>
					<?php } ?>	-->
					<li class="<?php if($this->uri->segment(2)=='change_username'){echo 'active open';}?>
								   <?php if($this->uri->segment(2)=='change_password'){echo 'active open';}?>">
						<a href="#"><i class="fa fa-lg fa-fw fa fa-key"></i> <span class="menu-item-parent">Setting</span></a>
						<ul>
							<li class="<?php //if($this->uri->segment(3)=='change_password' && $this->uri->segment(2)=='change_username') echo 'active';?>">
								<a href="<?php echo ADMIN_URL;?>addcustomer/adminconfiguration"> Admin Configuration</a>
							</li>
						   <li class="<?php if($this->uri->segment(2)=='change_username' && $this->uri->segment(2)=='change_username'){echo 'active';}?>">
								<a href="<?php echo ADMIN_URL;?>change_username/"> Change Username</a>
							</li>
							<li class="<?php if($this->uri->segment(3)=='change_password' && $this->uri->segment(2)=='change_username') echo 'active';?>">
								<a href="<?php echo ADMIN_URL;?>change_password/"> Change Password</a>
							</li>
						</ul>
					</li>
					</ul>
			</nav>
			

			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>

		</aside>
		<!-- END NAVIGATION -->