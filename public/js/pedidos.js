//Definir Las Variables Correspondintes
      var opt_1 = new Array ("-", "1 dias", "2 dias");
      var opt_2 = new Array ("-", "1 dias", "2 dias");
      var opt_3 = new Array ("-", "1 dias", "2 dias","3 dias");
      //crear una funcion que permita ejecutar el cambio dinamico
      
      function cambia(){
        var entrega;
        //Se toma el vamor de la "cosa seleccionada"
        entrega = document.formulario1.entrega[document.formulario1.entrega.selectedIndex].value;
        //se chequea si la "cosa" esta definida
        if(entrega!=0){
          //selecionamos las cosas Correctas
          mis_opts=eval("opt_" + entrega);
          //se calcula el numero de cosas
          num_opts=mis_opts.length;
          //marco el numero de opt en el select
          document.formulario1.opt.length = num_opts;
          //para cada opt del array, la pongo en el select
          for(i=0; i<num_opts; i++){
            document.formulario1.opt.options[i].value=mis_opts[i];
            document.formulario1.opt.options[i].text=mis_opts[i];
          }
          }else{
            //si no habia ninguna opt seleccionada, elimino las cosas del select
            document.formulario1.opt.length = 1;
            //ponemos un guion en la unica opt que he dejado
            document.formulario1.opt.options[0].value="-";
            document.formulario1.opt.options[0].text="-";
          }
          //hacer un reset de las opts
          document.formulario1.opt.options[0].selected = true;
          
        }