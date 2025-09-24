document.querySelectorAll('.nav-link').forEach(item => {
    item.addEventListener('click', function () {
        // Hapus kelas 'active' dari semua link
        document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));

        // Tambahkan kelas 'active' pada link yang diklik
        this.classList.add('active');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const currentUrl = window.location.pathname;
    document.querySelectorAll('.nav-link').forEach(item => {
        if (item.getAttribute('href') === currentUrl) {
            item.classList.add('active');
        }
    });
});