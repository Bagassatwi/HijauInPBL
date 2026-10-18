</main>
</body>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const btn = document.getElementById("profileDropdownBtn");
    const menu = document.getElementById("profileMenu");
    const chevron = document.getElementById("chevronIcon");

    if (btn && menu) {
      btn.addEventListener("click", function(e) {
        e.stopPropagation();
        menu.classList.toggle("hidden");
        if (chevron) {
          chevron.classList.toggle("rotate-180");
        }
      });

      document.addEventListener("click", function() {
        if (!menu.classList.contains("hidden")) {
          menu.classList.add("hidden");
          if (chevron) {
            chevron.classList.remove("rotate-180");
          }
        }
      });
    }
  });
</script>

</html>