<?php

?>
<form method="post" action="<?php echo admin_url('admin-post.php?action=abtf_javascript_update'); ?>" class="clearfix">
	<?php wp_nonce_field('abovethefold'); ?>
	<div class="wrap abovethefold-wrapper">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder">
				<div id="post-body-content">
					<div class="postbox">
						<h3 class="hndle">
							<span><?php _e( 'Javascript Optimization', 'abovethefold' ); ?></span>
						</h3>
						<div class="inside testcontent">

						<p>Modern javascript libraries such as Google Analytics and Facebook API use an old method for async loading that blocks on CSSOM and is often slower than blocking script includes. Script-injected "async scripts" are targeted at old browsers (IE8/9 and Android 2.2/2.3) while modern browsers would require a different method for optimal performance.</p>

						<p>More information and benchmarks can be found in <a href="https://www.igvita.com/2014/05/20/script-injected-async-scripts-considered-harmful/#utm_source=wordpress&amp;utm_medium=plugin&amp;utm_term=optimization&amp;utm_campaign=Above%20The%20Fold%20Optimization" target="_blank">this blog</a> by <a href="https://www.igvita.com/#utm_source=wordpress&amp;utm_medium=plugin&amp;utm_term=optimization&amp;utm_campaign=Above%20The%20Fold%20Optimization" target="_blank">Ilya Grigorik</a>, web performance engineer at Google and author of the O'Reilly book <a href="https://www.amazon.com/High-Performance-Browser-Networking-performance/dp/1449344763/" target="_blank">High Performance Browser Networking</a> (<a href="https://hpbn.co/#utm_source=wordpress&amp;utm_medium=plugin&amp;utm_term=optimization&amp;utm_campaign=Above%20The%20Fold%20Optimization" target="_blank">free online</a>).</p>


						<table class="form-table">
							<tr valign="top">
								<th scope="row">Optimize Javascript Delivery</th>
								<td>
									<label><input type="checkbox" name="abovethefold[jsdelivery]" value="1"<?php if (isset($options['jsdelivery']) && intval($options['jsdelivery']) === 1) { print ' checked'; } ?> onchange="if (jQuery(this).is(':checked')) { jQuery('.jsdeliveryoptions').show(); } else { jQuery('.jsdeliveryoptions').hide(); }"> Enabled</label>
									<p class="description">When enabled, Javascript files are loaded asynchronously.</p>
								</td>
							</tr>
							<tr valign="top" class="jsdeliveryoptions" style="<?php if (isset($options['jsdelivery']) && intval($options['jsdelivery']) !== 1) { print 'display:none;'; } ?>">
								<td colspan="2" style="padding-top:0px;">

									<div class="abtf-inner-table">

										<h3 class="h"><span>Javascript Delivery Optimization</span></h3>
										<div class="inside">

										<p style="padding:5px;border:solid #efefef;background:#f1f1f1;"><span style="color:red;font-weight:bold;">Warning:</span> It may require some tweaking of the async settings to prevent javascript problems.</p>

											<table class="form-table">
												<tr valign="top">
													<th scope="row">Position</th>
													<td>
														<select name="abovethefold[jsdelivery_position]">
															<option value="header"<?php if (!isset($options['jsdelivery_position']) || empty($options['jsdelivery_position']) || $options['jsdelivery_position'] === 'header') { print ' selected'; } ?>>Header</option>
															<option value="footer"<?php if (isset($options['jsdelivery_position']) && $options['jsdelivery_position'] === 'footer') { print ' selected'; } ?>>Footer</option>
														</select>
														<p class="description">Select the position where the async loading of Javascript will start.</p>
													</td>
												</tr>
												<tr valign="top">
													<th scope="row">Ignore List</th>
													<td>
														<textarea style="width: 100%;height:50px;font-size:11px;" name="abovethefold[jsdelivery_ignore]"><?php if (isset($options['jsdelivery_ignore'])) { echo $this->CTRL->admin->newline_array_string($options['jsdelivery_ignore']); } ?></textarea>
														<p class="description">Scripts to ignore in Javascript delivery optimization. One script per line. The files will be left untouched in the HTML.</p>
													</td>
												</tr>
												<tr valign="top">
													<th scope="row">Remove List</th>
													<td>
														<textarea style="width: 100%;height:50px;font-size:11px;" name="abovethefold[jsdelivery_remove]"><?php if (isset($options['jsdelivery_remove'])) { echo $this->CTRL->admin->newline_array_string($options['jsdelivery_remove']); } ?></textarea>
														<p class="description">Scripts to remove from HTML. One script per line. This feature enables to include small plugin related scripts inline.</p>
													</td>
												</tr>
												<th scope="row">
													Force Async
												</th>
												<td>
													<label><input type="checkbox" name="abovethefold[jsdelivery_async_all]" value="1"<?php if (!isset($options['jsdelivery_async_all']) || intval($options['jsdelivery_async_all']) === 1) { print ' checked'; } ?> onchange="if (!jQuery(this).is(':checked')) { jQuery('.jsdelivery_async_no_options').show(); } else { jQuery('.jsdelivery_async_no_options').hide(); }"> Enabled</label>
													<p class="description">When enabled, all scripts are loaded asynchronously.</p>
												</td>
												<tr valign="top" class="jsdelivery_async_no_options" style="<?php if (!isset($options['jsdelivery_async_all']) || intval($options['jsdelivery_async_all']) === 1) { print 'display:none;'; } ?>">
													<th scope="row">Async Force List</th>
													<td>
														<textarea style="width: 100%;height:50px;font-size:11px;" name="abovethefold[jsdelivery_async]"><?php if (isset($options['jsdelivery_async'])) { echo $this->CTRL->admin->newline_array_string($options['jsdelivery_async']); } ?></textarea>
														<p class="description">Enter (parts of) scripts to force to load async. All other scripts are loaded in sequential blocking order if not specifically configured as async in HTML.</p>
														<p class="description">Example:
															<ol style="margin:0px;padding:0px;padding-left:2em;margin-top:10px;">
																<li>Script1: non-async [wait...]</li>
																<li>Script 2,3,4: async, Script 5: non-async [wait...]</li>
																<li>Script 6</li>
															</ol>
														</p>
													</td>
												</tr>
												<tr valign="top">
													<th scope="row">Async Disabled List</th>
													<td>
														<textarea style="width: 100%;height:50px;font-size:11px;" name="abovethefold[jsdelivery_async_disabled]"><?php if (isset($options['jsdelivery_async_disabled'])) { echo $this->CTRL->admin->newline_array_string($options['jsdelivery_async_disabled']); } ?></textarea>
														<p class="description">Enter (parts of) scripts to force to load blocking (non-async).</p>
													</td>
												</tr>
												<th scope="row">
													jQuery Stub
												</th>
												<td>
													<label><input type="checkbox" name="abovethefold[jsdelivery_jquery]" value="1"<?php if (isset($options['jsdelivery_jquery']) && intval($options['jsdelivery_jquery']) === 1) { print ' checked'; } ?>> Enabled</label>
													<p class="description">When enabled, a queue captures basic jQuery functionality such as <code>jQuery(function($){ ... });</code> and <code>$(document).bind('ready')</code> in inline scripts. This feature enables to load jQuery async.</p>
												</td>
											</table>
										</div>

									</div>

								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row">
									Lazy Load Scripts<a name="lazyscripts">&nbsp;</a>
								</th>
								<td>
									<label><input type="checkbox" name="abovethefold[lazyscripts_enabled]" value="1"<?php if (isset($options['lazyscripts_enabled']) && intval($options['lazyscripts_enabled']) === 1) { print ' checked'; } ?> onchange="if (jQuery(this).is(':checked')) { jQuery('.lazyscriptsoptions').show(); } else { jQuery('.lazyscriptsoptions').hide(); }"> Enabled</label>
									<p class="description">When enabled, the widget module from <a href="https://github.com/ressio/lazy-load-xt#widgets" target="_blank">jQuery Lazy Load XT</a> is loaded to enable lazy loading of inline scripts such as Facebook like and Twitter follow buttons.</p>
										<p class="description lazyscriptsoptions" style="<?php if (isset($options['lazyscripts_enabled']) && intval($options['lazyscripts_enabled']) === 1) { } else { print 'display:none;'; } ?>">This option is compatible with <a href="<?php print admin_url('plugin-install.php?s=Lazy+Load+XT&tab=search&type=term'); ?>">WordPress lazy load plugins</a> that use Lazy Load XT. Those plugins are <u>not required</u> for this feature.</p>
										<pre style="float:left;width:100%;overflow:auto;<?php if (isset($options['lazyscripts_enabled']) && intval($options['lazyscripts_enabled']) === 1) { } else { print 'display:none;'; } ?>" class="lazyscriptsoptions">
<?php print htmlentities('<div data-lazy-widget><!--
<div id="fblikebutton_1" class="fb-like" data-href="https://pagespeed.pro/" 
data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
<script>
FB.XFBML.parse(document.getElementById(\'fblikebutton_1\').parentNode||null);
</script>
--></div>');?>
										</pre>
								</td>
							</tr>
						</table>
						<p>More javascript optimization tools will be added in next versions.</p>
						<hr />
						<?php
							submit_button( __( 'Save' ), 'primary large', 'is_submit', false );
						?>

						</div>
					</div>


	<!-- End of #post_form -->

				</div>
			</div> <!-- End of #post-body -->
		</div> <!-- End of #poststuff -->
	</div> <!-- End of .wrap .nginx-wrapper -->
</form>