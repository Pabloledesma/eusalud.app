@if( \Auth::user()->user_type == 'Super Admin' || \Auth::user()->user_type == 'Admin' )
            <div class="form-group">
                <label class="control-label col-sm-2" for="num_id">Número de identificación</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="num_id" id="num_id" />
                </div>
            </div>
            @endif

            <div class="form-group">
                <label class="control-label col-sm-2" for="fecha_inicio">Fecha de inicio: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{ date('Y-m-d') }}" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="fecha_final">Fecha final: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="fecha_final" id="fecha_final" value="{{ date('Y-m-d') }}" />
                </div>
            </div>
            @if($formato_de_salida == true)
            <div class="form-group">
                
                
                <label class="control-label col-sm-2" for="fecha_final">Formato de salida: </label>
                <div class="col-sm-4">
                    <label class="radio-inline"><input type="radio" name="formato" value="excel" {{$formato['excel'] ? '' : 'disabled' }}>Excel</label>
                    <label class="radio-inline"><input type="radio" name="formato" value="pdf" checked>Pdf</label>
                </div>
                
                
            </div>
            @endif

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <input class="btn btn-green" type="submit" name="submit" id="submit" value="{{ $formato_de_salida == true ? 'Descargar' : 'Generar' }}" />
                </div>
            </div>
        </form>
        @if( count($errors) > 0 )


        @foreach($errors->all() as $e)
        <p class="bg-danger">{{ $e }}</li>
            @endforeach


            @endif


    </div>
</div>
<script>
    $().ready(function () {
        
        //Calendarios
        $(function (factory) {
            $("#fecha_inicio").datepicker();
            $("#fecha_final").datepicker();
            if (typeof define === "function" && define.amd) {

                // AMD. Register as an anonymous module.
                define(["../datepicker"], factory);
            } else {

                // Browser globals
                factory(jQuery.datepicker);
            }
        }(function (datepicker) {

            datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '&#x3C;Ant',
                nextText: 'Sig&#x3E;',
                currentText: 'Hoy',
                monthNames: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
                    'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
                monthNamesShort: ['ene', 'feb', 'mar', 'abr', 'may', 'jun',
                    'jul', 'ago', 'sep', 'oct', 'nov', 'dic'],
                dayNames: ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'],
                dayNamesShort: ['dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb'],
                dayNamesMin: ['D', 'L', 'M', 'X', 'J', 'V', 'S'],
                weekHeader: 'Sm',
                
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''};
            datepicker.setDefaults({
                showAnim: "show",
                dateFormat: "yy-mm-dd"
            });
            datepicker.setDefaults(datepicker.regional['es']);

            return datepicker.regional['es'];

        }));
        
        var form = $("#form_cert_pag");
        form.validate({
            rules: {
                num_id: {
                    required: true,
                    minlength: 8,
                    number: true
                }
            },
            messages: {
                num_id: {
                    required: "Por favor ingrese su número de identificación",
                    minlength: "El número de identificación debe contener minimo 8 caracteres",
                    number: "Solo se admiten números en este campo."
                }
            }
            
        });
        
    });

</script>
