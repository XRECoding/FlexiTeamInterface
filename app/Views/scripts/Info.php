<script>
    // Funktion zum Generieren einer 5-stelligen Zufallszahl
    let randomNumber = Math.floor(10000 + Math.random() * 90000);

    // Funktion zum Anzeigen der Zufallszahl im Modal
    document.getElementById("randomNumberDisplay").textContent = randomNumber;
    
    // Beim Laden der Seite das Modal anzeigen
    $(document).ready(function () {
      $('#randomNumberModal').modal('show');
    });
  </script>