<div id="faq" class="main">
    <section class="faq">
        <h1><?=_t['faq_h1']?></h1>

        <button class="accordion"><?=_t['faq_p1']?></button>
        <div class="panel">
            <?=_t['faq_r1']?>
        </div>

        <button class="accordion"><?=_t['faq_p2']?></button>
        <div class="panel">
            <?=_t['faq_r2']?>
        </div>

        <button class="accordion"><?=_t['faq_p3']?></button>
        <div class="panel">
            <?=_t['faq_r3']?>
        </div>

        <button class="accordion"><?=_t['faq_p4']?></button>
        <div class="panel">
            <?=_t['faq_r4']?>
        </div>


        <button class="accordion"><?=_t['faq_p5']?></button>
        <div class="panel">
            <?=_t['faq_r5']?>
        </div>

        <button class="accordion"><?=_t['faq_p6']?></button>
        <div class="panel">
            <?=_t['faq_r6']?>
        </div>

        <button class="accordion"><?=_t['faq_p7']?></button>
        <div class="panel">
            <?=_t['faq_r7']?>
        </div>

        <button class="accordion"><?=_t['faq_p8']?></button>
        <div class="panel">
            <?=_t['faq_r8']?>
        </div>
    </section>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var indx;

for (indx = 0; indx < acc.length; indx++) {
  acc[indx].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.padding = "0 18px";
      panel.style.maxHeight = null;
    } else {
      panel.style.padding = "18px";
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>