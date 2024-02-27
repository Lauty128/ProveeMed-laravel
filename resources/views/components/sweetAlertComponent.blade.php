{{-- Sweer Alert Files --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    async function deleteItem(e){
      e.preventDefault();

      swal({
        title: "Estas seguro?",
        text: "Estas por eliminar datos importantes de la lista",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((isConfirm) =>{
        if(isConfirm) e.target.submit();
      }) 

    } 
  </script>