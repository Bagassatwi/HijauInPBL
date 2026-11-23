</main>
</body>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const profileBtn = document.getElementById("profileDropdownBtn");
    const profileMenu = document.getElementById("profileMenu");
    const chevron = document.getElementById("chevronIcon");

    const notificationBtn = document.getElementById("notificationDropdownBtn");
    const notificationMenu = document.getElementById("notificationMenu");

    if (profileBtn && profileMenu) {
      profileBtn.addEventListener("click", function(e) {
        e.stopPropagation();
        profileMenu.classList.toggle("hidden");
        if (notificationMenu && !notificationMenu.classList.contains("hidden")) {
          notificationMenu.classList.add("hidden");
        }
        if (chevron) {
          chevron.classList.toggle("rotate-180");
        }
      });
    }

    const readAllBtn = document.getElementById("readAllNotificationsBtn");

    if (notificationBtn && notificationMenu) {
      notificationBtn.addEventListener("click", function(e) {
        e.stopPropagation();
        notificationMenu.classList.toggle("hidden");
        if (profileMenu && !profileMenu.classList.contains("hidden")) {
          profileMenu.classList.add("hidden");
        }
        if (chevron) {
          chevron.classList.remove("rotate-180");
        }
      });
    }

    if (readAllBtn) {
      readAllBtn.addEventListener("click", function(e) {
        e.stopPropagation();

        fetch("/dashboard/actions/notifications/mark_read.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
              "X-Requested-With": "XMLHttpRequest"
            },
            credentials: "same-origin"
          })
          .then(function(response) {
            if (!response.ok) {
              throw new Error("Failed to mark notifications as read");
            }
            return response.json();
          })
          .then(function(data) {
            if (data.success) {
              window.location.reload();
            }
          })
          .catch(function() {
            window.location.reload();
          });
      });
    }

    document.addEventListener("click", function() {
      if (profileMenu && !profileMenu.classList.contains("hidden")) {
        profileMenu.classList.add("hidden");
      }
      if (notificationMenu && !notificationMenu.classList.contains("hidden")) {
        notificationMenu.classList.add("hidden");
      }
      if (chevron) {
        chevron.classList.remove("rotate-180");
      }
    });
  });
</script>

</html>