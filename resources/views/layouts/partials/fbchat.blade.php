<div id="fb-root"></div>  
@if(auth()->user()->name)
    <div class="fb-customerchat"
    attribution=setup_tool
    page_id="106833667726609"
    theme_color="#bf0000"
    logged_in_greeting="¡Hola {{auth()->user()->name}}!, ¿Tienes una consulta? Estamos dispuestos a ayudarte."
    logged_out_greeting="¡Hola {{auth()->user()->name}}!, ¿Tienes una consulta? Estamos dispuestos a ayudarte."
    margin-bottom:100px>
    </div>
@else
    <div class="fb-customerchat"
    attribution=setup_tool
    page_id="106833667726609"
    theme_color="#bf0000"
    logged_in_greeting="¡Hola!, ¿Tienes una consulta? Estamos dispuestos a ayudarte."
    logged_out_greeting="¡Hola!, ¿Tienes una consulta? Estamos dispuestos a ayudarte.">
    </div>
@endif