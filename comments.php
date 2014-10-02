<div class="commentwrap">
	<div id="commentsGroundRules">
	    <div id="commentsGroundRulesInner">
	        <h3 style="padding-top:4px;font-size:20px;">Discussion</h3>
	        <ul>
	            <li>We reserve the right to remove any comment we feel is spammy, NSFW, defamatory, rude, or reckless to the community.</li>
	            <li>We expect everyone to be respectful of other commenters. It's fine to have differences of opinion, but there's no need to act like a jerk.</li>
	            <li>Use your own words (don't copy and paste from elsewhere), be honest and don't pretend to be someone (or something) you're not.</li>
	        </ul>
	    </div>
	    <div class="subLinks">
	        <ul>
	            <li><a href="http://www.denverpost.com/recentcomments" title="Recent comments, top discussions and top commenters">Recent comments</a></li>
	            <li><a href="http://www.denverpost.com/disqusprimer" title="Primer on Disqus commenting">Disqus comments primer</a></li>
	            <li><a href="http://www.denverpost.com/groundrules" title="Denver Post commenting Ground Rules (April 2014)">Commenting Ground Rules</a></li>
	        </ul>
	        <div class="clear"></div>
	    </div>
	</div>

	<div id="putDisqusCommentsHere">
		<div id="disqus_thread"></div>
		<script type="text/javascript">
	        var disqus_shortname = 'dfm-denverpost';
	        <?php if (isset($config[0]['commentid']) && (trim($config[0]['commentid']) != '')): ?>var disqus_identifier = <?php echo $config[0]['commentid']; ?>;<?php endif; ?>
	        (function() {
	            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
	            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	        })();
	    </script>
	</div>

	<div class="clear"></div>
</div>