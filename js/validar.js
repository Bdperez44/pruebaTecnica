$('.valor').on('click', function (event) {
    $('.valor').css("background-color",'white')    
    $(".editproduc").show();
    $(".deleteproduc").show();
    $("#detalleproduc").show();

    var id = $(this).attr('data-id');
    document.querySelectorAll(`tr[class="valor"]`).forEach(element => {
      var id2 = element.getAttribute('data-id');
      
      if(id2 === id){
        $(this).css('background-color','rgba(0,128,0,0.6)');
      }

    });

    document.querySelectorAll(`input[name="valor"]`).forEach(element => {
      if(element.value === id) {
        element.checked = true;
      }
    });       
});
$('.editproduc').on('click', function (event) {
    document.querySelectorAll(`input[name="valor"]`).forEach(element => {
        if(element.checked) {
            var id = element.value; 
            window.location.href = 'bd/editar.php?id='+id;
        }
    }); 
});
$('.deleteproduc').on('click', function (event) {
    document.querySelectorAll(`input[name="valor"]`).forEach(element => {
        if(element.checked) {
            var id = element.value;  
            const confirmacion = confirm('¿Estas seguro que deseas eliminar este producto?');
            if (confirmacion != true) {
                event.preventDefault();
            }else{
                window.location.href = 'bd/delete.php?id='+id;
            }        
        }
    }); 
});
$('#detalleproduc').on('click', function (event) {
    document.querySelectorAll(`input[name="valor"]`).forEach(element => {
      if(element.checked) {
        var id = element.value;  
        $('#modales').load( 'modal.php?id=' + id, function(){
          $("#exampleModal").modal("show");
        });
      }
    }); 
});
(function(document) {
    'use strict';

    var LightTableFilter = (function(Arr) {

      var _input;

      function _onInputEvent(e) {
        _input = e.target;
        var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
        Arr.forEach.call(tables, function(table) {
          Arr.forEach.call(table.tBodies, function(tbody) {
            Arr.forEach.call(tbody.rows, _filter);
          });
        });
      }

      function _filter(row) {
        var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
        row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
      }

      return {
        init: function() {
          var inputs = document.getElementsByClassName('light-table-filter');
          Arr.forEach.call(inputs, function(input) {
            input.oninput = _onInputEvent;
          });
        }
      };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {
      if (document.readyState === 'complete') {
        LightTableFilter.init();
      }
    });

  })(document);
