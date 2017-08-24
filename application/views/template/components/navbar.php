	<nav class="navbar navbar-default" role="navigation" style="border-radius: 0;">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php $usersess =  $this->session->all_userdata(); ?>
				<?php if (!empty($usersess['perusahaan'])): ?>
				<style>
					.navbar-brand {
					padding: 0px; /* firefox bug fix */
					}
					.navbar-brand>img {
					height: 100%;
					padding: 10px; /* firefox bug fix */
					width: auto;
					}
				</style>
				<a class="navbar-brand" href="#">
		        <img src="<?php echo base_url(); ?>images/<?php echo $usersess['logoperusahaan']; ?>" alt="<?php echo $usersess['namaperusahaan']; ?>">
				</a>
				<?php else: ?>
				<a class="navbar-brand" href="#">Sistem Senbi</a>

				<?php endif; ?>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
			<?php if (!empty($usersess['id'])): ?>

				<?php if ($usersess['type'] == "checker"): ?>
					<?php $this->load->view('template/components/navbar/checker'); ?>
				<?php elseif ($usersess['type'] == "maker"): ?>
					<?php $this->load->view('template/components/navbar/maker'); ?>
				<?php elseif ($usersess['type'] == "approval"): ?>
					<?php $this->load->view('template/components/navbar/approval'); ?>
				<?php endif ?>

				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $usersess['nama']; ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="disabled"><a href="#">Ganti Passsword</a></li>
							<li><a href="<?php echo base_url(); ?>user/logout">Logout</a></li>
						</ul>
					</li>
				</ul>
			<?php endif ?>

			</div><!-- /.navbar-collapse -->
		</div>
	</nav>