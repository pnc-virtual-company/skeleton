<main role="main" class="container">

	<div class="row">
		<div class="col-10">
			<?php echo $partialView; ?>
	</div>
	<div class="col-2">
		<h3>Home</h3>
		<a href="<?php echo base_url();?>">Back to Homepage</a>
		<h3>Examples</h3>
		<ul class="nav nav-pills">
		<?php foreach ($pills as $key => $pill) { ?>
			<li class="nav-item">
			<?php if ($key == $selectedPill) { ?>
				<a class="nav-link active" href="#"><?php echo $pill['title']; ?></a>
			<?php } else { ?>
				<?php if ($key == 'i18n') { ?>
					<a href="<?php echo base_url() . 'examples/i18n';?>">
						<?php echo $pill['title']; ?>
					</a>
					<?php } else { ?>
				<a href="<?php echo base_url() . 'examples/views/' . $pill['url'];?>">
					<?php echo $pill['title']; ?>
				</a>
				<?php } ?>
			<?php } ?>
			</li>
		<?php	} ?>
		</ul>
	</div>
	</div>

</main>
