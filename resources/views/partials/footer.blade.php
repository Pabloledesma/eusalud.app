<!-- FOOTER -->
    <div class="container footer">
        <footer>
            <p class="pull-right"><a href="#">Volver arriba</a></p>
            <p>&copy; {{ date('Y') }} Clínica EuSalud, &middot; 
                <a href="{{ asset('pdf/ESTADOS_FINANCIEROS.PDF') }}" target="_blank">Estados financieros</a> &middot; 
                <a href="{{ url('vacantes') }}">Trabaje con nosotros</a> &middot;
                <a href="{{ url('galeria') }}">Galeria</a></p>
        </footer>   
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->

    <script>
//Mensajes 
$("#flash-overlay-modal").modal();
//$('div.alert').not('.alert-important').delay(3000).slideUp(300);


    </script>
