<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    
  </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                

                <div class="card">
                  <form id="miFormulario" action="datos.php" method="post">
                    <div class="card-header">
                        <h3>Analizar texto</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ingrese texto</label>
                            <textarea class="form-control" name="texto" id="exampleFormControlTextarea1" rows="3"></textarea>
                          
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary"><i class="ri-checkbox-circle-line"></i> Analizar</button>
                        <button class="btn btn-danger"><i class="ri-close-circle-line"></i> Cancelar</button>
                       
                    </div>
                  </form>
                  <button id="limpiar"   class="btn btn-warning"><i class="ri-refresh-line"></i> Limpiar</button>
                </div>

             
            </div>
            <div class="col-md-5">
            <div class="row">
                <div class="col-md-4"> <div class="btn btn-block " id="Positivo"> Positivo</div></div>
                <div class="col-md-4"> <div class="btn btn-block " id="Neutral"> Neutral</div></div>
                <div class="col-md-4"> <div class="btn btn-block " id="Negativo"> Negativo</div></div>
            </div>
            
            </div>

        </div>
    </div>

    <script>
        var resuiltado;


         document.getElementById('miFormulario').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío tradicional del formulario
            
            // Obtén los datos del formulario
            const formData = new FormData(this);

            // Realiza la petición POST a datos.php utilizando Axios
            axios.post('datos.php', formData)
                .then(function(response) {
                    // Maneja la respuesta del servidor
                    console.log(response.data);
                    resuiltado = response.data;
                    actividad();
                })
                .catch(function(error) {
                    // Maneja los errores de la petición
                    console.error(error);
                });
        });


 function actividad (){
    if(resuiltado.resultado == 'Positivo'){
            document.getElementById('Positivo').classList.add('btn-success');
        }else if(resuiltado.resultado == 'Neutral'){
            document.getElementById('Neutral').classList.add('btn-warning');        
        }
        else if(resuiltado.resultado == 'Negativo'){
            document.getElementById('Negativo').classList.add('btn-danger');        
        }else{
            alert('No se pudo analizar el texto');
        }
 }

 
 document.getElementById('limpiar').addEventListener('click', function(event) {
    document.getElementById('miFormulario').reset();
    document.getElementById('Positivo').classList.remove('btn-success');
    document.getElementById('Neutral').classList.remove('btn-warning');
    document.getElementById('Negativo').classList.remove('btn-danger');

 });

   
 
 
    
        


    </script>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>