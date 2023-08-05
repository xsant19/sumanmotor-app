<!-- ionicons cdn -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<!-- alpine js cdn -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    (function() {
        var triggers = document.querySelectorAll("[data-collapse-target]");
        var collapses = document.querySelectorAll("[data-collapse]");
        if (triggers && collapses) {
            Array.from(triggers).forEach(function(trigger) {
                return Array.from(collapses).forEach(function(collapse) {
                    if (trigger.dataset.collapseTarget === collapse.dataset.collapse) {
                        trigger.addEventListener("click", function() {
                            if (collapse.style.height && collapse.style.height !== "0px") {
                                collapse.style.height = 0;
                                trigger.removeAttribute("open")
                            } else {
                                collapse.style.height = "".concat(collapse.firstElementChild
                                    .clientHeight, "px");
                                trigger.setAttribute("open", "")
                            }
                        })
                    }
                })
            })
        }
    })();
</script>
