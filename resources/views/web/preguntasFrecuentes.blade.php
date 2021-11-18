@extends('layouts.web')

@section('content')


<header id="resultado-propiedades"></header>

    <section id="faqs">
        <div class="container-fluid bg-light">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="row">
                        <div class="col-12 py-5">
                            <h1 class="color-azul f-400">
                                Resuelve tus preguntas con un solo clic<br>
                                Consulta nuestras FAQS y resuelve tus dudas
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid my-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3 class="color-azul f-400">
                                Proceso para renta
                                <br>
                                de un <b>inmueble</b>
                            </h3>
                            <p class="">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            </p>
                            <img src="assets/imagenes/faqs/faqs-image1.png" width="300px">

                            <h3 class="color-azul mt-5">
                                Proceso para venta
                                <br>
                                de <span class="font-weight-bold">propiedad</span>
                            </h3>
                            <p class="">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            </p>
                            <img src="assets/imagenes/faqs/faqs-image2.png" width="300px">
                        </div>
                        <div class="col-12 col-md-6">
                                      <div id="accordion">
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingOne">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                              <span>Debes de conocer:</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              1. Que persona quieres como inquilino.
                              <br>
                              2. El precio de la renta.
                              <br>
                              3. Formas de pago.
                              <br>
                              4. Condiciones que vas a poner en el contrato.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingTwo">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                              <span>El precio de la renta depende de:</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              1. La ubicación.
                              <br>
                              2. Si esta amueblada o no.
                              <br>
                              3. Características del inmueble y estacionamientos
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingThree">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                              <span>Conoce a tu inquilino</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              1. Que ingresos tiene.
                              <br>
                              2. Si tiene mascotas.
                              <br>
                              3. A que se dedica.
                              <br>
                              4. Cuantas personas vivirán ahí.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingFour">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                              <span>¿Qué es un fiador u obligado solidario?</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse4" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              Aquel que se establece en la persona física o moral que dará cumplimento a una obligación adquirida por un tercero.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingFive">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                              <span>¿Qué debe contener el contrato?</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse5" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              1. Nombres de arrendador, arrendatario y fiador.
                              <br>
                              2. Ubicación del inmueble.
                              <br>
                              3. Descripción detallada y estado del inmueble.
                              <br>
                              4. Monto de la renta.
                              <br>
                              5. Garantía o póliza jurídica.
                              <br>
                              6. Reporte fotográfico actual.
                              <br>
                              7. El término del contrato, generalmente es por un año.
                              <br>
                              8. Penas de incumplimiento.
                              <br>
                              9. Costo del mantenimiento.
                              <br>
                              10. Copia del certificado libertad de gravamen del inmueble proporcionado por el fiador.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingSix">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                              <span>¿Qué responsabilidad tiene el propietario?</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse6" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              1. Entregar en buen estado las instalaciones del inmueble.
                              <br>
                              2. Realizar reparaciones del inmueble.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingSeven">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                              <span>¿Qué responsabilidad tiene el inquilino?</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse7" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              1. Pagar a tiempo la renta.
                              <br>
                              2. Avisar a los propietarios sobre el mantenimiento que requiere el inmueble.
                              <br>
                              3. Comentar con el propietario si piensa hacer algún tipo de adecuación.
                              <br>
                              4. Utilizar la propiedad rentada a los fines establecidos en el contrato.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingEight">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                              <span>¿Qué documentos necesito para la renta de un inmueble?</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse8" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              <b>Propietario:</b>
                              <br>
                              1. Documentos de la propiedad.
                              <br>
                              2. Cuenta y cuenta clave para hacer depósitos mensuales.
                              <br>
                              3. Escrituras del inmueble.
                              <br>
                              4. No tener adeudos de agua, luz y mantenimiento.
                              <br>
                              <br>
                              <b>Inquilino:</b>
                              <br>
                              1. Identificación oficial con fotografía (INE o Pasaporte).
                              <br>
                              2. Comprobante de domicilio (Actual).
                              <br>
                              3. Carta de la empresa donde labora (Tiempo y sueldo).
                              <br>
                              4. Comprobante de ingresos o nomina (Últimos 3 meses).
                              <br>
                              <br>
                              <b>Fiador físico</b>
                              <br>
                              1. Identificación oficial con fotografía (INE o Pasaporte).
                              <br>
                              2. Comprobante de domicilio (Actual).
                              <br>
                              3. Escritura del bien inmueble libre de gravamen e inscrito en el Registro Público de la Propiedad.
                              <br>
                              4. Certificado de Libertad de Gravamen del Inmueble.
                              <br>
                              5. Boleta predial (No mayor a 3 meses).
                              <br>
                              <br>
                              <b>Fiador moral</b>
                              <br>
                              1. Identificación oficial con fotografía del Apoderado Legal (INE o Pasaporte).
                              <br>
                              2. Comprobante de domicilio (Actual).
                              <br>
                              3. Escritura de bien inmueble libre de gravamen e inscrito en el Registro Público de la Propiedad.
                              <br>
                              4. Certificado de Libertad de Gravamen del Inmueble.
                              <br>
                              5. Boleta predial (No mayor a 3 meses).
                              <br>
                              6. RFC.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingNine">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                              <span>¿Qué es una póliza jurídica?</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse9" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              Da al propietario la seguridad del cobro de servicios adeudados, mantenimiento y daños del inmueble.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingTen">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                              <span>¿Qué documentos necesito para vender mi propiedad?</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse10" class="collapse" aria-labelledby="headingTen" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              1. INE.
                              <br>
                              2. Título de la propiedad.
                              <br>
                              3. Boletas de predial y agua pagadas.
                              <br>
                              4. Contrato de arrendamiento (Si es su caso).
                              <br>
                              5. Acta de matrimonio (Si es su caso).
                              <br>
                              6. Si el inmueble está bajo el régimen de condominio, se necesita una constancia de no adeudos por parte de la administración.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingEleven">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                              <span>¿Cuál es el proceso para la venta de mi propiedad</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse11" class="collapse" aria-labelledby="headingEleven" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              1. Se firmara una promesa de apartado, y se hará entrega de la documentación ante Notario Público para su revisión en un plazo máximo de 15 días.
                              <br>
                              2. Se solicitara un certificado de libertad de gravamen ante el Registro Público de la propiedad.
                              <br>
                              3. Se revisará el no adeudo del impuesto predial y suministro de agua.
                              <br>
                              4. Se firma el Contrato Privado de Compraventa y en un plazo de 45 a 60 días,
                              <br>
                              5. Se hará la firma de escrituras ante notario público y en este mismo acto se deberá entregar el inmueble.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingTwelve">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                              <span>¿Cómo puedo conocer el valor de mi propiedad?</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse12" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              Con ayuda de un valuador certificado, él se encarga de realizar un avaluó considerando los acabados, dimensiones del inmueble o bien haciendo un estudio de mercado de la zona.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingThirteen">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                              <span>¿Qué hace el notario púbico?</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse13" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              1. Revisa la validez de los documentos del comprador y vendedor
                              <br>
                              2. Obtiene el certificado de libre de gravamen ante el registro público.
                              <br>
                              3. Elabora un cálculo de ISR.
                              <br>
                              4. Expide un testimonio de la escritura con todos sus comprobantes certificados y hace la inscripción del nuevo propietario suscripción ante el Registro Público de la Propiedad.
                              <br>
                              5. Cobra los derechos de avalúos, gestorías y demás gastos que genere una escrituración.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingFourteen">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                              <span>¿Qué es el certificado de Libertad de gravamen?</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse14" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              Constancia donde acredita que el inmueble está libre de gravamen.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingFifteen">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
                              <span>¿Qué debe contener el contrato?</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse15" class="collapse" aria-labelledby="headingFifteen" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              1. Nombre(s) de vendedor(es) y comprador.
                              <br>
                              2. Ubicación del inmueble.
                              <br>
                              3. Monto de la venta.
                              <br>
                              4. Formas de pago y tiempos.
                              <br>
                              5. Penas de incumplimiento.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="card" style="border-left: 0px; border-right: 0px;">
                  <div class="card-header bg-white" id="headingSixteen">
                      <h5 class="mb-0">
                          <h5 class="f-400 mt-2 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse16" aria-expanded="false" aria-controls="collapse16">
                              <span>¿Qué gastos son adicionales al del precio del inmueble?</span> <i class="fas fa-plus"></i>
                          </h5>
                      </h5>
                  </div>
                  <div id="collapse16" class="collapse" aria-labelledby="headingSixteen" data-parent="#accordion">
                      <div class="card-body" style="border-left: 5px #2d995b solid;">
                          <p class="">
                              <b>Comprador:</b>
                              <br>
                              · ISAI (Impuesto Sobre Adquisición de Inmuebles).
                              <br>
                              · Inscripción en el Registro Público de la Propiedad.
                              <br>
                              · Certificado de Libertad de Gravamen.
                              <br>
                              · Gastos de escrituración.
                              <br>
                              · Honorarios del notario.
                              <br>
                              <br>
                              <b>Vendedor:</b>
                              <br>
                              · Predial
                              <br>
                              · ISR
                              <br>
                              · Comisión inmobiliaria
                          </p>
                      </div>
                  </div>
              </div>
          </div>
          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
