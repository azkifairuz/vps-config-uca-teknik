<script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/serviceworker.js')
                .then(function(registration) {
                    console.log('Service Worker registered with scope:', registration.scope);
                }, function(err) {
                    console.log('Service Worker registration failed:', err);
                });
            });
        }
    </script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>