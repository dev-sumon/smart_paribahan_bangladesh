
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

// Mobile sidebar toggle
document.addEventListener('DOMContentLoaded', function () {
    // Tab navigation
    var triggerTabList = [].slice.call(document.querySelectorAll('.nav-link'))
    triggerTabList.forEach(function (triggerEl) {
        triggerEl.addEventListener('click', function (e) {
            e.preventDefault()

            // Close mobile sidebar when a tab is clicked
            var sidebar = document.getElementById('sidebar')
            if (window.innerWidth < 768 && sidebar.classList.contains('show')) {
                var bsCollapse = new bootstrap.Collapse(sidebar)
                bsCollapse.hide()
            }

            // Show the selected tab
            var tabTrigger = new bootstrap.Tab(triggerEl)
            tabTrigger.show()
        })
    })
})