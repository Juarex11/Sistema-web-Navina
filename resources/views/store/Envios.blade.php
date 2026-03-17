@extends('home')

@section('titulo','Envios')

@section('contenidoPagina')
<div class="container mx-auto md:px-8 px-4 my-auto py-8 text-justify">
    <div class="flex items-start gap-2 mb-3">
        <h1 class="font-extrabold text-pink-400 md:text-3xl text-2xl md:mb-3"> ENVÍOS Y ENTREGA </h1>
        <svg viewBox="0 0 24 24" fill="none" class="md:w-9 md:h-9  w-8 h-8" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier"> 
                <path d="M19.5 7.75H18.1C18.5 7.27 18.75 6.67 18.75 6C18.75 4.48 17.52 3.25 16 3.25C14.32 3.25 12.84 4.14 12 5.46C11.16 4.14 9.68 3.25 8 3.25C6.48 3.25 5.25 4.48 5.25 6C5.25 6.67 5.5 7.27 5.9 7.75H4.5C3.81 7.75 3.25 8.31 3.25 9V11.5C3.25 12.1 3.68 12.58 4.25 12.7V19.5C4.25 20.19 4.81 20.75 5.5 20.75H18.5C19.19 20.75 19.75 20.19 19.75 19.5V12.7C20.32 12.58 20.75 12.1 20.75 11.5V9C20.75 8.31 20.19 7.75 19.5 7.75ZM19.25 11.25H12.75V9.25H19.25V11.25ZM16 4.75C16.69 4.75 17.25 5.31 17.25 6C17.25 6.69 16.69 7.25 16 7.25H12.84C13.18 5.82 14.47 4.75 16 4.75ZM8 4.75C9.53 4.75 10.82 5.82 11.16 7.25H8C7.31 7.25 6.75 6.69 6.75 6C6.75 5.31 7.31 4.75 8 4.75ZM4.75 9.25H11.25V11.25H4.75V9.25ZM5.75 12.75H11.25V19.25H5.75V12.75ZM18.25 19.25H12.75V12.75H18.25V19.25Z" fill="#f472b6"></path>
            </g>
        </svg>
    </div>
    <p> Al finalizar tu pedido recibirás un correo de confirmación con todos los detalles. </p>
    <br>
    <p> Los plazos de entrega se contabilizan desde que verificamos el pago de tu compra.</p>
    <br>

    
    <h1 class="underline font-bold text-gray-600 md:text-2xl text-1xl mb-3"> Envíos en {{ $info->localizacion }} </h1>
    
    <p class=" font-bold text-black px-4">Lunes a sábado ({{ $info->horario }})</p>
    <p class="px-4">Delivery a domicilio</p>
    <br>
    <p class=" font-bold text-black px-4">Recojo en tienda</p>
    <p class="px-4">En caso quieras recoger tu pedido, puedes acercarte a nuestro almacén en 2 de mayo 1311</p>

    <br>
    <h1 class="underline font-bold text-gray-600 md:text-2xl text-1xl mb-3">Envíos a nivel nacional</h1>
    <p class="px-4 mb-3">- Realizamos envío en la agencia de tu preferencia: (Shalom, Marvisur, Olva Courier, etc.)</p>   
    <p class="px-4 mb-8">- Los tiempos de entrega son de 3 a 5 días hábiles, una vez recibas el correo que tu pedido está en camino.</p>



    <div class="flex items-start gap-2 mb-3">
        <h1 class="font-extrabold text-pink-400 md:text-3xl text-2xl md:mb-3">PEDIDOS Y PRODUCTOS</h1>
        <svg viewBox="0 0 24 24" fill="none" class="md:w-9 md:h-9  w-8 h-8" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4.5 5H18.2768C19.0446 5 19.526 5.82948 19.1451 6.49614L16.5758 10.9923C16.2198 11.6154 15.5571 12 14.8394 12H8M8 12L6.45625 14.47C6.03997 15.136 6.51881 16 7.30425 16H18M8 12L4.05279 4.10557C3.714 3.428 3.02148 3 2.26393 3H2M8 20C8 20.5523 7.55228 21 7 21C6.44772 21 6 20.5523 6 20C6 19.4477 6.44772 19 7 19C7.55228 19 8 19.4477 8 20ZM18 20C18 20.5523 17.5523 21 17 21C16.4477 21 16 20.5523 16 20C16 19.4477 16.4477 19 17 19C17.5523 19 18 19.4477 18 20Z" stroke="#f472b6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
    </div>

    <p class="font-bold text-gray-900">¿Qué debo hacer si me llega un artículo defectuoso?</p>
    <p class="mb-8">Navi Natubelleza solo vende artículos en perfecto estado. Sin embargo, si recibieras 
        tu producto con alguna imperfección, te pedimos, te pongas en contacto con nosotros 
        enviándonos un mensaje vía WhatsApp y solucionaremos el inconveniente en el menor tiempo posible.</p>


    <div class="flex items-start gap-2 mb-3">
        <h1 class="font-extrabold text-pink-400 md:text-3xl text-2xl md:mb-3">CAMBIOS Y DEVOLUCIONES</h1>
        <svg viewBox="0 0 24 24" fill="none" class="md:w-9 md:h-9  w-8 h-8" xmlns="http://www.w3.org/2000/svg" transform="rotate(0)matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8.46967 17.5303C8.76256 17.8232 9.23744 17.8232 9.53033 17.5303C9.82322 17.2374 9.82322 16.7626 9.53033 16.4697L8.46967 17.5303ZM6 14V13.25C5.69665 13.25 5.42318 13.4327 5.30709 13.713C5.191 13.9932 5.25517 14.3158 5.46967 14.5303L6 14ZM18 14.75C18.4142 14.75 18.75 14.4142 18.75 14C18.75 13.5858 18.4142 13.25 18 13.25V14.75ZM15.5303 6.46967C15.2374 6.17678 14.7626 6.17678 14.4697 6.46967C14.1768 6.76256 14.1768 7.23744 14.4697 7.53033L15.5303 6.46967ZM18 10V10.75C18.3033 10.75 18.5768 10.5673 18.6929 10.287C18.809 10.0068 18.7448 9.68417 18.5303 9.46967L18 10ZM6 9.25C5.58579 9.25 5.25 9.58579 5.25 10C5.25 10.4142 5.58579 10.75 6 10.75L6 9.25ZM9.53033 16.4697L6.53033 13.4697L5.46967 14.5303L8.46967 17.5303L9.53033 16.4697ZM6 14.75H18V13.25H6V14.75ZM14.4697 7.53033L17.4697 10.5303L18.5303 9.46967L15.5303 6.46967L14.4697 7.53033ZM18 9.25H6L6 10.75H18V9.25Z" fill="#f472b6"></path> </g></svg>
    </div>
    <p>Si no estás satisfecho con los productos que compraste por algún desperfecto que pudieran
         presentar, tienes 3 días para solicitar un cambio, siempre y cuando cumplas con las siguientes condiciones:</p>
    <br>
    <p>* En el caso de cancelación de orden, todos los productos se deben encontrar en perfectas condiciones y sin señales de uso.</p>
    <br>
    <p>* No procederá el cambio o devolución, cuando se compruebe que el producto ha sufrido daño como resultado de un inadecuado uso o manipulación por parte del cliente.</p>
    <br>
    <p>* Todos los productos tienen que venir con su empaque original.</p>
    <br>
    <p>Al devolver o cambiar un producto, es muy importante que envíes un correo a {{ $info->correo }}
        con la información de por qué deseas realizar la devolución y esperar nuestra respuesta aprobando tu solicitud.</p>
    <br>
    <p>En Navi Natubelleza todos nuestros productos pasan por un estricto control de calidad antes de ser enviados a fin de
         detectar posibles daños o defectos. Si recibes un producto que no se encuentre en perfectas condiciones, por favor
         contáctenos inmediatamente y envíanos una imagen del mismo. Para más información o dudas por favor escríbenos a {{ $info->correo }}</p>
    <br>
    <p class="mb-12">También puede comunicarte con nosotros al WhatsApp a (927 987 259) en horario de oficina.</p>

    <div class="flex items-start gap-2 mb-3">
        <h1 class="font-extrabold text-pink-400 md:text-3xl text-2xl md:mb-3">NUESTRA FILOSOFÍA</h1>
        <svg viewBox="0 0 24 24" fill="none" class="md:w-9 md:h-9  w-8 h-8" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="12" r="10" stroke="#f472b6" stroke-width="1.5"></circle> <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke="#f472b6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
    </div>
    <p>Todos los trabajos que realizamos en Navi Natubelleza están enfocados en crear productos naturales que respetan la piel y el
         medio ambiente. Elaboramos de forma natural utilizando ingredientes locales, puros y sostenibles, garantizando calidad, bienestar
          y conexión con la naturaleza en cada producto.</p>
</div>
@endsection