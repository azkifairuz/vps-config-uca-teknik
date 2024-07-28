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
    <script>
        document.querySelectorAll('.gejala-card').forEach(card => {
            card.addEventListener('click', function() {
                this.classList.toggle('selected');
                let value = this.getAttribute('data-value');
                let input = document.getElementById('input-' + value);
                if (this.classList.contains('selected')) {
                    input.value = value;
                } else {
                    input.value = '';
                }
            });
        });

        // Automatically submit the form after selecting an option
        document.querySelectorAll('.gejala-card').forEach(card => {
            card.addEventListener('click', function() {
                document.getElementById('pertanyaanForm').submit();
            });
        });
        const myModal = document.getElementById('exampleModal')

    </script>
</body>
</html>