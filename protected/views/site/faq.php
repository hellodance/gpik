<?php $this->setPageTitle("Gympik- An end-to-end free online platform to help improving lifestyle choices.");?>
<div class="faq">
<div class="row-fluid">
    <div class="span12">
      <h1>Frequently Asked Question</h1>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="accordion" id="accordion2">
         <?php $i=1;foreach ($model as $key=>$faq){ ?>
                <div class="accordion-group">
                  <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $key; ?>" ><strong><?php echo $i; ?></strong><?php echo $faq->question ?></a> </div>
                  <div id="collapse<?php echo $key; ?>" class="accordion-body collapse">
                    <div class="accordion-inner faqs"><?php echo $faq->answer; ?></div>
                  </div>
                </div>
          <?php $i++; }?>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $('#collapse0').addClass('collapse in');
})
</script>
