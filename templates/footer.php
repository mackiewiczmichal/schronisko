<?php
//TODO: Header template
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 bg--blue text-center">
            <h1>Naszą misją jest pomoc</h1>
            <p>Wspomóż nas w dążeniu do uszczęśliwieniu wszystkich bezdomnych zwierzaków</p>
        </div>
    </div>
</div>
<footer class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
            <img src="/schronisko/img/site/logo.png">
            </div>
            <div class="col-lg-6 text-center">
            <h3>Zaprojektowane przez:</h3>
            <ul class="list-group">
                <li class="list-group-item">Michał Mackiewicz</li>
                <li class="list-group-item">Krzystof Kania</li>
                <li class="list-group-item">Magdalena Słyk</li>
                <li class="list-group-item">Monika Leszniewska</li>
                <li class="list-group-item">Maciej Broczek</li>
                <li class="list-group-item">Alicja Krzanecka</li>
            </ul>
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script>
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.text(65,25, 'Formularz adopcyjny "aDogted"');
    doc.text(20, 50, 'Imie:');
    doc.text(65, 50, document.getElementById("imie").value);
    doc.text(20, 60, 'Nazwisko:');
    doc.text(65, 60, document.getElementById("nazwisko").value);
    doc.text(20, 70, 'Data urodzenia:');
    doc.text(65, 70, document.getElementById("data_ur").value);
    doc.text(20, 80, 'Adres email:');
    doc.text(65, 80, document.getElementById("email").value);
    doc.text(20, 90, 'Telefon:');
    doc.text(65, 90, document.getElementById("telefon").value);
    doc.text(20, 100, 'Zwierzak:');
    doc.text(65, 100, document.getElementById("zwierzak").value);
    doc.text(20, 110, 'Id adopcji:');
    doc.text(65, 110, document.getElementById("id_adopcji").value);

    doc.text(100,130, '..............................................');
    doc.text(105,140,  'Podpis zainteresowanego');

    doc.save('sample-file.pdf');
});
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>