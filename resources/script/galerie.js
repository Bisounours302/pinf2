document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.nav-link').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.nav-link.active').forEach(function(activeLink) {
                activeLink.classList.remove('active');
            });
            this.classList.add('active');
            var year = this.getAttribute('data-year');
            document.querySelectorAll('.tab-pane').forEach(function(tab) {
                if (tab.getAttribute('data-year') === year) {
                    tab.classList.add('show', 'active');
                } else {
                    tab.classList.remove('show', 'active');
                }
            });
        });
    });
});