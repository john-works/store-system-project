if (window.__storeMainJsInitialized) {
    // already initialized, skip re-initialization
} else {
    window.__storeMainJsInitialized = true;

    document.addEventListener('DOMContentLoaded', function() {
        function slideToggle(t,e,o){0===t.clientHeight?j(t,e,o,!0):j(t,e,o)}
        function slideUp(t,e,o){j(t,e,o)}
        function slideDown(t,e,o){j(t,e,o,!0)}
        function j(t,e,o,i){void 0===e&&(e=400),void 0===i&&(i=!1),t.style.overflow="hidden",i&&(t.style.display="block");var p,l=window.getComputedStyle(t),n=parseFloat(l.getPropertyValue("height")),a=parseFloat(l.getPropertyValue("padding-top")),s=parseFloat(l.getPropertyValue("padding-bottom")),r=parseFloat(l.getPropertyValue("margin-top")),d=parseFloat(l.getPropertyValue("margin-bottom")),g=n/e,y=a/e,m=s/e,u=r/e,h=d/e;window.requestAnimationFrame(function l(x){void 0===p&&(p=x);var f=x-p;i?(t.style.height=g*f+"px",t.style.paddingTop=y*f+"px",t.style.paddingBottom=m*f+"px",t.style.marginTop=u*f+"px",t.style.marginBottom=h*f+"px"):(t.style.height=n-g*f+"px",t.style.paddingTop=a-y*f+"px",t.style.paddingBottom=s-m*f+"px",t.style.marginTop=r-u*f+"px",t.style.marginBottom=d-h*f+"px"),f>=e?(t.style.height="",t.style.paddingTop="",t.style.paddingBottom="",t.style.marginTop="",t.style.marginBottom="",t.style.overflow="",i||(t.style.display="none"),"function"==typeof o&&o()):window.requestAnimationFrame(l)})}

        // Sidebar submenu toggle
        const sidebarItems = document.querySelectorAll('.sidebar-item.has-sub') || [];
        for(let i = 0; i < sidebarItems.length; i++) {
            const sidebarItem = sidebarItems[i];
            const link = sidebarItem.querySelector('.sidebar-link');
            if (!link) continue;
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const submenu = sidebarItem.querySelector('.submenu');
                if (!submenu) return;
                if( submenu.classList.contains('active') ) submenu.style.display = "block";
                if( submenu.style.display == "none" ) submenu.classList.add('active')
                else submenu.classList.remove('active')
                slideToggle(submenu, 300)
            });
        }

        // Responsive sidebar state
        (function(){
            var w = window.innerWidth;
            var sidebarEl = document.getElementById('sidebar');
            if (!sidebarEl) return;
            if(w < 1200) {
                sidebarEl.classList.remove('active');
            }
            window.addEventListener('resize', function() {
                var w = window.innerWidth;
                if(w < 1200) {
                    sidebarEl.classList.remove('active');
                } else {
                    sidebarEl.classList.add('active');
                }
            });
        })();

        // Burger and hide buttons
        const burgerBtn = document.querySelector('.burger-btn');
        if (burgerBtn) {
            burgerBtn.addEventListener('click', function() {
                const sidebarEl = document.getElementById('sidebar');
                if (sidebarEl) sidebarEl.classList.toggle('active');
            });
        }

        const sidebarHideBtn = document.querySelector('.sidebar-hide');
        if (sidebarHideBtn) {
            sidebarHideBtn.addEventListener('click', function() {
                const sidebarEl = document.getElementById('sidebar');
                if (sidebarEl) sidebarEl.classList.toggle('active');
            });
        }

        // Perfect Scrollbar Init
        if(typeof PerfectScrollbar == 'function') {
            const container = document.querySelector(".sidebar-wrapper");
            if (container) {
                const ps = new PerfectScrollbar(container, {
                    wheelPropagation: false
                });
            }
        }

        // Scroll into active sidebar
        const activeItem = document.querySelector('.sidebar-item.active');
        if (activeItem && typeof activeItem.scrollIntoView === 'function') {
            activeItem.scrollIntoView(false);
        }
    });
}