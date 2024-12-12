function modal() {

    Swal.fire({
        timer: 5000,
        icon: "error",
        title: "Oops...",
        showConfirmButton: true,
        confirmButtonColor: "#006400",
        text: "Por favor, preencha todos os campos",
    });

}
function verificacao() {

    if (!/^\d{11}$/.test(document.getElementById("telefone").value)) {
        Swal.fire({
            timer: 5000,
            icon: "Preencha o campo numero",
            title: "Oops...",
            showConfirmButton: true,
            confirmButtonColor: "#006400",
            text: "O número deve conter exatamente 11 dígitos.",
        });

    }
};
