<?php $this->setPageTitle("Gympik- An end-to-end free online platform to help improving lifestyle choices.");?>
<div class="container inner career">
  <div class="row-fluid">
    <div class="span12">
      <h1>Site Map</h1>
    </div>
  </div>
<div class="row-fluid">
  	<div class="span8 sitemap">
    	<div class="span3 sitemap-cloum">
            <ul>
                <li><strong>Company</strong></li>
                <?php foreach ($model as $key=>$view){
                    $parts = explode('/', $view->loc);
                    $last = end($parts); ?>
                <li><a href="<?php echo $view->loc;?>"><?php echo $last; ?></a></li><?php } ?>
<!--                <li><a href="#">About Gympik</a>
                	<ul>
                    	<li><a href="#">About Us</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Advisiors</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Success Storie</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Privacy & Security</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Advertise on Gympik</a></li>
                <li><a href="#">SiteMap</a></li>
            </ul>
        </div>
        <div class="span3">
            <ul>
                <li><strong>Health Care Services</strong></li>
                <li><a href="#">Find Trainers</a></li>
                <li><a href="#">About Gympik</a></li>
                <li><a href="#">Why Gympik</a></li>
                <li><a href="#">Health Guide</a></li>
                <li><a href="#">Trainers</a></li>
            </ul>-->
        </div>
    </div>
    <div class="span4 career-form">
    	<h4>Join our Talent Community</h4>
        <p>Drop us a line at:</p>
        <a href="mailto:contact@gympik.com">contact@gympik.com</a>
    </div>
  </div>
</div>