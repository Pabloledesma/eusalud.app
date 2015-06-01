@extends('eusalud2')

@section('content')
<div class="container"
<div class="jumbotron embed-responsive embed-responsive-16by9">
        <h2>Clínica Pacientes Crónicos</h2>
        <iframe class="embed-responsive-item" width="80%" height="400" style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m22!1m12!1m3!1d1988.4391299021493!2d-74.16161520006155!3d4.615796696033284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m7!1i0!3e6!4m0!4m3!3m2!1d4.6158528!2d-74.1613631!5e0!3m2!1ses!2s!4v1426682733950" frameborder="0"></iframe>
        <hr>
        <img src="{{ asset('img/cronicosmodificado.jpg') }}" alt="Pacientes Crónicos" />
        <hr>
        <!-- Esta función no esta incluida
        <a class="btn btn-green" href="#">Contactar con esta clínica</a><br />-->
        <h4>Dirección: transversal 78H # 42C - 37 SUR</h4>
    </div>
</div>

@stop
