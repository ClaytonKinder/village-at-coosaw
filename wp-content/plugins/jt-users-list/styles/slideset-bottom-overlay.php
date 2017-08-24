<div class="jsquare-users-list" data-uk-slideset="{small: 1, medium: 2, large: 4}">
  <div class="uk-slidenav-position">
   	<ul class="uk-grid uk-slideset">
	<?php
		for ($i = 1; $i <= $numusers; $i++) {
			echo '<li>';

			if ( ! empty(${'img'.$i})) {
	?>
		<figure class="uk-overlay">
						
			<?php
				echo '<img src="' . ${'img'.$i} . '" alt="">';
			}

			if ( ! empty(${'name'.$i}) || ! empty(${'job'.$i})) {
		?>
					
			<figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-ignore">
				<div class="jsquare-user-box">
					<?php
						echo '<p class="jsquare-user-name">' . ${'name'.$i} . '<span>' . ${'job'.$i} . '</span></p>';
					}

					echo '<p class="jsquare-user-icons">';
					if ( ! empty(${'fb'.$i}) ) {
						echo '<a href="' . ${'fb'.$i} . '"><i class="fa fa-facebook"></i></a>';	
					}
					if ( ! empty(${'twitter'.$i}) ) {
						echo '<a href="' . ${'twitter'.$i} . '"><i class="fa fa-twitter"></i></a>';
					}
					if ( ! empty(${'linkedin'.$i}) ) {
						echo '<a href="' . ${'linkedin'.$i} . '"><i class="fa fa-linkedin"></i></a>';
					}
					echo '</p>';
					?>
				</div>
			</figcaption>
				
		</figure>
		<?php 
			echo '</li>';
		}
		?>
	</ul>
		
	<a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
    <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>

  </div>
</div>