<div id="faq" class="main">
    <section class="faq">
        <h1>Perguntas Frequentes (FAQ)</h1>

        <button class="accordion">Pergunta 1</button>
        <div class="panel">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

        <button class="accordion">Pergunta 2</button>
        <div class="panel">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

        <button class="accordion">Pergunta 3</button>
        <div class="panel">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
      panel.style.maxHeight = null;
      panel.style.padding = "0 18px";
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
      panel.style.padding = "18px";
    } 
  });
}
</script>