(function () {
    if (typeof lifeOsAdminMenuLink === 'undefined' || !lifeOsAdminMenuLink || !lifeOsAdminMenuLink.frontendUrl) {
        return;
    }

    var submenuLinks = document.querySelectorAll('#' + lifeOsAdminMenuLink.parentId + ' .wp-submenu a, #toplevel_page_' + lifeOsAdminMenuLink.menuSlug + ' .wp-submenu a');
    if (!submenuLinks || !submenuLinks.length) {
        return;
    }

    submenuLinks.forEach(function (link) {
        if (link.textContent.trim() !== lifeOsAdminMenuLink.submenuText) {
            return;
        }

        link.setAttribute('href', lifeOsAdminMenuLink.frontendUrl);
        link.setAttribute('target', '_blank');
        link.setAttribute('rel', 'noopener noreferrer');
    });
})();
