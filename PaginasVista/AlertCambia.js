
(async ()=>{const {value:contra}= await Swal.fire({
    title:'Cambiar contraseña',
    input: 'text',
    inputPlaceholder: 'Contraseña Nueva',
    inputValue: '',
    input: 'text',
    inputPlaceholder: 'Confirmación',
    inputValue: '',

    inputValue: '',
    confirmButtonText: 'Continuar',
    padding: '1rem',
    backdrop: true,
    position: 'center',
    allowOutsideClick: false,
    allowEscapeKey: false,
    allowEnterKey: false,
    stopKeydownPropagation: false,
    showConfirmButton: true,
    confirmButtonColor: '#1e355e',
    confirmButtonArialLabel: 'Confirmar',
    buttonStylingh: true


});

})()

