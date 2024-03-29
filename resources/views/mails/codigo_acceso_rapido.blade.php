<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>



    <style>

    @font-face {

        font-family: fuente1;

        src: url("{{asset('fonts/Gotham-Bold.otf')}}");

    }

    @font-face {

        font-family: fuente2;

        src: url('{{asset('fonts/AmazonEmber_Rg.ttf')}}');
    }
    h1{

        font-family: Helvetica!important;

        font-weight: bold;

    }

    h2, h3, h5, h4, h6, span, button, a, small, input, button, p, label{

        font-family: Helvetica!important;

    }

      body{

          margin: 0;

          padding: 0;

      }

      table{

          border-spacing: 0;

      }

      td{

          padding: 0;



      }

      img {

          border: 0;

      }

      .wrapper{

          width: 100%;

          table-layout: fixed;

          padding-bottom: 40px;

      }



      .webkit{

          max-width: 650px;

          width: 100%;

          background-color: #eeeeee;

          border-radius: 14px;

          margin-top: 20px;

      }

      .outer{

          margin: 0 auto;

          width: 100%;

          max-width: 650px;

          min-width: 650px;

          border-spacing: 0;

          color: #4a4a4a;

      }

      @media screen and (max-width: 600px){

          .outer{

            min-width: 0px;
          width: 100%!important;


            }


            .webkit{
                min-width: 0px;
          width: 100%!important;



      }


      }



      @media screen and (max-width: 400px){



        }



.myDiv{
    background-image: url('https://www.creattiva.cl/images/fondo-mail.jpg');
    background-size: cover;
    background-position: center top;
}


  </style>

</head>

<body>

<!--Mail 3-->
<div class="myDiv" style="margin-bottom: 20px;">
<center class="wrapper">



    <table>

        <tr>

            <td>

            <center><a href=""><img src="https://www.creattiva.cl/images/logo-blanco.jpg" width="350" alt="Logo" title="Logo"></a></center>

            <div class="webkit" style="border-radius: 5px; border: 1px solid #eeeeee; background:#fff">


            <table class="outer" align="center">
                <tr>

                    <td style="text-align:center">

                    <div align="center" width="600">

                    <br><br>

                    <h1 style="color: black  ;margin: 0px;font-weight: bold;">Clave de acceso rápido</h1>

                    <h3>¡Hola {{$nombre}}!</h3>

                    <p style="max-width: 410px;">Usa el siguiente código para completar la verificación:</p>

                    </div>



                    </td>

                </tr>

                <tr>

                    <td style="padding:10px;padding-left: 10%;padding-right: 10%;" align="center">

                    <div  width="600" >

                    <table>

                        <thead>

                            <tr>

                                <td>



                                <div style="margin-bottom: 20px;">

                                    <br>

                                    <center>
                                        <a style="background-color: #f5f5f5;color: #0606a0;border-radius: 10px;padding-left: 30px;padding-right: 30px;padding-top: 15px;padding-bottom: 15px;width: 70%;font-size: 22px;">{{$code}}</a>
                                    </center>

                                    <br>

                                </div>

                                <div style="margin-bottom: 20px;">

                                    <br>

                                        <div style="border:2px solid #f5f5f5;border-radius:10px;width: 350px;text-align: center;">
                                            <img src="https://www.creattiva.cl/images/alert.png" style="float: left;margin-top: 10px;" width="30">
                                            <p>Este código expirará en 15 minutos.</p>
                                        </div>

                                    <br>

                                </div>

                                <h3>Gracias por visitar Creattiva</h3>



                                </td>




                            </tr>



                        </thead>

                    </table>

                    </div>



                    </td>

                </tr>

                <tr style="background-color: black;">

                    <td>

                        <div align="center" width="600" style="color:black;margin-top: 25px; margin-bottom:25px">



                            <img src="https://www.creattiva.cl/images/iconos.png" width="180">


                        </div>

                    </td>

                </tr>

            </table>

            </div>

            </td>

        </tr>

    </table>



    <table width="100%" style="text-align: center;">

                        <thead>

                            <tr>

                                <td>



                                <p>&copy; {{date('Y')}} CREATTIVA DATACENTER</p>
    <p style="padding-left: 4px;padding-right: 4px;">Este correo electrónico fue enviado a usted de forma automática.</p>



                                </td>




                            </tr>



                        </thead>

                    </table>



</center>


</div>


</body>

</html>
